<?php

namespace App\Repositories;
use App\Models\Bike;


interface BikeInterface
{
    public function all();
    public function find(int $id);
    public function create(Bike $incoming_data);
    public function update(Bike $incoming_data);
    public function delete(int $id);
}