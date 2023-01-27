<?php foreach ($errors as $error) : ?>
  <div class="alert alert-warning alert-dismissible fade show">
    <?php echo $this->escape($error); ?>
    <button type="button" class="close" data-dismiss="alert">
      <span>×</span>
    </button>
  </div>
<?php endforeach; ?>