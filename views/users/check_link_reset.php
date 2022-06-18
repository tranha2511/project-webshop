<form action="" method="post" class="container">
    <h2>Thay đổi mật khẩu</h2>

    <div class="form-group">
        <label for="password">Mật khẩu mới:</label>
        <input type="password" id="password" name="password" class="form-control" />
    </div>

    <div class="form-group">
        <label for="password_confirm">Nhập lại mật khẩu:</label>
        <input type="password" id="password_confirm" name="password_confirm" class="form-control" />
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

    <div class="form-group">
        <input type="submit" name="submit" value="Cập nhật mật khẩu" class="btn btn-primary btn-click" />
    </div>
</form>
