<script>
    $(document).ready(function(){
        let events = JSON.parse('{!! json_encode($events) !!}');

        $('#events-calendar').fullCalendar({
            header: {
                left   : 'prev,next',
                center : 'title'
            },
            events: events,
            eventClick: function(date, jsEvent, view){
                let split = date.start.format().split('T');
                let data  = {date: split[0], hour: split[1], title: date.title};

                getEventByDate(data, function (event) {
                    window.location.href = '{{ url('usuario/eventos') }}' + '/' + event.id;
                });
            }
        });
    });

    // Method to get Event by date
    function getEventByDate(data, callback)
    {
        let request = $.ajax({
            url: '{{ route('user.ajax.event.show') }}',
            method: 'GET',
            data: data
        });
        request
            .then((response) => {
                callback(response);
            });
    }
</script>