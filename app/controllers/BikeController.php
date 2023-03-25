<?php

namespace App\Controllers;

// This is our model, we import it here to use it below
use App\Models\Bike;

class BikeController extends Controller
{
    public function index()
    {
        $bikes = Bike::all();

        response()->json($bikes);
    }

    public function show($id)
    {
        $bike = Bike::find($id);
        if (!$bike) {
            response()->json([
                "message" => "Bike not found"
            ], 404);
            return;
        }
        response()->json($bike);
    }

    public function store()
    {
        $data = request()->body();
        
        // if (!BikeSerializer::validate($data)) {
        //     response()->json([
        //         "error" => "A field is missing or invalid data"
        //     ], 400);
        //     return;
        // }

        try {
            $bike = new Bike;
            $bike->model = $data['model'];
            $bike->color = $data['color'];
            $bike->description = $data['description'];
            $bike->rent_price = $data['rent_price'];
            $bike->image = $data['image'];
            $bike->lat = $data['lat'];
            $bike->lng = $data['lng'];
            $bike->save();
            response()->json([
                "message" => "Bike created successfully",
                "bike" => $bike
            ], 201);
        } catch (\Exception $e) {
            response()->json($e->getMessage(), 400);
            return;
        }
    }

    public function update($id)
    {
        $data = request()->body();
        $bike = Bike::find($id);

        if (!$bike) {
            response()->json([
                "message" => "Bike not found"
            ], 404);
            return;
        }
        try {
            $bike->update($data);
        } catch (\Exception $e) {
            response()->json($e->getMessage(), 500);
            return;
        }
        response()->json([
            "message" => "Bike updated successfully",
            "bike" => $bike
        ], 200);
    }
}
