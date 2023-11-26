@extends('layouts.master')

@section('title', "FAQ"  )

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">FAQ</h4>
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
                        <a href="">FAQ</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">FAQ</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" id="v-pills-tab-without-border" role="tablist" aria-orientation="vertical">
                                        @foreach ($data as $key => $item)
                                            <a class="nav-link{{ $key === 0 ? ' active' : '' }}" id="v-pills-messages-tab-nobd{{$key}}" data-toggle="pill" href="#v-pills-messages-nobd{{$key}}" role="tab" aria-controls="v-pills-messages-nobd{{$key}}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ $item->pertanyaan }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="tab-content" id="v-pills-without-border-tabContent">
                                        @foreach ($data as $key => $item)
                                            <div class="tab-pane fade{{ $key === 0 ? ' show active' : '' }}" id="v-pills-messages-nobd{{$key}}" role="tabpanel" aria-labelledby="v-pills-messages-tab-nobd{{$key}}">
                                                <p>{{ $item->jawaban }}.</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.footer')


</div>


@endsection