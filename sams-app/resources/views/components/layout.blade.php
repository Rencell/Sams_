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
                        <span class="fs-6 mt-3 d-none d-sm-inline">Students Attendance Management System</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100"
                        id="menu">
                        <x-nav href="/dashboard" :active="request()->is('dashboard')">
                            <i class="fs-4 bi-speedometer2"></i>
                            <x-slot name="navs">
                                Dashboard
                            </x-slot>
                        </x-nav>

                        <x-nav href="/student" :active="request()->is('student')">
                            <i class="fs-4 bi-people"></i>
                            <x-slot name="navs">
                                Students
                            </x-slot>
                        </x-nav>


                        <x-nav href="/attendance" :active="request()->is('attendance')">
                            <i class="fs-4 bi-grid"></i>
                            <x-slot name="navs">
                                Attendance
                            </x-slot>
                        </x-nav>

                        <x-nav href="/subject" :active="request()->is('subject')">
                            <i class="fs-4 bi-book"></i>
                            <x-slot name="navs">
                                Subjects
                            </x-slot>
                        </x-nav>

                        <x-nav href="/rfid" :active="request()->is('rfid')">
                            <i class="fs-4 bi-phone-vibrate"></i>
                            <x-slot name="navs">
                                RFID Attendance
                            </x-slot>
                        </x-nav>

                        <x-nav href="/setting" :active="request()->is('setting')">
                            <i class="fs-4 bi-gear"></i>
                            <x-slot name="navs">
                                Settings
                            </x-slot>
                        </x-nav>

                        <hr class="border border-secondary border-1 opacity-50 w-100" />


                        <li class="w-100">
                            <form method="POST" action="{{ route('login.destroy')}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="nav-link px-0 align-middle ps-2">
                                    <i class="fs-4 bi-person-walking"></i>
                                    Logout
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

   
