@extends('temp.template')
@section('content')

<section class="herotentang" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
url(../assets/img/tentangkamigmbr.png);" data-aos="fade-up">
    <div class="herotentang-text">
        <h1>{{ __('bahasa.tentang kami 1') }} <span>{{ __('bahasa.tentang kami 2') }}</span> {{ __('bahasa.tentang kami 3') }}</h1>
    </div>
</section>
<section class="profil">
    <div class="container">
        <h1 style="color: #FE3F00; text-align: center; margin-bottom:3%;">{{ __('bahasa.profil') }}</h1>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                <p style="text-align: justify"> {{ __('bahasa.profil 1') }}</p>
            </div>
        </div>
    </div>
</section>
<section class="visimisi">
    <div class="container">
        <h1 style="color: #FE3F00; text-align: center; margin-bottom:3%;">{{ __('bahasa.visi') }} {{ __('bahasa.misi') }}</h1>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-flex align-items-center mb_30" data-aos="zoom-out" data-aos-delay="100">
                <div class="content">
                    <div class="tulisanvm">
                        <h1>{{ __('bahasa.visi') }}</h1>
                    </div>
                    <div class="content-overlay"></div>
                    <img class="content-image" src="{{ url ('assets/img/visi.png') }}">
                    <div class="content-details fadeIn-bottom">
                        <p class="content-text">{{ __('bahasa.visi 1') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-flex align-items-center mb_30" data-aos="zoom-out" data-aos-delay="100">
                <div class="content">
                    <div class="tulisanvm">
                        <h1>{{ __('bahasa.misi') }}</h1>
                    </div>
                    <div class="content-overlay"></div>
                    <img class="content-image" src="{{ url ('assets/img/misi.png') }}">
                    <div class="content-details fadeIn-bottom">
                        <p>{{ __('bahasa.misi 1') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="armada">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 style="color: #FE3F00; text-align: center; margin-bottom:4%;">{{ __('bahasa.percayakan barang') }}
        </div>
    </div>
    <div class="testimonials">
        <div class="container" data-aos="zoom-in">
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center">
                            <img src="assets/img/dutro_diesel.png">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <h3>Hino Dutro 300 Diesel</h3>
                            <p>Dimensi : 4.745 mm x 1.717 mm x 2.120 mm</p>
                            <p>Mesin : Diesel 4 Stroke, 4 Cylinder-in line</p>
                            <p>Daya Angkut : 5.150 Kg</p>
                            <p>Cocok Untuk Kebutuhan :</p>
                            <ul>
                                <li>Bahan Logistik dan Sembako</li>
                                <li>Angkutan Bahan Bangunan dan Meubel</li>
                                <li>Angkutan Hasil Pertanian</li>
                                <li>Angkutan Es Batu</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center">
                            <img src="assets/img/dyna_diesel.png">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <h3>Hino Dyna 130 Diesel</h3>
                            <p>Dimensi : 6.646 mm x 1945 mm x 2165 mm</p>
                            <p>Mesin : Diesel 4 Stroke, 4 Cylinder-in line (130 HP)</p>
                            <p>Daya Angkut : 7500 Kg</p>
                            <p>Cocok Untuk Kebutuhan :</p>
                            <ul>
                                <li>Angkut Motor</li>
                                <li>Angkutan Bahan Logistik dan Sembako</li>
                                <li>Angkutan Bahan Bangunan dan Meubel</li>
                                <li>Angkutan Hasil Pertanian</li>
                                <li>Angkutan Es Batu</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center">
                            <img src="assets/img/m_colt_desel.png">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <h3>Mitsubishi Colt Diesel Double</h3>
                            <p>Dimensi : 4.735 mm x 1.750 mm x 2.055 mm</p>
                            <p>Mesin : Diesel 4 Stroke, 4 Cylinder-in line (130 HP)</p>
                            <p>Daya Angkut : 5.150 Kg</p>
                            <p>Cocok Untuk Kebutuhan :</p>
                            <ul>
                                <li>Angkutan Bahan Logistik dan Sembako</li>
                                <li>Angkutan Bahan Bangunan dan Meubel</li>
                                <li>Angkutan Hasil Pertanian</li>
                                <li>Angkutan Es Batu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="kantor">
    <div class="container" data-aos="fade-up">
        <h1 style="color: #FE3F00; text-align: center; margin-bottom:4%;">{{ __('bahasa.kantor kami') }}</h1>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 d-flex align-items-stretch">
                <div class="kontenkt">
                  <div class="kontenkt-img">
                    <div class="tulisankantor">
                        <h1 style="font-size: 1.6em;">Kantor Ponorogo</h1>
                    </div>
                    <img class="content-image" src="{{ url ('assets/img/kantorpo.png') }}">
                  </div>
                  <div class="kontenkt-info">
                    <p>Jl. Arif Rahman Hakim No.9D Keniten Ponorogo, Jawa Timur</p>
                    <p>(0352) 3591369 - Ponorogo</p>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 d-flex align-items-stretch">
                <div class="kontenkt">
                  <div class="kontenkt-img">
                    <div class="tulisankantor">
                        <h1 style="font-size: 1.6em;">Kantor Tuban</h1>
                    </div>
                    <img class="content-image" src="{{ url ('assets/img/kantortb.png') }}">
                  </div>
                  <div class="kontenkt-info">
                    <p>Jl. Raya Tuban-Semarang KM 20, Desa Purworejo Tuban, Jawa Timur</p>
                    <p>(0356) 7133001 - Tuban</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="segitigaor">
        <img class="segitigagor" src="{{ url ('assets/img/segitigaor.png') }}">
    </div> --}}
</section>
<section class="surat2 surat2-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3>{{ __('bahasa.legalitas dan perijinan') }}</h3>
            <p>Surat Ijin Usaha Perdagangan (SIUP) 517.1/647/SIUP B-M/414.107/2017</p>
            <p>Tanda Daftar Perusahaan (TDP) 133714300731</p>
            <p>Nomor Pokok Wajib Pajak (NPWP) 92.313.615.5-648.000</p>
        </div>
    </div>
</section>

@endsection