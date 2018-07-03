$(document).ready(function(){
    $("#absensi #checkall").click(function () {
        if ($("#absensi #checkall").is(':checked')) {
            $("#absensi input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#absensi input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    }); 
    $("[data-toggle=tooltip]").tooltip();
});
