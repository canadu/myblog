<?php $this->setLayoutVar('title', '投稿を表示') ?>
<?php $this->setLayoutVar('errors', $errors) ?>
<?php $this->setLayoutVar('admin', $admin) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?php if (count($view_posts) > 0) : ?>
              <?php
              while ($fetch_post = current($view_posts)) {
              ?>

                <div class="card" style="width:16rem;">

                  <?php if ($fetch_post['image'] != '') : ?>
                    <img src="../../uploaded_img/<?php echo $fetch_post['image']; ?>" class="card-img-top" alt="<?= $fetch_post['title']; ?>の画像">
                  <?php endif; ?>
                  <div class="card-body">

                    <form method="POST">
                      <input type="hidden" name="post_id" value="<?= $fetch_post['post_id']; ?>">

                      <?php if ($fetch_post['status'] == 'active') : ?>
                        <span class="badge badge-danger">公開</span>
                      <?php else : ?>
                        <span class="badge badge-secondary">非公開</span>
                      <?php endif; ?>

                      <h6 class="card-subtitle mb-2 text-muted"><?= $fetch_post['title']; ?></h6>
                      <p class="card-text mb-2"><?php echo $fetch_post['content']; ?></p>
                    </form>

                    <div class="d-flex d-flex justify-content-between">
                      <div><i class="fas fa-heart"></i><span> <?= $fetch_post['total_post_likes']['total']; ?></span></div>
                      <div><i class="fas fa-comments"></i><span> <?= $fetch_post['total_post_comments']['total']; ?></span></div>
                    </div>

                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="<?= $base_url; ?>/admin/edit_post/<?= $fetch_post['post_id']; ?>" class="btn btn-info btn-sm"><i class="fa-regular fa-pen-to-square"></i> 編集</a>
                      <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('この投稿を削除しますか？');"><i class="fa-solid fa-trash-can"></i> 削除</button>
                      <a href="<?= $base_url; ?>/admin/read_post/<?= $fetch_post['post_id']; ?>" class="btn btn-outline-info btn-sm"><i class="fa-solid fa-circle-info"></i> 詳細</a>
                    </div>
                  </div>
                </div>

              <?php
                next($view_posts);
              }
              ?>
            <?php else : ?>
              <div class="mt-3">
                <p class="fs-2 text-center">利用できるアカウントはありません。</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div><!-- card body -->
    </div><!-- card -->
  </div><!-- col -->
</div><!-- row -->