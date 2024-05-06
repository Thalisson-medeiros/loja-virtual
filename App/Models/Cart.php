<?php

namespace App\Models;
use MF\Model\Model;

class Cart extends Model 
{
    public function addItem(string $id, string $name_product, string $price, string $image): void
    {   
        try{
            $quantity = $this->getQuantity();
            $total = $this->getTotal($price);

            $sql = 'insert into tb_cart (id_product, name_product, price, image_product, quantity_products, total) 
            values 
            (?,?,?,?,?,?)';
            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $name_product);
            $stmt->bindValue(3, $price);
            $stmt->bindValue(4, $image);
            $stmt->bindValue(5, $quantity);
            $stmt->bindValue(6, $total);
            $stmt->execute();

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function getTotal(float $price): float
    {
        try{
            $sql = 'select price from tb_cart';
            $stmt = $this->database->prepare($sql);
            $stmt->execute();

            $total = $price;
            foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $key => $item) {
                $total += $item['price'];
            }
            return $total;

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function getQuantity(): int
    {
        try{
            $sql = 'select * from tb_cart';
            $stmt = $this->database->prepare($sql);
            $stmt->execute();

            return count($stmt->fetchAll(\PDO::FETCH_ASSOC)) + 1;

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }
}