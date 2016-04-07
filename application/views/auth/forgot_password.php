<?php include(APPPATH.'views/template/header.php'); ?>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <div class="panel-title"><?php echo lang('forgot_password_heading');?></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <div id="infoMessage"><?php echo $message;?></div>

                    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
                    <?php echo form_open("auth/forgot_password");?>

						<p>
							<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
							<?php echo form_input($identity);?>
						</p>

						<p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), "class='btn btn-primary'");?></p>

                    <?php echo form_close();?>
                </div>                     
            </div>  
        </div>

    </div>

<?php include(APPPATH.'views/template/footer.php'); ?>