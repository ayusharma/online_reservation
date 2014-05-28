//for alerts
function notice(){
    $('.full').fadeIn('slow');
}
function notice_close(){
    $('.alert_button').click(function(){
        $('.full').fadeOut('slow');
    });
}

//java script document 
$('document').ready(function(){
    $('li:nth-child(1)').css('background-color','#333');
    $('li:nth-child(1)').click(function(){
        $('.role').animate({right:0},500);
        $(this).css('background-color','#333');
        $('li:nth-child(2),li:nth-child(3)').css('background-color','#616E71');
        $('.railbg').fadeIn('slow');
        
    });
    $('li:nth-child(2)').click(function(){
        $('.role').animate({right:400},500);
        $(this).css('background-color','#333');
        $('li:nth-child(1),li:nth-child(3)').css('background-color','#616E71');
        $('.railbg,.planbg').fadeOut('slow');
        $('.busbg').fadeIn('slow');
        
    });
    $('li:nth-child(3)').click(function(){
        $('.role').animate({right:800},500);
        $(this).css('background-color','#333');
        $('li:nth-child(2),li:nth-child(1)').css('background-color','#616E71');
        $('.railbg,.busbg').fadeOut('slow');
    });
});





                    