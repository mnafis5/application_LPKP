$(function() {
    
    $('.tombolTambah').on('click', function() {
        $('#judulModal').html('Tambah surat');        
        $('.modal-footer button[type=submit]').html('Tambah surat');
        $('.draft').html('Simpan ke draft');
        $('.im').show();
        $('.ig').hide();        
        $('#num').val("");
        $('#instansi').val("");
        $('#tgl').val("");
        $('#lampiran').val("");
        $('#isi').val("");
        $('#id').val("");

    });


    $('.drag').on('click',function () {
        $('.modal-body form').attr('action','http://localhost:8080/project_LPK/public/keluar');
        confirm("ok");
    });

    $('.tampilModalUbah').on('click', function() {
        
        $('#judulModal').html('Ubah surat');
        $('.modal-footer button[type=submit]').html('Ubah surat');
        $('.modal-body form').attr('action','http://localhost:8080/project_LPK/public/surat/update');
        $('.draft').remove();
        $('.imf').hide();
        $('.im').show(); 
        $('.ig').show();
      
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost:8080/project_LPK/public/surat/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#num').val(data.num);
                $('#instansi').val(data.instansi);
                $('#lampiran').val(data.lampiran);
                $('#tgl').val(data.tanggal);
                $('#isi').val(data.isi);
                $('#id').val(data.id);
                $('#disimg').val(data.img);
            }
        });


    });



});

