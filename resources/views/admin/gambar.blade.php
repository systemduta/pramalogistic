@extends('admin.layouts.app')

@section('title')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Gambar</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Home Gambar</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i
                class="ti-settings text-white"></i></button>
    </div>
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">&times;</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ Session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn-sm btn-warning " data-toggle="modal" data-target="#exampleModal"
                data-whatever="@getbootstrap">Tambah Gambar</button>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $n => $item)
                            <tr>
                                <td>{{ ++$n }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#gambar{{ $item->id }}" data-whatever="@getbootstrap"><i
                                            class="mdi mdi-file-image"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($data as $item)
        <div class="modal fade bs-example-modal-lg" id="gambar{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content ">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                    <img
                        src="{{ $item->gambar ? asset('storage/slide/' . $item->gambar) : asset('dist/img/logo_bg.png') }}">
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal Tambah gambar --}}
    <form action="{{ route('store.gambar') }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf
        <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Gambar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Slider</label>
                            <select class="form-control" name="nama">
                                <option value="home">Home</option>
                                <option value="karir">Karir</option>
                                <option value="berita">Berita</option>
                                <option value="tentang">Tentang Kami</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Gambar:</label>
                            <input type="file" class="form-control" id="recipient-name1" name="gambar" accept="image/*"
                                onchange="showMyImage(this)" required>
                        </div>
                        <img id="thumbnil" style="width:20%; margin-top:10px;"
                            src="{{ asset('admin/assets/images/A1.png') }}" alt="image" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- modal show gambar --}}
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
                        gambar: jQuery('#gambar').val(),
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

    <script>
        function showMyImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById("thumbnil");
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }

    </script>
@endsection
