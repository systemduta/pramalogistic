@extends('admin.layouts.app')

@section('title')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Tarif</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Tarif</li>
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
            <div class="col-lg-4 col-md-4">
{{--                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"--}}
{{--                    data-whatever="@getbootstrap">Tambah Tarif</button>--}}
                <button type="button" class="btn btn-warning" onclick="$(this).showFormModal('{{route('shipping_rates.store')}}')">Tambah Tarif</button>
            </div>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tarif</th>
                            <th>Estimasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $n => $item)
                            <tr>
                                <td>{{ ++$n }}</td>
                                <td>{{ $item->origin }}</td>
                                <td>{{ $item->destination }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->estimation }}</td>
                                <td>
                                    <a type="button" class="btn btn-small btn-outline-info" data-toggle="modal" data-target="#detail-{{ $item->id }}">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                    <a type="button" class="btn btn-small btn-outline-warning"
                                       onclick="$(this).showFormModal('{{route('shipping_rates.update', $item->id)}}','{{$item->origin}}','{{$item->destination}}','{{$item->price}}','{{$item->estimation}}','{{$item->noted}}')"
                                    >
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <form action="{{route('shipping_rates.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Anda yakin ingin Hapus?');" style="display: inline;">
                                        @csrf
                                        <button type="submit" name="_method" value="DELETE" class="btn btn-small btn-outline-danger">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--    detail--}}
    @foreach ($data as $item)
        <div class="modal fade long-modal" id="detail-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="longmodal" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Detail Tarif</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Asal</h5>
                                <p>{{$item->origin}}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Tujuan</h5>
                                <p>{{$item->destination}}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Tarif</h5>
                                <p>{{$item->price}}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Estimasi</h5>
                                <p>{{$item->estimation}}</p>
                            </div>
                            <div class="col-md-12">
                                <h5>Catatan</h5>
                                <p>{{$item->noted}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal tambah --}}
    <form action="" method="POST" id="form_main" enctype="multipart/form-data">
        @csrf
        <div class="modal fade bs-example-modal-lg" id="form_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Tarif</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Asal:</label>
                            <input type="text" class="form-control" id="form_origin" name="origin" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tujuan:</label>
                            <input type="text" class="form-control" id="form_destination" name="destination" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tarif:</label>
                            <input type="text" class="form-control" id="form_price" name="price" required>
                            <small class="form-text text-muted">Contoh Penulisan: Rp 500.000 - Rp 1.000.000</small>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Estimasi:</label>
                            <input type="text" class="form-control" id="form_estimation" name="estimation">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Catatan:</label>
                            <textarea class="form-control" id="form_noted" name="noted"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="btn_save">Simpan</button>
                        <button type="submit" name="_method" value="PUT" class="btn btn-success">Perbaharui</button>
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

            $.fn.showFormModal = function(action, origin, destination, price, estimation, noted){
                if (origin) {
                    $('#form_main').attr('action', action)
                    $('#btn_save').hide();
                    $('#btn_update').show();
                } else {
                    $('#form_main').attr('action', action)
                    $('#btn_save').show();
                    $('#btn_update').hide();
                }
                $('#form_origin').val(origin);
                $('#form_destination').val(destination);
                $('#form_price').val(price);
                $('#form_estimation').val(estimation);
                $('#form_noted').val(noted);
                $('#form_modal').modal('show');
            }
        });
    </script>
@endsection
