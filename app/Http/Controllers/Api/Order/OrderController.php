<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buku;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pesanan()
    {
        try {
            $user_id = Auth::id();
            $pesanan = Order::where('user_id', $user_id)->get();

            return response()->json(['pesanan' => $pesanan], 200);
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
                $harga = $buku->original_price ?? $buku->selling_price;
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
                ]);

                $buku->qty -= 1;
                $buku->save();

                $response = [
                    'pesanan' => $pesanan,
                    'buku' => [
                        'id' => $buku->id,
                        'name' => $buku->name,
                        'description' => $buku->description,
                        'cover' => $buku->cover = $baseUrl . '/' . $buku->cover,
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
}