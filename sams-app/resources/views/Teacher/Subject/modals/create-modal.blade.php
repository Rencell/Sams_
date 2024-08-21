<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Create Subject</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('subject.store') }}" id="formmodal">
                    @csrf

                    <div class="mb-3 flex-grow-1">
                        <label for="stud_id" class="form-label">Subject Name: </label>
                        <input type="text" class="form-control" id="subject_name_create" aria-describedby="emailHelp"
                            name="subject_name">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="mb-3 flex-grow-1">
                        <label for="rfid" class="form-label">Description: </label>
                        <input type="text" class="form-control" id="description_create" aria-describedby="emailHelp"
                            name="description">
                        <span class="invalid-feedback"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary" onclick="createModal()">Save changes</button>

            </div>
            
        </div>
    </div>
</div>
