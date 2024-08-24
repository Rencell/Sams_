@extends('layout.app')
@section('title')
    Landing Page
@endsection
@section('content')
    <div class="bg-secondary vh-100 d-flex align-items-center justify-content-center p-3">
        <div class="card position-relative text-center text-dark bg-white shadow-lg rounded-4"
            style="max-width: 1350px; padding: 5rem;">
            <a class="btn btn-primary text-white position-absolute top-0 end-0 m-3" href="/login">Log In</a>
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                <div class="text-start flex-shrink-1 mb-4 mb-lg-0" style="margin-right: 5rem;">
                    <h1 class="display-4 text-primary mb-4">RFID Attendance</h1>
                    <p class="lead">Elevate your attendance management with our advanced RFID technology,
                        offering a comprehensive solution that ensures precise, real-time tracking,
                        minimizes administrative burdens,
                        and enhances operational efficiency through effortless integration and user-friendly access control.
                    </p>
                </div>
                <img src="{{ asset('images/rfid.jpg')}}" alt="RFID" class="img-fluid rounded-3" style="max-width: 50%;">
            </div>
        </div>
    </div>
@endsection
