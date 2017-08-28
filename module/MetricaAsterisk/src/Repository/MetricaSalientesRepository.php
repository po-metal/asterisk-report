<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MetricaSalientesRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaSalientesRepository extends EntityRepository
{

    public function getConnection()
    {
        return $this->getEntityManager()->getConnection();
    }

    public function save(\MetricaAsterisk\Entity\MetricaSalientes $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\MetricaSalientes $entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function getMetricaPorTroncal($start, $end, $fechaFormato)
    {
        $sql = 'select
        date_format(fecha,"'.$fechaFormato.'" ) as fecha,
        troncal,
        tipo_destino,
        estado,
        sum(cantidad) as cantidad 
        from ma_metrica_salientes
        where
        fecha  >= "' . $start->format("Y-m-d") . '" and fecha <= "' . $end->format("Y-m-d") . '" 
        and troncal != "OTRO" and tipo_destino != "INTERNA"
        group by 1,2,3,4
        order by 4,1,2,3';

                $stmt = $this->getConnection()->prepare($sql);
                $stmt->execute();
                $records = $stmt->fetchAll(\PDO::FETCH_OBJ);
                return $records;
    }

    public function getMetricaPorInterno($start, $end, $fechaFormato)
    {
        $sql = 'select
        date_format(fecha,"'.$fechaFormato.'" ) as fecha,
        origen,
        tipo_destino,
        estado,
        sum(cantidad) as cantidad 
        from ma_metrica_salientes
        where
        fecha  >= "' . $start->format("Y-m-d") . '" and fecha <= "' . $end->format("Y-m-d") . '" 
        and troncal != "OTRO" and tipo_destino != "INTERNA"
        group by 1,2,3,4
        order by 4,1,2,3';

                $stmt = $this->getConnection()->prepare($sql);
                $stmt->execute();
                $records = $stmt->fetchAll(\PDO::FETCH_OBJ);
                return $records;
    }

    
    public function insertObjects($records)
    {
        $sql = 'INSERT INTO ma_metrica_salientes (fecha, origen, tipo_destino, troncal, estado, cantidad) VALUES ';


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

    protected function getRecordValues($record)
    {
        return '"' . $record["fecha"] . '","' . $record["origen"] . '","' . $record["tipo_destino"] . '","' . $record["troncal"] . '","' . (string) $record["estado"] . '",' . $record["cantidad"];
    }


}

