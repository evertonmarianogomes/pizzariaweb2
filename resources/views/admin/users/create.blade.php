<!-- Modal -->
<div class="modal fade modal-lg" id="createUserModal" tabindex="-1" aria-labelledby="createUserModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Novo usuário</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action={{route("app.admin.users.create")}} method="POST">
                @csrf

                <div class="row mb-2">
                    <div class="col-12 col-md-6 col-lg-6 mb-2">
                        <label for="first_name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" @required(true)>
                    </div>
    
    
                    <div class="col-12 col-md-6 col-lg-6">
                        <label for="last_name" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" @required(true)>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-12 col-md-6 col-lg-6">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" @required(true)>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <label for="user_type" class="form-label">Tipo de usuário</label>
                        <select name="user_type" id="user_type" class="form-select">
                            <option value="3">Administrador</option>
                            <option value="1" @selected(true)>Moderador</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-12 col-md-6 col-lg-6">
                        <label for="user_login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="user_login" name="user_login" @required(true)>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <label for="user_password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="user_password" id="user_password" @required(true)>
                    </div>
                </div>

                <button class="btn btn-primary mt-2" type="submit">Enviar</button>
            </form>
        </div>
      </div>
    </div>
  </div>