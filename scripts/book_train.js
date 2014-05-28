//script to process no. of persons
$('document').ready(function(){
    if($('#person').val()==1){
        $('#book').click(function(){
        $(this).attr("href","book_train.php?train_no=$result['train_no']&train_name=$result['train_name']&from=$fm&to=$too&date=$date&month=$month&year=$year");
    });
    }
    else {
    $('#book').click(function(){
        $('.fix').fadeIn('fast');
    });
    $('#cancel').click(function(){
        $('.fix').fadeOut('fast');
    });
    }
});





//""