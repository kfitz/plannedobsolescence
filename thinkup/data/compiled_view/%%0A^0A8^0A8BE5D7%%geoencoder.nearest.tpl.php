<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:37
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/geoencoder/view/geoencoder.nearest.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'get_plugin_path', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/geoencoder/view/geoencoder.nearest.tpl', 5, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/geoencoder/view/geoencoder.nearest.tpl', 11, false),)), $this); ?>
   <?php if ($this->_tpl_vars['post']): ?>
      <div class="clearfix alert stats">
        <div class="grid_2 alpha">
        <div class="avatar-container">
          <img src="<?php echo $this->_tpl_vars['post']->author_avatar; ?>
" class="avatar2"/><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('get_plugin_path', true, $_tmp) : smarty_modifier_get_plugin_path($_tmp)); ?>
/assets/img/favicon.png" class="service-icon2"/>
         </div>
        </div>
        <div class="<?php if ($this->_tpl_vars['retweets']): ?>grid_12<?php else: ?>grid_16<?php endif; ?>">
          <span class="tweet">
            <?php if ($this->_tpl_vars['post']->post_text): ?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

            <?php else: ?>
              <span class="no-post-text">No post text</span>
            <?php endif; ?>
          </span>
          <?php if ($this->_tpl_vars['post']->link->expanded_url && ! $this->_tpl_vars['post']->link->image_src && $this->_tpl_vars['post']->link->expanded_url != $this->_tpl_vars['post']->link->url): ?>
            <br><a href="<?php echo $this->_tpl_vars['post']->link->expanded_url; ?>
" title="<?php echo $this->_tpl_vars['post']->link->expanded_url; ?>
">
              <?php echo $this->_tpl_vars['post']->link->expanded_url; ?>

            </a>
          <?php endif; ?>
          <div class="grid_6 omega small gray prefix_10">
            <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
            Posted at <a href="http://twitter.com/<?php echo $this->_tpl_vars['post']->author_username; ?>
/statuses/<?php echo $this->_tpl_vars['post']->post_id; ?>
"><?php echo $this->_tpl_vars['post']->adj_pub_date; ?>
</a><?php if ($this->_tpl_vars['post']->source): ?> via <?php echo $this->_tpl_vars['post']->source; ?>
<?php endif; ?><br>
            <?php else: ?>
            Posted at <?php echo $this->_tpl_vars['post']->adj_pub_date; ?>
<?php if ($this->_tpl_vars['post']->source): ?> via <?php echo $this->_tpl_vars['post']->source; ?>
<?php endif; ?><br>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['post']->location): ?>From: <?php echo $this->_tpl_vars['post']->location; ?>
<?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
 <?php if ($this->_tpl_vars['geoencoder_nearest']): ?>
   <div class="append_20 clearfix section">
   <h2>Nearest Replies</h2>
     <?php $_from = $this->_tpl_vars['geoencoder_nearest']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['t']):
        $this->_foreach['foo']['iteration']++;
?>
        <?php if (($this->_foreach['foo']['iteration']-1) > 1): ?>
       <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_post.author_no_counts.tpl", 'smarty_include_vars' => array('post' => $this->_tpl_vars['t'],'sort' => 'no','show_distance' => 'true','scrub_reply_username' => 'true','unit' => $this->_tpl_vars['geoencoder_options']['distance_unit']->option_value)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?>
   </div>
<?php else: ?>
    <?php $this->assign('error_msg', "This post has not been geoencoded yet; cannot display posts by location."); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>