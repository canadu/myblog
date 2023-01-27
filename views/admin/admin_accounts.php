<?php $this->setLayoutVar('title', '管理者アカウント') ?>
<?php $this->setLayoutVar('errors', $errors) ?>
<?php $this->setLayoutVar('admin', $admin) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-12">

        <div class="card">
          <div class="card-body">

            <div class="my-2 text-right">
              <a href="<?= $base_url; ?>/admin/admin_register" class="btn btn-outline-info"><i class="fas fa-chalkboard-teacher mr-1"></i>新しい管理者を登録</a>
            </div>

            <?php if ($admin_count == 0) : ?>
              <div class="mt-3">
                <p class="fs-2 text-center">利用できるアカウントはありません。</p>
              </div>
            <?php else : ?>
              <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th>管理者ID</th>
                    <th>管理者名</th>
                    <th>総投稿数</th>
                    <th colspan="2"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($admin_posts as $post) {
                  ?>
                    <tr>
                      <td><?= $post['id']; ?></td>
                      <td><?= $post['name']; ?></td>
                      <td><?= $post['total']; ?></td>
                      <?php
                      if ($post['id'] == $admin['id']) {
                      ?>
                        <td><a href="<?= $base_url; ?>/admin/update_profile" class="btn btn-outline-primary btn-sm">編集</a></td>
                        <td>
                          <form action="" method="post">
                            <input type="hidden" name="_token" value="<?= $this->escape($_token); ?>" />
                            <input type="hidden" name="post_id" value="<?= $post['id']; ?>" on>
                            <button class="delete-action btn btn-outline-danger btn-sm" type="submit">削除</button>
                          </form>
                        </td>
                      <?php } else {
                        // 現在ログインしている管理者アカウントと異なる場合
                      ?>
                        <td></td>
                        <td></td>
                    <?php
                      }
                    }
                    ?>
                    </tr>
                </tbody>
              </table>
            <?php endif; ?>
          </div><!-- card body -->
        </div><!-- card -->
      </div><!-- col -->
    </div><!-- row -->
  </div>
</div>