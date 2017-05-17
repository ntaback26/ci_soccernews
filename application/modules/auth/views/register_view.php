<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-pencil"></span> Đăng ký</div>
    <div class="panel-body">
        <form class="form-horizontal form-create" method="POST" 
          action="<?php echo base_url().$module.'/auth/register'; ?>">
          
          <div class="form-group">
            <label class="col-sm-4 control-label">Tên đăng nhập</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="username" placeholder="Vui lòng điền tên đăng nhập" required />      
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Mật khẩu</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password" placeholder="Vui lòng điền mật khẩu" required />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Xác nhận mật khẩu</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password2" placeholder="Vui lòng xác nhận mật khẩu" required />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="email" placeholder="Vui lòng điền email" required />      
            </div>
          </div>

          <div class="form-group last">
            <div class="col-sm-offset-4 col-sm-8">
              <input type="submit" class="btn btn-primary" name="ok" value="Đăng ký" />&nbsp;
              <input type="reset" class="btn btn-default" value="Reset" />
            </div>
          </div>

        </form>  

        <?php
          // Echo validation error
          if (validation_errors() != "") {
            $errors = $this->form_validation->error_array();
            echo '<div class="alert alert-danger" role="alert">';
            echo "<ul>";
            foreach ($errors as $item) {
              echo "<li>$item</li>";
            }
            echo "</ul>";
            echo '</div>'; 
          }

          if ($success != "") {
            echo '<div class="alert alert-success" role="alert">';
            echo '<i class="fa fa-fw fa-check"></i> <strong>'.$success.'</strong>';
            echo '&nbsp; <a href="#">Quay về trang chủ</a>';
            echo '</div>';
          }
        ?>

    </div>

</div>