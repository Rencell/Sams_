<div class="modal fade" id="archivemodal" tabindex="-1" aria-labelledby="archivemodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="archivemodalLabel">Recovery students</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('student-admin.archive') }}" id="studentrecover">
                    @csrf

                    <table class="table" id="example">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Select</th>
                                <th scope="col">Stud no.</th>
                                <th scope="col">first name</th>
                                <th scope="col">last Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivedStudents as $archivedStudent)
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="selected_students[]"
                                            value="{{ $archivedStudent->id }}">
                                    </th>
                                    <td>{{ $archivedStudent->id }}</td>
                                    <td>{{ $archivedStudent->Fname }}</td>
                                    <td>{{ $archivedStudent->Lname }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-danger">Recover</button>

            </div>
            </form>
        </div>
    </div>
</div>
