<div aria-live="polite" aria-atomic="true" class="position-relative" style="z-index: 4">
    <div class="toast-container top-0 end-0 p-3">

        @if ($errors)
            @foreach ($errors as $error)
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto text-danger"><i class="fas fa-pizza-slice"></i> {{ $_ENV['APP_NAME'] }} -
                            Erro</strong>
                        <small class="text-muted">just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ $error }}
                    </div>
                </div>
            @endforeach
        @endif


        @if (isset($success))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-success"><i class="fas fa-pizza-slice"></i> {{ $_ENV['APP_NAME'] }} -
                        Mensagem</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ $success }}
                </div>
            </div>
        @endif
    </div>
</div>
