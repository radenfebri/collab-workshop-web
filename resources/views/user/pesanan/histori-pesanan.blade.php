@extends('layouts.master')

@section('title', "Histori Pesanan $user")

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Histori Pesanan, {{ $user }}</h2>
                        <h5 class="text-white op-7 mb-2">Total Pesanan : {{ $data->count() }}</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="col-md-12">
                <div class="card">
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
                                                    Buku
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Total Bayar</th>
                                            <th>Metode</th>
                                            <th>Kode Pesanan</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Total Bayar</th>
                                            <th>Metode</th>
                                            <th>Kode Pesanan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $no => $item)
                                        <tr>
                                            <td>{{ $no + 1 }} </td>
                                            <td>{{ $item->buku->name }}</td>
                                            <td>{{ number_format($item->total_price) }}</td>
                                            <td>{{ $item->bank->nama_bank }}</td>
                                            <td>{{ $item->tracking_no }} </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <span style="color: black">Proses</span>
                                                @elseif($item->status == 1)
                                                    <span style="color: green">Berhasil</span>
                                                @elseif($item->status == 2)
                                                    <span style="color: blue">Review</span>
                                                @elseif($item->status == 3)
                                                    <span style="color: red">Tolak</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('show.histori-pesanan', encrypt($item->id)) }}" type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Detail Pesanan">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    
                                                    @if ($item->status == 1)
                                                        
                                                    @elseif($item->status == 2)
                                                        <a href="{{ route('histori-pesanan-bukti', encrypt($item->id)) }}" type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Upload Bukti">
                                                            <i class="fa fa-upload"></i>
                                                        </a>
                                                    @elseif($item->status == 0)
                                                        <a href="{{ route('histori-pesanan-bukti', encrypt($item->id)) }}" type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Upload Bukti">
                                                            <i class="fa fa-upload"></i>
                                                        </a>

                                                        <a href="{{ route('destroy.histori-pesanan', encrypt($item->id)) }}" method="POST" type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Batalkan Buku"
                                                            onclick="return confirm('Apakah anda yakin batalkan pesanan {{ $item->name }} ?')">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    @endif
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
        

        
        @endsection