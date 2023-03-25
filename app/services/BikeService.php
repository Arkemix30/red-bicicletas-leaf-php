<?php

namespace App\Services;

use App\Models\Bike;
use App\Repositories\BikeRepository;


class BikeService
{
    private $bikeRepository;

    public function __construct(BikeRepository $bikeRepository)
    {
        $this->bikeRepository = $bikeRepository;
    }

    public function all()
    {
        return $this->bikeRepository->all();
    }

    public function find(int $id)
    {
        return $this->bikeRepository->find($id);
    }

    public function create(array $incoming_data)
    {
        $bike = new Bike;
        try{
            $bike->model = $incoming_data['model'];
            $bike->color = $incoming_data['color'];
            $bike->description = $incoming_data['description'];
            $bike->rent_price = $incoming_data['rent_price'];
            $bike->image = $incoming_data['image'];
            $bike->lat = $incoming_data['lat'];
            $bike->lng = $incoming_data['lng'];
        }catch(\Exception $e){
            print_r($e->getMessage());
            return null;
        }

        return $this->bikeRepository->create($bike);
    }

    public function update(int $id, Bike $bike)
    { 
        $bike_in_db = $this->bikeRepository->find($id);
        if (!$bike_in_db) {
            return null;
        }

        $bike_in_db->model = $bike->model;
        $bike_in_db->color = $bike->color;
        $bike_in_db->description = $bike->description;
        $bike_in_db->rent_price = $bike->rent_price;
        $bike_in_db->image = $bike->image;
        $bike_in_db->lat = $bike->lat;
        $bike_in_db->lng = $bike->lng;
        
        return $this->bikeRepository->update($bike_in_db);
    }

    public function delete(int $id)
    {
        return $this->bikeRepository->delete($id);
    }
}