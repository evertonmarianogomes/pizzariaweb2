@extends('layout')

@section('content')
    @include('admin.updateAbout')
    <div class="container pt-3">
        <h2>Editar "Sobre"</h2>
        <hr>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($aboutList))
                        @foreach ($aboutList as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $carbon::parse($item->created_at)->format("d/m/Y H:i:s")}}</td>
                                <td>{{ $carbon::parse($item->updated_at)->format("d/m/Y H:i:s")}}</td>

                                <td class="d-flex gap-2">
                                    <a href="#" class="btn btn-primary edit" data-id={{ $item->id }}><i
                                            class="fa-solid fa-pen-to-square"></i> Editar</a>
                                    @if ($item->isSelected)
                                        <a href="#" class="btn btn-danger disabled"><i class="fa-solid fa-trash"></i>
                                            Excluir</a>
                                    @else
                                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i>
                                            Excluir</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="text-align: center">
                            <td colspan="5">Nenhum registro foi encontrado na base de dados</td>
                        </tr>
                    @endif



                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/ts/About.ts')
@endsection
