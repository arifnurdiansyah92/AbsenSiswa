$(".edit-button").click(function(){
    if($(this).data('aksi')=="kelas"){
        $('#id').val($(this).data('id'));
        $('#jurusan').val($(this).data('jurusan'));
        $('#tingkat_kelas').val($(this).data('tingkat'));
        $('#nama_kelas').val($(this).data('nama'));
        $('#kuota').val($(this).data('kuota'));
        $('#tahun_masuk').val($(this).data('tahunmasuk'));
        $('#tahun_keluar').val($(this).data('tahunkeluar'));
        $('#title-modal').html($(this).data('tingkat') + "-" + $(this).data('jurusan') + " " + $(this).data('nama'));
    }else if($(this).data('aksi')=="siswa"){
        $('#id').val($(this).data('id'));
        $('#nama_siswa').val($(this).data('nama'));
        $('#nis').val($(this).data('nis'));
        $('#jk').val($(this).data('jk'));
        $('#tk').val($(this).data('tk'));
        if($(this).data('status')=="Aktif"){
            $("#aktif").attr("checked", true);
        }else{
            $("#tidak_aktif").attr("checked", true);
        }
    }else if($(this).data('aksi')=="guru"){
        $('#id').val($(this).data('id'));
        $('#nama').val($(this).data('nama'));
        $('#nip').val($(this).data('nip'));
        $('#jk').val($(this).data('jk'));
        if($(this).data('status')=="Aktif"){
            $("#aktif").attr("checked", true);
        }else{
            $("#tidak_aktif").attr("checked", true);
        }
    }
});
$('.delete-button').click(function(){
    var id = $(this).data('id');
    $("#delete-form").attr("action", "/" + $(this).data('aksi') + "/delete/" + id);
})
$('input[name="tahun_masuk"]').change(function(){
    var tahun_keluar = parseInt($(this).val()) + 1;
    $('input[name="tahun_keluar"]').val(tahun_keluar);
    $('input[name="tahun_kel"]').val(tahun_keluar);
})
