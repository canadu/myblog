<?php $this->setLayoutVar('title', '管理者登録') ?>
<?php $this->setLayoutVar('errors', $errors) ?>
<!-- <section class="form-container">
  <form action="<?php echo $base_url; ?>/admin/admin_register" method="POST">
    <h3>管理者登録</h3>
    <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
    <input type="text" name="name" maxlength="20" required placeholder="ユーザー名を入力して下さい。" value="<?php echo $name; ?>" class="box" oninput="this.value= this.replace(/\s/g,'') ">
    <input type="password" name="password" maxlength="20" autocomplete="new-password" required placeholder="パスワードを入力して下さい。" class="box" oninput="this.value= this.replace(/\s/g,'')">
    <input type="password" name="confirm_password" autocomplete="new-password" maxlength="20" required placeholder="確認用にもう一度パスワードを入力して下さい。" class="box" oninput="this.value= this.replace(/\s/g,'')">
    <input type="submit" value="登録" name="submit" class="btn">
  </form>
</section> -->
<div class="container">
  <div class="card card-container">
    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    <h3 class="text-center">管理者登録</h3>
    <form action="" class="admin_login mt-2" method="POST">
      <input type="hidden" name="_token" value="<?= $this->escape($_token); ?>" />
      <input type="text" name="name" id="inputName" maxlength="20" class="form-control" placeholder="ユーザーを入力してください。" required autofocus>
      <input type="password" name="password" id="inputPassword" maxlength="20" class="form-control" placeholder="パスワードを入力して下さい。" required>
      <input type="password" name="confirm_password" id="inputPassword" maxlength="20" required class="form-control" placeholder="確認用にもう一度パスワードを入力して下さい。" required>
      <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">登録</button>
    </form><!-- /form -->
  </div><!-- /card-container -->
</div>