@extends('layouts.master')

@section('title', "Upload Bukti Bayar $data->name "  )

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
                            <div class="card-title">Upload Bukti Pesanan #{{ $data->tracking_no }}</div>
                        </div>
                        <form action="{{ route('histori-pesanan-upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="text" hidden name="id" value="{{ $data->id }}" >
                                <div class="row">
                                    <div class="col-md-8 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Upload Bukti Bayar <span style="color: red">*</span></label>
                                            <input type="file" class="form-control @error ('bukti') is-invalid @enderror" name="bukti" placeholder="Atas Nama">
                                            @error('bukti')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-primary">Upload</button>
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