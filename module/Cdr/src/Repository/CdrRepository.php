<?php

namespace Cdr\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CdrRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 */
class CdrRepository extends EntityRepository {

    public function getConnection() {
        return $this->getEntityManager()->getConnection();
    }

    public function save(\Cdr\Entity\Cdr $entity) {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\Cdr\Entity\Cdr $entity) {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function getByDate($start, $end) {
        return $this->getEntityManager()
                        ->createQueryBuilder()->select('u')->from('Cdr\Entity\Cdr', 'u')
                        ->where('u.calldate > :start')
                        ->andWhere('u.calldate < :end')
                        ->setParameter("start", $start)
                        ->setParameter("end", $end)
                        ->getQuery()
                        ->getArrayResult();
    }

    protected function generateCaseTipoDestino(array $tiposDestino) {
        $str = "case " . PHP_EOL;
        foreach ($tiposDestino as $td) {
            $str .= 'when dst REGEXP "' . $td->getExpresionRegular() . '" then "' . $td->getNombre() . '"' . PHP_EOL;
        }
        $str .= 'else "RESTO"' . PHP_EOL;
        $str .= 'end as tipo_destino';
        return $str;
    }

    protected function generateCaseTroncales(array $troncales) {
        $str = "case " . PHP_EOL;
        foreach ($troncales as $t) {
            $str .= 'when dstchannel REGEXP "' . $t->getNombre() . '" then "' . $t->getNombre() . '"' . PHP_EOL;
        }
        $str .= 'else "OTRO"' . PHP_EOL;
        $str .= 'end as troncal';
        return $str;
    }

    public function getMetricaSalientes($date = null, $toDate = null, array $troncales, array $tiposDestino) {

        if (!$date) {
            $date = 'date_format(now() - interval 2 hour, "%Y-%m-%d %H:00:00")';
        }

        if (!$toDate) {
            $toDate = 'now()';
        }

        $data = array();

        $connection = $this->getConnection();

        $caseTipoDestino = $this->generateCaseTipoDestino($tiposDestino);
        $caseTroncales = $this->generateCaseTroncales($troncales);


        //Trunks Salientes    
        $sql = 'select
date_format(calldate,"%Y-%m-%d %H" ) as fecha,
src as origen,
' . $caseTipoDestino . ',
' . $caseTroncales . ',    
case 
when disposition = "ANSWERED" then "CONTESTADA" 
when disposition = "NO ANSWER" then "NO CONTESTADA" 
when disposition = "BUSY" then "OCUPADO" 
else "FALLIDA" 
end as estado,
COUNT(*) as cantidad
from cdr
where dcontext = "from-internal" and dstchannel like "SIP/%"
and calldate >= "' . $date . '" and calldate <= "' . $toDate . '"
group by 1,2,3,4,5
order by 1,2';

        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $data = array_merge($data, $stmt->fetchAll());

        return $data;
    }

    public function getMetricaQueues($date = null, $toDate = null) {

        if (!$date) {
            $date = 'date_format(now() - interval 2 hour, "%Y-%m-%d %H:00:00")';
        }

        if (!$toDate) {
            $toDate = 'now()';
        }

        //QUEUES    
        $sql = 'select
date_format(calldate,"%Y-%m-%d %H" ) as fecha,
dst as objeto,
"queue" as tipo,
case when dstchannel = "" then "Abandonadas" else "Atendidas" end as estado,
COUNT(*) as cantidad
from cdr
where dcontext = "ext-queues"
and calldate >= "' . $date . '" and calldate <= "' . $toDate . '"
group by 1,2,3,4
order by 1,2';

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMetricaIVR($date = null, $toDate = null, $dids) {

        if (!$date) {
            $date = 'date_format(now() - interval 2 hour, "%Y-%m-%d %H:00:00")';
        }

        if (!$toDate) {
            $toDate = 'now()';
        }

        //IVR    
        $sql = 'select
date_format(calldate,"%Y-%m-%d %H" ) as fecha,
did as objeto,
"ivr" as tipo,
case 
when ((dcontext = "from-did-direct" or dcontext = "from-internal") and disposition = "ANSWERED") then "Por Interno - Atendida"
when ((dcontext = "from-did-direct" or dcontext = "from-internal") and disposition != "ANSWERED") then "Por Interno - No Atendida"
when (dcontext = "ext-queues" and dstchannel != "") then "Cola - Atendida"
when (dcontext = "ext-queues" and dstchannel = "") then "Cola - No Atendida"
when (dcontext = "app-blackhole") then "Destino Denegado"
when (lastapp = "WaitExten" or lastapp = "BackGround" or lastapp = "Answer" or lastapp = "Playback" or lastapp = "Wait" or lastapp = "ExecIf" or lastapp = "GotoIf" or lastapp = "W") then "Finalizada en arbol"
else CONCAT("Otros-",dcontext,"-",disposition,"-",lastapp) end as estado,
COUNT(*) as cantidad
from cdr
where did in ' . $this->getDids($dids) . '
and calldate >= "' . $date . '" and calldate <= "' . $toDate . '"
group by 1,2,3,4
order by 1,2';

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMetricaInternos($date = null, $toDate = null, $dids) {

        if (!$date) {
            $date = 'date_format(now() - interval 2 hour, "%Y-%m-%d %H:00:00")';
        }

        if (!$toDate) {
            $toDate = 'now()';
        }



        /**
         * Situacion: Ruta entrante => interno => Transferencia, 
         * Cdrs: 2 registros
         * Evidencia:   a- Mismo uniqueID (ej: 1498743496.167013)
         *             b- Mismo src y did 
         *             c- En llamada transferida lastdata: SIP/211,,trI => trI
         */
        /**
         * Situacion: Ruta entrante => cola => interno, 
         * Cdrs: 1 registro
         * Evidencia: a- dcontext: ext-queues
         *            b- lastapp: Queue
         *            c- Interno que atendio dstchannel: Local/221@from-queue-00001106;1 => 221
         */
        /**
         * Situacion: Ruta entrante => interno => captura, 
         * Cdrs: 1 registro
         * Evidencia: se verifica una diferencia en dst y dstchannel ej: dst 211 y dstchannel SIP/1500-0002644d
         */
        /**
         * Situacion: Ruta entrante => cola => interno => captura, 
         * Cdrs: 2 registro
         * Evidencia:  a- dcontext: from-internal
         *             b- channel: Local/207@from-queue-0000111a;2 => from-queue
         *             c- dstchannel: SIP/230-0002643a (interno que capturo) => 230
         *             d- dst: 207 (interno destino capturado) => 207
         */
        /**
         * Situacion: Interno => Interno, 
         * Cdrs: 1 registro
         * Evidencia: src && dst => 3 cifras...
         */
        //Internos    
        $sql = 'select
date_format(calldate,"%Y-%m-%d %H" ) as fecha,
case
when (dcontext = "from-internal" and channel like "%from-queue%" and dst != substring(dstchannel,4,3)) then substring(dstchannel,4,3)
else dst
end as objeto,
"extension" as tipo,
case 
when (dcontext = "from-did-direct" and disposition = "ANSWERED") then "Directa a Interno - Atendida"
when (dcontext = "from-did-direct" and disposition != "ANSWERED") then "Directa a Interno - No Atendida"
when (dcontext = "from-internal" and channel like "%from-queue%" and dst = substring(dstchannel,4,3)) then "Directo de Cola - Atendida"
when (dcontext = "from-internal" and channel like "%from-queue%" and dst != substring(dstchannel,4,3)) then "Captura de Cola - Atendida"
when (length(stc) = 3 and length(dst) = 3 and disposition = "ANSWERED") then "Entre Internos - Atendida"
when (length(stc) = 3 and length(dst) = 3 and disposition != "ANSWERED") then "Entre Internos - No Atendida"
else "asd" as estado,
COUNT(*) as cantidad
from cdr
where
where (did in ' . $this->getDids($dids) . ' or (dcontext = "from-internal" and channel like "%from-queue%"))
and calldate >= "' . $date . '" and calldate <= "' . $toDate . '"
group by 1,2,3,4
order by 1,2';

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getDids($dids) {
        $indDids = "(";
        foreach ($dids as $did) {
            $indDids .= '"' . $did . '",';
        }
        $indDids = trim($indDids, ",") . ")";

        return $indDids;
    }

}
