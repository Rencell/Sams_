<x-layout>


    <div class="h-35 d-flex justify-content-between rounded-bottom-2 shadow-sm System-color text-white" >
        <div class="col-3 d-flex flex-column p-4">
            <div class="fs-3">RFID Attendance</div>
            <i class="bi-phone-vibrate-fill" style="font-size: 5rem"></i>
        </div>
    </div>
    <div class="container mt-5">
        <div class="bg-light-subtle p-4 rounded shadow">
            <div class="col mb-3 mb-md-0">
                <label for="inputGroupSelect04" class="form-label">Select Subject:</label>
                <select class="form-control rounded" id="subject">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach

                </select>
            </div>

            <button class="btn btn-primary w-100 mt-4" onclick="startRfid()">Start RFID</button>
        </div>
    </div>












    <script>
        function startRfid() {
            subject_id = $('#subject').val();

            $.ajax({
                url: '{{ route('rfid.store') }}',
                method: 'POST',
                data: {
                    subject_id: subject_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    window.location.replace('rfid-start/' + subject_id);
                },
                error: function(error) {
                    console.log(error);

                }
            });
        }
    </script>
</x-layout>
