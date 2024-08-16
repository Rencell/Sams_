@extends('layout.app')
@section('title')
    Student Attendance Management System
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        @if (!Auth::guest())
                            @if (Auth::user()->isAdmin == '0')
                                <span class="fs-6 mt-3 d-none d-sm-inline">Students Attendance Management System</span>
                            @else
                                <span class="fs-6 mt-3 d-none d-sm-inline">Admin</span>
                            @endif
                        @endif

                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100"
                        id="menu">

                        {{-- Navigation [teacher] --}}
                        @include('components.nav-role.teacher')
                        {{--  --}}
                        {{-- Navigation [Admin] --}}
                        @include('components.nav-role.admin')
                        {{-- --}}
                        <hr class="border border-secondary border-1 opacity-50 w-100" />

                        <li class="w-100">
                            <form method="POST" action="{{ route('login.destroy') }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="nav-link px-0 align-middle ps-2">
                                    <i class="fs-4 bi-person-walking"></i>
                                    <span class="ms-1 d-none d-lg-inline">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                    <hr />
                </div>
            </div>

            {{-- Content --}}
            <div class="col m-0 p-0">
                {{ $slot }}
            </div>
        </div>
    @endsection
