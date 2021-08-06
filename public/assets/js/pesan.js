$(document).on('click','.tmblpesan', function(){
    var input_ceknama = document.getElementById('wa_nama');
    var input_cektlp = document.getElementById('wa_tlp');
    var input_cekjmuatan = document.getElementById('wa_jmuatan');
    var input_cekmuat = document.getElementById('wa_muat');
    var input_cekbongkar = document.getElementById('wa_bongkar');
    
    /* Whatsapp Settings */
    var walink = 'https://web.whatsapp.com/send',
        phone = '6285843284178',
        walink2 = 'Halo saya ingin Memesan :',
        text_yes = 'Terkirim.',
        text_no = 'Isi semua Formulir !';
    
    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    var walink = 'whatsapp://send';
    }
    
    if("" != input_ceknama.value && input_cektlp.value && input_cekjmuatan.value && input_cekmuat.value && input_cekbongkar.value ){
    
     /* Call Input Form */
    var input_name = $("#wa_nama").val(),
        input_phone = $("#wa_tlp").val(),
        input_jmuatan = $("#wa_jmuatan").val(),
        input_muat = $("#wa_muat").val(),
        input_bongkar = $("#wa_bongkar").val();
    
    /* Final Whatsapp URL */
    var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
        'Nama : ' + input_name + '%0A' +
        'Nomor Telepon : ' + input_phone + '%0A' +
        'Jenis Muatan : ' + input_jmuatan + '%0A' +
        'Muat (Kota) : ' + input_muat + '%0A' +
        'Bongkar (Kota) : ' + input_bongkar + '%0A';
    
    /* Whatsapp Window Open */
    window.open(blanter_whatsapp,'_blank');
    document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>';
    } else {
    document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>';
    }
});