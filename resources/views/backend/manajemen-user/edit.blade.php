@extends('layouts.master')

@section('title', "Edit Data User $data->name "  )

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
                        <a href="{{ route('manajemen-user.index') }}">Manajemen User</a>
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
                            <div class="card-title">Form Edit User</div>
                        </div>
                        <form action="{{ route('manajemen-user.update', $data->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Nama <span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ $data->name }}" readonly placeholder="Atas Nama">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Email <span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('email') is-invalid @enderror" name="email" value="{{ $data->email }}" readonly placeholder="Nama Bank">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Username<span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('username') is-invalid @enderror" name="username" value="{{ $data->username }}" readonly placeholder="No Rekening">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Role <span style="color: red">*</span></label>
                                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option disabled selected>--Pilih Role--</option>
                                                <option value="Admin" {{ $data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="User" {{ $data->role == 'User' ? 'selected' : '' }}>User</option>
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
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('manajemen-user.index') }}" class="btn btn-danger">Cancel</a>
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