<x-layout>
    <div class="h-35 d-flex justify-content-between System-color text-white">
        <div class="col-3 d-flex flex-column p-4">
            <div class="fs-3">Teachers</div>
            <i class="bi-person-badge" style="font-size: 5rem"></i>
        </div>
        <div class="col-3 p-4 d-flex flex-column justify-content-between">
            <div>
                <div class="fs-3 text-end">11:40PM</div>
                <div class="fs-3 text-end">Monday 05, 2024</div>
            </div>
            <div>
                <div class="float-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">+
                        Create</button>
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
                        All Teachers
                    </div>
                    <table id="exampletable" class="table display nowrap" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="text-align: left">id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="text-capitalize" style="text-align: left">{{ $teacher->id }}</td>
                                    <td class="text-capitalize">{{ $teacher->fname }}</td>
                                    <td class="text-capitalize">{{ $teacher->lname }}</td>
                                    <td>
                                        <div class="d-flex gap-1 align-items-center">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#updateModal_{{ $teacher->id }}"><i
                                                    class="bi bi-pencil"></i></button>
                                            {{-- Modal Update --}}
                                            @include('Admin.Teacher.Modal.update-modal', [
                                                'Teacher' => $teacher,
                                            ])
                                            <form method="POST" action="{{ route('admin-teacher.destroy', $teacher->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="buttton" class="btn bg-danger btn-sm" onclick="deleteConfirmation(event, this)"><i
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


    @extends('Admin.Teacher.Modal.create-modal')
    @extends('Admin.Teacher.Modal.recover')
</x-layout>
