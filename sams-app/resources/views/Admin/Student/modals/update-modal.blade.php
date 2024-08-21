<div class="modal fade" id="updateModal_{{ $student->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update {{ $student->Fname }}</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- problem here --}}
                <form id="updateform_{{ $student->id }}" action="{{route('student.update', $student->id)}}">
                    @csrf
                    <div class="mb-3 flex-grow-1">
                        <label for="id" class="form-label">Student ID.</label>
                        <input type="text" class="form-control" id="id_{{ $student->id }}"
                            aria-describedby="emailHelp" name="id" value="{{ $student->id }}">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="d-flex gap-2">
                        <div class="mb-3  flex-grow-1">
                            <label for="fname" class="form-label">First Name: </label>
                            <input type="text" class="form-control" id="fname_{{ $student->id }}"
                                aria-describedby="emailHelp" name="fname" value="{{ $student->Fname }}">
                            <span class="invalid-feedback"></span>
                        </div>


                        <div class="mb-3 flex-grow-1">
                            <label for="lname" class="form-label">Last Name: </label>
                            <input type="text" class="form-control" id="lname_{{ $student->id }}"
                                aria-describedby="emailHelp" name="lname" value="{{ $student->Lname }}">
                            <span class="invalid-feedback"></span>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="text" class="form-control" id="email_{{ $student->id }}"
                            aria-describedby="emailHelp" name="email" value="{{ $student->email }}">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="d-flex gap-2">
                        <div class="mb-3 flex-grow-1">
                            <label for="birth_date" class="form-label">Birth Date: </label>
                            <input type="date" class="form-control" id="birth_date_{{ $student->id }}"
                                aria-describedby="emailHelp" name="birth_date" value="{{ $student->birth_date }}">
                            <span class="invalid-feedback"></span>
                        </div>


                        <div class="form-group mb-3 flex-grow-1">
                            <label for="gender" class="form-label">Gender: </label>
                            <select class="form-control" id="gender_{{ $student->id }}" name="gender">
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

                <button type="submit" class="btn btn-primary" onclick="updateForm({{ $student->id }})">Save
                    changes</button>

            </div>


        </div>
    </div>
</div>
