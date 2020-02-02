$(document).ready(function ()
{
    $('.pass-in').hide();
    $('.password-click').click(function () {
        $('.pass-in').toggle(500);
    });

    $('.forgot-pass').click(function(event) {
        $(".pr-wrap").toggleClass("show-pass-reset");
    });

    $('.pass-reset-submit').click(function(event) {
        $(".pr-wrap").removeClass("show-pass-reset");
    });

    $(".mange-shipping").click(function () {
        $("#myModal").modal('show')
            .find("#myModalContent")
            .load($(this).attr('value'));
    });

    $(".dynamicform_wrapper").on("afterInsert", function (e, item) {
        $('.optionvalue-img:last').fileinput('clear');
    });

});