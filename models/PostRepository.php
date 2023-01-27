<?php
class PostRepository extends DbRepository
{
  /**
   * 投稿カテゴリー毎のデータを取得する
   */
  public function fetchByPostByCategory($category, $status)
  {
    $sql = "SELECT * FROM posts WHERE category = :category AND status = :status";
    return $this->fetchAll($sql, array(':category' => $category, ':status' => $status));
  }

  /**
   * 投稿カテゴリー毎のデータを取得する
   */
  public function fetchAllByPostByStatus($status)
  {
    $sql = "SELECT * FROM posts WHERE status = :status";
    return $this->fetchAll($sql, array(':status' => $status));
  }

  /**
   * 投稿データを取得する
   */
  public function fetchAllByPostByStatusAndId($status, $id)
  {
    $sql = "SELECT * FROM posts WHERE status = :status AND id = :id";
    return $this->fetchAll($sql, array(':status' => $status, ':id' => $id));
  }

  /**
   * 投稿データを取得する
   */
  public function fetchAllByPostByStatusAndName($status, $name)
  {
    $sql = "SELECT * FROM posts WHERE status = :status AND name = :name";
    return $this->fetchAll($sql, array(':status' => $status, ':name' => $name));
  }

  /**
   * 投稿カテゴリー毎のデータを取得する
   */
  public function fetchAllPostByStatusAndAdminId($status, $admin_id)
  {
    $sql = "SELECT * FROM posts WHERE status = :status AND admin_id = :admin_id";
    return $this->fetchAll($sql, array(':status' => $status, ':admin_id' => $admin_id));
  }


  /**
   * 投稿カテゴリー毎のデータを取得する
   */
  public function fetchCountByPostByStatusAndAdminId($status, $admin_id)
  {
    $sql = "SELECT COUNT(*)  AS total FROM posts WHERE status = :status AND admin_id = :admin_id";
    return $this->fetch($sql, array(':status' => $status, ':admin_id' => $admin_id));
  }

  /**
   * 投稿カテゴリー毎のデータを取得する
   */
  public function fetchPostCountByAdminId($admin_id)
  {
    $sql = "SELECT COUNT(*)  AS total FROM posts WHERE admin_id = :admin_id";
    return $this->fetch($sql, array(':admin_id' => $admin_id));
  }


  /**
   * 投稿を取得する
   */
  public function fetchPostId($id)
  {
    $sql = "SELECT * FROM posts WHERE id = :id";
    return $this->fetch($sql, array(':id' => $id));
  }

  public function fetchAllPostByInputWords($input_word, $status)
  {
    $input_word = "%" . $input_word . "%";
    $sql = "SELECT * FROM posts WHERE (title LIKE :input_word OR category LIKE :input_word2) AND status = :status";
    return $this->fetchAll($sql, array(':input_word' => $input_word, ':input_word2' => $input_word, ':status' => $status));
  }

  public function fetchAllPostByInputWordsAndAdminId($admin_id, $input_word)
  {
    $input_word = "%" . $input_word . "%";
    $sql = "SELECT * FROM posts WHERE admin_id = :admin_id and title LIKE :input_word OR category LIKE :input_word2";
    return $this->fetchAll($sql, array(':admin_id' => $admin_id, ':input_word' => $input_word, ':input_word2' => $input_word));
  }

  /**
   * 管理者IDをキーに投稿を取得する
   */
  public function fetchAllPostByAdminId($admin_id)
  {
    $sql = "SELECT * FROM posts WHERE admin_id = :admin_id";
    return $this->fetchAll($sql, array(':admin_id' => $admin_id));
  }

  // 投稿
  public function insert($admin_id, $name, $title, $content, $category, $image, $status)
  {
    $sql = "INSERT INTO posts(admin_id, name, title, content, category, image, status) VALUES(:admin_id, :name, :title, :content, :category, :image, :status)";
    $stmt = $this->execute($sql, array(
      ':admin_id' => $admin_id,
      ':name' => $name,
      ':title' => $title,
      ':content' => $content,
      ':category' => $category,
      ':image' => $image,
      ':status' => $status,
    ));
  }

  // 投稿の削除
  public function delete($id)
  {
    $sql = "DELETE FROM posts WHERE id = :id";
    $stmt = $this->execute($sql, array(
      ':id' => $id
    ));
  }

  // 投稿の削除
  public function deleteByAdminId($admin_id)
  {
    $sql = "DELETE FROM posts WHERE admin_id = :admin_id";
    $stmt = $this->execute($sql, array(
      ':admin_id' => $admin_id
    ));
  }

  // 投稿の編集
  public function update($title, $content, $category, $status, $id)
  {
    $sql = "UPDATE posts SET title=:title, content=:content, category=:category, status=:status WHERE id=:id";

    $stmt = $this->execute($sql, array(
      ':title' => $title,
      ':content' => $content,
      ':category' => $category,
      ':status' => $status,
      ':id' => $id,
    ));
  }

  //管理者が投稿した記事を取得する
  public function fetchPostByAdminIdAndId($admin_id, $id)
  {
    $sql = "SELECT * FROM posts WHERE admin_id = :admin_id AND id = :id";
    return $this->fetch($sql, array(':admin_id' => $admin_id, ':id' => $id));
  }

  //画像のファイル名を取得
  public function fetchPostByImageAndAdminId($image, $admin_id)
  {
    $sql = "SELECT * FROM posts WHERE image = :image AND admin_id = :admin_id";
    return $this->fetch($sql, array(':image' => $image, 'admin_id' => $admin_id));
  }

  // 投稿画像の編集
  public function updateImage($image, $id)
  {
    $sql = "UPDATE posts SET image = :image WHERE id = :id";
    $stmt = $this->execute($sql, array(
      ':image' => $image,
      ':id' => $id,
    ));
  }

  // 投稿者名を更新する
  public function updateName($admin_id, $name)
  {
    $sql = "UPDATE posts SET name = :name WHERE admin_id = :admin_id";
    $stmt = $this->execute($sql, array(
      ':admin_id' => $admin_id,
      ':name' => $name,
    ));
  }
}
