<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-lock"></span> Đăng nhập</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url().$module.'/auth/login'; ?>">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên đăng nhập</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="Vui lòng điền tên đăng nhập" required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Mật khẩu</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" placeholder="Vui lòng điền mật khẩu" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"/>
                            Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group last">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit" class="btn btn-success" name="ok" value="Đăng nhập" />
                    <input type="reset" class="btn btn-default" value="Reset" />
                </div>
            </div>
        </form>
        <?php  
            if ($error != "") {
              echo '<div class="alert alert-danger" role="alert">';
              echo '<i class="fa fa-fw fa-times-circle"></i> '.$error;
              echo '</div>';
            }
          ?>
    </div>
    <div class="panel-footer">
        Quên mật khẩu? <a href="<?php echo base_url().'dang-ky';?>">Đăng ký ở đây</a>
    </div>
</div>