@extends('layouts.master')

@section('title', 'Metode Bayar')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                        <h5 class="text-white op-7 mb-2">Total Metode Bayar : {{ $data->count() }}</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <!-- <h4 class="card-title">Add Row</h4> -->
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Metode Bayar
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal Add-->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                New</span>
                                                <span class="fw-light">
                                                    Metode Bayar
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
                                            <form action="{{ route('metode-bayar.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Atas Nama<span style="color: red">*</span></label>
                                                            <input name="atas_nama" type="text" class="form-control @error ('atas_nama') is-invalid @enderror" value="{{ old('atas_nama') }}" placeholder="Atas Nama" >
                                                            @error('atas_nama')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Bank<span style="color: red">*</span></label>
                                                            <input name="nama_bank" type="text" class="form-control @error ('nama_bank') is-invalid @enderror" value="{{ old('nama_bank') }}" placeholder="Nama Kategori" >
                                                            @error('nama_bank')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>No Rekening<span style="color: red">*</span></label>
                                                            <input name="no_rek" type="number" class="form-control @error ('no_rek') is-invalid @enderror" value="{{ old('no_rek') }}" placeholder="Nama Kategori" >
                                                            @error('no_rek')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Atas Nama</th>
                                            <th>Nama Bank</th>
                                            <th>No Rekening</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Atas Nama</th>
                                            <th>Nama Bank</th>
                                            <th>No Rekening</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $no => $item)
                                        <tr>
                                            <td>{{ $no + 1 }} </td>
                                            <td>{{ $item->atas_nama }} </td>
                                            <td>{{ $item->nama_bank }} </td>
                                            <td>{{ $item->no_rek }} </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('metode-bayar.edit', encrypt($item->id)) }}" type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Bank">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    
                                                    <a href="{{ route('metode-bayar.destroy', encrypt($item->id)) }}" method="POST" type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Hapus Bank"
                                                        onclick="return confirm('Apakah anda yakin menghapus Rekening {{ $item->nama_bank }} ?')">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
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
            
            @include('layouts.footer')
            
        </div>
        
        
        {{-- <script>
            $(document).ready(function() {
                $("#tahun").datepicker({
                    dateFormat: "yy",
                    changeYear: true,
                    showButtonPanel: true,
                    yearRange: "1900:{{ date('Y') }}", // Sesuaikan dengan tahun yang diinginkan
                });
            });
        </script> --}}
        
        @endsection