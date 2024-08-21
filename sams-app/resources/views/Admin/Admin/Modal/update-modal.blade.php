<div class="modal fade" id="updateModal_{{ $Admin->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update {{ $Admin->fname }}</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form id="updateform_{{ $Admin->id }}" action="{{route('admin.update', $Admin->id)}}">
                    @csrf


                    <div class="d-flex gap-2">
                        <div class="mb-3  flex-grow-1">
                            <label for="fname" class="form-label">First Name: </label>
                            <input type="text" class="form-control" id="fname_{{ $Admin->id }}"
                                aria-describedby="emailHelp" name="fname" value="{{ $Admin->fname }}">
                            <span class="invalid-feedback"></span>
                        </div>


                        <div class="mb-3 flex-grow-1">
                            <label for="lname" class="form-label">Last Name: </label>
                            <input type="text" class="form-control" id="lname_{{ $Admin->id }}"
                                aria-describedby="emailHelp" name="lname" value="{{ $Admin->lname }}">
                            <span class="invalid-feedback"></span>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="text" class="form-control" id="email_{{ $Admin->id }}"
                            aria-describedby="emailHelp" name="email" value="{{ $Admin->email }}">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="d-flex gap-2">
                        <div class="mb-3 flex-grow-1">
                            <label for="birth_date" class="form-label">Birth Date: </label>
                            <input type="date" class="form-control" id="birth_date_{{ $Admin->id }}"
                                aria-describedby="emailHelp" name="birth" value="{{ $Admin->birth }}">
                            <span class="invalid-feedback"></span>
                        </div>


                        <div class="form-group mb-3 flex-grow-1">
                            <label for="gender" class="form-label">Gender: </label>
                            <select class="form-control" id="gender_{{ $Admin->id }}" name="gender">
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

                <button type="submit" class="btn btn-primary" onclick="updateForm({{ $Admin->id }})">Save
                    changes</button>

            </div>


        </div>
    </div>
</div>

