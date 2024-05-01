<?php

namespace App\Models;
use MF\Model\Model;

class Car extends Model 
{
    private int $quantity = 2;
    private float $tot= 100;

    public function getQuantityItems(): int
    {
        return $this->quantity;
    }

    public function getTot(): float
    {
        return $this->tot;
    }
}