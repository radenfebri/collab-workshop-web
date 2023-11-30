@extends('layouts.master')

@section('title', "Detail Pesanan $data->name "  )

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('user') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('histori-pesanan') }}">Pesanan Saya</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="">{{ $data->name }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Detail Pemabayaran #{{ $data->tracking_no }}</div>
                        </div>
                        <form action="#" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Kode Pesanan </label>
                                            <input type="text" class="form-control @error ('tracking_no') is-invalid @enderror" name="tracking_no" value="{{ $data->tracking_no }}" placeholder="Atas Nama">
                                            @error('tracking_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Nama Buku </label>
                                            <input type="text" class="form-control @error ('buku_id') is-invalid @enderror" name="buku_id" value="{{ $data->buku->name }}" placeholder="Nama Bank">
                                            @error('buku_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Metode Bayar</label>
                                            <input type="text" class="form-control @error ('metode') is-invalid @enderror" name="metode" value="{{ $data->bank->nama_bank }}" placeholder="No Rekening">
                                            @error('metode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Total Bayar</label>
                                            <input type="text" class="form-control @error ('metode') is-invalid @enderror" name="metode" value="Rp. {{ number_format($data->total_price) }}" placeholder="No Rekening">
                                            @error('metode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">No Rekening</label>
                                            <input type="text" class="form-control @error ('metode') is-invalid @enderror" name="metode" value="{{ $data->bank->no_rek }}" placeholder="No Rekening">
                                            @error('metode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Nama Pemilik</label>
                                            <input type="text" class="form-control @error ('metode') is-invalid @enderror" name="metode" value="{{ $data->bank->atas_nama }}" placeholder="No Rekening">
                                            @error('metode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Deskripsi Buku</label>
                                            <textarea type="text" class="form-control @error ('metode') is-invalid @enderror" name="metode" placeholder="No Rekening">{{ $data->buku->description }}</textarea>
                                            @error('metode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Bukti Upload</label>
                                            <br>
                                            @if ($data->bukti == null)
                                            <p>*Bukti Upload Kosong</p>
                                            @else
                                            <a href="{{ asset('storage/' . $data->bukti) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $data->bukti) }}" width="20%" alt="Bukti_bayar">
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Status Pesanan </label>
                                            @php
                                                $statusText = '';
                                                if ($data->status == 1) {
                                                    $statusText = 'Berhasil';
                                                } elseif ($data->status == 2) {
                                                    $statusText = 'Review';
                                                } elseif ($data->status == 0) {
                                                    $statusText = 'Proses';
                                                }  elseif ($data->status == 3) {
                                                    $statusText = 'Tolak';
                                                }
                                            @endphp
                                            <input class="form-control" value="{{ $statusText }}">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('histori-pesanan') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.footer')
    
    
</div>

@endsection