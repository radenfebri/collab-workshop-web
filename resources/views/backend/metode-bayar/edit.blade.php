@extends('layouts.master')

@section('title', "Edit Data Bank $data->name "  )

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
                            <div class="card-title">Form Edit Kategori Buku</div>
                        </div>
                        <form action="{{ route('metode-bayar.update', $data->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Atas Nama <span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('atas_nama') is-invalid @enderror" name="atas_nama" value="{{ $data->atas_nama }}" placeholder="Atas Nama">
                                            @error('atas_nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Nama Bank <span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('nama_bank') is-invalid @enderror" name="nama_bank" value="{{ $data->nama_bank }}" placeholder="Nama Bank">
                                            @error('nama_bank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">No Rekening<span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('no_rek') is-invalid @enderror" name="no_rek" value="{{ $data->no_rek }}" placeholder="No Rekening">
                                            @error('no_rek')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('metode-bayar.index') }}" class="btn btn-danger">Cancel</a>
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