<script>
    $(document).ready(function(){
        let external = $('.external');

        external.on('change', function(){
            let course = $('.course');
            let value  = $(this).find(':selected').val();

            if(value === 'n'){
                course.show();
            }else{
                course.hide();
            }
        });
        external.trigger('change');
    });
</script>