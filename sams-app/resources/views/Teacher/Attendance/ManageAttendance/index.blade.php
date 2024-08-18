<x-layout>
    <div class="container">
        
        <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" onclick="present(this)">Present</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="present(this)">Absent</a>
            </li>
        </ul>
        <table class="table active">
            <thead class="table-light">
                <tr>
                    <th scope="col">Student ID.</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($studentViews as $studentView)
                    <tr>
                        
                        <th scope="row">{{ $studentView->id }}</th>
                        <td>{{ $studentView->Fname }}</td>
                        <td>{{ $studentView->Lname }}</td>
                        <td><button class="btn btn-danger btn-sm"><i
                                    class="bi bi-trash-fill"></i></button></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1>Absents</h1>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Student ID.</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($student_absents as $student_absent)
                    <tr>
                        
                        <th scope="row">{{ $student_absent->id }}</th>
                        <td>{{ $student_absent->Fname }}</td>
                        <td>{{ $student_absent->Lname }}</td>
                        <td><button class="btn btn-danger btn-sm"><i
                                    class="bi bi-trash-fill"></i></button></td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

    <script>
        function present(element){
            //debug
            $('.nav-link').removeClass('active');
            $(element).addClass('active');

            $('.table').hide();

            console.log($(element).attr('class'));
            
        }
    </script>
</x-layout>
