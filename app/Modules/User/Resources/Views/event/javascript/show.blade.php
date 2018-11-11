<script>
    $(document).ready(function () {
        $('.apply-participant').on('click', function (event) {
            event.preventDefault();
            let id = $(this).attr('data-id');
            applyParticipantModal(id);
        });
    });

    // Method to get Apply Participant Modal
    function applyParticipantModal(id)
    {
        let request = $.ajax({
            url: '{{ route('user.modal.event.apply') }}',
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
</script>