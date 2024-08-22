<x-layout>
    <div class="h-35 d-flex justify-content-between System-color text-white">
        <div class="col-3 d-flex flex-column p-4">
            <div class="fs-3">Admins</div>
            <i class="bi-shield-lock" style="font-size: 5rem"></i>
        </div>
        <div class="col-3 p-4 d-flex flex-column justify-content-between">
            <div>
                <div class="fs-3 text-end">11:40PM</div>
                <div class="fs-3 text-end">Monday 05, 2024</div>
            </div>
            <div>
                <div class="float-end">
                    @if (Auth::user()->isAdmin == '2')
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createModal">+ Create</button>
                        <button class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#archivemodal"><i
                                class="bi bi-archive"></i></button>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow m-3">
                    <div class="card-header text-bold">
                        All Admins
                    </div>
                    <table id="exampletable" class="table display nowrap" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="text-align: left">ID.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                @if (Auth::user()->isAdmin == '2')
                                    <th scope="col">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="text-capitalize" style="text-align: left">{{ $admin->id }}</td>
                                    <td class="text-capitalize">{{ $admin->fname }}</td>
                                    <td class="text-capitalize">{{ $admin->lname }}</td>
                                    @if (Auth::user()->isAdmin == '2')
                                        <td>
                                            <div class="d-flex gap-1 align-items-center">
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#updateModal_{{ $admin->id }}"><i
                                                        class="bi bi-pencil"></i></button>
                                                {{-- modal here --}}
                                                @include('Admin.Admin.Modal.update-modal', [
                                                    'Admin' => $admin,
                                                ])
                                                <form method="POST" action="{{ route('admin.destroy', $admin->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn bg-danger btn-sm"
                                                        onclick="deleteConfirmation(event, this)"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @extends('Admin.Admin.Modal.create-modal')
    @extends('Admin.Admin.Modal.recover')
</x-layout>
