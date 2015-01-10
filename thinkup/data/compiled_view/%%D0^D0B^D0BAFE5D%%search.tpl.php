<?php /* Smarty version 2.6.26, created on 2013-06-06 18:29:40
         compiled from search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'search.tpl', 13, false),array('modifier', 'cat', 'search.tpl', 24, false),array('modifier', 'number_format', 'search.tpl', 50, false),array('modifier', 'link_usernames_to_twitter', 'search.tpl', 58, false),array('modifier', 'urlencode', 'search.tpl', 82, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array('enable_bootstrap' => $this->_tpl_vars['enable_bootstrap'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_statusbar.tpl", 'smarty_include_vars' => array('enable_bootstrap' => $this->_tpl_vars['enable_bootstrap'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div id="main" class="container">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="row">
    <div class="span3">
      <div class="embossed-block">
        <ul>
          <li>
<?php if ($this->_tpl_vars['current_page'] == 1): ?>First <?php echo count($this->_tpl_vars['posts']); ?>
 s<?php else: ?>S<?php endif; ?>earch results for "<?php echo $_GET['q']; ?>
"
          </li>
        </ul>
      </div>
    </div><!--/span3-->

    <div class="span9">
    <?php if ($_GET['c'] == 'posts'): ?>
        <?php if (count($this->_tpl_vars['posts']) > 0): ?>
        <?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bar'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bar']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pid'] => $this->_tpl_vars['post']):
        $this->_foreach['bar']['iteration']++;
?>
            <div class="alert insight-item">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, "_post.tpl") : smarty_modifier_cat($_tmp, "_post.tpl")), 'smarty_include_vars' => array('post' => $this->_tpl_vars['post'],'hide_insight_header' => '1')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_footer.tpl') : smarty_modifier_cat($_tmp, '_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
         <h2>No posts found.</h2>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($_GET['c'] == 'searches'): ?>
        <?php if (count($this->_tpl_vars['posts']) > 0): ?>
        <?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bar'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bar']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pid'] => $this->_tpl_vars['post']):
        $this->_foreach['bar']['iteration']++;
?>
            <div class="alert insight-item">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, "_post.tpl") : smarty_modifier_cat($_tmp, "_post.tpl")), 'smarty_include_vars' => array('post' => $this->_tpl_vars['post'],'hide_insight_header' => '1')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_footer.tpl') : smarty_modifier_cat($_tmp, '_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
         <h2>No posts found.</h2>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($_GET['c'] == 'followers'): ?>
        <?php if (count($this->_tpl_vars['users']) > 0): ?>
        <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bar'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bar']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uid'] => $this->_tpl_vars['u']):
        $this->_foreach['bar']['iteration']++;
?>
            <div class="alert insight-item">
                <table class="table table-condensed">
                    <tr>
                    <td class="avatar-data">
                        <?php if ($this->_tpl_vars['u']->network == 'twitter'): ?>
                            <h3><a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['u']->user_id; ?>
" title="<?php echo $this->_tpl_vars['u']->username; ?>
 has <?php echo ((is_array($_tmp=$this->_tpl_vars['u']->follower_count)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 followers and <?php echo ((is_array($_tmp=$this->_tpl_vars['u']->friend_count)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 friends"><img src="<?php echo $this->_tpl_vars['u']->avatar; ?>
" class="avatar2"  width="48" height="48"/></a></h3>
                        <?php else: ?>
                            <h3><img src="<?php echo $this->_tpl_vars['u']->avatar; ?>
" class="avatar2" width="48" height="48"/></h3>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($this->_tpl_vars['u']->network == 'twitter'): ?>
                            <h3><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo $this->_tpl_vars['u']->network; ?>
/assets/img/favicon.png" class="service-icon2"/> <a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['u']->user_id; ?>
"><?php echo $this->_tpl_vars['u']->full_name; ?>
</a>     <small><?php echo ((is_array($_tmp=$this->_tpl_vars['u']->follower_count)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 followers</small></h3>
                            <p><?php echo ((is_array($_tmp=$this->_tpl_vars['u']->description)) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>
<br />
                            <?php echo $this->_tpl_vars['u']->url; ?>
</p>
                        <?php else: ?>
                            <h3><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo $this->_tpl_vars['u']->network; ?>
/assets/img/favicon.png" class="service-icon2"/> <?php echo $this->_tpl_vars['u']->full_name; ?>
    <?php if ($this->_tpl_vars['u']->other['total_likes']): ?><small style="color:gray"><?php echo ((is_array($_tmp=$this->_tpl_vars['u']->other['total_likes'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 likes</small><?php endif; ?></h3>
                        <?php endif; ?>
                    </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
         <h2>No followers found.</h2>
        <?php endif; ?>
    <?php endif; ?>
    </div><!--/span9-->
</div><!--/row-->

<div class="row">
    <div class="span3">&nbsp;</div>
    <div class="span9">

        <ul class="pager">
        <?php if ($this->_tpl_vars['next_page']): ?>
          <li class="previous">
            <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
search.php?<?php if ($_GET['u']): ?>u=<?php echo $_GET['u']; ?>
&<?php endif; ?><?php if ($_GET['c']): ?>c=<?php echo ((is_array($_tmp=$_GET['c'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&<?php endif; ?><?php if ($_GET['k']): ?>k=<?php echo ((is_array($_tmp=$_GET['k'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&<?php endif; ?><?php if ($_GET['q']): ?>q=<?php echo $_GET['q']; ?>
&<?php endif; ?><?php if ($_GET['n']): ?>n=<?php echo ((is_array($_tmp=$_GET['n'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&<?php endif; ?>page=<?php echo $this->_tpl_vars['next_page']; ?>
" id="next_page" class="pull-left btn btn-small"><i class="icon-arrow-left"></i> Older</a>
          </li>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['last_page']): ?>
          <li class="next">
            <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
search.php?<?php if ($_GET['u']): ?>u=<?php echo $_GET['u']; ?>
&<?php endif; ?><?php if ($_GET['c']): ?>c=<?php echo ((is_array($_tmp=$_GET['c'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&<?php endif; ?><?php if ($_GET['k']): ?>k=<?php echo ((is_array($_tmp=$_GET['k'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&<?php endif; ?><?php if ($_GET['q']): ?>q=<?php echo $_GET['q']; ?>
&<?php endif; ?><?php if ($_GET['n']): ?>n=<?php echo ((is_array($_tmp=$_GET['n'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&<?php endif; ?>page=<?php echo $this->_tpl_vars['last_page']; ?>
" id="last_page" class="pull-right btn btn-small">Newer <i class="icon-arrow-right"></i></a>
          </li>
        <?php endif; ?>
        </ul>

    </div>
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array('linkify' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>