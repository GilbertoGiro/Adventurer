<script>
    let event_id, notification_id;
    $(document).ready(function () {
        $('.notify-participants').on('click', function (event) {
            event.preventDefault();

            event_id = $(this).attr('data-id');
            notifyParticipantsModal();
        });

        $('.cancel-event').on('click', function (event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            cancelEventModal(id);
        });
    });

    $(document).on('click', '.notify-participants-confirm', function (event) {
        event.preventDefault();

        notification_id = $('#notification_id').find(':selected').val();
        notify();
    });

    // Method to get Cancel Event Modal
    function cancelEventModal(id)
    {
        let request = $.ajax({
            url: '{{ route('admin.modal.cancel.event') }}',
            method: 'GET',
            data: {
                id: id
            }
        });
        request
            .then((response) => {
                if (response.html) {
                    $('.active-modal').html(response.html);
                }
            });
    }

    // Method to get notify participants modal
    function notifyParticipantsModal() {
        let request = $.ajax({
            url: '{{ route('admin.modal.notify.event') }}',
            method: 'GET',
            data: {}
        });
        request
            .then((response) => {
                if (response.html) {
                    $('.active-modal').html(response.html);
                }
            });
    }

    // Method to notify Event participants
    function notify()
    {
        let request = $.ajax({
            url: '{{ url('administrador/notificacoes') }}/' + notification_id + '/enviar/' + event_id,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            }
        });
        request
            .then((response) => {
                let message = treatment.successMessage(response);
                $('.modal').closest('.active-modal').empty();
                $('.notification-container').html(message);
            })
            .catch((error) => {
                let message = treatment.errorMessage(response);
                $('.modal').closest('.active-modal').empty();
                $('.notification-container').html(message);
            });
    }
</script>