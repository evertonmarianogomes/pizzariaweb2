@extends("layout")

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between">
            <h2>Usuários</h2>
            <button class="btn btn-primary" id="showModalButton"> <i class="fas fa-plus"></i> Criar</button>
        </div>
        <hr>

        @include('admin.users.userList', ["users" => $users])
        @include('admin.users.create')
    </div>
@endsection


@section('scripts')
    @vite("resources/ts/User.ts")
    
@endsection