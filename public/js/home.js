$(document).ready(function () {
    $('.parallax').parallax();
    $("html, body").animate({scrollTop: 0}, "fast");

    $(window).scroll(function () {
        let wS = $(this).scrollTop(),
            block2offset = $('#block2').offset().top,
            block3offset = $('#block3').offset().top,
            toggledClass = wS > 100 ? '.top' : '.down';

        $(toggledClass).toggleClass("top down");

        $("#nav a").removeClass("focused");
        if (wS > 50 && wS + 150 < block2offset) $("#nav a[data-block='#block1']").addClass("focused");
        else if (wS > 50 && wS + 150 < block3offset) $("#nav a[data-block='#block2']").addClass("focused");
        else if (wS > 50) $("#nav a[data-block='#block3']").addClass("focused");
    });

    $('#nav a, footer .footer-links a').click(function () {
        let block = $(this).attr('data-block');
        $('html, body').animate({
            scrollTop: $(block).offset().top - 70
        }, 500);
    });

    let week = ['DIMANCHE', 'LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI'];
    let fullDateTraining = new Date("02/27/2018");
    let secToTraining = fullDateTraining.getTime();
    let $nextTrainingDate = $('#clock p#nextTrainingDate');
    let $remainingHourDays = $('#clock p#remainingHourDays');
    let $remainingSecs = $('#clock p#remainingSecs');

    setInterval(function (week, fullDateTraining, secToTraining, $nextTrainingDate, $remainingHourDays, $remainingSecs) {
        let today = new Date().getTime();
        let diff = (secToTraining - today) / 1000;
        let secleft = Math.round(diff);
        let hourleft = Math.round(diff / 3600);
        let dayleft = ((diff / 3600) / 24).toFixed(5).replace('.',',');
        $remainingHourDays.text(hourleft + " heures (" + dayleft + " jours)");
        $remainingSecs.text(secleft+"s");
        $nextTrainingDate.text(week[fullDateTraining.getDay()] + ' ' + zeroPadding(fullDateTraining.getDate(), 2) + '-' + zeroPadding(fullDateTraining.getMonth() + 1, 2) + '-' + zeroPadding(fullDateTraining.getFullYear(), 4))

    }, 1000, week, fullDateTraining, secToTraining, $nextTrainingDate, $remainingHourDays, $remainingSecs);

    let today = new Date().getTime();
    let diff = (secToTraining - today) / 1000;
    let secleft = Math.round(diff);
    $('.clock2').FlipClock(secleft, {
        countdown: true
    });

});


function zeroPadding(num, digit) {
    let zero = '';
    for (let i = 0; i < digit; i++) {
        zero += '0';
    }
    return (zero + num).slice(-digit);
}