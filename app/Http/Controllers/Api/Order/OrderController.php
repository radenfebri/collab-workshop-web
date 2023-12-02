<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buku;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function pesanan()
    {
        try {
            $user_id = Auth::id();
            $pesanan = Order::where('user_id', $user_id)->latest()->with('buku', 'bank')->get();

            $detailpesanan = $pesanan->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nama_user' => $item->name,
                    'name_buku' => $item->buku->name, // Mengambil nama buku dari relasi
                    'name' => $item->name,
                    'email' => $item->email,
                    'status' => $item->status,
                    'nama_bank' => $item->bank->nama_bank, // Mengambil nama bank dari relasi
                    'no_rek' => $item->bank->no_rek, // Mengambil nama bank dari relasi
                    'atas_nama' => $item->bank->atas_nama, // Mengambil nama bank dari relasi
                    'tracking_no' => $item->tracking_no,
                    'total_price' => $item->total_price,
                    'bukti' => $item->bukti,
                ];
            });

            return response()->json(['pesanan' => $detailpesanan], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function checkout(Request $request)
    {
        try {
            $user = Auth::user();
            $bukuId = $request->input('buku_id');
            $buku = Buku::findOrFail($bukuId);

            if ($buku->qty > 0) {
                $harga = $buku->selling_price ? $buku->selling_price : $buku->original_price;
                $baseUrl = url('storage/');

                $tracking_no = 'TB' . rand(111111, 999999);
                $kode_unik = rand(11, 99);
                $total_price = $harga + $kode_unik;

                $bankId = $request->input('metode');
                $bank = Bank::findOrFail($bankId);

                $pesanan = Order::create([
                    'user_id' => $user->id,
                    'buku_id' => $buku->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => $request->status == true ? '1' : '0',
                    'metode' => $bank->id,
                    'tracking_no' => $tracking_no,
                    'total_price' => $total_price,
                    'bukti' => null,
                ]);

                $buku->qty -= 1;
                $buku->save();

                $response = [
                    'pesanan' => $pesanan,
                    'buku' => [
                        'id' => $buku->id,
                        'name' => $buku->name,
                        'description' => $buku->description,
                        'cover' => $buku->cover = $baseUrl . '/' . str_replace(' ', '%20', $buku->cover),
                    ],
                    'bank' => [
                        'id' => $bank->id,
                        'atas_nama' => $bank->atas_nama,
                        'nama_bank' => $bank->nama_bank,
                        'no_rek' => $bank->no_rek,
                    ],
                ];

                return response()->json($response, 200);
            } else {
                return response()->json(['error' => 'Qty tidak mencukupi'], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    public function uploadBukti(Request $request)
    {
        try {
            $bukuId = $request->input('buku_id');
            $request->validate([
                'bukti' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('bukti')) {
                $buktiName = date('d-m-Y-H-i-s') . '_' . $request->file('bukti')->getClientOriginalName();
                $buktiPath = $request->file('bukti')->storeAs('bukti-bayar', $buktiName);

                $order = Order::findOrFail($bukuId);

                if ($order->bukti) {
                    Storage::delete($order->bukti);
                }

                $order->bukti = $buktiPath;
                $order->status = 2;
                $order->save();

                return response()->json(['message' => 'Data berhasil diupload'], 200);
            }

            return response()->json(['error' => 'Tidak ada file yang diunggah'], 400);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    public function delete($id)
    {
        try {
            $data = Order::findOrFail($id);
            if (!$data) {
                return response()->json(['message' => 'Data not found'], 404);
            }
            $buku = Buku::findOrFail($data->buku_id);
            $buku->increment('qty');
            $data->delete();

            return response()->json(['message' => 'Data deleted successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to delete data',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
