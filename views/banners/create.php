<h2>Thêm mới banner</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tiêu đề banner</label>
        <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="img">Ảnh</label>
        <input type="file" name="img" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="auto" height="auto"/>
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