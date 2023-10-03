@extends('template')
@section('title', 'Register')
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
        <form action="{{ route('register.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px;">
          @csrf
            <div class="mb-3">
              <label for="nik" class="form-label">Nik</label>
              <input type="text" name="nik" class="form-control" id="nik">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
             <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
             <div class="mb-3">
              <label for="telepon" class="form-label">Telepon </label>
              <input type="text" name="telepon" class="form-control" id="telepon">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
    </div>
@endsection