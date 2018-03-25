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
                    start  : '2018-03-18T07:30:00',
                    allDay : true
                },
                {
                    title  : 'Gametech',
                    start  : '2018-03-19T18:00:00',
                    end    : '2018-03-19T19:30:00'
                },
                {
                    title  : 'Arduíno',
                    start  : '2018-03-20T18:00:00',
                    end    : '2018-03-20T19:30:00'
                },
                {
                    title  : 'Python',
                    start  : '2018-03-21T18:00:00',
                    end    : '2018-03-21T19:30:00'
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