<?php /* Smarty version 2.6.26, created on 2014-12-19 07:10:10
         compiled from session.forgot.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'help_link', 'session.forgot.tpl', 53, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array('enable_bootstrap' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_statusbar.tpl", 'smarty_include_vars' => array('enable_bootstrap' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="container">

<div class="row">
    <div class="span3">
          <div class="embossed-block">
            <ul>
              <li>Reset Your Password</li>
            </ul>
          </div>
    </div><!--/span3-->
    <div class="span6">




    <?php if (isset ( $this->_tpl_vars['error_msgs'] )): ?>
        <div class="alert alert-error"><p><?php echo $this->_tpl_vars['error_msg']; ?>
</p></div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['success_msg'] )): ?>
        <div class="alert alert-success"><p><?php echo $this->_tpl_vars['success_msg']; ?>
</p></div>
    <?php endif; ?>

            <form name="forgot-form" method="post" action="" class="login form-horizontal">

                <fieldset style="background-color : white; padding-top : 30px;">
                
                
                <div class="control-group">
                    <label class="control-label" for="site_email">Email&nbsp;Address</label>
                    <div class="controls">
                        <span class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="email" name="email" id="email" required 
                            data-validation-required-message="<i class='icon-exclamation-sign'></i> A valid email address is required.">
                        </span>
                        <span class="help-inline"></span>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'email','enable_bootstrap' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </div>
                    
                    
                    
                    <div class="form-actions">
                            <input type="submit" id="login-save" name="Submit" class="btn btn-primary" value="Send Reset">
                            <span class="pull-right">
                                <div class="btn-group">
                                    <a href="login.php" class="btn btn-mini">Log In</a>
                                    <?php if ($this->_tpl_vars['is_registration_open']): ?><a href="register.php" class="btn btn-mini hidden-phone">Register</a><?php else: ?><?php endif; ?>
                                    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'help_link', 'id' => 'forgot')), $this); ?>

                                </div>
                            </span>
                    </div>

                </fieldset>
            </form>

    </div><!-- end span9 -->

</div><!-- end row -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array('enable_bootstrap' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>