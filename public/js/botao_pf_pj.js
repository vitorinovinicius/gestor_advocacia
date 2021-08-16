$(document).ready(function() {
    $('input[type="radio"]').click (function() {
        var inputValue = $(this).attr("value");
        var targetBox = $("."+ inputValue);
        $(".cadastro").not(targetBox).hide();
        $(targetBox).show();
    })
})
