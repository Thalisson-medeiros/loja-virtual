<?php

namespace MF\Model;

//abstração dos models
abstract class Model
{
    protected $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }
}