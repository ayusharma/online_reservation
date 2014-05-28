$('document').ready(function(){
    $('#button_plane').click(function(){
        if($('#plane_from').val() == $('#plane_to').val()){
                notice();
                $(".alertin").html("Source and Destination is Same.");
                notice_close();
        }
        else {
            var date = $('#date_plane').val();
            var month = $('#month_plane').val();
            var year = $('#year_plane').val();
                if( date != '' && month != '' && year != ''){
                var Xmas95 = new Date(month+" "+date+","+year);
                var weekday = Xmas95.getDay();
                        $('#plane').attr('action','plane.php');
                        var h = $('#invisible_plane').val(weekday);
                        $('#plane').submit();
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