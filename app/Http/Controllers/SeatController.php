<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeatResource;
use Illuminate\Http\Request;
use App\Seat;

class SeatController extends Controller
{
    public function index()
    {
        return SeatResource::collection(Seat::all());
    }

    public function show($id)
    {
        $seat = Seat::find($id);

        if (!$seat) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        }

        return new SeatResource($seat);
    }
}
