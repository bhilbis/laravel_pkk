<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 offset-md-3">
            <center><h3 class="mt-5">Register Form</h3></center>
            <form method="post" action="{{ route('doRegister') }}">
                @csrf

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label class="form-label" for="name">Full Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{ old('name') }}" />
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="email">Email Address</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" value="{{ old('email') }}" />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" />
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" />
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" name="submit" type="submit" value="Register">Register</button>
                </div>
            </form>
            <div class="mt-3">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>
</div>