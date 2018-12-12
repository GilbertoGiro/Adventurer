<script>
    $(document).ready(function () {
        let events = JSON.parse('{!! json_encode($events) !!}');

        $('#events-calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title'
            },
            events: events,
            eventClick: function (date, jsEvent, view) {
                let split = date.start.format().split('T');
                let data = {date: split[0], hour: split[1], title: date.title};

                getEventInformation(data);
            }
        });
    });
</script>