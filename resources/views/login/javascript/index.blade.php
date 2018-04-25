<script>
    $(document).ready(function(){
        $('.external').on('change', function(){
            let course = $('.course');
            let value  = $(this).find(':selected').val();

            if(value === 'n'){
                course.show();
            }else{
                course.hide();
            }
        });
    });
</script>