<?php $this->setLayoutVar('title', '投稿記事の修正') ?>
<?php $this->setLayoutVar('errors', $errors) ?>
<?php $this->setLayoutVar('admin', $admin) ?>

<div class="content">
  <div class="container-fluid">

    <div class="row">

      <div class="col-12">

        <div class="card">

          <div class="card-body">

            <?php if (count($select_posts) > 0) : ?>

              <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="old_image" value="<?php echo $select_posts['image']; ?>">
                <input type="hidden" name="post_id" value="<?php echo $select_posts['id']; ?>">
                <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />

                <!-- 投稿タイトル -->
                <div class="form-group">
                  <label for="title">投稿タイトル <span class="badge badge-danger"> 必須</span></label>
                  <input type="text" class="form-control" id="title" name="title" maxlength="100" require value="<?= $select_posts['title']; ?>" placeholder="投稿タイトルを入力してください。">
                </div>

                <!-- 投稿記事 -->
                <div class="form-group">
                  <label for="content">投稿記事 <span class="badge badge-danger">必須</span></label>
                  <textarea name="content" class="form-control" id="content" required maxlength="10000" placeholder="記事を入力してください。" cols="30" rows="10"><?= $select_posts['content']; ?></textarea>
                </div>

                <!-- 投稿カテゴリ -->
                <div class="form-group">
                  <label for="category">投稿カテゴリ <span class="badge badge-danger"> 必須</span></label>
                  <select id="category" name="category" class="form-control" required>
                    <option value="<?= $select_posts['category']; ?>" selected><?= $category[$select_posts['category']]; ?></option>
                    <?php foreach ($category as $key => $value) { ?>
                      <?php if ($key != $select_posts['category']) : ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php endif; ?>
                    <?php } ?>
                  </select>
                </div>

                <!-- 投稿画像 -->
                <div class="form-group">
                  <label for="inputFile">投稿画像</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/jpg, image/jpeg, image/png, image/webp">
                      <label class="custom-file-label" for="customFile" data-browse="参照">画像ファイルを選択...</label>
                    </div>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-outline-secondary reset">取消</button>
                    </div>
                  </div>
                  <?php if ($select_posts['image'] != '') : ?>
                    <div class="mt-2">
                      <img src="../../uploaded_img/<?= $select_posts['image']; ?>" class="img-thumbnail" alt="<?= $select_posts['title']; ?>の投稿画像" width="200px" height="200px">
                    </div>
                  <?php endif; ?>
                </div>

                <!-- ボタン -->
                <div class="form-group mt-2">
                  <div class="d-flex flex-row-reverse">
                    <div class="mb-3">
                      <a href="<?= $base_url; ?>/admin/view_posts" class="btn btn-outline-secondary">戻る</a>
                      <!-- <input type="submit" value="編集" name="save" class="btn btn-outline-info"> -->
                      <button type="submit" name="save" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i> 編集</button>
                      <?php if ($select_posts['image'] != '') : ?>
                        <button type="submit" name="delete_image" class="btn btn-outline-danger" onclick="return confirm('画像を削除しますか？');"><i class="fa-regular fa-image"></i> 画像削除</button>
                      <?php endif; ?>
                      <button type="submit" name="delete_post" class="btn btn-outline-danger" onclick="return confirm('この投稿を削除しますか？');"><i class="fa-solid fa-trash-can"></i> 投稿を削除</button>
                    </div>
                  </div>
                </div>

              </form>

            <?php else : ?>
              <div class="mt-3">
                <p class="fs-2 text-center">投稿記事がありません。</p>
              </div>
              <!-- ボタン -->
              <div class="form-group mt-2">
                <div class="d-flex justify-content-center">
                  <div class="mb-3">
                    <a href="<?= $base_url; ?>/admin/view_posts" class="btn btn-outline-secondary">投稿を見る</a>
                    <a href="<?= $base_url; ?>/admin/add_posts" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i>投稿する</a>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>