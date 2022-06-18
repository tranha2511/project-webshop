<?php if (empty($banner)): ?>
    <h2>Không tồn tại banner</h2>
<?php else: ?>
    <h2>Chỉnh sửa banner #<?php echo $banner['id'] ?></h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tiêu đề banner </label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $banner['title'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh banner</label>
        <input type="file" name="img" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="150" height="150"/>
      <?php if (!empty($banner['img'])): ?>
          <img height="auto" src="assets/img/uploads/banners/<?php echo $banner['img'] ?>"/> 
      <?php endif; ?>
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