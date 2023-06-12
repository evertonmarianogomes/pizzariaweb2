@extends("layout")

@section('content')
    <div class="container pt-3">
        <h2>Bem vindo {{Auth::user()->first_name}}</h2>
       @role('admin')
       <p>Você é um admin</p>
       @endrole


    </div>
@endsection