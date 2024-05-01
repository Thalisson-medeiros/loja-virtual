<?php

namespace App\Models;
use MF\Model\Model;

class Car extends Model 
{
    public function addItem(string $id, string $name, string $price): void
    {
        try{
            $sql = 'insert into tb_car
            (id_produto, name, price)
            values
            (?, ?, ?)';

            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $name);
            $stmt->bindValue(3, $price);
            $stmt->execute();

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function getTotal(string $id_user): float
    {
        try{
            $sql = 'select price from tb_car where id_produto = ?';

            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id_user);
            $stmt->execute();

            $total = 0;
            foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $key => $item) {
                $total += $item['price'];
            }
            return $total;

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function getQuantity(string $id_user): int
    {
        try{
            $sql = 'select price from tb_car where id_produto = ?';

            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id_user);
            $stmt->execute();

            return count($stmt->fetchAll(\PDO::FETCH_ASSOC));

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }
}