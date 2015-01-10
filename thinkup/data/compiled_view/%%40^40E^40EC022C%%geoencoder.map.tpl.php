<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:37
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/geoencoder/view/geoencoder.map.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'get_plugin_path', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/geoencoder/view/geoencoder.map.tpl', 5, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/geoencoder/view/geoencoder.map.tpl', 11, false),)), $this); ?>
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

<div class="section">
    <h2>Response Map</h2>
    <div class="article">
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/geoencoder/assets/js/iframe.js"></script>
    <iframe width="710" frameborder=0 src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/geoencoder/map.php?pid=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo $this->_tpl_vars['post']->network; ?>
&t=post" name="childframe" id="childframe" >
    </iframe>
    </div>
</div>