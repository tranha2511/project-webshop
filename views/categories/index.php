<h1>Danh sách category</h1>
<a href="index.php?controller=category&action=create" class="btn btn-primary btn-plus">
    <i class="fa fa-plus"></i> Thêm mới
</a>
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
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th>Cập nhật</th>
        <th></th>
    </tr>
  <?php if (!empty($categories)): ?>
    <?php foreach ($categories as $category): ?>
          <tr>
              <td>
                <?php echo $category['id']; ?>
              </td>
              <td>
                <?php echo $category['name']; ?>
              </td>
              <td>
                <?php echo $category['description']; ?>
              </td>
              <td>
                <?php
                $status_text = 'Active';
                if ($category['status'] == 0) {
                  $status_text = 'Disabled';
                }
                echo $status_text;
                ?>
              </td>
              <td>
                <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
              </td>
              <td>
                <?php
                if (!empty($category['update_at'])) {
                  echo date('d-m-Y H:i:s', strtotime($category['update_at']));
                }
                ?>
              </td>
              <td>
                  <a class ="i-crud" href="index.php?controller=category&action=detail&id=<?php echo $category['id'] ?>"
                     title="Chi tiết">
                      <i class="fa fa-eye"></i>
                  </a>
                  <a class ="i-crud" href="index.php?controller=category&action=update&id=<?php echo $category['id'] ?>" title="Sửa">
                      <i class="fa fa-pencil-alt"></i>
                  </a>
                  <a class ="i-crud" href="index.php?controller=category&action=delete&id=<?php echo $category['id'] ?>" title="Xóa"
                     onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này')">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
          </tr>
    <?php endforeach ?>
  <?php else: ?>
      <tr>
          <td colspan="7">Không có danh mục nào</td>
      </tr>
  <?php endif; ?>
</table>
<div class="pagination-pages"><?php echo $pages; ?></div>
<!--  hiển thị phân trang-->

