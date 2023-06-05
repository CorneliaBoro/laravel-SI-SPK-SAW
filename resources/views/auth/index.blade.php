
@extends('layout/aplikasi')

@section('konten')
    <div class="w-50 center border rounded px-5 py-5 mx-auto">
        <h1>Login</h1>
        <form action="sesi/login" method="POST">
        @csrf
        <div class="w-50 center border rounded px-5 py-5 mx-auto">
            <h1>Login</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>    
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>  
         <div class="mb-3 d-grid">
            <button type="submit" name="submit" class="btn btn-warning">LOGIN</button>
         </div>
        </div>
        </form>
    </div>
@endsection
