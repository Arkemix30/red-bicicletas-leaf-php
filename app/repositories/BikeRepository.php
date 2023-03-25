<?php

namespace App\Repositories;

use App\Models\Bike;
use App\Repositories\BikeInterface;

class BikeRepository implements BikeInterface
{
    public function all()
    {
        return Bike::all();
    }

    public function find($id): ?Bike
    {
        return Bike::find($id);
    }

    public function create(Bike $incoming_data): ?Bike
    {
        try {
            $incoming_data->save();
            return $incoming_data;
        } catch (\Exception $e) {
            print_r("Repo: {$e->getMessage()}");
            return null;
        }
    }

    public function update(Bike $bike_in_db): ?Bike
    {
        try {
            $bike_in_db->save();
            return $bike_in_db;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function delete(int $id): ?Bike
    {
        $bike_in_db = Bike::find($id);
        if (!$bike_in_db) {
            return null;
        }

        try {
            $bike_in_db->delete();
            return $bike_in_db;
        } catch (\Exception $e) {
            return null;
        }
    }
}
