<?php if(empty($category)): ?>
    <h2>Không tồn tại danh mục</h2>
<?php else: ?>
    <h2>Chỉnh sửa danh mục #<?php echo $category['id'] ?></h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $category['name']; ?>"
                    class="form-control"/>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control"
                        name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $category['description']; ?></textarea>
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
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1" <?php echo $selected_disabled ?> >Active</option>
                    <option value="0" <?php echo $selected_active ?> >Disabled</option>
                </select>
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
<?php endif; ?>