<?php if (empty($new)): ?>
    <h2>Không tồn tại tin</h2>
<?php else: ?>
    <h2>Chỉnh sửa tin #<?php echo $new['id'] ?></h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tiêu đề tin </label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $new['title'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh tin tức</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="150" height="150"/>
      <?php if (!empty($new['avatar'])): ?>
          <img height="100" src="assets/img/uploads/news/<?php echo $new['avatar'] ?>"/> 
      <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="content">Mô tả sản phẩm</label>
        <textarea name="content" id="content"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $new['content'] ?></textarea>
    </div>
    <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
          </div>
      <?php endif; ?>

      <?php if (!empty($this->error)): ?>
          <div class="alert alert-danger">
            <?php
            echo $this->error;
            ?>
          </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </div>
      <?php endif; ?>

    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-click"/>
    </div>
</form>
<?php endif; ?>