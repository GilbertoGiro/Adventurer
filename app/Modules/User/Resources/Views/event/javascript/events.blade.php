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

                getEventInformation(data);
            }
        });

        function getEventInformation(data)
        {
            let request = $.ajax({
                url: '{{ route('user.modal.event.show') }}',
                method: 'GET',
                data: data
            });

            request
                .then((response) => {
                    if(response.html){
                        $('.active-modal').html(response.html);
                    }
                });
        }
    });
</script>