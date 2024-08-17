<x-layout>
    <div class="container">



        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <th scope="row">{{$attendance->subject->name}}</th>
                        <td>{{$attendance->date_attendance}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-layout>
