<x-layout>

    <div class="h-35 d-flex justify-content-between" style="background-color: #3a3637; color: white">
        <div class="col-3 d-flex flex-column p-4">
            <div class="fs-3">Subjects</div>
            <i class="bi-book" style="font-size: 5rem"></i>
        </div>
        <div class="col-3 p-4 d-flex flex-column justify-content-between">
            <div>
                <div class="fs-3 text-end">11:40PM</div>
                <div class="fs-3 text-end">Monday 05, 2024</div>
            </div>
            <div>
                <div class="float-end">
                    <button type="button" class="btn btn-success"  data-bs-toggle="modal"
                    data-bs-target="#createModal">+ Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Subjects as $subject)
                <tr>
                    <th scope="row">{{$subject->id}}</th>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->description}}</td>
                    <td>
                        <button class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button>
                        <a href="/subject/{{$subject->id}}" class="btn btn-warning btn-sm"><i class="bi bi-eye-fill"></i></a>
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @extends('Teacher.Subject.modals.create-modal');

    
</x-layout>
