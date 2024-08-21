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
                    id="updateform_{{ $subject->id }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 flex-grow-1">
                        <label for="stud_id" class="form-label">Subject Name: </label>
                        <input type="text" class="form-control" id="name_{{ $subject->id }}"
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

                <button type="button" class="btn btn-primary" onclick="updateForm({{ $subject->id }}, this)">Save
                    changes</button>

            </div>
            </form>
        </div>
    </div>
</div>

