@extends('layouts.master')

@section('title', "Dashboard $user" )

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">
                            @php
                            date_default_timezone_set("Asia/Jakarta");
                            $jam = date('H:i');
                            $user_name = Auth::user()->name;
                            
                            if ($jam > '05:30' && $jam < '10:00') {
                                $salam = 'Selamat Pagi';
                            } elseif ($jam >= '10:00' && $jam < '15:00') {
                                $salam = 'Selamat Siang';
                            } elseif ($jam < '18:00') {
                                $salam = 'Selamat Sore';
                            } else {
                                $salam = 'Selamat Malam';
                            }
                            
                            echo $salam.', '.$user_name;
                            @endphp
                        </h2>
                        <h5 class="text-white op-7 mb-2">Selamat datang di layanan Tuku Buku online, platform zaman now!</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('buku.index') }}" style="text-decoration:none" >
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-book"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Buku</p>
                                            <h3 class="card-title">{{ $buku->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('trx-selesai') }}" style="text-decoration:none" >
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Transaksi Selesai</p>
                                            <h4 class="card-title">{{ $trx_success->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('trx-proses') }}" style="text-decoration:none" >
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-danger bubble-shadow-small">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Transaksi Diproses</p>
                                            <h4 class="card-title">{{ $trx_pending->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('trx-review') }}" style="text-decoration:none" >
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Pesanan Direview</p>
                                            <h4 class="card-title">{{ $trx_review->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                
                
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('metode-bayar.index') }}" style="text-decoration:none" >
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Payment</p>
                                        <h4 class="card-title">{{ $bank->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('stok') }}" style="text-decoration:none" >
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-danger bubble-shadow-small">
                                            <i class="fas fa-minus-square"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Stok Buku Habis</p>
                                            <h4 class="card-title">{{ $buku_habis->count() }}</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="fas fa-money-bill"></i>
                                        
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Pemasukan</p>
                                        <h4 class="card-title">RP. {{ number_format($total_beli) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{ route('total-user') }}" style="text-decoration:none" >
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total User</p>
                                            <h4 class="card-title">{{ $total_user }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Pesanan Diproses & Direview</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No Pesanan</th>
                                            <th>Nama Buku</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td><a href="{{ route('pesanan.index') }}" style="text-decoration:none">{{ $item->tracking_no }}</a></td>
                                            <td><a href="{{ route('pesanan.index') }}" style="text-decoration:none">{{ $item->buku->name }}</a></td>
                                            <td>
                                                <a href="{{ route('pesanan.index') }}" style="text-decoration:none">
                                                    RP. {{ number_format($item->total_price) }} 
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('pesanan.index') }}" style="text-decoration:none">
                                                    @if ($item->status == 1)
                                                    <span style="color: green">Berhasil</span>
                                                    @elseif ($item->status == 2)
                                                    <span style="color: blue">Review</span>
                                                    @elseif ($item->status == 0)
                                                    <span style="color: red">Proses</span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    
                                                @elseif($item->status == 2)
                                                    <a href="{{ route('pesanan.edit', encrypt($item->id)) }}" data-toggle="tooltip" class="btn btn-link btn-primary" data-original-title="Prose Pesanan">
                                                        <i class="fa fa-recycle"></i>
                                                    </a>
                                                    <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank" data-toggle="tooltip" class="btn btn-link btn-success" data-original-title="Lihat Bukti">
                                                        <i class="fa fa-image"></i>
                                                    </a>
                                                @elseif ($item->status == 0)
                                                    <a href="{{ route('pesanan.edit', encrypt($item->id)) }}" method="POST" type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Prose Pesanan"
                                                        onclick="return confirm('Anda yakin akan memproses pesanan #{{ $item->tracking_no }}? Belum ada bukti pembayaran!')">
                                                        <i class="fa fa-recycle"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
            </div>
        </div>
        
        @include('layouts.footer')
        
    </div>
    
    @endsection