@if (!Auth::guest() && Auth::user()->isAdmin == '0')
    <x-nav href="/dashboard" :active="request()->is('dashboard')">
        <i class="fs-4 bi-speedometer2"></i>
        <x-slot name="label">
            Dashboard
        </x-slot>
    </x-nav>

    <x-nav href="/student" :active="request()->is('student')">
        <i class="fs-4 bi-people"></i>
        <x-slot name="label">
            Students
        </x-slot>
    </x-nav>

    <x-nav href="/subject" :active="request()->is('subject') || request()->is('subject/*')">
        <i class="fs-4 bi-book"></i>
        <x-slot name="label">
            Subjects
        </x-slot>
    </x-nav>

    <x-nav href="/attendance" :active="request()->is('attendance') || request()->is('attendance/*')">
        <i class="fs-4 bi-grid"></i>
        <x-slot name="label">
            Attendance
        </x-slot>
    </x-nav>

    <x-nav href="/rfid" :active="request()->is('rfid')">
        <i class="fs-4 bi-phone-vibrate"></i>
        <x-slot name="label">
            RFID Attendance
        </x-slot>
    </x-nav>
@endif


