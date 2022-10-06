/**
 * Created by user on 8/6/16.
 */
$(document).ready(function () {

    flatpickr('#disableRangeMultiple', {

        disable:
            [
                { 'from' : new Date().fp_incr(3) , 'to' : new Date().fp_incr(3)  },
                { 'from' : new Date().fp_incr(5) , 'to' : new Date().fp_incr(5)  },
                { 'from' : new Date().fp_incr(7) , 'to' : new Date().fp_incr(10)  }
            ],
        minDate: "today",
        dateFormat: 'Y-m-d'

    });

    var check_in = flatpickr("#check_in_date", {minDate: new Date(), onChange:function (d) {
            check_out.set("minDate", d[0].fp_incr(1));
        }
    });
    var check_out = flatpickr("#check_out_date", {minDate: new Date(), onChange:function (d) {
            check_in.set("maxDate", d[0]);
        }
    });


    $('.datepicker1').pickadate();
    $('.timepicker').pickatime();

    var calendars = flatpickr(".flatpickr");
    flatpickr(".calendar");

    flatpickr('#preload', {
        enableTime: true,
        defaultDate:"2018-04-20 09:00",
        dateFormat: "Y-m-d h:i K"
    });
    flatpickr('#rangeflat', {
        mode:'range'
    });
    flatpickr('#multiple', {
        mode: "multiple",
        dateFormat: "Y-m-d"
    });
    flatpickr('#textual', {
        dateFormat: "l, F j, Y"
    });
    flatpickr('#display', {
        dateFormat: 'Y-m-d',
        weekNumbers: true

    });
    flatpickr('#min_max', {
        minDate: "today",
        maxDate: new Date().fp_incr(14) ,
        dateFormat: 'Y-m-d'
    });
    flatpickr('#datetimepicker', {
        time_24hr: true,
        altFormat:"F d, Y H:i",
        enableTime: true,
        minDate: 'today',
    });
    flatpickr('#timepicker', {
        enableTime: true,
        noCalendar: true,
        defaultDate:"09:00",

        dateFormat: "h:i K"
    });
    flatpickr('#alt', {
        dateFormat: 'F j Y',
        onChange:function(obj, str){
            document.querySelector("#realdate").innerText = str;
        }
    });



});
