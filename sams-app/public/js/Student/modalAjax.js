
$(document).ready(function(){
    
    $("#formmodal").on('submit', function(e){
        e.preventDefault();
        
        $.ajax({
            url: '{{route("student.store")}}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                
                $('#createModal').modal('hide');
                location.reload();
            },
            error: function(response){
                
                $('.form-control').removeClass('is-invalid');
                var errors = response.responseJSON.errors;
                
                $.each(errors, function(key, messages){
                    input = $('#'+key);
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').text(messages);
                });
                
            }
        });
    });


    $('.close-button').on('click', function(){
        $('.form-control').removeClass('is-invalid');
    });
});