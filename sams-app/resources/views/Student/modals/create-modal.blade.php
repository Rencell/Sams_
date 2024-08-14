<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Create Student</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('student.store') }}" id="formmodal">
                    @csrf
                    
                    <div class="d-flex gap-2">
                        <div class="mb-3 flex-grow-1">
                            <label for="stud_id" class="form-label">Student ID.</label>
                            <input type="text" class="form-control" id="stud_id_create" aria-describedby="emailHelp"
                                name="stud_id">
                            <span class="invalid-feedback"></span>
                        </div>
                        

                        <div class="mb-3 flex-grow-1">
                            <label for="rfid" class="form-label">RFID: </label>
                            <input type="text" class="form-control" id="rfid_create" aria-describedby="emailHelp"
                                name="rfid">
                                <span class="invalid-feedback"></span>
                        </div>
                        
                    </div>

                    <div class="d-flex gap-2">
                        <div class="mb-3  flex-grow-1">
                            <label for="fname" class="form-label">First Name: </label>
                            <input type="text" class="form-control" id="fname_create" aria-describedby="emailHelp"
                                name="fname">
                                <span class="invalid-feedback"></span>
                        </div>
                        

                        <div class="mb-3 flex-grow-1">
                            <label for="lname" class="form-label">Last Name: </label>
                            <input type="text" class="form-control" id="lname_create" aria-describedby="emailHelp"
                                name="lname">
                                <span class="invalid-feedback"></span>
                        </div>
                       
                    </div>

                    <div class="mb-3">
                        <label for="s_email" class="form-label">Email: </label>
                        <input type="text" class="form-control" id="s_email_create" aria-describedby="emailHelp"
                            name="s_email">
                        <span class="invalid-feedback"></span>
                    </div>
                    

                    <div class="d-flex gap-2">
                        <div class="mb-3 flex-grow-1">
                            <label for="birth" class="form-label">Birth Date: </label>
                            <input type="date" class="form-control" id="birth_create" aria-describedby="emailHelp"
                                name="birth">
                            <span class="invalid-feedback"></span>
                        </div>
                       

                        <div class="form-group mb-3 flex-grow-1">
                            <label for="gender" class="form-label">Gender: </label>
                            <select class="form-control" id="gender_create" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Prefer not to say</option>
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>
                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Save changes</button>

            </div>
            </form>
        </div>
    </div>
</div>

<script>
    
   
</script>
