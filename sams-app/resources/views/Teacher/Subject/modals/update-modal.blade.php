<div class="modal fade" id="updateModal_{{ $subject->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Subject</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('subject.update', $subject->id) }}"
                    id="formupdate_{{ $subject->id }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 flex-grow-1">
                        <label for="stud_id" class="form-label">Subject Name: </label>
                        <input type="text" class="form-control" id="subject_name_{{ $subject->id }}"
                            aria-describedby="emailHelp" name="name" value="{{ $subject->name }}">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="mb-3 flex-grow-1">
                        <label for="rfid" class="form-label">Description: </label>
                        <input type="text" class="form-control" id="description_{{ $subject->id }}"
                            aria-describedby="emailHelp" name="description" value="{{ $subject->description }}">
                        <span class="invalid-feedback"></span>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary" onclick="updateForm({{ $subject->id }}, this)">Save changes</button>

            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateForm(subject_id, element) {
        
        var form = $('#formupdate_' + subject_id);

        
        $.ajax({
            url: '/subject/' + subject_id,
            type: 'PUT',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                console.log(response);

                $('#updateModal_' + subject_id).modal('hide');
                location.reload();

            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $('.form-control').removeClass('is-invalid');
                    var errors = xhr.responseJSON.errors;

                    $.each(errors, function(key, messages) {
                        var input = $('#' + key + '_' + subject_id);
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
</script>
