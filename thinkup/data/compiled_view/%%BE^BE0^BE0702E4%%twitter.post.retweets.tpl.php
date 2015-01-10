<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:38
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/twitter/view/twitter.post.retweets.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/twitter/view/twitter.post.retweets.tpl', 12, false),array('modifier', 'count', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/twitter/view/twitter.post.retweets.tpl', 16, false),)), $this); ?>
       <?php if ($this->_tpl_vars['post']): ?>
          <div class="clearfix alert stats">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "post.index._top-post.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <div class="grid_6 center keystats omega">
              <div class="big-number">
               <?php if ($this->_tpl_vars['retweets']): ?>
                  <?php $this->assign('reach', 0); ?>
                  <?php $_from = $this->_tpl_vars['retweets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['t']):
        $this->_foreach['foo']['iteration']++;
?>
                   <?php $this->assign('reach', $this->_tpl_vars['reach']+$this->_tpl_vars['t']->author->follower_count); ?>
                  <?php endforeach; endif; unset($_from); ?>
                  <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->all_retweets)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php if ($this->_tpl_vars['post']->rt_threshold): ?>+<?php endif; ?></h1>
                  <h3>forward<?php if ($this->_tpl_vars['post']->all_retweets > 1): ?>s<?php endif; ?> to <?php echo ((is_array($_tmp=$this->_tpl_vars['reach'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</h3>
               <?php endif; ?> <!-- end if retweets -->
               <?php if ($this->_tpl_vars['favds']): ?>
                  <h1><?php echo count($this->_tpl_vars['favds']); ?>
</h2>
                  <h3>favorites</h3>
               <?php endif; ?> <!-- end if favds -->
                <?php endif; ?>
              </div>
            </div>
          </div> <!-- end .clearfix -->

<?php if ($this->_tpl_vars['retweets']): ?>
<div class="prepend">
  <div class="append_20 clearfix section">
      <h2>Retweets</h2>
    <?php $_from = $this->_tpl_vars['retweets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['t']):
        $this->_foreach['foo']['iteration']++;
?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_post.author_no_counts.tpl", 'smarty_include_vars' => array('post' => $this->_tpl_vars['t'],'scrub_reply_username' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endforeach; endif; unset($_from); ?>
  </div>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['favds']): ?>
  <div class="prepend">
  <div class="append_20 clearfix section">
      <h2>Favorited</h2>
    <?php $_from = $this->_tpl_vars['favds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['fid'] => $this->_tpl_vars['f']):
        $this->_foreach['foo']['iteration']++;
?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_user.tpl", 'smarty_include_vars' => array('f' => $this->_tpl_vars['f'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endforeach; endif; unset($_from); ?>
  </div>
  </div>
<?php endif; ?>


<script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/linkify.js"></script>


<?php if ($this->_tpl_vars['is_searchable']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_grid.search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/grid_search.js"></script>
    
<?php endif; ?>
