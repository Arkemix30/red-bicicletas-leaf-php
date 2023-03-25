<?php

use App\Models\Bike;
use App\Repositories\StorageInterface;

class BikeRepository implements StorageInterface
{
    public function all()
    {
        return Bike::all();
    }

    public function find($id)
    {
        return Bike::find($id);
    }

    public function create($data)
    {
        $bike = new Bike;
        $bike->model = $data['model'];
        $bike->color = $data['color'];
        $bike->description = $data['description'];
        $bike->rent_price = $data['rent_price'];
        $bike->image = $data['image'];
        $bike->lat = $data['lat'];
        $bike->lng = $data['lng'];
        $bike->save();
        return $bike;
    }

    public function update($id, $data)
    {
        $bike = Bike::find($id);
        $bike->model = $data['model'];
        $bike->color = $data['color'];
        $bike->description = $data['description'];
        $bike->rent_price = $data['rent_price'];
        $bike->image = $data['image'];
        $bike->lat = $data['lat'];
        $bike->lng = $data['lng'];
        $bike->save();
        return $bike;
    }

    public function delete($id)
    {
        $bike = Bike::find($id);
        $bike->delete();
        return $bike;
    }
}
