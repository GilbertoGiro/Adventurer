<script>
    $(document).ready(function(){
        let events = JSON.parse('{!! json_encode($events) !!}');

        $('#events-calendar').fullCalendar({
            header: {
                left   : 'prev,next',
                center : 'title'
            },
            events: events,
            dayClick: function(date, jsEvent, view){
                let day = date.format();

                console.log(day);
            },
            eventClick: function(date, jsEvent, view){
                console.log(date);
            }
        });
    });
</script>