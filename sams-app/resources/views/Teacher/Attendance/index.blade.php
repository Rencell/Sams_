<x-layout>

    <div class="h-35 d-flex justify-content-between rounded-bottom text-white System-color">
        <div class="col-3 d-flex flex-column p-4">
            <div class="fs-3">Attendance</div>
            <i class="bi-grid" style="font-size: 5rem"></i>
        </div>
        <div class="col-3 p-4 d-flex flex-column justify-content-between">
            <div>
                <div class="fs-3 text-end">11:40PM</div>
                <div class="fs-3 text-end">Monday 05, 2024</div>
            </div>
            <div>
                
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow m-3 mb-5">
                    <div class="card-header text-bold">
                        Attendance Logs
                    </div>
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <th scope="row">{{ $attendance->subject->name }}</th>
                                    <td>{{ $attendance->date_attendance }}</td>


                                    <td class="d-flex"><a href="{{ route('attendance.index', $attendance->id) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-eye-fill"></i></a>
                                        <form method="POST" action="{{ route('attendance.destroyAttendance', $attendance->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm"  onclick="deleteConfirmation(event,this)">
                                                <i class="bi bi-trash"></i>
                                            </button>
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
</x-layout>
