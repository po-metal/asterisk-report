<?php

namespace MetricaAsterisk\Repository\Sql;

/**
 * Description of MetricsQueueSql
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class MetricsQueueSql {

    CONST tblName = "ma_metrics_queue";

    public static function getMetrica($start, $end, $fechaFormato) {

        $sql = 'select '
                . ' queue,'
                . ' date_format(date,"' . $fechaFormato . '" ) as fecha,'
                . ' sum(received) as received,'
                . ' sum(attended) as attended,'
                . ' sum(abandoned) as abandoned,'
                . ' sum(rejected) as rejected '
                . ' from ' . self::tblName
                . ' where '
                . ' date  >= "' . $start->format("Y-m-d") . '" '
                . ' and date <= "' . $end->format("Y-m-d") . '"'
                . ' group by 1,2'
                . ' order by 1,2';
        return $sql;
    }

}
