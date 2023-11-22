<?php

namespace App\Http\Controllers\Api\Buku;

use App\Http\Controllers\Controller;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriBukuController extends Controller
{
    public function show()
    {
        try {
            $data = KategoriBuku::latest()->get();

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
            $data = KategoriBuku::findOrFail($id);

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    // public function create(Request $request)
    // {
    //     try {

    //         $validator = Validator::make($request->all(), [
    //             'name' => 'unique:kategori_bukus,name|required|string|min:3|max:50',
    //         ]);

    //         if ($validator->fails()) {
    //             $errors = $validator->errors();
    //             $response = [
    //                 "status" => false,
    //                 "message" => "Validation Error",
    //                 "error" => $errors->toArray()
    //             ];
    //             return response()->json($response, 422);
    //         }

    //         $data = KategoriBuku::create([
    //             'name' => $request->name,
    //             'slug' => Str::slug($request->name),
    //         ]);

    //         return response()->json([
    //             'status' => true,
    //             'user' => [
    //                 'name' => $data->name,
    //                 'slug' => $data->slug,
    //                 'message' => 'User Created Successfully',
    //             ],
    //         ], 201);

    //         return response()->json(['message' => 'Data berhasil ditambahkan'], 201);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $th->getMessage(),
    //         ], 500);
    //     }
    // }

    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|min:3|max:50',
    //     ]);

    //     $data = KategoriBuku::findOrFail($id);

    //     $data->update($request->all());

    //     return response()->json(['message' => 'Data berhasil diupdate'], 200);
    // }


    // public function delete($id)
    // {
    //     $data = KategoriBuku::findOrFail($id);
    //     $data->delete();

    //     return response()->json(['message' => 'Kategori Buku berhasil dihapus'], 200);
    // }
}
