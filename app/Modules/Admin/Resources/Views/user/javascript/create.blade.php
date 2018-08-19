<script>
    $(document).ready(function(){
        let external = $('.external');

        external.on('change', function(){
            let course = $('.course');
            let value  = $(this).find(':selected').val();

            if(value === 'n'){
                course.show();
                course.find('select').addClass('required');
            }else{
                course.hide();
                course.find('select').removeClass('required');
            }
        });
        external.trigger('change');
    });
</script>