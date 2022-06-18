<div class="container-login">
    <div class="content-login">
        <form method="post" action="">
            <h2 class="h2-login">Đăng ký</h2>
            <div class="form-group">
                <label for="username" class="text-login label-login">Tài khoản</label>
                <input type="text" name="username" value="" id="username" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="password" class="text-login label-login">Mật khẩu</label>
                <input type="password" name="password" value="" id="password" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="password" class="text-login label-login">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirm" value="" id="password" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary btn-click"/>
                
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

                <p>
                    <a href="dang-nhap.html" class="a-login">Đăng nhập</a>
                </p>
                <p>
                    <a href="trang-chu.html" class="a-login">Trang chủ</a> 
                </p>
            </div>
        </form>
    </div>
</div>
