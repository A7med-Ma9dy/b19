<?php
namespace App\Database\Models;

use App\Database\Config\Connection;

abstract class Model extends Connection {
    public function find(int $id)
    {

    }

    public function all()
    {

    }

    public abstract function create();
    public abstract function read();
    public abstract function update();
    public abstract function delete();
}