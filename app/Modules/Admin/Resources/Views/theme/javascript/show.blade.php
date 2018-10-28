<script>
    $(document).ready(function () {
        $('.approve').on('click', function (event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            let request = $.ajax({
                url: '{{ route('admin.modal.approve.theme') }}',
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
        });

        $('.disapprove').on('click', function (event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            let request = $.ajax({
                url: '{{ route('admin.modal.disapprove.theme') }}',
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
        });
    });
</script>