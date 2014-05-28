$('document').ready(function(){
    $('#button_bus').click(function(){
        if($('#bus_from').val() == $('#bus_to').val()){
                notice();
                $(".alertin").html("Source and Destination is Same.");
                notice_close();
        }
        else {
            var date = $('#date_bus').val();
            var month = $('#month_bus').val();
            var year = $('#year_bus').val();
                if( date != '' && month != '' && year != ''){
                var Xmas95 = new Date(month+" "+date+","+year);
                var weekday = Xmas95.getDay();
                        $('#bus').attr('action','bus.php');
                        var h = $('#invisible_bus').val(weekday);
                        $('#bus').submit();
                        //alert(weekday);
            }
                else {
                    notice();
                    $(".alertin").html("Please Enter Date, Month & Year.");
                    notice_close();
                }
            }
    });
});