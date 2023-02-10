<?php $this->setLayoutVar('title', '投稿を見る') ?>
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
              foreach ($view_posts as $post_data) {
                $post_id = $post_data['post_id'];
              ?>

                <div class="card">

                  <?php if ($post_data['image'] != '') { ?>
                    <img src="../../uploaded_img/<?php echo $post_data['image']; ?>" class="card-img-top" alt="<?= $post_data['title']; ?>の画像">
                  <?php } ?>

                  <div class="card-body">

                    <form method="post">

                      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

                      <div class="mb-3">
                        <?php if ($fetch_post['status'] == 'active') : ?>
                          <h5><span class="badge badge-danger">公開</span></h5>
                        <?php else : ?>
                          <h5><span class="badge badge-secondary">非公開</span></h5>
                        <?php endif; ?>
                      </div>

                      <!-- 本文 -->
                      <div class="form-group">
                        <!--  <label for="title">投稿タイトル</label> -->
                        <input type="text" class="form-control" id="title" name="title" maxlength="100" value="<?= $post_data['title']; ?>"">
                      </div>

                      <!-- 投稿記事 -->
                      <div class=" form-group">
                        <!-- <label for="content">投稿記事</label> -->
                        <textarea class="form-control" id="content" rows="15"><?= $post_data['content']; ?></textarea>
                      </div>
                    </form>

                  </div>

                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <div class=" d-flex justify-content-between">
                        <div><i class="fas fa-heart"></i><span> <?= $post_data['total_post_likes']['total']; ?></span></div>
                        <div><i class="fas fa-comments"></i><span> <?= $post_data['total_post_comments']['total']; ?></span></div>
                      </div>
                    </li>
                  </ul>

                  <div class="card-footer">
                    <div class="text-right">
                      <a href="<?= $base_url; ?>/admin/edit_post/<?= $post_data['post_id']; ?>" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i> 編集</a>
                      <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('この投稿を削除しますか？');"><i class="fa-solid fa-trash-can"></i> 削除</button>
                      <a href="<?php echo $base_url; ?>/admin/view_posts" class="btn btn-outline-info"><i class="fa-solid fa-angles-left"></i> 戻る</a>
                    </div>
                  </div>

                <?php
                next($view_posts);
              }
                ?>
              <?php else : ?>
                <div class=" mt-3">
                  <p class="fs-2 text-center">まだ投稿はありません。</p>
                </div>
              <?php endif; ?>
                </div>
          </div><!-- card -->
        </div><!-- col -->
        <div class="card">

        </div>
      </div><!-- row -->
    </div><!-- container-fluid -->
  </div><!-- content -->

  <!-- 記事に投稿されたコメント -->
  <section class="comments" style="padding-top:0;">
    <p class="comment-title">投稿コメント</p>
    <div class="box-container">
      <?php
      if (count($comments) > 0) {
        while ($comment = current($comments)) {
      ?>
          <div class="box">
            <div class="user">
              <i class="fas fa-user"> </i>
              <div class="user-info">
                <span><?php echo $comment['user_name']; ?></span>
                <div><?php echo $comment['date'] ?></div>
              </div>
            </div>
            <div class="text"><?php echo $comment['comment']; ?></div>
            <form action="" method="POST">
              <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
              <button type="submit" class="inline-delete-btn" name="delete_comment" onclick="return confirm('コメントを削除しますか?');">コメント削除</button>
            </form>
          </div>
      <?php
          next($comments);
        }
      } else {
        echo '<p class="empty">まだコメントはありません</p>';
      }
      ?>
    </div>
  </section>