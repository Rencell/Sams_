<div class="modal fade" id="updateModal_{{ $teacher->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update {{ $teacher->Fname }}</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form id="updateform_{{ $teacher->id }}" action="{{route('admin-teacher.update', $teacher->id)}}">
                    @csrf


                    <div class="d-flex gap-2">
                        <div class="mb-3  flex-grow-1">
                            <label for="fname" class="form-label">First Name: </label>
                            <input type="text" class="form-control" id="fname_{{ $teacher->id }}"
                                aria-describedby="emailHelp" name="fname" value="{{ $teacher->fname }}">
                            <span class="invalid-feedback"></span>
                        </div>


                        <div class="mb-3 flex-grow-1">
                            <label for="lname" class="form-label">Last Name: </label>
                            <input type="text" class="form-control" id="lname_{{ $teacher->id }}"
                                aria-describedby="emailHelp" name="lname" value="{{ $teacher->lname }}">
                            <span class="invalid-feedback"></span>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="text" class="form-control" id="email_{{ $teacher->id }}"
                            aria-describedby="emailHelp" name="email" value="{{ $teacher->email }}">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="d-flex gap-2">
                        <div class="mb-3 flex-grow-1">
                            <label for="birth_date" class="form-label">Birth Date: </label>
                            <input type="date" class="form-control" id="birth_date_{{ $teacher->id }}"
                                aria-describedby="emailHelp" name="birth" value="{{ $teacher->birth }}">
                            <span class="invalid-feedback"></span>
                        </div>


                        <div class="form-group mb-3 flex-grow-1">
                            <label for="gender" class="form-label">Gender: </label>
                            <select class="form-control" id="gender_{{ $teacher->id }}" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Prefer not to say</option>
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary" onclick="updateForm({{ $teacher->id }})">Save
                    changes</button>

            </div>


        </div>
    </div>
</div>

