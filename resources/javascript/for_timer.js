$('#selected_time').on('click', function(){
    $('.title-container').addClass('hidden');
    $('.content').addClass('hidden');
    $('.timer-values').removeClass('hidden');
    $('.timer-value-selected')[0].scrollIntoView({block: "center", behavior: "smooth"});
});
$('.timer-value').on('click', function(){
    $('.timer-value-selected').removeClass('timer-value-selected');
    $(this).addClass('timer-value-selected');
    $('#selected_time').html($(this).text());
    $('.title-container').removeClass('hidden');
    $('.content').removeClass('hidden');
    $('.timer-values').addClass('hidden');
});
function myTimer(){
    let time = '';
    let sec = '';
    let minute = '';
    let timer = setInterval(function() {
        time = $('#selected_time').text().split(':');
        if(time[1] === '00'){
            sec = '59';
        }else{
            if((parseInt(time[1], 10) - 1) < 10){
                sec = '0'+(parseInt(time[1], 10) - 1).toString();
            }else{
                sec = (parseInt(time[1], 10) - 1).toString();
            }
        }
        if(time[1] === '00'){
            if((parseInt(time[0], 10) - 1) < 10){
                minute = '0'+(parseInt(time[0], 10) - 1).toString();
            }else{
                minute = (parseInt(time[0], 10) - 1).toString();
            }
        }else{
            minute = time[0];
        }
        if(minute === '00' && sec === '00'){
            meditationEnd(timer);
        }
        $('#selected_time').html(minute+':'+sec);
    }, 1000);
    return timer;
}
$('#start_but').on('click', function (){
    $('#selected_time').unbind( "click" );
    $(this).addClass('hidden');
    $('#music').addClass('hidden');
    $('.button-end').removeClass('hidden');
    $('.button-pause').removeClass('hidden');
    let timer = myTimer();
    $('.button-pause').click({timer:timer }, function (e){
        clearInterval(e.data.timer);
        $(this).addClass('hidden');
        $('#reset_pause').removeClass('hidden');
    });
    $('.button-end').click({timer:timer }, function (e){
        meditationEnd(e.data.timer);
    });
});
$('#reset_pause').on('click', function (){
    $(this).addClass('hidden');
    $('.button-pause').removeClass('hidden');
    let timer = myTimer();
    $('.button-pause').click({timer:timer }, function (e){
        clearInterval(e.data.timer);
        $(this).addClass('hidden');
        $('#reset_pause').removeClass('hidden');
    });
    $('.button-end').click({timer:timer }, function (e){
        meditationEnd(e.data.timer);
    });
});
function meditationEnd(timerId){
    clearInterval(timerId);
    let selectedTime = $('.timer-value-selected').text().split(':');
    let currentTime = $('#selected_time').text().split(':');
    let minutes = parseInt(selectedTime[0], 10) - parseInt(currentTime[0], 10);
    let seconds = (parseInt(selectedTime[1], 10) - parseInt(currentTime[1], 10))*(-1);
    if(seconds >= 29){
        minutes = minutes - 1;
    }
    let time = minutes+'.'+seconds;
    $.redirect("/meditation_result/", {time: time}, "POST");
}