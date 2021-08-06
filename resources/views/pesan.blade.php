@extends('temp.template')
@section('content')

<section class="pemesanan">
    <div class="container bgpemesanan">
        <h1 style="color: #FE3F00; text-align: center; margin-bottom:3%;">FORMULIR PEMESANAN</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center mb_30" data-aos="zoom-out" data-aos-delay="100">
                <img class="content-image" src="{{ url ('assets/img/pesanm.png') }}">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 align-items-justify" data-aos="fade-up" data-aos-delay="100">
                <div class="formulir">
                    <form>
                        <label for="name">Nama Pemesan</label>
                        <input class="isian" type="text" id="wa_nama" maxlength="30" name="name" required="">
                    
                        <label for="phone">Nomor Telepon</label>
                        <input class="isian" type="text" id="wa_tlp" maxlength="16" onkeypress="return num_telepon(event)" name="phone" required="">

                        <label for="jmuatan">Jenis Muatan</label>
                        <input class="isian" type="text" id="wa_jmuatan" maxlength="50" name="jmuatan" required="">

                        <label for="muat">Muat (Kota)</label>
                        <input class="isian" type="text" id="wa_muat" maxlength="30" name="muat" required="">

                        <label for="bongkar">Bongkar (Kota)</label>
                        <input class="isian" type="text" id="wa_bongkar" maxlength="30" name="bongkar" required="">
                    
                        <a class="tmblpesan" href="javascript:void" type="submit">Pesan</a>
                        <div id="text-info"></div>
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