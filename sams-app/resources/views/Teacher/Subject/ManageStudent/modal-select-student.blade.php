<div class="modal fade" id="selectStudentModal" tabindex="-1" aria-labelledby="selectStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="selectStudentModalLabel">Select Students</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('subject.studentstore', ['id' => $id]) }}" id="formcreate">
                    @csrf

                    <table class="table" id="tableSelect">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Select</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="selected_people[]" value="{{$student->id}}">
                                    </th>
                                    <td>{{ $student->Fname }}</td>
                                    <td>{{ $student->Lname }}</td>
                                    <td>{{ $student->gender }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>

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
    $(document).ready(function() {
        new DataTable('#tableSelect', {
            ordering: false,
            info: false,
            lengthChange: false,
        });
    });
</script>
