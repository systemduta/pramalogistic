@extends('temp.template')
@section('content')

    <section class="pendaftaran">
        <div class="container bgpendaftaran">
            <h1 style="color: #FE3F00; text-align: center; margin-bottom:3%;">FORMULIR PENDAFTARAN</h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10 col-sm-12 col-12 align-items-center" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="formulir">
                        <form action="{{ route('pelamar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-grup">
                                <div class="label">
                                    <label>Nama Lengkap</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="text" name="nama" maxlength="40" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Tempat Lahir</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="text" name="tmptlahir" maxlength="15" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Tanggal Lahir</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="date" name="tlahir" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Alamat</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="text" name="alamat" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Email</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="email" name="email" maxlength="30" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Nomor Telepon</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="text" name="telepon" maxlength="16"
                                        onkeypress="return num_telepon(event)" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Gender</label>
                                </div>
                                <div class="input">
                                    <input class="radiobtn" type="radio" name="gender" value="Laki-Laki"> Laki - Laki
                                    &nbsp;&nbsp;
                                    <input class="radiobtn" type="radio" name="gender" value="Perempuan"> Perempuan
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Pendidikan Terakhir</label>
                                </div>
                                <div class="input">
                                    <input class="radiobtn" type="radio" name="pterakhir" value="D3"> D3 &nbsp;&nbsp;
                                    <input class="radiobtn" type="radio" name="pterakhir" value="D4"> D4 &nbsp;&nbsp;
                                    <input class="radiobtn" type="radio" name="pterakhir" value="S1"> S1 &nbsp;&nbsp;
                                    <input class="radiobtn" type="radio" name="pterakhir" value="S2"> S2 &nbsp;&nbsp;
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Jurusan</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="text" name="jurusan" maxlength="20" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Dokumen CV (PDF, Max 2MB)</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="file" name="upcv" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Dokumen Portofolio (PDF, Max 2MB)</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="file" name="upportofolio" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Dokumen KTP/Kartu Keluarga (JPG/PNG, Max 2MB)</label>
                                </div>
                                <div class="input">
                                    <input class="isian" type="file" name="upktp" required="">
                                </div>
                            </div>
                            <div class="form-grup">
                                <div class="label">
                                    <label>Posisi yang Diinginkan</label>
                                </div>
                                <div class="input">
                                    <select class="isian" name="posisi" required="">
                                        <option value="" selected>Pilih Posisi</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input class="tmbldaftar" type="submit" value="Daftar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function num_telepon(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }

    </script>

@endsection
