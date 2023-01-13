const picker = new tempusDominus.TempusDominus(document.getElementById('datetimepicker1'), {
    display: {
        viewMode: 'clock',
        components: {
            calendar: false,
            clock: true,
            minutes: true,
        },
    },
    localization: {
        hourCycle: 'h23'
    },
    restrictions: {
        disabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 19, 20, 21, 22, 23]
    },
    stepping: 60,

});


const picker2 = new tempusDominus.TempusDominus(document.getElementById('datetimepicker2'), {
    display: {
        viewMode: 'clock',
        components: {
            calendar: true,
            clock: true,
            minutes: true,
            seconds: true,
        },
    },
    localization: {
        hourCycle: 'h23'
    },
    restrictions: {
        disabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 19, 20, 21, 22, 23]
    },
    stepping: 60,

});
