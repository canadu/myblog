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

                <div class="card" style="width:15rem;">

                  <?php if ($fetch_post['image'] != '') : ?>
                    <img src="../../uploaded_img/<?php echo $fetch_post['image']; ?>" class="card-img-top" alt="<?= $fetch_post['title']; ?>の画像">
                  <?php endif; ?>
                  <div class="card-body">

                    <form method="POST">

                      <input type="hidden" name="post_id" value="<?= $fetch_post['post_id']; ?>">
                      <div class="status" style="background-color:<?php if ($fetch_post['status'] == 'active') {
                                                                    echo '#FFC107';
                                                                  } else {
                                                                    echo '#6C757D';
                                                                  }; ?>;"><?= $fetch_post['status'] == 'active' ? '公開' : '非公開'; ?></div>
                      <h5 class="card-title"><?= $fetch_post['title']; ?></h5>
                      <p class="card-text"><?php echo $fetch_post['content']; ?></p>

                      <div class="icons">
                        <div class="likes"><i class="fas fa-heart"></i><span><?= $fetch_post['total_post_likes']['total']; ?></span></div>
                        <div class="comments"><i class="fas fa-comments"></i><span><?= $fetch_post['total_post_comments']['total']; ?></span></div>
                      </div>



                    </form>


                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="<?= $base_url; ?>/admin/edit_post/<?= $fetch_post['post_id']; ?>" class="btn btn-info btn-sm"><i class="fa-regular fa-pen-to-square"></i> 編集</a>
                      <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('この投稿を削除しますか？');"><i class="fa-solid fa-trash-can"></i> 削除</button>
                      <a href="<?= $base_url; ?>/admin/read_post/<?= $fetch_post['post_id']; ?>" class="btn btn-outline-info"></a>
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