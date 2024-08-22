<x-layout>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow m-3 mb-5">
                    <div class="card-header text-bold">

                        <ul class="nav nav-pills navi">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" onclick="present(this, 1)">Present</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="present(this,2)">Absent</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <h1>Present</h1>
                        <table class="table active" id="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="text-align: left">Student ID.</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentViews as $studentView)
                                    <tr>

                                        <th scope="row" style="text-align: left">{{ $studentView->id }}</th>
                                        <td>{{ $studentView->Fname }}</td>
                                        <td>{{ $studentView->Lname }}</td>

                                        <td>
                                            <form method="POST"
                                                action="{{ route('attendance.destroystudent', ['subj_id' => $attendanceId, 'stud_id' => $studentView->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteConfirmation(event, this)"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col">
                        <h1>Absent</h1>
                        <table class="table" id="table2">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="text-align: left">Student ID.</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student_absents as $student_absent)
                                    <tr>

                                        <th scope="row" style="text-align: left">{{ $student_absent->id }}</th>
                                        <td>{{ $student_absent->Fname }}</td>
                                        <td>{{ $student_absent->Lname }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('attendance.restoreAbsent', ['attendance_id' => $attendanceId, 'student_id' => $student_absent->id]) }}">
                                                @csrf
                                                <input type="hidden" name="attendanceId" value="{{ $attendanceId }}">
                                                <input type="hidden" name="scan_text"
                                                    value="{{ $student_absent->id }}">
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="deleteConfirmation(event, this)"><i
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

    </div>

    <script>
        $('.card .col').hide();
        $('.card .col').eq(0).show();

        function present(element, section) {
            //debug


            $('.navi .nav-link').removeClass('active');
            $(element).addClass('active');

            $('.card .col').hide();

            if (section == 1) {
                $('.card .col').eq(0).show();
            } else {
                $('.card .col').eq(1).show();
            }

            console.log($(element).attr('class'));

        }


        $(document).ready(function() {
          
        });
    </script>
</x-layout>
