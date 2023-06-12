<div id="loader_container">
    <div id="loader_header" class="row">
        <h4><i class="fas fa-pizza-slice"></i> {{$_ENV["APP_NAME"]}} <small>{{$_ENV["APP_RELEASE"]}}</small></h4>
        <p class="pt-3">Carregando dados, aguarde...</p>
        <p>For testing purposes only. Version {{ $_ENV["APP_VERSION"]}}</p>
    </div>
    <div class="wrapper">
        <div class="loader"><div class="dot"></div></div>
        <div class="loader"><div class="dot"></div></div>
        <div class="loader"><div class="dot"></div></div>
        <div class="loader"><div class="dot"></div></div>
        <div class="loader"><div class="dot"></div></div>
        <div class="loader"><div class="dot"></div></div>
    </div>
</div>