<x-layout>
    <div class="form-group">
        <label for="subject">Example select</label>
        <select class="form-control rounded" id="subject">
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach

        </select>
    </div>

    <button class="btn btn-primary w-100 mt-4" onclick="startRfid()">Start RFID</button>

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
                success: function(response){
                    window.location.replace('rfid-start/'+subject_id);
                },
                error: function(error){
                    console.log(error);
                    
                }
            });
        }
    </script>
</x-layout>
