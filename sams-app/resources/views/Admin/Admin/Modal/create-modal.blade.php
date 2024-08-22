<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Create Admin</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.store') }}" id="formmodal" autocomplete="off" >
                    @csrf

                    <div class="d-flex gap-2">
                        <div class="mb-3  flex-grow-1">
                            <label for="fname" class="form-label">First Name: </label>
                            <input type="text" class="form-control" id="fname_create" aria-describedby="emailHelp"
                                name="fname">
                            <h5 class="invalid-feedback"></h5>
                        </div>


                        <div class="mb-3 flex-grow-1">
                            <label for="lname" class="form-label">Last Name: </label>
                            <input type="text" class="form-control" id="lname_create" aria-describedby="emailHelp"
                                name="lname">
                            <h5 class="invalid-feedback"></h5>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="text" class="form-control" id="email_create" aria-describedby="emailHelp"
                            name="email">
                        <h5 class="invalid-feedback"></h5>
                    </div>


                    <div class="d-flex gap-2">
                        <div class="mb-3 flex-grow-1">
                            <label for="birth" class="form-label">Birth Date: </label>
                            <input type="date" class="form-control" id="birth_create" aria-describedby="emailHelp"
                                name="birth">
                            <h5 class="invalid-feedback"></h5>
                        </div>


                        <div class="form-group flex-grow-1">
                            <label for="gender" class="form-label">Gender: </label>
                            <select class="form-control" id="gender_create" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Prefer not to say</option>
                            </select>
                            <h5 class="invalid-feedback"></h5>
                        </div>

                    </div>

                    <hr class="bg-dark fs-4">

                    <div class="mb-3 flex-grow-1">
                        <label for="password" class="form-label">Password </label>
                        <input type="text" class="form-control" id="password_create" aria-describedby="emailHelp"
                            name="password">
                        <h5 class="invalid-feedback"></h5>
                    </div>
                    <div class="mb-3 flex-grow-1">
                        <label for="confirm_password" class="form-label">Confirm Password: </label>
                        <input type="text" class="form-control" id="confirm_password_create" aria-describedby="emailHelp"
                            name="confirm_password">
                        <h5 class="invalid-feedback"></h5>
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

<script>
   
</script>
