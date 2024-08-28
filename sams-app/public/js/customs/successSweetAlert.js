$(document).ready(function () {
    $(".saved").on("click", function (e) {

        swal({
            title: "Good job!",
            text: "The row has been recovered safely",
            icon: "success",
        }).then(() => {

            $('.archivedform').submit();
        });
    });
});
