@extends('layout.app')
@section('title')
    RFID ATTENDANCE
@endsection

@section('content')
    <div class="form-group">
        <label for="rfid">RFID</label>
        <input type="email" class="form-control" id="rfid">
    </div>

    <div class="form-group">
        <label for="fname">fname</label>
        <input type="text" class="form-control" id="fname">
    </div>

    <div class="form-group">
        <label for="Lname">Lname</label>
        <input type="text" class="form-control" id="Lname">
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            
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
                        'subj_id': {{$subj_id}},
                        'scan_text': scan_text,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function(success) {
                        alert("ssucc")
                    },
                    error: function(error) {
                        console.log(error);
                        
                    }
                });
            }
        });
    </script>
@endpush
