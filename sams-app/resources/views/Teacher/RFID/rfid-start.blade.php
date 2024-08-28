@extends('layout.app')
@section('title')
    RFID ATTENDANCE
@endsection

@section('style')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #78e08f;
        }

        .title {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            border: 2px solid #fff;
        }

        .alert {
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

        .cvsu {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
            height: 400px;
            position: relative;
        }

        .photo {
            max-width: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            width: 400px;
            padding: 5px 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            line-height: 1.2;
        }
    </style>
@endsection
@section('content')
    <button type="button" class="btn btn-dark m-3" style="position: absolute; left:0; top:0;" onclick="rfidAttendance()">
        <i class="fs-4 bi bi-house-door-fill text-white"></i>
    </button>
    <div class="title">RFID BASED ATTENDANCE</div>
    <div id="Alert" class="alert" role="alert">
    </div>
    <div class="cvsu">

        <div class="photo">
            <img src="{{asset('images/logo.png')}}" alt="Photo">
        </div>
        <div class="form-group">
            <div>
                <label for="rfid">RFID</label>
                <input type="email" class="form-control" id="rfid">
            </div>
            <div>
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname">
            </div>
            <div>
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname">
            </div>
            <div>
                <label for="date">Date</label>
                <input type="date" class="form-control" id="dated">
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function rfidAttendance() {
            swal({
                    title: "Finish Attendance?",
                    text: "Are you sure you want to go home?",
                    icon: "warning",
                    buttons: true,
                })
                .then((click) => {
                    if (click) {
                        window.location.href = "/dashboard"
                    }
                });
        }
        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            $('#dated').val(today);
            scan_text = '';
            $(document).on('keydown', function(e) {
                if (e.key === 'Enter') {
                    createAttendance(scan_text);
                    scan_text = '';
                    e.preventDefault();
                    return;
                }

                scan_text += e.key;
                $('#rfid').val(scan_text);
            });

            function createAttendance(scan_text) {
                $.ajax({
                    url: '{{ route('attendance.store', '$subj_id') }}',
                    method: 'POST',
                    data: {
                        'attendanceId': {{ $attendanceId }},
                        'scan_text': scan_text,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(success) {
                        $('#dated').val(today);
                        $('#Alert').show();
                        alert = Object.keys(success)[0];
                        message = Object.values(success)[0];
                        $('.alert').addClass('alert-' + alert);
                        $('.alert').text(message);
                        $('#fname').val(success.Fname);
                        $('#lname').val(success.Lname);

                        setTimeout(function() {
                            $('#Alert').hide();
                            $('#Alert').removeClass();
                            $('#Alert').addClass('alert');
                            $('.form-control').val('');
                            $('#dated').val(today);
                        }, 2000);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        });
    </script>
@endpush
