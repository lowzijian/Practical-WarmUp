<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Seat;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\SeatResource;
use Illuminate\Validation\ValidationException;

class DistrictController extends Controller
{
    public function index()
    {
        return DistrictResource::collection(District::all());
    }

    public function show($id)
    {
        $district = District::find($id);


        if (!$district) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        }

        return new DistrictResource($district);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'code' => 'required|unique:districts',
                'seat_id' => 'required'
            ]);
            $seat = Seat::find($request->seat_id);
            if ($seat) {
                $district = new District;
                $district->fill($request->all());
                $district->save();

                return response()->json([
                    'id' => $district->id,
                    'created_at' => $district->created_at,
                ], 201);
            } else {
                return "Seat id is invalid";
            }
        } catch (ValidationException $ex) {
            return response()->json([
                'errors' => $ex->errors(),
            ], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $district = District::find($id);

        if (!$district) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        }

        $district->update($request->all());

        return response()->json(null, 204);
    }
}
