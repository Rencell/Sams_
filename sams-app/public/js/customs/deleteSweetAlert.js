function deleteConfirmation(event, button) {
    event.preventDefault();
    const form = button.closest("form");
    if (form) {
        swal({
            title: "Are you sure?",
            text: "This will be deleted in the list",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("The item has been deleted", {
                icon: "success",
              });
              form.submit();
            } 
          });
    }
   
}

$(document).ready(function () {});
