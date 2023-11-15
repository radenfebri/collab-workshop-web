@extends('layouts.master')

@section('title', "Tambah Buku")

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
                        <a href="{{ route('buku.index') }}">Buku</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Tambah Buku</div>
                        </div>
                        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Nama Buku <span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Buku">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Deskripsi <span style="color: red">*</span></label>
                                            <textarea type="text" class="form-control @error ('description') is-invalid @enderror" name="description" placeholder="Deskripsi Buku">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Harga Asli <span style="color: red">*</span></label>
                                            <input type="number" class="form-control @error ('original_price') is-invalid @enderror" name="original_price" value="{{ old('original_price') }}" placeholder="20000">
                                            @error('original_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Harga Diskon</label>
                                            <input type="number" class="form-control @error ('selling_price') is-invalid @enderror" name="selling_price" value="{{ old('selling_price') }}" placeholder="19900">
                                            @error('selling_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Jumlah <span style="color: red">*</span></label>
                                            <input type="number" class="form-control @error ('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}" placeholder="105">
                                            @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Kategori <span style="color: red">*</span></label>
                                            <select class="form-control @error ('kategoribuku_id') is-invalid @enderror" name="kategoribuku_id" id="">
                                                <option disabled selected>--Pilih Kategori Buku--</option>
                                                @foreach ($kategoribuku as $item)
                                                @if (old('kategoribuku_id') == $item->id )
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                                @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('kategoribuku_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Populer <span style="color: red">*</span></label>
                                            <select name="popular" class="form-control @error('popular') is-invalid @enderror">
                                                <option disabled selected>--Pilih Popularitas--</option>
                                                <option value="0" {{ old('popular') == '0' ? 'selected' : '' }}>Tidak Popular</option>
                                                <option value="1" {{ old('popular') == '1' ? 'selected' : '' }}>Popular</option>
                                            </select>
                                            
                                            @error('popular')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Gambar <span style="color: red">*</span></label>
                                            <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                                            @error('cover')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success">Submit</button>
                                <a href="{{ route('buku.index') }}" class="btn btn-danger">Cancel</a>
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