<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:35
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/favoriteflashbacks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/favoriteflashbacks.tpl', 1, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_header.tpl') : smarty_modifier_cat($_tmp, '_header.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <div class="insight-attachment-detail posts">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, "_posts.tpl") : smarty_modifier_cat($_tmp, "_posts.tpl")), 'smarty_include_vars' => array('icon' => 'heart')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_footer.tpl') : smarty_modifier_cat($_tmp, '_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>