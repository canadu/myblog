<?php $this->setLayoutVar('title', 'Dashboard') ?>
<?php $this->setLayoutVar('admin', $admin) ?>

<div class="content">

  <div class="container-fluid">

    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-body">

            <!-- ここからデータ -->
            <div class="row">

              <!-- ログインユーザー -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center">
                    ログインユーザー
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-text"><?= $admin['name']; ?></h5>
                    <a href="<?= $base_url; ?>/admin/update_profile" class="btn btn-outline-info">プロフィールの更新</a>
                  </div>
                </div>
              </div>

              <!-- 投稿総数 -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center">
                    投稿総数
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-text font-weight-bold"><?= $count_posts; ?></h5>
                    <a href="<?= $base_url; ?>/admin/add_posts" class="btn btn-outline-info">新規に投稿</a>
                  </div>
                </div>
              </div>

              <!-- 公開されている投稿 -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center">
                    公開されている投稿
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-text font-weight-bold"><?= $count_active_posts; ?></h5>
                    <a href="<?= $base_url; ?>/admin/view_posts/active" class="btn btn-outline-info">公開されている投稿</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">

              <!-- 非公開な投稿 -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center">
                    非公開な投稿
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-text"><?= $count_deactive_posts; ?></h5>
                    <a href="<?= $base_url; ?>/admin/view_posts/deactive" class="btn btn-outline-info">非公開な投稿</a>
                  </div>
                </div>
              </div>

              <!-- ユーザーアカウント -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center">
                    ユーザーアカウント
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-text font-weight-bold"><?= $count_admins; ?></h5>
                    <a href="<?= $base_url; ?>/admin/user_accounts" class="btn btn-outline-info">ユーザーアカウント</a>
                  </div>
                </div>
              </div>

              <!-- 管理者アカウント -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center">
                    管理者アカウント
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-text font-weight-bold"><?= $count_admins; ?></h5>
                    <a href="<?= $base_url; ?>/admin/admin_accounts" class="btn btn-outline-info">管理者アカウント</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- 非公開な投稿 -->
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center">
                    非公開な投稿
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-text"><?= $count_comments; ?></h5>
                    <a href="<?= $base_url; ?>/admin/comments" class="btn btn-outline-info">コメントされた投稿を確認</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>