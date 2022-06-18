<?php if (empty($product)): ?>
    <h2>Không tồn tại product</h2>
<?php else: ?>
    <h2>Chỉnh sửa sản phẩm #<?php echo $product['id'] ?></h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="category_id">Chọn danh mục</label>
        <select name="category_id" class="form-control" id="category_id">
          <?php
          foreach ($categories as $category):
            $selected = '';
            if ($category['id'] == $product['category_id']) {
              $selected = 'selected';
            }
            if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
              $selected = 'selected';
            }
            ?>
              <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                <?php echo $category['name'] ?>
              </option>
          <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Nhập tên sản phẩm</label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $product['title'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh sản phẩm</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="150" height="150"/>
      <?php if (!empty($product['avatar'])): ?>
          <img height="100" src="assets/img/uploads/products/<?php echo $product['avatar'] ?>"/>
      <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input type="number" name="price"
               value="<?php echo isset($_POST['price']) ? $_POST['price'] : $product['price'] ?>"
               class="form-control" id="price"/>
    </div>
    <div class="form-group">
        <label for="amount">Số lượng</label>
        <input type="number" name="amount"
               value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : $product['amount'] ?>"
               class="form-control" id="amount"/>
    </div>
    <div class="form-group">
        <label for="size">Size</label>
        <input type="text" name="size"
               value="<?php echo isset($_POST['size']) ? $_POST['size'] : $product['size'] ?>"
               class="form-control" id="size"/>
    </div>
    <div class="form-group">
        <label for="description">Mô tả sản phẩm</label>
        <textarea name="description" id="description"
                  class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : $product['description'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="seo-title">Seo title</label>
        <input type="text" name="seo_title" value="<?php echo isset($_POST['seo_title']) ? $_POST['seo_title'] : $product['seo_title'] ?>"
               class="form-control" id="seo-title"/>
    </div>
    <div class="form-group">
        <label for="seo-description">Seo description</label>
        <input type="text" name="seo_description" value="<?php echo isset($_POST['seo_description']) ? $_POST['seo_description'] : $product['seo_description'] ?>"
               class="form-control" id="seo-description"/>
    </div>

    <div class="form-group">
        <label for="seo-keywords">Seo keywords</label>
        <input type="text" name="seo_keywords" value="<?php echo isset($_POST['seo_keywords']) ? $_POST['seo_keywords'] : $product['seo_keywords'] ?>"
               class="form-control" id="seo-keywords"/>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
          <?php
          $selected_disabled = '';
          $selected_active = '';
          if ($product['status'] == 0) {
            $selected_disabled = 'selected';
          } else {
            $selected_active = 'selected';
          }
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

            <option value="1" <?php echo $selected_active ?>>Active</option>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-click"/>
    </div>
</form>
<?php endif; ?>