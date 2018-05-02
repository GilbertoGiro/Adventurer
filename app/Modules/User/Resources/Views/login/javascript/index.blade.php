<script>
    $(document).ready(function(){
        $('.call-forgot-password-modal').on('click', function(event){
            event.preventDefault();

            $.ajax({
                url: '{{ route('user.modal.recovery') }}',

            });
        });
    });
</script>