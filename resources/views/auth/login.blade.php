@extends('layout.main')

@section('container')
    <section class="user-login section" style="padding: 100px 0;">
        <div class="container col-lg-4">
            <div class="block">
                <div class="content">
                    <h5>Login</h5>
                    @if (session('loginError'))
                        <div class="alert alert-danger">
                            {{ session('loginError') }}
                        </div>
                    @endif
                    <form class="form-signin" action="{{ route('auth') }}" method="post">
                        @csrf
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" autofocus>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection