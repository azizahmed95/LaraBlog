
$(document).ready(function(){

    $('#dobdate_picker').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat : 'dd-mm-yy',
        yearRange: "0:+3",
        minDate: "-101Y +1D",
        maxDate: "+3Y"
    });

});

