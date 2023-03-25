<?php

namespace App\Controllers;

// This is our model, we import it here to use it below
use App\Services\BikeService;
use App\Models\Bike;
use App\Repositories\BikeRepository;

class BikeController extends Controller
{
    private BikeRepository $bikeRepository;
    private BikeService $bikeService;

    public function __construct()
    {
        $this->bikeRepository = new BikeRepository();
        $this->bikeService = new BikeService($this->bikeRepository);
    }

    public function index()
    {
        $bikes = $this->bikeService->all();
        response()->json($bikes, 200);
    }

    public function show($id)
    {
        $bike = $this->bikeService->find($id);
        if (!$bike) {
            response()->json([
                "message" => "Bike not found"
            ], 404);
            return;
        }
        response()->json($bike, 200);
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

        $bike = $this->bikeService->create($data);
        if (!$bike) {
            response()->json([
                "error" => "A field is missing or invalid data"
            ], 400);
            return;
        }
        response()->json($bike, 201);
    }

    public function update($id)
    {
        $data = request()->body();
        $bike = $this->bikeService->update($id, $data);
        response()->json($bike, 200);
    }
}
