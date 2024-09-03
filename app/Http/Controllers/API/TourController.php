<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lets render this through Inertia instead
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $tour = Tour::create($request->all());
            return response()->json($tour, 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to store the tour',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $tour = Tour::find($id);

            if(!$tour){
                return response()->json(['message' => 'Tour not found'], 404);
            }

            $tour->update($request->all());
            return response()->json($tour, 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update the tour',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = Tour::find($id);

        if(!$tour){
            return response()->json(['message' => 'Tour not found'], 404);
        }

        try {
            $tour->delete();
            $tours = Tour::orderBy('id', 'desc')->paginate(10);
            return response()->json(['message' => "Tour Deleted",
                'tours' => $tours], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Tour deletion failed!'], 409);
        }
    }
}
