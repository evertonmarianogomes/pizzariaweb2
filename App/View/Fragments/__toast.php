
<div class="toast fade shadow" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 3;">
  <div class="toast-header">
    <strong class="me-auto <?= $message->title_class ?>"><i class="fas fa-pizza-slice"></i> Pizzaria Web 2 - <?= $message->title ?></strong>
    <small>Now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body"><?= $message->toast_body ?></div>
</div>