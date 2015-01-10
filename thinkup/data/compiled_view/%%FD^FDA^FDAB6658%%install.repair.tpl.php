<?php /* Smarty version 2.6.26, created on 2014-10-18 18:40:55
         compiled from install.repair.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_install.header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div id="installer-page" class="container_24 round-all">
    <div class="clearfix prepend_20 append_20">
      <div class="grid_22 push_1 clearfix">
        <h2 class="clearfix step_title">Repairing</h2>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php if ($this->_tpl_vars['posted']): ?>

          <?php if ($this->_tpl_vars['succeed']): ?>
          <div style="margin-bottom: 20px;">
          
           <div class="alert helpful" style="margin: 20px 0px; padding: 0.5em 0.7em;">
                 <p>
                   <span class="ui-icon ui-icon-check" style="float: left; margin:.3em 0.3em 0 0;"></span>
                    <strong>Success!</strong>. ThinkUp's table repairs are complete. Please remove <code>$THINKUP_CFG['repair'] = true;</code>
                      from config.inc.php to prevent this page from being used by unauthorized users.
                    </p>
                  </div>
                <div style="float:right;padding:25px;"><a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
" class="linkbutton emphasized">Start Using ThinkUp</a></div>
                  <div class="clearfix">
                    <?php $_from = $this->_tpl_vars['messages_db']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
                      <?php echo $this->_tpl_vars['msg']; ?>

                    <?php endforeach; endif; unset($_from); ?>
                    <?php $_from = $this->_tpl_vars['messages_admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
                      <?php echo $this->_tpl_vars['msg']; ?>

                    <?php endforeach; endif; unset($_from); ?>
             </div>

          </div>

          <?php else: ?>
          <div class="clearfix error_message">
            <strong>Oops!</strong> Something went wrong.
          </div>
          <div class="clearfix">
            <?php $_from = $this->_tpl_vars['messages_db']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
              <?php echo $this->_tpl_vars['msg']; ?>

            <?php endforeach; endif; unset($_from); ?>
            <?php $_from = $this->_tpl_vars['messages_admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
              <?php echo $this->_tpl_vars['msg']; ?>

            <?php endforeach; endif; unset($_from); ?>
            <?php $_from = $this->_tpl_vars['messages_error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
              <?php echo $this->_tpl_vars['msg']; ?>

            <?php endforeach; endif; unset($_from); ?>
          </div>
          <?php endif; ?>
        <?php elseif ($this->_tpl_vars['show_form']): ?>
        <form class="input" name="form1" method="post" action="<?php echo $this->_tpl_vars['action_form']; ?>
">
          
          <div class="clearfix append_20">
            <div class="grid_10 prefix_7 left">
              <input type="submit" name="repair" class="linkbutton ui-state-default ui-priority-secondary ui-corner-all" value="Repair &raquo">
            </div>
          </div>
        </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_install.footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>