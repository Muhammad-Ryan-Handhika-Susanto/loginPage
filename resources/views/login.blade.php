@extends('template')
@section('title', 'Login')
@section('content')
    <div class="container">
      <div class="mt-5">
        @if ($errors->any())
            <div class="col-12">
              @foreach ($errors->all() as $errors)
                  <div class="alert alert-danger">{{ $errors }}</div>
                  @endforeach
                </div>
                @endif

                @if (session()->has('error'))
                 <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session()->has('success'))
                 <div class="alert alert-success">{{ session('success') }}</div>
                @endif
      </div>
        <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px;">
          @csrf
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username">
            </div>
             <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div> --}}
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="submit" class="btn btn-primary">Register</button>
          </form>
    </div>
@endsection