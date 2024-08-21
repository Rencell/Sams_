function createModal() {
    var form = $("#formmodal");
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
        success: function (response) {
            $("#createModal").modal("hide");
            swal({
                title: "Good job!",
                text: "Successfully created!",
                icon: "success"
            })
            .then((click) => {
                if (click) {
                    location.reload();
                }
            });
        },
        error: function (response) {
            $(".form-control").removeClass("is-invalid");
            var errors = response.responseJSON.errors;

            $.each(errors, function (key, messages) {
                input = $("#" + key + "_create");
                input.addClass("is-invalid");
                input.next(".invalid-feedback").text(messages);
            });
        },
    });
}

$(document).ready(function () {
    $(".close-button").on("click", function () {
        $(".form-control").removeClass("is-invalid");
    });
});
