@extends('layout.app');
@section('title')
    Login Form
@endsection
@section('content')
<section class="d-flex justify-content-center align-items-center" style="height: 100dvh">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100 ">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9 mt-auto mb-auto">

               
                <div class="card" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                    <div class="card-body p-5">
                        
                        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                        <form method="POST" action="{{ route('login.store') }}" class="needs-validation"
                            novalidate="" autocomplete="off">


                            @csrf
                            

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <h5 class="text-danger">
                                        {{ $message }}
                                    </h5>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @error('password')
                                    <h5 class="text-danger">
                                        {{ $message }}
                                    </h5>
                                @enderror
                            </div>

                            

                            <div class="align-items-center d-flex">

                                <button type="submit" class="btn btn-primary ms-auto">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
</section>
@endsection