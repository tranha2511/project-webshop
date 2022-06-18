<?php
require_once 'helpers/Helper.php';
?>
<h1>Tìm kiếm</h1>
<form action="" method="get">
    <div class="form-group">
        <label>Nhập tên sản phẩm</label>
        <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>"
               class="form-control"/>
    </div>
    <input type="hidden" name="controller" value="product"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success btn-click"/>
    </div>
</form>
<h2>Danh sách sản phẩm</h2>
    <a href="index.php?controller=product&action=create" class="btn btn-success a-show-all btn-plus">
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
        <th>Danh mục hàng</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh sản phẩm</th>
        <th>Giá (VNĐ)</th>
        <th>Số lượng</th>
        <th>Mô tả</th>
        <td>Seo Title</td>
        <td>Seo Keywords</td>
        <td>Seo Description</td>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th>Cập nhật</th>
        <th></th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['category_name'] ?></td>
                <td><?php echo $product['title'] ?></td>
                <td>
                    <?php if (!empty($product['avatar'])): ?>
                        <img height="150px" src="assets/img/uploads/products/<?php echo $product['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo number_format($product['price']) ?></td>
                <td><?php echo $product['amount'] ?></td>
                <td><?php echo $product['description']?></td>
                <td><?php echo $product['seo_title']?></td>
                <td><?php echo $product['seo_keywords']?></td>
                <td><?php echo $product['seo_description']?></td>
                <td><?php echo Helper::getStatusText($product['status']) ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
                <td><?php echo !empty($product['update_at']) ? date('d-m-Y H:i:s', strtotime($product['update_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
                    $url_update = "index.php?controller=product&action=update&id=" . $product['id'];
                    $url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
                    ?>
                    <a class="i-crud" title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a class="i-crud" title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a class="i-crud" title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">Không có sản phẩm nào</td>
        </tr>
    <?php endif; ?>
</table>
<div class="pagination-pages"><?php echo $pages; ?></div>
