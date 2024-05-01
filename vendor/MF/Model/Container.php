<?php

namespace MF\Model;
use App\Connection;

/**
 * Esta classe serve para criar e instânciar um model já conectado ao banco
 */
class Container
{
    public static function getModel($model)
    {
        $conn = Connection::getDb();
        $class = "App\\Models\\". ucfirst($model);

        return new $class($conn);
    }
}

