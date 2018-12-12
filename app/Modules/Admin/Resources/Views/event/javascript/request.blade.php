<script>
    $(document).ready(function () {
        $('.approve').on('click', function (event) {
            event.preventDefault();

            let request = $.ajax({
                url: '{{ route('') }}',
                method: 'GET',
                data: {}
            });
        });
    });
</script>