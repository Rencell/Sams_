@props(['active' => false])
<li class="w-100">
    <a {{ $attributes }} class="{{$active ? 'active' : ''}} nav-link px-0 align-middle ps-2">
        {{$slot}}
        <span class="ms-1 d-none d-sm-inline">{{$navs}}</span>
    </a>
</li>