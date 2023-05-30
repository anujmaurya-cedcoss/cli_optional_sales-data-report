<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class MainTask extends Task
{
    public function mainAction($start_date, $end_date)
    {
        $sql = "SELECT * FROM `order` WHERE `order_date` >= '$start_date' AND `order_date` <= '$end_date'";
        $orders = $this->db->fetchAll(
            $sql,
            \Phalcon\Db\Enum::FETCH_ASSOC
        );

        echo "Following Orders were placed between $start_date and $end_date\n";
        foreach ($orders as $order) {
            echo "Order id : " .$order['oid'];
            echo " Product id : " .$order['pid'];
            echo " Order Date : " .$order['order_date'];
            echo PHP_EOL;
        }
    }
}
