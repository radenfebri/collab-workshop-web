<?php

namespace App\Http\Controllers\Api\Buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function show()
    {
        try {
            $data = Buku::with(['kategoribuku:id,name'])->orderBy('created_at', 'desc')->get();
            $baseUrl = url('storage/');

            foreach ($data as $buku) {
                $buku->cover = $baseUrl . '/' . str_replace(' ', '%20', $buku->cover);
                $buku->kategori = $buku->kategoribuku->name;
                unset($buku->kategoribuku_id);
            }

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
            $data = Buku::with('kategoribuku:id,name')->find($id);

            if (!$data) {
                return response()->json(['message' => 'Buku not found'], 404);
            }

            $baseUrl = url('storage/');

            $data->cover = $baseUrl . '/' . str_replace(' ', '%20', $data->cover);
            $data->kategori = $data->kategoribuku->name;
            unset($data->kategoribuku_id);

            return response()->json(['buku' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function search($keyword)
    {
        $data = Buku::where(function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%');
        })->with('kategoribuku:id,name') // Menghubungkan relasi kategoribuku
            ->get();

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No books found'], Response::HTTP_NOT_FOUND);
        }

        // Mengganti URL cover buku dengan URL yang diinginkan
        $baseUrl = url('storage/');

        foreach ($data as $buku) {
            $buku->cover = $baseUrl . '/' . str_replace(' ', '%20', $buku->cover);
            $buku->kategori = $buku->kategoribuku->name;
            unset($buku->kategoribuku_id);
        }

        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
