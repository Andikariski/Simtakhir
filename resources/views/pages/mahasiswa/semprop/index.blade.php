@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">

            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                @if (!$data)

                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="card-title text-center">Kamu belum mempunyai judul</div>
                            </div>
                        </div>
                    </div>
                </div>
                @else

                <div class="col-md-12">

                    <form action="{{ route('logbook.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card full-height">
                            <div class="card-header">
                                <div class="card-title">Pendaftaran Seminar Proposal</div>
                                <small>Masukkan yang sudah ada (.pdf)</small>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Bukti Pembayaran</label>
                                            <input type="file" name="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">TOEFL</label>
                                            <input type="file" name="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Naskah Bab 1-3</label>
                                            <input type="file" name="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>


                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Cetak Transip Nilai</label>
                                            <input type="file" name="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>

                                   

                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

{{-- <script>
    $(".custom-file-input").on("change", function () {
        var files = Array.from(this.files)
        var fileName = files.map(f => {
            return f.name
        }).join(", ")
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script> --}}
@endsection
