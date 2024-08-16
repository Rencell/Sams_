@if(!Auth::guest() && Auth::user()->isAdmin == '1')
    <x-nav href="/admin/student" :active="request()->is('admin/student')">
        <i class="fs-4 bi-people"></i>
        <x-slot name="label">
            Students
        </x-slot>
    </x-nav>

    <x-nav href="/admin/teacher" :active="request()->is('admin/teacher')">
        <i class="fs-4 bi-person-badge"></i>
        <x-slot name="label">
            Teachers
        </x-slot>
    </x-nav>

    <x-nav href="/admin/admins" :active="request()->is('admin/admins')">
        <i class="fs-4 bi-shield-lock"></i>
        <x-slot name="label">
           Admins
        </x-slot>
    </x-nav>


@endif