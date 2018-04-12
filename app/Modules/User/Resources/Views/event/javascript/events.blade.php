<script>
    $(document).ready(function(){
        $('#events-calendar').fullCalendar({
            header: {
                left   : 'prev,next',
                center : 'title'
            },
            events: [
                {
                    title  : 'Semana de Tecnologia',
                    start  : '2018-04-12T07:30:00',
                    allDay : true
                },
                {
                    title  : 'Gametech',
                    start  : '2018-04-15T18:00:00',
                    end    : '2018-04-15T19:30:00'
                },
                {
                    title  : 'Arduíno',
                    start  : '2018-04-18T18:00:00',
                    end    : '2018-04-18T19:30:00'
                },
                {
                    title  : 'Python',
                    start  : '2018-04-21T18:00:00',
                    end    : '2018-04-21T19:30:00'
                }
            ],
            dayClick: function(date, jsEvent, view){
                var day = date.format();

                console.log(day);
            },
            eventClick: function(date, jsEvent, view){
                console.log(date);
            }
        });
    });
</script>