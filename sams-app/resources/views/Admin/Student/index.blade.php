<x-layout>

    <div class="h-35 d-flex justify-content-between System-color text-white">
        <div class="col-3 d-flex flex-column p-4">
            <div class="fs-3">Students</div>
            <i class="bi-people" style="font-size: 5rem"></i>
        </div>
        <div class="col-auto p-4 d-flex flex-column justify-content-between">
            <div>
                <div class="fs-3 text-end" id="current_time">11:40PM</div>
                <div class="fs-3 text-end" id="current_date">Monday 05, 2024</div>
            </div>
            <div>
                <div class="float-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal"
                        onclick="focusField()">+Create</button>
                    <button class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#archivemodal"><i
                            class="bi bi-archive"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow m-3">
                    <div class="card-header text-bold">
                        All Students
                    </div>
                    <table id="table" class="table display nowrap" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="text-align: left">Stud No.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Student as $student)
                                <tr>
                                    <td class="text-capitalize" style="text-align: left">{{ $student->id }}</td>
                                    <td class="text-capitalize">{{ $student->Fname }}</td>
                                    <td class="text-capitalize">{{ $student->Lname }}</td>
                                    <td>
                                        <div class="d-flex gap-1 align-items-center">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#updateModal_{{ $student->id }}"><i
                                                    class="bi bi-pencil"></i></button>
                                            {{-- Modal Update --}}
                                            @include('Admin.Student.modals.update-modal', [
                                                'Student' => $student,
                                            ])
                                            <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn bg-danger btn-sm"
                                                    onclick="deleteConfirmation(event, this)"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @extends('Admin.Student.modals.create-modal')
    @extends('Admin.Student.modals.recover')


    @push('script')
        <script>
           
            $(document).ready(function() {


                let inputBuffer = '';
                // automatically scans the rfid input
                $('#stud_id_create').on('keydown', function(event) {

                    if (event.key === 'Enter') {
                        event.preventDefault();
                        return;
                    }

                    if (event.key === 'Backspace') {

                        event.preventDefault();
                        inputBuffer = inputBuffer.slice(0, -1);
                        $(this).val(inputBuffer);
                        return;
                    }

                    $('#stud_id_create').val( inputBuffer.replace(/^0+/, ''));
                    inputBuffer += event.key;




                });
            });
        </script>
    @endpush
</x-layout>
