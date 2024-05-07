<?php

namespace App\Models;
use MF\Model\Model;

class Products extends Model
{
    public function getProducts(): array
    {
        try{
            $sql = 'select id, name_product, description, price, images from tb_products';
            $stmt = $this->database->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);       

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function getProduct(string $id, string $nameProduct): array
    {
        try{
            $sql = 'select id, name_product, description, price, images 
                from tb_products 
                where id = ? and name_product = ?';
        
            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $nameProduct);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);       

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }
}