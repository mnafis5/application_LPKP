$(function() {
    
    $('.tombolTambah').on('click', function() {
        $('#judulModal').html('Tambah surat');        
        $('.modal-footer button[type=submit]').html('Tambah surat');
        $('.modal-footer button.draf').html('Batal');
        $('.draft').show();
        $('.im').show();        
        $('.ig').hide();        
        $('.draf').show();        
        $('.draf2').hide();        
        $('#num').val("");
        $('#instansi').val("");
        $('#tanggal').val("");
        $('#lampiran').val("");
        $('#isi').val("");
        $('#id').val("");
        $('#img').val("");
        // $('.draf').html('Tambah Draft');
        $('#disimg').remove();
        $('.modal-body form').attr('action','http://localhost:8080/project_LPK/public/keluar/tambahSuratKeluar');
    });

    $('.draf').on('click',function () {
        $('.modal-body form').attr('action','http://localhost:8080/project_LPK/public/keluar/draftAdd');
    });


    $('.tampilModalUbah').on('click', function() {
        
        $('#judulModal').html('Ubah surat');
        $('.modal-footer button[type=submit]').html('Ubah surat');
        $('.modal-body form').attr('action','http://localhost:8080/project_LPK/public/keluar/ubah');
        $('.draft').hide();
        $('.im').show();
        $('.ig').show();
        $('.draf').hide();
        $('.draf2').show();
        
      
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost:8080/project_LPK/public/keluar/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#num').val(data.num);
                $('#instansi').val(data.instansi);
                $('#tanggal').val(data.tanggal);
                $('#lampiran').val(data.lampiran);
                $('#isi').val(data.isi);
                $('#id').val(data.id);
                $('#disimg').val(data.img);
                $('.modal-footer button[class=draf]').attr('class','btn-secondary');
            }
        });

        

    });
    $('.outcome').on('click',function() {
        $('.modal-body form').attr('action','http://localhost:8080/project_LPK/public/keluar/draftUpdate');
    });

    $('.tampilModalUpdate').on('click', function() {
        
        $('#judul').html('Ubah Draft');
        $('.modal-footer button[type=submit]').html('Ubah draft');
      
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost:8080/project_LPK/public/keluar/getUpdate',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#num').val(data.num);
                $('#instansi').val(data.instansi);
                $('#tanggal').val(data.tanggal);
                $('#lampiran').val(data.lampiran);
                $('#isi').val(data.isi);
                $('#id').val(data.id);
            }
        });

    });
});

