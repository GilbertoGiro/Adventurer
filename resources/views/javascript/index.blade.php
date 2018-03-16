<script>
    $(document).ready(function(){
        $('#events-calendar').fullCalendar({
            header: {
                left   : 'prev,next',
                center : 'title'
            },
            defaultView: 'basicWeek',
            dayClick: function(date, jsEvent, view){
                var day = date.format();

                console.log(day);
            }
        });
    });
</script>