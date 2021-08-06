@extends('admin.layouts.app')

@section('title')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Data Pelamar</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Data Pelamar</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i
                class="ti-settings text-white"></i></button>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Posisi</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>email</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Jurusan</th>
                            <th>Tanggal Mengirim</th>
                            <th>CV</th>
                            <th>Portofolio</th>
                            <th>KTP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $n => $item)
                            <tr>
                                <td>{{ ++$n }}</td>
                                <td>{{ $item->lowongan->nama }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tmptlahir }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tlahir)->translatedFormat('d, D M Y') }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->pterakhir }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d, D M Y') }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#cv{{ $item->id }}" data-whatever="@getbootstrap"><i
                                            class="mdi mdi-file-pdf"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#portofolio{{ $item->id }}" data-whatever="@getbootstrap"><i
                                            class="mdi mdi-file-pdf"></i>
                                    </button>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#ktp{{ $item->id }}" data-whatever="@getbootstrap"><i
                                            class="mdi mdi-file-image"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($data as $item)
        <div class="modal fade bs-example-modal-lg" id="ktp{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content ">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <img src="{{ $item->upktp ? asset('storage/ktp/' . $item->upktp) : asset('dist/img/logo_bg.png') }}">

                </div>
            </div>
        </div>
    @endforeach
    @foreach ($data as $item)
        <div class="modal fade bs-example-modal-lg" id="portofolio{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class="container-fluid">
                            <iframe width="1080" height="720"
                                src="{{ $item->upportofolio ? asset('storage/PDF/' . $item->upportofolio) : asset('dist/img/logo_bg.png') }}"
                                frameborder="0">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($data as $item)
        <div class="modal fade bs-example-modal-lg" id="cv{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class="container-fluid">
                            <iframe width="1080" height="720"
                                src="{{ $item->upcv ? asset('storage/PDF/' . $item->upcv) : asset('dist/img/logo_bg.png') }}"
                                frameborder="0">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('addJs')
    <script src="{{ asset('admin') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' +
                                    group +
                                    '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
            });
        });

    </script>
    <script>
        $(document).on("click", ".openImageDialog", function() {
            var myImageId = $(this).data('id');
            $(".modal-body #myImage").attr("src", myImageId);
        });

    </script>
@endsection
