<x-layout>
    <div class="container-fluid d-flex  flex-column ">
        <div class="row  p-4">
            <form method="POST" action="{{ route('profile.updateProfile') }}">
                @csrf
                <div class="col-md-12 bg-white shadow rounded-2 p-4">
                    <div class="text-bold fs-5 mb-2">Profile Information</div>
                    <div class="mb-3" style="color: rgb(136, 152, 170); font-size: 0.8em">update your account's profile
                        information and email address.</div>
                    <div class="mb-3 ">
                        <label for="name" class="form-label fs-6 fw-light">Name:</label>
                        <input type="text" class="form-control w-50" id="name" name="name"
                            value="{{ $profile->name }}">
                        @error('name')
                            <h5 class="text-danger">
                                {{ $message }}
                            </h5>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-light">Email: </label>
                        <input type="text" class="form-control w-50" id="email" name="email"
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
                    <div class="mb-3 ">
                        <label for="oldpassword" class="form-label fs-6 fw-light">Current Password: </label>
                        <input type="password" class="form-control w-50" id="oldpassword" name="old_password"
                            value="{{ old('old_password') }}">
                        @error('old_password')
                            <h5 class="text-danger">
                                {{ $message }}
                            </h5>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newpassword" class="form-label fw-light">New Password: </label>
                        <input type="password" class="form-control w-50" id="newpassword" name="new_password">
                        @error('new_password')
                            <h5 class="text-danger">
                                {{ $message }}
                            </h5>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label fw-light">Confirm Password: </label>
                        <input type="password" class="form-control w-50" id="confirmpassword" name="confirm_password">
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
