<?php $this->setLayoutVar('title', '管理者ログイン') ?>
<?php $this->setLayoutVar('errors', $errors) ?>
<!-- <section class="form-container">
  <form action="" method="POST">
    <h3>管理者login</h3>
    <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
    <input type="text" name="name" maxlength="20" required placeholder="ユーザー名を入力して下さい。" class="box" oninput="this.value= this.replace(/\s/g,'')">
    <input type="password" name="password" maxlength="20" autocomplete="new-password" required placeholder="パスワードを入力して下さい。" class="box" oninput="this.value= this.replace(/\s/g,'')">
    <input type="submit" value="ログイン" name="submit" class="btn">
  </form>
</section> -->
<div class="container">
  <div class="card card-container">
    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    <h3 class="text-center">管理者ログイン</h3>
    <form action="" class="admin_login mt-3" method="POST">
      <input type="hidden" name="_token" value="<?= $this->escape($_token); ?>" />
      <input type="text" name="name" id="inputName" class="form-control" placeholder="ユーザー名を入力してください。" required autofocus>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="パスワードを入力して下さい。" required>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberCheck">
        <label for="rememberCheck">情報を記憶する</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">ログイン</button>
    </form><!-- /form -->
    <a href="#" class="forgot-password">
      パスワードをお忘れですか?
    </a>
  </div><!-- /card-container -->
</div>