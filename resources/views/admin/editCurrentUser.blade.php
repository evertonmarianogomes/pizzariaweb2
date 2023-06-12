@extends('layout')

@section('content')
    <div class="container pt-4">
        <h3>Editar usuário {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
        <hr>

        <form action="#" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <label for="first_name" class="form-label">Nome</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" @required(true)
                        value={{ Auth::user()->first_name }}>
                </div>
    
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <label for="last_name" class="form-label">Sobrenome</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" @required(true)
                        value="{{ Auth::user()->last_name }}">
                </div>

                <div class="col-12 col-mg-6 col-lg-4 mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" @required(true) value="{{ Auth::user()->email}}">
                </div>
            </div>
        </form>
    </div>
@endsection


