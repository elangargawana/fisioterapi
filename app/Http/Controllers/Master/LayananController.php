<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Layanan\StoreLayananRequest;
use App\Http\Requests\Layanan\UpdateLayananRequest;
use App\Models\MLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = MLayanan::all();
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLayananRequest $request)
    {
        try {
            $data = new MLayanan($request->validated());
            $data->save();

            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = MLayanan::find($id);

            if (!$data) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Layanan not found',
                    'data' => null
                ], 400);
            }

            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLayananRequest $request, string $id)
    {
        try {
            $data = MLayanan::find($id);
            if (!$data) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Layanan not found',
                    'data' => null
                ], 400);
            }

            $data->update($request->validated());
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = MLayanan::find($id);
            if (!$data) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Layanan not found',
                    'data' => null
                ], 400);
            }

            $data->delete();
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
