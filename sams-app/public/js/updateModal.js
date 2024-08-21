function updateForm(student_id) {
    

    var form = $('#updateform_' + student_id);

    $.ajax({
        url: form.attr('action'),
        type: 'PUT',
        data: form.serialize(),
        dataType: 'json',
        success: function(response) {
            console.log(response);

            $('#updateModal_' + student_id).modal('hide');
            swal({
                title: "Good job!",
                text: response.message,
                icon: "success"
            })
            .then((click) => {
                if (click) {
                    location.reload();
                }
            });


        },
        error: function(xhr) {
            console.log(xhr);
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $('.form-control').removeClass('is-invalid');
                var errors = xhr.responseJSON.errors;

                $.each(errors, function(key, messages) {
                    var input = $('#' + key + '_' + student_id);
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').text(messages);
                });
            } else {
                console.error('Unexpected error structure:', xhr);
            }
        }
    });
}

$(document).ready(function() {




    $('.close-button').on('click', function() {
        $('.form-control').removeClass('is-invalid');
    });
});