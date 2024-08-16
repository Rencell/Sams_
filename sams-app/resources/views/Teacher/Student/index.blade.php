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
    <div class="container">
        <table id="exampletable" class="table display nowrap" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th scope="col">Stud No.</th>
                    <th scope="col">RFID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Student as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->rfid }}</td>
                        <td>{{ $student->Fname }}</td>
                        <td>{{ $student->Lname }}</td>

                        <td>
                            <div class="d-flex gap-2 align-items-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#updateModal_{{ $student->id }}">Edit</button>
                                {{-- Modal Update --}}
                                @include('Teacher.Student.modals.update-modal', ['Student' => $student])
                                <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    @extends('Teacher.Student.modals.create-modal')


    @push('script')
        <script>
            $(document).ready(function() {

                new DataTable('#exampletable', {
                    layout: {
                        topStart: {
                            buttons: [{
                                    extend: 'copy',
                                    exportOptions: {
                                        columns: ':visible'
                                    }

                                },
                                {
                                    extend: 'excel',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
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
                $('#rfid_create').on('keydown', function(event) {

                    if (event.key === 'Enter'){
                        event.preventDefault();
                        return;
                    }
                    inputBuffer += event.key;
                    $('#rfid_create').val(inputBuffer);
                    
                   
                    
                    

                });
            });
        </script>
    @endpush
</x-layout>
