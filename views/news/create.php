<h2>Thêm mới tin tức</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tiêu đề tin</label>
        <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>"
               class="form-control"/>
    </div>

    <div class="form-group">
        <label for="avatar">Ảnh tin tức</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="150" height="150"/>
    </div>

    <div class="form-group">
        <label>Nội dung tin</label>
        <textarea class="form-control"
                  name="content"><?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?></textarea>
    </div>

    <div class="form-group">
      <?php
      $selected_active = '';
      $selected_disabled = '';
      if (isset($_POST['status'])) {
        switch ($_POST['status']) {
          case 0:
            $selected_disabled = 'selected';
            break;
          case 1:
            $selected_active = 'selected';
            break;
        }
      }
      ?>
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

    <input type="submit" class="btn btn-primary btn-click" name="submit" value="Save"/>
</form>