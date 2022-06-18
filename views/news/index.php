<?php
require_once 'helpers/Helper.php';
?>
<h2>Danh sách tin tức</h2>
    <a href="index.php?controller=new&action=create" class="btn btn-success a-show-all btn-plus">
        <i class="fa fa-plus"></i> Thêm tin mới
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
        <th>Ảnh tin tức</th>
        <th>Tiêu đề tin</th>
        <th>Nội dung tin</th>
        <th>Ngày tạo</th>
        <th>Cập nhật</th>
        <th></th>
    </tr>
    <?php if (!empty($news)): ?>
        <?php foreach ($news as $new): ?>
            <tr>
                <td><?php echo $new['id'] ?></td>
                <td>
                    <?php if (!empty($new['avatar'])): ?>
                        <img height="150px" src="assets/img/uploads/news/<?php echo $new['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $new['title'] ?></td>
                <td><?php echo $new['content']?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])) ?></td>
                <td><?php echo !empty($new['updated_at']) ? date('d-m-Y H:i:s', strtotime($new['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=new&action=detail&id=" . $new['id'];
                    $url_update = "index.php?controller=new&action=update&id=" . $new['id'];
                    $url_delete = "index.php?controller=new&action=delete&id=" . $new['id'];
                    ?>
                    <a class="i-crud" title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
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
