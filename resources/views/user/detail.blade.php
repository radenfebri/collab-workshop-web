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
                        <a href="{{ route('dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('metode-bayar.index') }}">Metode Bayar</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $data->name }}</a>
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
                                            <label for="email2">Kode Pesanan <span style="color: red">*</span></label>
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
                                            <label for="email2">Nama Buku <span style="color: red">*</span></label>
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
                                            <label for="email2">Metode Bayar<span style="color: red">*</span></label>
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
                                            <label for="email2">Total Bayar<span style="color: red">*</span></label>
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
                                            <label for="email2">No Rekening<span style="color: red">*</span></label>
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
                                            <label for="email2">Nama Pemilik<span style="color: red">*</span></label>
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
                                            <label for="email2">Deskripsi Buku<span style="color: red">*</span></label>
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
                                            <label for="email2">Status Pesanan <span style="color: red">*</span></label>
                                            <select name="role" disabled class="form-control @error('role') is-invalid @enderror">
                                                @if ($data->status == 1)
                                                    <option>Berhasil</option>
                                                @else
                                                    <option>Proses</option>
                                                @endif
                                            </select>
                                            
                                            @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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