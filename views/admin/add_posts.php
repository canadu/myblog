<?php $this->setLayoutVar('title', '新規投稿') ?>
<?php $this->setLayoutVar('errors', $errors) ?>
<?php $this->setLayoutVar('admin', $admin) ?>

<div class="content">

  <div class="container-fluid">

    <div class="row">

      <div class="col-12">

        <div class="card">

          <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="name" value="<?= $admin['name']; ?>">
              <input type="hidden" name="_token" value="<?= $this->escape($_token); ?>" />

              <!-- 投稿タイトル -->
              <div class="form-group">
                <label for="title">投稿タイトル <span class="badge badge-danger"> 必須</span></label>
                <input type="text" class="form-control" id="title" name="title" maxlength="100" require placeholder="投稿タイトルを入力してください。">
              </div>

              <!-- 投稿記事 -->
              <div class="form-group">
                <label for="content">投稿記事 <span class="badge badge-danger">必須</span></label>
                <textarea name="content" class="form-control" id="content" required maxlength="10000" placeholder="記事を入力してください。" cols="30" rows="10"></textarea>
              </div>

              <!-- 投稿カテゴリ -->
              <div class="form-group">
                <label for="category">投稿カテゴリ <span class="badge badge-danger"> 必須</span></label>
                <select id="category" name="category" class="form-control" required>
                  <option value="" selected disabled>カテゴリを選択</option>
                  <?php foreach ($category as $key => $value) { ?>
                    <option value="<?= $key; ?>"><?= $value; ?></option>
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
              </div>

              <!-- ボタン -->
              <div class="form-group mt-5">
                <div class="d-flex flex-row-reverse">
                  <div class="mb-3">
                    <button type="submit" name="publish" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i>投稿</button>
                    <button type="submit" name="draft" class="btn btn-outline-danger"><i class="fa-regular fa-note-sticky"></i>下書き</button>
                    <!-- <input type="submit" value="投稿" name="publish" class="btn btn-outline-info" />
                    <input type="submit" value="下書き" name="draft" class="btn btn-outline-danger" /> -->
                  </div>
                </div>
              </div>

            </form>

          </div><!-- card body -->
        </div><!-- card -->
      </div><!-- col -->
    </div><!-- row -->
  </div>
</div>