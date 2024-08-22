<x-layout>
    <div class="container-fluid d-flex  flex-column ">
        <div class="row  p-4">
            <form method="POST" action="{{ route('profile.updateProfile') }}">
                @csrf
                <div class="col-md-12 bg-white shadow rounded-2 p-4">
                    <div class="text-bold fs-5 mb-2">Profile Information</div>
                    <div class="mb-3" style="color: rgb(136, 152, 170); font-size: 0.8em">update your account's profile
                        information and email address.</div>
                    <div class="d-flex col-md-6 col-sm-12 p-0 gap-2">
                        <div class="mb-3 flex-fill">
                            <label for="First_name" class="form-label fs-6 fw-light m-0">
                                <h5>First Name:</h5>
                            </label>
                            <input type="text" class="form-control" id="First_name" name="First_name"
                                value="{{ $profile->fname }}">
                            @error('First_name')
                                <h5 class="text-danger">
                                    {{ $message }}
                                </h5>
                            @enderror
                        </div>
                        <div class="mb-3 flex-fill">
                            <label for="Last_name" class="form-label fs-6 fw-light m-0">
                                <h5>Last Name:</h5>
                            </label>
                            <input type="text" class="form-control" id="Last_name" name="Last_name"
                                value="{{ $profile->lname }}">
                            @error('Last_name')
                                <h5 class="text-danger">
                                    {{ $message }}
                                </h5>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex col-md-6 col-sm-12 p-0 gap-2">
                        <div class="mb-3 flex-fill">
                            <label for="birth_date" class="form-label fs-6 fw-light m-0">
                                <h5>Birth Date</h5>
                            </label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date"
                                value="{{ $profile->birth }}">
                            @error('birth_date')
                                <h5 class="text-danger">
                                    {{ $message }}
                                </h5>
                            @enderror
                        </div>
                        <div class="mb-3 flex-fill">
                            <label for="gender" class="form-label fs-6 fw-light m-0">
                                <h5>Gender</h5>
                            </label>
                            <select class="form-select" style="line-height: 2.0" id="gender" aria-label="Default select example" name="gender">
                                <option selected>{{ $profile->gender }}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Prefer not to say">Prefer not to say</option>
                            </select>
                        </div>
                    </div>


                    <div class="mb-3 col-md-6 col-sm-12 p-0 gap-2">
                        <label for="email" class="form-label fw-light m-0"><h5>Email:</h5> </label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $profile->email }}">
                        @error('email')
                            <h5 class="text-danger">
                                {{ $message }}
                            </h5>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

        <div class="row p-3 pb-5">
            <form method="POST" action="{{ route('profile.updatePassword') }}">
                @csrf
                <div class="col-12 rounded-2  bg-white shadow p-4">
                    <div class="text-bold fs-5 mb-2">Update Password</div>
                    <div class="mb-3" style="color: rgb(136, 152, 170); font-size: 0.8em">Keep your account safe by
                        updating your password. Make sure to choose a strong and unique password.</div>
                    <div class="mb-3 col-md-6 col-sm-12 p-0">
                        <label for="oldpassword" class="form-label fs-6 fw-light m-0"><h5>Current Password:</h5> </label>
                        <input type="password" class="form-control" id="oldpassword" name="old_password"
                            value="{{ old('old_password') }}">
                        @error('old_password')
                            <h5 class="text-danger">
                                {{ $message }}
                            </h5>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12 p-0">
                        <label for="newpassword" class="form-label fw-light m-0"><h5>New Password: </h5></label>
                        <input type="password" class="form-control" id="newpassword" name="new_password">
                        @error('new_password')
                            <h5 class="text-danger">
                                {{ $message }}
                            </h5>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12 p-0" >
                        <label for="confirmpassword" class="form-label fw-light m-0"><h5>Confirm Password: </h5></label>
                        <input type="password" class="form-control" id="confirmpassword" name="confirm_password">
                        @error('confirm_password')
                            <h5 class="text-danger">
                                {{ $message }}
                            </h5>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
