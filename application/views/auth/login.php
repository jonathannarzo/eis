<?php include(APPPATH.'views/template/header.php'); ?>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <div class="panel-title"><?php echo lang('login_heading');?></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <?php echo form_open('auth/login', array('class' => 'form-horizontal'));?>

                        <p><?php echo lang('login_subheading');?></p>

                        <?php
                            if ($message) echo '<div class="alert alert-warning">'.$message.'</div>';
                        ?>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <?php echo form_input($identity);?>
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <?php echo form_input($password);?>
                        </div>

                        <div class="input-group">
                            <div class="checkbox">
                                <label><?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me</label>
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-primary'");?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
                                </div>
                            </div>
                        </div> 
                    <?php echo form_close();?>
                </div>                     
            </div>  
        </div>

    </div>

<?php include(APPPATH.'views/template/footer.php'); ?>