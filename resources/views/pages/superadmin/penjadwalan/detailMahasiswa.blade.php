@extends('layouts.master')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
                @include('layouts/error')
                <div class="page-header">                   
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">{{$page}}</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                    <div class="card-title">Detail Mahasiswa, <strong>
                                                        @if ($data->mahasiswaTerpilih->user->name)
                                                        {{ $data->mahasiswaTerpilih->user->name}}
                                                        @elseif ($data->mahasiswaSubmit->user->name)
                                                        {{$data->mahasiswaSubmit->user->name}}
                                                        @endif
                                                    </strong>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col"><a href="{{ route('dataMahasiswa') }}" class="btn btn-primary float-right btn-sm">
                                                    <i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="py-4">                                         
                                        <div class="row">
                                            <div class="col-2">Nim</div>
                                            <div class="col-1"><span class="float-right clearfix">:</span></div>
                                            <div>
                                                @if ($data->nim_terpilih)
                                                    {{$data->nim_terpilih}}
                                                @elseif ($data->nim_submit)
                                                    {{$data->nim_submit}}
                                                @endif    
                                            </div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Nama</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div>
                                                @if ($data->mahasiswaTerpilih->user->name)
                                                    {{ $data->mahasiswaTerpilih->user->name}}
                                                @elseif ($data->mahasiswaSubmit->user->name)
                                                    {{$data->mahasiswaSubmit->user->name}}
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Judul Topik</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->judul_topik  }}</div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Deskripsi</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->deskripsi  }}</div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-2">Dosen Pembimbing</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->dosen->user->name  }}</div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Dosen Penguji 1</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->dosenPenguji1->user->name  }}</div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Dosen Penguji 2</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->dosenPenguji2->user->name  }}</div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-2">Status Mahasiswa</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> 
                                                @if ($data->status_mahasiswa == 0)
                                                    <strong class="badge badge-warning">Progres Metopen</strong>
                                                    @elseif ($data->status_mahasiswa == 1)
                                                    <strong class="badge badge-primary">Ready to schedule semprop</strong>
                                                    @elseif ($data->status_mahasiswa == 2)
                                                    <strong class="badge badge-info">Progres Skripsi</strong>
                                                    @elseif ($data->status_mahasiswa == 3)
                                                    <strong class="badge badge-success">Ready to schedule pendadaran</strong>                                                  
                                                @endif                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
@section('script')
@endsection
@endsection

    