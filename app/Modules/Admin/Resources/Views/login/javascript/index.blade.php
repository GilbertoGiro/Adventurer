<script>
    $(document).ready(function(){
        $('.call-forgot-password-modal').on('click', function(event){
            event.preventDefault();

            let request = $.ajax({
                url: '{{ route('user.modal.recovery') }}',
                method: 'GET',
                data: {}
            });

            request
                .then((response) => {
                    if(response.html){
                        $('.active-modal').html(response.html);
                    }
                })
                .catch((error) => {
                    // Do nothing
                });
        });
    });
</script>