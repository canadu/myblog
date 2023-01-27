<?php $this->setLayoutVar('title', 'ダッシュボード') ?>
<?php $this->setLayoutVar('errors', $errors) ?>
<?php $this->setLayoutVar('user', $user) ?>

<?php $disp_category_count = 0; ?>

<section class="home-grid">
  <div class="box-container">
    <div class="box">

      <?php if (!empty($user)) : ?>
        <!-- レイアウトのファイルに変数を渡す -->
        <?php $this->setLayoutVar('user', $user) ?>

        <p>Welcome <span><?php echo $user['name']; ?></span></p>
        <p>総コメント : <span><?php echo count($comments); ?></span></p>
        <p>総いいね : <span><?php echo count($likes); ?></span></p>
        <a href="<?php echo $base_url; ?>/user/update_user" class="btn">プロフィールを更新</a>
        <div class="flex-btn">
          <a href="<?php echo $base_url; ?>/user/user_likes" class="option-btn">いいね</a>
          <a href="<?php echo $base_url; ?>/user/user_comments" class="option-btn">コメント</a>
        </div>
      <?php else : ?>
        <p class="name">ログイン or 登録</p>
        <div class="flex-btn">
          <a href="<?php echo $base_url; ?>/user/user_login" class="option-btn">ログイン</a>
          <a href="<?php echo $base_url; ?>/user/user_register" class="option-btn">登録</a>
        </div>
      <?php endif; ?>
    </div>

    <!-- カテゴリを取得 -->
    <?php if (count($all_active_posts) > 0) : ?>
      <div class="box">
        <p>カテゴリー</p>
        <div class="flex-box">
          <?php foreach ($category as $key => $value) : ?>
            <?php if ($disp_category_count < 5) : ?>
              <a href="<?php echo $base_url; ?>/user/category/<?php echo $key; ?>" class="links"><?php echo $value; ?></a>
            <?php endif; ?>
            <?php $disp_category_count++; ?>
          <?php endforeach; ?>
          <a href="<?php echo $base_url; ?>/user/show_all_category" class="btn">全て見る</a>
        </div>
      </div>

      <!-- 管理者アカウントを取得 -->
      <div class="box">
        <p>管理者</p>
        <div class="flex-box">
          <?php if (count($select_authors) > 0) : ?>
            <?php foreach ($select_authors as $author) : ?>
              <a href="<?php echo $base_url; ?>/user/author_posts/<?php echo $author['name']; ?>" class="links"><?php echo $author['name']; ?></a>
            <?php endforeach; ?>
          <?php else : ?>
            <?php echo '<p class="empty">まだ投稿はありません。</p>'; ?>
          <?php endif; ?>
          <a href="<?php echo $base_url; ?>/user/authors" class="btn">全て見る</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <section class="posts-container">
    <h1 class="heading">最近の投稿</h1>
    <div class="box-container">
      <?php
      if (count($all_active_posts) > 0) {

        $idx = 0;

        foreach ($all_active_posts as $post) {

          if ($idx == 5) {
            //最近の投稿は5件ぐらいまで表示する
            break;
          }

          //記事が公開されている場合
          $post_id = $post['id'];

      ?>
          <form method="post" class="box">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <input type="hidden" name="admin_id" value="<?php echo $post['admin_id']; ?>">
            <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />

            <div class="post-admin">
              <i class="fas fa-user"></i>
              <div>
                <a href="<?php echo $base_url; ?>/user/author_posts/<?php echo $post['name']; ?>"><?php echo $post['name']; ?></a>
                <div><?php echo $post['date']; ?></div>
              </div>
            </div>

            <?php if ($post['image'] != '') : ?>
              <img src="../../uploaded_img/<?php echo $post['image']; ?>" class="post-image" alt="">
            <?php endif; ?>

            <div class="post-title"><?php echo $post['title']; ?></div>
            <div class="post-content content-150"><?php echo $post['content']; ?></div>
            <a href="<?php echo $base_url; ?>/user/view_post/<?php echo $post_id; ?>" class="inline-btn">もっと見る</a>
            <a href="<?php echo $base_url; ?>/user/category/<?php echo $post['category']; ?>" class="post-cat"> <i class="fas fa-tag"></i> <span><?= $category[$post['category']]; ?></span></a>
            <div class="icons">
              <a href="<?php echo $base_url; ?>/user/view_post/<?php echo $post_id; ?>"><i class="fas fa-comment"></i><span>(<?php echo $post['count_post_comment']; ?>)</span></a>
              <button type="submit" name="like_post"><i class="fas fa-heart" style="<?php if ($post['confirm_like'] > 0  and $user['id'] != '') {
                                                                                      echo 'color:red;';
                                                                                    }; ?>"></i><span>(<?= $post['count_post_like']; ?>)</span></button>
            </div>
          </form>
      <?php
          $idx++;
        }
      } else {
        echo '<p class="empty">まだ投稿はありません。</p>';
      }
      ?>
    </div>
    <?php if (count($all_active_posts) > 0) : ?>
      <div class="more-btn" style="text-align: center; margin-top:1rem;">
        <a href="<?php echo $base_url; ?>/user/posts" class="inline-btn">すべての投稿を見る</a>
      </div>
    <?php endif; ?>
  </section>