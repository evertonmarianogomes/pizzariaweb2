@extends('layout', ['title' => $title])

@section('content')
    <div class="container pt-3">
        <div class="container pt-3">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8 col-lg-6 col-xg-6">
                    <div class="card shadow-sm col-12">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <small class="text-black-50"><i class="fas fa-pizza-slice"></i> {{ $_ENV['APP_NAME'] }}
                                        {{ $_ENV['APP_RELEASE'] }}</small>
                                    <h3>Acesso</h3>
                                </div>

                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="darkSwitch" />
                                    <label class="custom-control-label" for="darkSwitch">Modo Escuro</label>
                                </div>
                            </div>

                            <hr>

                            <form action={{ route('admin.login', ["redirect"=> request()->input('redirect') ]) }} method="post" id="loginForm">
                                @csrf
                                <div class="mb-2">
                                    <label for="login" class="form-label">Login</label>
                                    <input type="text" name="login" id="login" required class="form-control"
                                        value="everton.gomes">
                                </div>

                                <div class="mb-2">
                                    <label for="password" class="form-label">Senha</label>
                                    <input type="password" name="password" id="password" required class="form-control">
                                </div>

                                <button class="btn btn-primary mt-2" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
