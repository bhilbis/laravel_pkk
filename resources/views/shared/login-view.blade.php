<style>
    .container {
        margin-top: 3em !important;
        margin-bottom: 7em;
    }
    .mt-3 a{
        color: orange !important;
        text-decoration: none !important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 offset-md-3">
            <center><h3 class="mt-5">Login Form</h3></center>
            <form method="post" action="{{ route('doLogin') }}">
                @csrf

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="mb-4">
                    <label class="form-label" for="emailAddress">Email Address</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="email_id" type="email"/>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid">
                    <button class="btn btn-success btn-lg" name="submit" type="submit" value="Log In">Log in</button>
                </div>
            </form>
            <div class="mt-3">
                <p>Don't have an account? <a href="{{ route('register') }}">Add Account</a></p>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
