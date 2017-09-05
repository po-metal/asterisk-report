<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MetricsQueueRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricsQueueRepository extends EntityRepository
{

    public function getConnection()
    {
        return $this->getEntityManager()->getConnection();
    }

    public function save(\MetricaAsterisk\Entity\MetricsQueue $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\MetricsQueue $entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function insertBase($records)
    {
        if (count($records)) {
                    $sql = 'INSERT INTO ma_metrics_queue (queue, date, received,attended,abandoned,rejected) VALUES ';
                    $values = "";
                    foreach ($records as $record) {
                        $value = '';
                        $value .= '(';
                        $value .= '"' . $record["queue"] . '","' . $record["date"] . '",' . $record["received"]. ',' . $record["attended"]. ',' . $record["abandoned"]. ',' . $record["rejected"];
                        $value .= '),';
                        $values .= $value;
                    }
                      $sql .= trim($values, ',');
                    $sql .= ' ON DUPLICATE KEY UPDATE received=VALUES(received),attended=VALUES(attended),abandoned=VALUES(abandoned),rejected=VALUES(rejected)';
                    echo $sql;

                    try {
                        $stmt = $this->getConnection()->prepare($sql);
                        $stmt->execute();
                    } catch (Exception $ex) {
                        return false;
                    }
                } else {
                    echo "no se detectan registros";

                }

                return true;
    }
    
    public function insertReceived($records)
    {
        if (count($records)) {
                    $sql = 'INSERT INTO ma_metrics_queue (queue, date, received) VALUES ';
                    $values = "";
                    foreach ($records as $record) {
                        $value = '';
                        $value .= '(';
                        $value .= '"' . $record["queue"] . '","' . $record["date"] . '",' . $record["received"];
                        $value .= '),';
                        $values .= $value;
                    }
                      $sql .= trim($values, ',');
                    $sql .= ' ON DUPLICATE KEY UPDATE received=VALUES(received)';
                    echo $sql;

                    try {
                        $stmt = $this->getConnection()->prepare($sql);
                        $stmt->execute();
                    } catch (Exception $ex) {
                        return false;
                    }
                } else {
                    echo "no se detectan registros";

                }

                return true;
    }

    protected function getRecordValues($record)
    {
        return '"' . $record["date"] . '","' . $record["received"] . '","' . $record["xxx"] . '","' . $record["xxx"] . '","' . (string) $record["xxx"] . '",' . $record["xxx"];
    }


}

