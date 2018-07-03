$(".edit-button").click(function(){
    $('#id').val($(this).data('id'));
    $('#jurusan').val($(this).data('jurusan'));
    $('#tingkat_kelas').val($(this).data('tingkat'));
    $('#nama_kelas').val($(this).data('nama'));
    $('#kuota').val($(this).data('kuota'));
    $('#tahun_masuk').val($(this).data('tahunmasuk'));
    $('#tahun_keluar').val($(this).data('tahunkeluar'));
    $('#title-modal').html($(this).data('tingkat') + "-" + $(this).data('jurusan') + " " + $(this).data('nama'));
});
$('.delete-button').click(function(){
    var id = $(this).data('id');
    alert(id);
    $("#delete-form").attr("action", "/kelas/delete/" + id);
})