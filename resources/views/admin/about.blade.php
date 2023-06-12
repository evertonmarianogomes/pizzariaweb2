<!-- Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Sobre</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h3 class="text-center text-black-50"><i class="fas fa-pizza-slice"></i> {{$_ENV["APP_NAME"]}} <small>{{$_ENV["APP_RELEASE"]}}</small></h3>
            <hr>
            <p>- {{$_ENV["APP_NAME"]}} {{$_ENV["APP_RELEASE"]}} ({{$_ENV["APP_VERSION"]}}) <br/>
            - Versão do PHP: {{phpversion()}}</p>

            <p style="text-align: justify">{{$about->description}}</p>
        </div>
      </div>
    </div>
  </div>