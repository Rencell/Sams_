<div class="modal fade" id="archivemodal" tabindex="-1" aria-labelledby="archivemodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="archivemodalLabel">Recovery subjects</h1>
                <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('attendance.archive') }}" id="attendancerecover">
                    @csrf

                    <table class="table" id="example">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Select</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivedAttendances as $archivedAttendance)
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="selected_attendances[]"
                                            value="{{ $archivedAttendance->id }}">
                                    </th>
                                    <td>{{ $archivedAttendance->subject->name }}</td>
                                    <td>{{ $archivedAttendance->date_attendance }}</td>
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
