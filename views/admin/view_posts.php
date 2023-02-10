<?php $this->setLayoutVar('title', '投稿の一覧') ?>
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
              $colCnt = 0;
              while ($fetch_post = current($view_posts)) {
                if (($colCnt % 3) == 0) {
                  echo '<div class="row">';
                }
              ?>

                <div class="col-md-4">

                  <div class="card">

                    <div class="card-header">
                      <?php if ($fetch_post['status'] == 'active') : ?>
                        <h6><span class="badge badge-danger mb-1">公開</span></h6>
                        <h5><?= $fetch_post['title']; ?></h5>
                      <?php else : ?>
                        <h6><span class="badge badge-secondary mb-1">非公開</span></h6>
                        <h5><?= $fetch_post['title']; ?></h5>
                      <?php endif; ?>
                    </div>

                    <?php if ($fetch_post['image'] != '') : ?>
                      <img src="../../uploaded_img/<?php echo $fetch_post['image']; ?>" class="card-img-top" alt="<?= $fetch_post['title']; ?>の画像">
                    <?php endif; ?>

                    <div class="card-body">
                      <form method="POST">
                        <input type="hidden" name="post_id" value="<?= $fetch_post['post_id']; ?>">
                        <p class="card-text text-truncate mb-2"><?php echo $fetch_post['content']; ?></p>
                      </form>
                      <div class="d-flex justify-content-between">
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

                  </div><!-- card -->

                </div>

              <?php
                if ($colCnt == 2) {
                  echo '</div>';
                  $colCnt = 0;
                } else {
                  $colCnt++;
                }
                next($view_posts);
              }
              ?>
            <?php else : ?>
              <div class="mt-3">
                <p class="fs-2 text-center">まだ投稿はありません。</p>
              </div>
          </div>
        <?php endif; ?>
        </div><!-- card -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container-fluid -->
</div><!-- content -->