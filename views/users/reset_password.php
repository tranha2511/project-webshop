<form action="" method="post" class="container">
    <h1>Reset password</h1>
    <label for="username">Nhập email cần reset mật khẩu</label>
    <input type="email" name="username" value="" class="form-control" id="username" />
    <br />
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
                
    <input type="submit" name="submit" value="Lấy lại mật khẩu" class="btn btn-success btn-click" />
</form>
