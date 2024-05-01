<?php

namespace App\Models;
use MF\Model\Model;

class Products extends Model
{
    public function getProducts()
    {
        $sql = 'select id, name_product, description, price from tb_products';
        $stmt = $this->database->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}