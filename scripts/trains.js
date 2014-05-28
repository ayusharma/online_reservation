//javascript document
$('document').ready(function(){
    $('#button_trains').click(function(){
        if($('#trains_from').val() == $('#trains_to').val()){
                notice();
                $(".alertin").html("Source and Destination is Same.");
                notice_close();
        }
        else {
            var date = $('#date').val();
            var month = $('#month').val();
            var year = $('#year').val();
                if( date != '' && month != '' && year != ''){
                var Xmas95 = new Date(month+" "+date+","+year);
                var weekday = Xmas95.getDay();
                    if($('#trains_from').val()>$('#trains_to').val()){
                        $('#trains').attr('action','up.php');
                        var h = $('#invisible').val(weekday);
                        $('#trains').submit();
                    }
                    else {
                        $('#trains').attr('action','down.php');
                        var h = $('#invisible').val(weekday);
                        $('#trains').submit();
                    }
                }
                else {
                    notice();
                    $(".alertin").html("Please Enter Date, Month & Year.");
                    notice_close();
                }
            }
    });
});