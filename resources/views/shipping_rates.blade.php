@extends('temp.template')
@push('add_header')
{{--    <link rel="stylesheet" href="{{ url('assets/vendor/datatables/jquery.dataTables.min.css') }}">--}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://kit.fontawesome.com/64974954f3.js" crossorigin="anonymous"></script>
@endpush
@php
$company_wa = \Illuminate\Support\Facades\DB::table('users')->first()->company_wa;
@endphp
@section('content')
    <section class="pemesanan">
        <div class="container bgpemesanan">
            <h3 style="color: #FE3F00; text-align: center;">Tarif Pengiriman</h3>
            <div class="row mt-4">
                <div class="col-12 align-items-justify" data-aos="fade-up" data-aos-delay="100">
                    <form class="mb-3">
                        <div class="form-row align-items-center">
                            <div class="col-md-3 mb-1">
                                <select class="form-control" id="select2_origin"></select>
                                <input type="hidden" name="origin" id="hidden_origin" class="form-control mb-2" placeholder="Asal Pengiriman" value="{{request()->get('origin')}}">
                            </div>
                            <div class="col-md-3 mb-1">
                                <select class="form-control" id="select2_destination"></select>
                                <input type="hidden" name="destination" class="form-control mb-2" id="hidden_destination" placeholder="Tujuan Pengiriman" value="{{request()->get('destination')}}">
                            </div>
                            <div class="col-md-3 mb-1">
                                <button type="submit" class="login_button btn-sm" style="width: unset;padding: 0.25rem 0.5rem;">Periksa Ongkir</button>
                            </div>
                        </div>
                    </form>
                    <div class="card mb-4">
                        <div class="card-header">
                            Rute & Tarif yang Tersedia
                        </div>
                        <div class="card-body" style="height: 240px; overflow-y: auto;">
                            @foreach($data as $d)
                            <div>
                                <div class="row">
                                    <div class="col-md-4"><h5 class="card-title d-flex justify-content-md-between">{{$d->origin}}<i class='bx bxs-right-arrow-alt'></i></h5></div>
                                    <div class="col-md-4"><h5 class="card-title">{{$d->destination}}</h5></div>
                                    <div class="col-md-4"><h5 class="card-title" style="color: #FE3F00">{{$d->price}}</h5></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 card-text">{{$d->noted}}</div>
                                    <div class="col-md-4">
                                        <a class="btn btn-success btn-sm" target="_blank" href="https://wa.me/{{$company_wa}}?text=Halo Kak, Saya ingin kirim barang dari {{$d->origin}} ke {{$d->destination}}. Tarif pastinya berapa ya?">
                                            <i class="fa fa-whatsapp"></i>&nbsp;WhatsApp
                                        </a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <h5>Belum menemukan rute diatas?</h5>
                        <button class="login_button" style="width: unset" data-toggle="modal" data-target="#requestRuteModal">Kirim Permintaan Rute</button>
                    </div>
{{--                    <table id="shippingDataTable" class="display" style="width:100%">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Asal</th>--}}
{{--                            <th>Tujuan</th>--}}
{{--                            <th>Tarif</th>--}}
{{--                            <th>Estimasi</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($data as $key => $d)--}}
{{--                        <tr>--}}
{{--                            <td>{{$d->origin}}</td>--}}
{{--                            <td>{{$d->destination}}</td>--}}
{{--                            <td>Rp {{number_format($d->price, 0,null,'.')}}</td>--}}
{{--                            <td>{{$d->estimation}}</td>--}}
{{--                        </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>Asal</th>--}}
{{--                            <th>Tujuan</th>--}}
{{--                            <th>Tarif</th>--}}
{{--                            <th>Estimasi</th>--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}
{{--                    </table>--}}
                </div>
            </div>
        </div>
{{--modal request new rute--}}
        <div class="modal fade" id="requestRuteModal" tabindex="-1" role="dialog" aria-labelledby="requestRuteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Permintaan Rute Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="request_origin">Asal Pengiriman</label>
                                <input type="text" class="form-control" id="request_origin">
                            </div>
                            <div class="form-group">
                                <label for="request_destination">Tujuan Pengiriman</label>
                                <input type="text" class="form-control" id="request_destination">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a id="send_request_rute" target="_blank" class="btn btn-success" href="https://wa.me/{{$company_wa}}">
                            <i class="fa fa-whatsapp"></i>&nbsp;Kirim Permintaan Rute
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('add_footer')
    <script type="text/javascript">
        $(function(){
            //handle button kirim permintaan rute
            let new_origin = '';
            let new_destination = '';
            $('#request_origin').keyup(function(){
                new_origin = $(this).val();
                $('#send_request_rute').attr("href", `https://wa.me/{{$company_wa}}?text=Halo Kak, Saya ingin minta rute baru dari ${new_origin} ke ${new_destination}. Tarif pastinya berapa ya?`);
            });
            $('#request_destination').keyup(function(){
                new_destination = $(this).val();
                $('#send_request_rute').attr("href", `https://wa.me/{{$company_wa}}?text=Halo Kak, Saya ingin minta rute baru dari ${new_origin} ke ${new_destination}. Tarif pastinya berapa ya?`);
            });

            $('#select2_origin').select2({
                minimumInputLength: 3,
                allowClear: true,
                placeholder: 'Asal Pengiriman',
                language: {
                    inputTooShort: function() {
                        return 'Masukkan lebih dari 3 karakter';
                    }
                },
                ajax: {
                    dataType: 'json',
                    url: 'shipping_rates/search',
                    delay: 800,
                    data: function(params) {
                        return {
                            search: params.term,
                            type: 'origin'
                        }
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                }
            }).on('select2:select', function (evt) {
                var data = $("#select2_origin option:selected").text();
                $('#hidden_origin').val(data);
            });

            $('#select2_destination').select2({
                minimumInputLength: 3,
                allowClear: true,
                placeholder: 'Tujuan Pengiriman',
                language: {
                    inputTooShort: function() {
                        return 'Masukkan lebih dari 3 karakter';
                    }
                },
                ajax: {
                    dataType: 'json',
                    url: 'shipping_rates/search',
                    delay: 800,
                    data: function(params) {
                        return {
                            search: params.term,
                            type: 'destination'
                        }
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                }
            }).on('select2:select', function (evt) {
                var data = $("#select2_destination option:selected").text();
                $('#hidden_destination').val(data);
            });

        //    default value
            @if(request()->get('origin'))
            let default_origin = $("<option selected='selected'></option>").val("1").text("{{request()->get('origin')}}");
            $("#select2_origin").append(default_origin).trigger('change');
            @endif

            @if(request()->get('destination'))
            let default_destination = $("<option selected='selected'></option>").val("1").text("{{request()->get('destination')}}");
            $("#select2_destination").append(default_destination).trigger('change');
            @endif
        });
    </script>
{{--    <script src="{{ url('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#shippingDataTable').DataTable();--}}
{{--        } );--}}
{{--    </script>--}}
@endpush
