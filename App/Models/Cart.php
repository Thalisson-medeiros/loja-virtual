<?php

namespace App\Models;
use MF\Model\Model;

class Cart extends Model 
{
    public function addItem(string $id): void
    {
        try{
            $sql = 'insert into tb_cart (id_product) values (?)';
            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function getTotal(string $id_user): float
    {
        try{
            $sql = 'select price from tb_cart where id_produto = ?';
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
            $sql = 'select price from tb_cart where id_produto = ?';
            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id_user);
            $stmt->execute();

            return count($stmt->fetchAll(\PDO::FETCH_ASSOC));

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }
}