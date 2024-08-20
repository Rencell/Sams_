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
                <form method="POST" action="{{ route('subject.archive') }}" id="subjectrecover">
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
                            @foreach ($ArchivedSubjects as $ArchivedSubject)
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="selected_people[]" value="{{$ArchivedSubject->id}}">
                                    </th>
                                    <td>{{ $ArchivedSubject->name }}</td>
                                    <td>{{ $ArchivedSubject->description }}</td>
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