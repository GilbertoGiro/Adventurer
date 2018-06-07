<script>
    $(document).ready(function(){
        $('.approve').on('click', function(event){
            event.preventDefault();

            let request = $.ajax({
                'url': '{{ route('admin.modal.approve.theme') }}',
                'method': 'GET',
                'data': {}
            });

            request
                .then((response) => {
                    if(response.html){
                        $('.active-modal').html(response.html);
                    }
                });
        });
    });
</script>