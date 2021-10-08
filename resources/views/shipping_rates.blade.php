@extends('temp.template')
@push('add_header')
    <link rel="stylesheet" href="{{ url('assets/vendor/datatables/jquery.dataTables.min.css') }}">
@endpush
@section('content')
    <section class="pemesanan">
        <div class="container bgpemesanan">
            <h1 style="color: #FE3F00; text-align: center;">Tarif Pengiriman</h1>
            <div class="row">
                <div class="col-12 align-items-justify" data-aos="fade-up" data-aos-delay="100">
                    <table id="shippingDataTable" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tarif</th>
                            <th>Estimasi</th>
{{--                            <th>Catatan</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $d)
                        <tr>
                            <td>{{$d->origin}}</td>
                            <td>{{$d->destination}}</td>
                            <td>Rp {{number_format($d->price, 0,null,'.')}}</td>
                            <td>{{$d->estimation}}</td>
{{--                            <td>{{$d->noted}}</td>--}}
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tarif</th>
                            <th>Estimasi</th>
{{--                            <th>Catatan</th>--}}
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('add_footer')
    <script src="{{ url('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#shippingDataTable').DataTable();
        } );
    </script>
@endpush
