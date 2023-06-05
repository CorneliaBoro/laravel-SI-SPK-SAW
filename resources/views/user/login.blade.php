@extends('layout/aplikasi')

@section('content')
<div class="row">
    <div class="col-md-6">
        @if(session('success'))
        <p cl ss="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <div class="w-80 center border rounded px-5 py-5 mx-auto">
            <h1>Login</h1>
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label>Username <span class="text-danger">*</span></label>
                    <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
                </div>
                <div class="mb-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" href="{{ route('dashboard') }}">Login</button>
                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection