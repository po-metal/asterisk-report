<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MetricaAtencionRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaAtencionRepository extends EntityRepository {

    public function getConnection() {
        return $this->getEntityManager()->getConnection();
    }

    public function save(\MetricaAsterisk\Entity\MetricaAtencion $entity) {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\MetricaAtencion $entity) {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function getMetrica($start, $end, $fechaFormato) {

        $sql = 'select
date_format(fecha,"'.$fechaFormato.'" ) as fecha,
tipo,
objeto,
estado,
sum(cantidad) as cantidad 
from ma_metrica_atencion 
where
fecha  >= "' . $start->format("Y-m-d") . '" and fecha <= "' . $end->format("Y-m-d") . '"
group by 1,2,3,4 
order by 1,2,3,4';

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $records;
    }

    public function insertObjects($records) {

        $sql = 'INSERT INTO ma_metrica_atencion (fecha, objeto,tipo, estado, cantidad) VALUES ';


        foreach ($records as $record) {
            $value = '';
            $value .= '(';
            $value .= $this->getRecordValues($record);
            $value .= '),';
            $values .= $value;
        }

        $sql .= trim($values, ',');

        $sql .= ' ON DUPLICATE KEY UPDATE cantidad=VALUES(cantidad)';

        try {

            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();
        } catch (Exception $ex) {
            return false;
        }


        return true;
    }

    protected function getRecordValues($record) {
        return '"' . $record["fecha"] . '","' . $record["objeto"] . '","' . $record["tipo"] . '","' . (string) $record["estado"] . '",' . $record["cantidad"];
    }

}
