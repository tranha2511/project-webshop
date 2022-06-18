<h1>Chi tiết tin tức</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $new['id']; ?></td>
    </tr>
    <tr>
        <th>Tiêu đề</th>
        <td><?php echo $new['title']; ?></td>
    </tr>
    <tr>
        <th>Ảnh tin</th>
        <td>
            <?php if (!empty($new['avatar'])): ?>
                <img height="100" src="assets/img/uploads/news/<?php echo $new['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Nội dung</th>
        <td><?php echo $new['content']; ?></td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($new['updated_at'])); ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary btn-click" href="index.php?controller=new">Back</a>

