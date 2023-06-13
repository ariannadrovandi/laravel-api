@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container bg-white py-5">
            <div class="logo_laravel">
                <img src="image/logoA.jpg" style="width: 150px" alt="">
            </div>
            <h1 class="display-5 fw-bold">Benvenuto!</h1>

            <p class="col-md-8 fs-4"></p>
            <a href="{{ route('login') }}" class="btn btn-outline-primary" type="button">Vai al login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary" type="button">Registrati</a>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Questa pagina è stata creata da Arianna</p>
        </div>
    </div>
@endsection
