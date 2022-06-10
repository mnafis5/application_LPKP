$(function () {

    $('.button').on('click', function() {
    const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost:8080/project_LPK/public/daftar/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#img').val(data.img);
                $('#ket').val(data.ket);
                $('#jk').val(data.jk);
                $('#name').val(data.name);
                $('#id').val(data.id);
            }
        });


    });


});