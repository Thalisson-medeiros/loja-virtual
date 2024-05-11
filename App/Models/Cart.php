<?php

namespace App\Models;
use MF\Model\Model;

class Cart extends Model 
{
    public function addItem(string $id, string $name_product, string $price, string $image, string $user): void
    {   
        try{

            $quantity = $this->getQuantity() + 1;
            $total = $this->getTotal($price);

            $sql = 'insert into tb_cart (id_product, name_product, price, image_product, quantity_products, total, id_user) 	
            values 
            (?,?,?,?,?,?,?)';
            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $name_product);
            $stmt->bindValue(3, $price);
            $stmt->bindValue(4, $image);
            $stmt->bindValue(5, $quantity);
            $stmt->bindValue(6, $total);
            $stmt->bindValue(7, $user);
            $stmt->execute();

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function remove(string $id): bool
    {
        try{

            $query = 'delete id_product from tb_cart where id_product = ?';
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return true;
        }catch(\PDOException $error){
            return null;
        }
    }

    public function getItems(string $id_user): array
    {
        try{
            $sql = 'select id_product, name_product, price, image_product, quantity_products, total from tb_cart where id_user = ?';

            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id_user);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

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

            return count($stmt->fetchAll(\PDO::FETCH_ASSOC));

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }
}