<script>
    $(document).ready(function(){
        $('.summernote').summernote({
            height: 180,
            focus: false,
            resize: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']]
            ],
            disableResizeEditor: true
        });
    });
</script>