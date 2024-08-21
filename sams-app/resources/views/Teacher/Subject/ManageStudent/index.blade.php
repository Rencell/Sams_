<x-layout>
    <div class="container">


        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow m-3 p-2 mb-5">
                        <div class="card-header text-bold d-flex justify-content-between">
                            All Students
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#selectStudentModal">+ Add</button>
                        </div>
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Student No.</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject_students as $subject_student)
                                    <tr>

                                        <td scope="row">{{ $subject_student->id }}</td>
                                        <td scope="row">{{ $subject_student->Fname }}</td>
                                        <td scope="row">{{ $subject_student->Lname }}</td>
                                        <td scope="row"><form method="POST" action="{{ route('subject.deleteStudent',
                                                                                            [ 'subj_id' => $id,
                                                                                              'stud_id' => $subject_student->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteConfirmation(event, this)"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('Teacher.Subject.ManageStudent.modal-select-student');
</x-layout>
