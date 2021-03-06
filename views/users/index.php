<form method="GET" action="">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"
               value="<?php echo isset($_GET['username']) ? $_GET['username'] : '' ?>" class="form-control"/>
        <input type="hidden" name="controller" value="user"/>
        <input type="hidden" name="action" value="index"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Tìm kiếm" name="search" class="btn btn-primary btn-click"/>
    </div>
</form>

<h2>Danh sách user</h2>
<a href="index.php?controller=user&action=create" class="btn btn-success btn-plus">
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
        <th>Username</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>phone</th>
        <th>address</th>
        <th>email</th>
        <th>avatar</th>
        <th>created_at</th>
        <th>update_at</th>
        <th></th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['address'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td>
                    <?php if (!empty($user['avatar'])): ?>
                        <img height="80" src="assets/img/uploads/users/<?php echo $user['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
                <td><?php echo !empty($user['update_at']) ? date('d-m-Y H:i:s', strtotime($user['update_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_update = "index.php?controller=user&action=update&id=" . $user['id'];
                    $url_delete = "index.php?controller=user&action=delete&id=" . $user['id'];
                    ?>
                    <a title="Update" href="<?php echo $url_update ?>" class="i-crud"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" class="i-crud" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
</table>