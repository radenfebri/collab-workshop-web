<?php

namespace App\Http\Controllers\Api\Buku;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function show()
    {
        try {
            $data = Buku::with(['kategoribuku:id,name'])->orderBy('created_at', 'desc')->get();
            $baseUrl = url('storage/');
            foreach ($data as $buku) {
                $buku->cover = $baseUrl . '/' . $buku->cover;
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
            $buku = Buku::with(['kategoribuku:id,name'])->find($id);

            if (!$buku) {
                return response()->json(['message' => 'Buku not found'], 404);
            }

            $baseUrl = url('storage/');
            $buku->kategori = $buku->kategoribuku->name;
            unset($buku->kategoribuku_id);
            $buku->cover = $baseUrl . '/' . $buku->cover;

            return response()->json(['buku' => $buku], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:bukus,name|min:3|max:50',
    //         'description' => 'required|min:3|max:100000',
    //         'cover' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'kategoribuku_id' => 'required',
    //         'original_price' => 'required',
    //         'qty' => 'required'
    //     ]);

    //     $coverName = null;

    //     if ($request->hasFile('cover')) {
    //         $coverName = date('d-m-Y-H-i-s') . '_' . $request->file('cover')->getClientOriginalName();
    //         $request->file('cover')->storeAs('cover-buku', $coverName);
    //     }

    //     $buku = new Buku([
    //         'name' => $request->name,
    //         'kategoribuku_id' => $request->kategoribuku_id,
    //         'description' => $request->description,
    //         'original_price' => $request->original_price,
    //         'selling_price' => $request->selling_price,
    //         'qty' => $request->qty,
    //         'slug' => Str::slug($request->name),
    //         'popular' => $request->popular ? '1' : '0',
    //         'cover' => $coverName,
    //     ]);

    //     $buku->save();

    //     return response()->json(['message' => 'Data berhasil ditambahkan'], 201);
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|min:3|max:50|unique:bukus,name,' . $id,
    //         'description' => 'required',
    //         'cover' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'kategoribuku_id' => 'required',
    //         'original_price' => 'required',
    //         'qty' => 'required'
    //     ]);

    //     $buku = Buku::findOrFail($id);

    //     $data = [
    //         'name' => $request->name,
    //         'kategoribuku_id' => $request->kategoribuku_id,
    //         'description' => $request->description,
    //         'original_price' => $request->original_price,
    //         'selling_price' => $request->selling_price,
    //         'qty' => $request->qty,
    //         'slug' => Str::slug($request->name),
    //         'popular' => $request->popular == true ? '1' : '0',
    //     ];

    //     if ($request->hasFile('cover')) {
    //         $coverName = date('d-m-Y-H-i-s') . '_' . $request->file('cover')->getClientOriginalName();
    //         $request->file('cover')->storeAs('cover-buku', $coverName);
    //         Storage::delete("cover-buku/{$buku->cover}");
    //         $data['cover'] = 'storage/cover-buku/' . $coverName;
    //     }

    //     $buku->update($data);

    //     return response()->json(['message' => 'Data berhasil diupdate'], 200);
    // }

    // public function delete($id)
    // {
    //     $data = Buku::findOrFail($id);

    //     if ($data->cover != null) {
    //         Storage::delete($data->cover);
    //     }

    //     $data->delete();

    //     return response()->json(['message' => 'Buku berhasil dihapus'], 200);
    // }
}
