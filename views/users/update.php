<h2>Cập nhật tài khoản</h2>
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
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">User name <span class="red"></span></label>
        <input type="text" name="username" id="username"
               value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="first_name">First_name</label>
        <input type="text" name="first_name" id="first_name"
               value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : $user['first_name'] ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="last_name">Last_name</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : $user['last_name'] ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $user['phone'] ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email'] ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : $user['address'] ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control"/>
        <?php if (!empty($user['avatar'])): ?>
          <img height="100" src="assets/img/uploads/users/<?php echo $user['avatar'] ?>"/>
      <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-click"/>
    </div>
</form>