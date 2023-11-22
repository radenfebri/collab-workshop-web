<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Bank;

class MetodeController extends Controller
{
    public function show()
    {
        try {
            $data = Bank::latest()->get();
            return response()->json(['data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function getid($id)
    {
        try {
            $data = Bank::findOrFail($id);
            if (!$data) {
                return response()->json(['message' => 'Data not found'], 404);
            }

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
