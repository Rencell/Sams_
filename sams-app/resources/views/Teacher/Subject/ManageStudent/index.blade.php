<x-layout>
    <div class="container">

        <div class="float-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selectStudentModal">+ Create</button>
        </div>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Student No.</th>
                    <th scope="col">RFID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subject_students as $subject_student)
                    <tr>

                        <td scope="row">{{ $subject_student->id }}</td>
                        <td scope="row">{{ $subject_student->rfid }}</td>
                        <td scope="row">{{ $subject_student->Fname }}</td>
                        <td scope="row">{{ $subject_student->Lname }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('Teacher.Subject.ManageStudent.modal-select-student');
</x-layout>
