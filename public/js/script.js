$(document).ready(function() {
    $('#curp').on('input', function() {
        // var inputValue = $(this).val();
        // $(this).val(inputValue.toUpperCase());
        var inputValue = $(this).val().toUpperCase();
        
        if (inputValue.length > 18) {
            inputValue = inputValue.substring(0, 18);
        }
        
        $(this).val(inputValue);
    });
});