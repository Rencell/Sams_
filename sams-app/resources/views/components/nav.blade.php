@props(['active' => false])
<li class="w-100">
    <a {{ $attributes }} class="{{$active ? 'active' : ''}} nav-link px-2 align-middle ">
        {{$slot}}
        <span class="ms-1 d-none d-lg-inline">{{$label}}</span>
    </a>
</li>