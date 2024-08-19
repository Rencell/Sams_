<x-layout>

    <div class="h-35 d-flex justify-content-between rounded-bottom text-white System-color">
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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">+
                        Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow m-3 mb-5">
                    <div class="card-header text-bold">
                        All Subjects
                    </div>
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">SUBJECT NAME</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Subjects as $subject)
                                <tr>
                                    <th scope="row">{{ $subject->id }}</th>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->description }}</td>
                                    <td>{{ $subject->student()->count() }}</td>

                                    <td class="d-flex ">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#updateModal_{{ $subject->id }}"><i
                                                class="bi bi-pencil"></i></button>
                                        {{-- UPDATE MODAL --}}
                                        @include('Teacher.Subject.modals.update-modal', [
                                            'subject' => $subject,
                                        ])

                                        <a href="/subject/{{ $subject->id }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-eye-fill"></i></a>

                                        <form method="POST" action="{{ route('subject.destroy', $subject->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @extends('Teacher.Subject.modals.create-modal')


</x-layout>
