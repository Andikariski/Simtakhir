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
                                                        @if ($data->topikSkripsi->mahasiswaTerpilih)
                                                        {{ $data->topikSkripsi->mahasiswaTerpilih->user->name}}
                                                        @elseif ($data->topikSkripsi->mahasiswaSubmit)
                                                        {{$data->topikSkripsi->mahasiswaSubmit->user->name}}
                                                        @endif
                                                    </strong>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col"><a href="{{ route('dataPenjadwalan') }}" class="btn btn-primary float-right btn-sm">
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
                                                @if ($data->topikSkripsi->nim_terpilih)
                                                    {{$data->topikSkripsi->nim_terpilih}}
                                                @elseif ($data->topikSkripsi->nim_submit)
                                                    {{$data->topikSkripsi->nim_submit}}
                                                @endif    
                                            </div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Nama</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div>
                                                    @if ($data->topikSkripsi->mahasiswaTerpilih)
                                                        {{ $data->topikSkripsi->mahasiswaTerpilih->user->name}}
                                                    @elseif ($data->topikSkripsi->mahasiswaSubmit)
                                                        {{$data->topikSkripsi->mahasiswaSubmit->user->name}}
                                                    @endif
                                            </div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Judul Topik</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->judul_topik  }}</div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Deskripsi</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->deskripsi  }}</div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-2">Dosen Pembimbing</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->dosen->user->name  }}</div>
                                        </div>
                
                                        <div class="row mt-3">
                                            <div class="col-2">Dosen Penguji 1</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->dosenPenguji1->user->name  }}</div>
                                        </div>
                                        
                                        @if ($data->jenis_ujian == 1)
                                            <div class="row mt-3">
                                                <div class="col-2">Dosen Penguji 2</div>
                                                <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->topikSkripsi->dosenPenguji2->user->name  }}</div>
                                            </div>
                                        @endif                        

                                        <div class="row mt-3">
                                            <div class="col-2">Tanggal Ujian</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ date('d F Y',strtotime($data->date))}}</div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-2">Waktu Ujian</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ $data->waktu_mulai . ' - ' . $data->waktu_selesai}}</div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-2">Ruang Ujian</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> {{ 'Ruang ' .$data->meet_room}}</div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-2">Ujian</div>
                                            <div class="col-1"><span class="float-right">:</span></div>
                                            <div> 
                                                @if ($data->jenis_ujian == 0)
                                                    <strong class="badge badge-warning">Ujian Seminar Proposal</strong>
                                                    @elseif ($data->jenis_ujian == 1)
                                                    <strong class="badge badge-success">Ujian Pendadaran</strong>                                                                                                  
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

    