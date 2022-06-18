<?php
require_once 'helpers/Helper.php';
?>
<h2>Danh sách banner</h2>
    <a href="index.php?controller=banner&action=create" class="btn btn-success a-show-all btn-plus">
        <i class="fa fa-plus"></i> Thêm banner mới
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
        <th>Ảnh banner</th>
        <th>Tiêu đề banner</th>
        <th>Ngày tạo</th>
        <th></th>
    </tr>
    <?php if (!empty($banners)): ?>
        <?php foreach ($banners as $banner): ?>
            <tr>
                <td><?php echo $banner['id'] ?></td>
                <td>
                    <?php if (!empty($banner['img'])): ?>
                        <img height="150px" src="assets/img/uploads/banners/<?php echo $banner['img'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $banner['title'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($banner['created_at'])) ?></td>
                <td>
                    <?php
                    $url_update = "index.php?controller=banner&action=update&id=" . $banner['id'];
                    $url_delete = "index.php?controller=banner&action=delete&id=" . $banner['id'];
                    ?>
                    <a class="i-crud" title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a class="i-crud" title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn có chắc muốn xóa tin này?')"><i
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
