<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome completo</th>
                <th>Login</th>
                <th>Email</th>
                <th>Criado em</th>
                <th>Opções</th>
            </tr>
        </thead>

        <tbody>
            @if (isset($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->login}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ $carbon::parse($user->created_at)->format("d/m/Y H:i:s")}}</td>

                        <td class="d-flex gap-2">
                            @if($user->id == Auth::user()->id)
                                <a href={{route("app.admin.editCurrentUser")}} class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            
                            @else
                                <button class="btn btn-primary"> <i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr style="text-align: center;">
                    <td colspan="6">Nenhum registro encontrado no Banco de Dados</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>