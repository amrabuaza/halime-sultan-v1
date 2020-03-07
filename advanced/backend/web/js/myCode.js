$(document).ready(function () {
    $('.pass-in').hide();
    $('.password-click').click(function () {
        $('.pass-in').toggle(500);
    });

    $('.forgot-pass').click(function (event) {
        $(".pr-wrap").toggleClass("show-pass-reset");
    });

    $('.pass-reset-submit').click(function (event) {
        $(".pr-wrap").removeClass("show-pass-reset");
    });

    $(".mange-shipping").click(function () {
        $("#myModal").modal('show')
            .find("#myModalContent")
            .load($(this).attr('value'));
    });

    $(".dynamicform_wrapper").on("beforeInsert", function (e, item) {
        //console.log("beforeInsert");
        //$('.form-control:last').val('');
    });

    $(".dynamicform_wrapper").on("beforeDelete", function (e, item) {
        if (!confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function (e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function (e, item) {
        alert("Limit reached");
    });


});