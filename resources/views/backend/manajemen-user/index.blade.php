@extends('layouts.master')

@section('title', 'Manajemen User')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                        <h5 class="text-white op-7 mb-2">Total User : {{ $data->count() }}</h5>
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
                                                    Metode Bayar
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $no => $item)
                                        <tr>
                                            <td>{{ $no + 1 }} </td>
                                            <td>{{ $item->name }} </td>
                                            <td>{{ $item->email }} </td>
                                            <td>{{ $item->username }} </td>
                                            <td>{{ $item->role }} </td>
                                            <td>
                                                @if ($item->id == Auth::id())
                                                    
                                                @else
                                                <div class="form-button-action">
                                                    <a href="{{ route('manajemen-user.edit', encrypt($item->id)) }}" type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Edit User">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    
                                                    <a href="{{ route('manajemen-user.destroy', encrypt($item->id)) }}" method="POST" type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Hapus User"
                                                        onclick="return confirm('Apakah anda yakin menghapus user {{ $item->name }} ?')">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
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