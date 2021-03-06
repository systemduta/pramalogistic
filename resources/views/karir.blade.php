@extends('temp.template')
@section('content')

    <section class="herokarir"
        style="background-image: linear-gradient(to top left, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0)),url(../assets/img/karirgmbr.png);"
        data-aos="fade-up">
        <div class="herokarir-text">
            <h1>{{ __('bahasa.karir 1') }} <span>{{ __('bahasa.karir 2') }}</span> PRAMA LOGISTIC</h1>
        </div>
    </section>
    <section class="lowongan">
        <div class="container">
            <h1 style="color: #FE3F00; text-align: center; margin-bottom:3%;">{{ __('bahasa.lowongan') }}</h1>
            <div class="row justify-content-center">
                @foreach ($data as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-flex align-items-center mb_30ml" data-aos="zoom-out"
                        data-aos-delay="100">
                        <div class="tulisan-lowongan">
                            <h2>{{ $item->nama }}</h2>
                        </div>
                        <div class="btn-lwn-pos">
                            <a href="#{{ $item->id }}"><button onclick="syarat(event, '{{ $item->id }}')"
                                    class="tablinks btn-lwn" type="button">{{ __('bahasa.selengkapnya') }}</button></a>
                        </div>
                        <img class="lwn-image" src="{{ asset('storage/lowongan/' . $item->gambar) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @foreach ($data as $items)
        <section id="{{ $items->id }}" class="persyaratan">
            <div class="container">
                <h1 style="color: #FE3F00; text-align: center; margin-bottom:3%;">PERSYARATAN</h1>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-12 mb_30m">
                        <img class="lwn-image" src="{{ asset('storage/lowongan/' . $items->gambar) }}">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-6 col-sm-12 col-12 mb_30m text-center">
                                <a href="{{ url('/karir/daftar') }}"><button class="btn-lwn-daftar"
                                        type="button">Daftar</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 align-items-center text-justify mb_30">
                        <h2>{{ $items->nama }}</h2>
                        <ul>
                            <li>{!! $items->persyaratan !!}</li>

                        </ul>
                        <h5>Deskripsi Pekerjaan</h5>
                        <ul>
                            <li>{!! $items->deskripsi !!}</li>
                        </ul>
                        <h5>Batas Waktu</h5>
                        <ul>
                            {{ \Carbon\Carbon::parse($item->batas_waktu)->translatedFormat('d, D M Y') }}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <script>
        function syarat(evt, nomer) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("persyaratan");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(nomer).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>

@endsection
