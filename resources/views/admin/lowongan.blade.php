@extends('admin.layouts.app')

@section('title')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i
                class="ti-settings text-white"></i></button>
    </div>
@endsection

@section('content')
    <div class="card">

        @if (Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
                <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ Session('message') }}
            </div>
        @endif
        <div class="card-body">
            <div class="col-lg-2 col-md-4">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@getbootstrap">Tambah Karir</button>
            </div>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Batas Waktu</th>
                            <th>Persyaratan</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $n => $item)
                            <tr>
                                <td>{{ ++$n }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->batas_waktu)->translatedFormat('d, D M Y') }}</td>

                                <td>{!! Str::limit($item->persyaratan, 90) !!}
                                    <a style="text-decoration: underline;  color:red;" type="button" data-toggle="modal"
                                        data-target="#per{{ $item->id }}" data-whatever="@getbootstrap">
                                        Selengkapnya
                                    </a>
                                </td>
                                <td>{!! Str::limit($item->deskripsi, 90) !!}
                                    <a style="text-decoration: underline;  color:red;" type="button" data-toggle="modal"
                                        data-target="#des{{ $item->id }}" data-whatever="@getbootstrap">
                                        Selengkapnya
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#gambar{{ $item->id }}" data-whatever="@getbootstrap"><i
                                            class="mdi mdi-file-image"></i>
                                    </button>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#gambar{{ $item->id }}" data-whatever="@getbootstrap"><i
                                            class="mdi mdi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal persyaratan --}}
    @foreach ($data as $item)
        <div class="modal fade long-modal" id="per{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="longmodal" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <h4>Persyaratan</h4>
                        <hr>
                        <p>{!! $item->persyaratan !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal des --}}
    @foreach ($data as $item)
        <div class="modal fade long-modal" id="des{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="longmodal" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <h4>Deskripsi</h4>
                        <hr>
                        <p>{!! $item->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal gambar --}}
    @foreach ($data as $item)
        <div class="modal fade bs-example-modal-lg" id="gambar{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content ">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <img src="{{ asset('storage/lowongan/' . $item->gambar) }}">
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal add lowongan --}}
    <form action="{{ route('store.lowongan') }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf
        <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-xl" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Karir</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Karir:</label>
                            <input type="text" class="form-control" id="recipient-name1" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Persyaratan:</label>
                            <textarea class="form-control" id="persyaratan" name="persyaratan" required></textarea>
                            <script>
                                CKEDITOR.replace('persyaratan');

                            </script>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                            <script>
                                CKEDITOR.replace('deskripsi');

                            </script>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Batas Waktu:</label>
                            <input type="date" class="form-control" name="batas_waktu" placeholder="dd/mm/yyyy">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Batas Waktu:</label>
                            <input type="file" class="form-control" name="gambar" placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('addCss')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
        jQuery(document).ready(function() {
            jQuery('#ajaxSubmit').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/tambah/karir') }}",
                    method: 'post',
                    data: {
                        nama: jQuery('#nama').val(),
                        persyaratan: jQuery('#persyaratan').val(),
                        deskripsi: jQuery('#deskripsi').val(),
                        batas_waktu: jQuery('#batas_waktu').val(),
                    },
                    success: function(result) {
                        if (result.errors) {
                            jQuery('.alert-danger').html('');

                            jQuery.each(result.errors, function(key, value) {
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<li>' + value +
                                    '</li>');
                            });
                        } else {
                            jQuery('.alert-danger').hide();
                            $('#open').hide();
                            $('#myModal').modal('hide');
                        }
                    }
                });
            });
        });

    </script>
@endsection
