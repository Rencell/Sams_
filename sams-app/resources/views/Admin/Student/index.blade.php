<x-layout>

    <div class="h-35 d-flex justify-content-between" style="background-color: #3a3637; color: white">
        <div class="col-3 d-flex flex-column p-4">
            <div class="fs-3">Students</div>
            <i class="bi-people" style="font-size: 5rem"></i>
        </div>
        <div class="col-3 p-4 d-flex flex-column justify-content-between">
            <div>
                <div class="fs-3 text-end">11:40PM</div>
                <div class="fs-3 text-end">Monday 05, 2024</div>
            </div>
            <div>
                <div class="float-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#createModal">+Create</button>
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
                    <table id="exampletable" class="table display nowrap" style="width:100%">
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
                                                <button type="submit" class="btn bg-danger btn-sm"><i
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


    @push('script')
        <script>
            $(document).ready(function() {

                new DataTable('#exampletable', {

                    ordering: false,
                    layout: {
                        topStart: {
                            buttons: [{
                                    extend: 'copy',
                                    exportOptions: {
                                        columns: ':visible',
                                        columns: [0, 1, 2]
                                    }

                                },
                                {
                                    extend: 'excel',
                                    exportOptions: {
                                        columns: ':visible',
                                        columns: [0, 1, 2]
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    exportOptions: {
                                        columns: [0, 1, 2]
                                    },
                                    customize: function(doc) {
                                        doc.content[1].table.widths = '*'.repeat(doc.content[1].table
                                            .body[0].length).split('');
                                    }
                                }
                            ]
                        }
                    }
                });

                // Create Modal
                $("#formmodal").on('submit', function(e) {

                    e.preventDefault();
                    $.ajax({
                        url: '{{ route('student.store') }}',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {

                            $('#createModal').modal('hide');
                            location.reload();
                        },
                        error: function(response) {

                            $('.form-control').removeClass('is-invalid');
                            var errors = response.responseJSON.errors;

                            $.each(errors, function(key, messages) {
                                input = $('#' + key + '_create');
                                input.addClass('is-invalid');
                                input.next('.invalid-feedback').text(messages);
                            });

                        }
                    });
                });


                $('.close-button').on('click', function() {
                    $('.form-control').removeClass('is-invalid');
                });

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

                    $('#stud_id_create').val(inputBuffer);
                    inputBuffer += event.key;




                });
            });
        </script>
    @endpush
</x-layout>
