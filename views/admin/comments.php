<?php $this->setLayoutVar('title', '投稿コメント') ?>
<?php $this->setLayoutVar('errors', $errors) ?>

<section class="comments">
  <h1 class="heading">投稿コメント</h1>
  <p class="comment-title">投稿コメント</p>
  <div class="box-container">
    <?php
    if ($count_comments == 0) {
      echo '<p class="empty">コメントはまだありません</p>';
    } else {
      while ($comment = current($comments)) {
    ?>
        <div class="post-title">from : <span><?php echo $comment['post_title']; ?></span><a href="<?php echo $base_url; ?>/admin/read_post/<?php echo $comment['post_id']; ?>">投稿を閲覧</a></div>
        <div class="box">
          <div class="user">
            <i class="fas fa-user"></i>
            <div class="user-info">
              <span><?php echo $comment['user_name']; ?></span>
              <div><?php echo $comment['date']; ?></div>
            </div>
          </div>
          <div class="text"><?php echo $comment['comment'] ?></div>
          <form action="" method="POST">
            <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
            <button type="submit" class="inline-delete-btn" name="delete_comment" onclick="return confirm('コメントを削除しますか?');">コメント削除</button>
          </form>
        </div>
    <?php
        next($comments);
      }
    }
    ?>
  </div>
</section>