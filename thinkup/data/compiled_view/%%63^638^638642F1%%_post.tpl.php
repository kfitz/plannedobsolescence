<?php /* Smarty version 2.6.26, created on 2014-10-20 04:02:08
         compiled from _post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'get_plugin_path', '_post.tpl', 20, false),array('modifier', 'number_format', '_post.tpl', 34, false),array('modifier', 'filter_xss', '_post.tpl', 44, false),array('modifier', 'regex_replace', '_post.tpl', 44, false),array('modifier', 'link_usernames_to_twitter', '_post.tpl', 44, false),array('modifier', 'urlencode', '_post.tpl', 64, false),array('modifier', 'relative_datetime', '_post.tpl', 70, false),array('modifier', 'truncate', '_post.tpl', 79, false),)), $this); ?>
<?php if (($this->_foreach['foo']['iteration'] <= 1)): ?>

  <div class="header clearfix">
    <div class="grid_2 alpha">&#160;</div>
    <div class="grid_3">&#160;</div>
    <div class="grid_8">&#160;</div>
    <div class="grid_2 center">
      <?php if ($this->_tpl_vars['t']->network == 'twitter'): ?>retweets<?php else: ?><?php if ($this->_tpl_vars['t']->network == 'google+'): ?>+1s<?php else: ?>likes<?php endif; ?><?php endif; ?>
    </div>
    <div class="grid_2 center omega">
      replies
    </div>
  </div>
<?php endif; ?>

<div class="clearfix article">
<div class="individual-tweet post clearfix<?php if ($this->_tpl_vars['t']->is_protected): ?> private<?php endif; ?>">
    <div class="grid_2 alpha">
      <div class="avatar-container">
        <img src="<?php echo $this->_tpl_vars['t']->author_avatar; ?>
" class="avatar"/><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo ((is_array($_tmp=$this->_tpl_vars['t']->network)) ? $this->_run_mod_handler('get_plugin_path', true, $_tmp) : smarty_modifier_get_plugin_path($_tmp)); ?>
/assets/img/favicon.png" class="service-icon"/>
        <?php if ($this->_tpl_vars['t']->is_reply_by_friend || $this->_tpl_vars['t']->is_retweet_by_friend): ?>
           <div class="small gray">Friend</div>
        <?php endif; ?>
      </div>
    </div>
    <div class="grid_3 small">
      <?php if ($this->_tpl_vars['t']->network == 'twitter' && $this->_tpl_vars['username_link'] != 'internal'): ?>
      <a <?php if ($this->_tpl_vars['reply_count'] && $this->_tpl_vars['reply_count'] > $this->_tpl_vars['top_20_post_min']): ?>id="post_username-<?php echo $this->_foreach['foo']['iteration']; ?>
" <?php endif; ?>
      href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['t']->author_user_id; ?>
"><?php echo $this->_tpl_vars['t']->author_username; ?>
</a>
      <?php else: ?>
        <?php echo $this->_tpl_vars['t']->author_username; ?>

      <?php endif; ?>
      <?php if ($this->_tpl_vars['t']->author->follower_count > 0): ?>
        <div class="small gray"><?php echo ((is_array($_tmp=$this->_tpl_vars['t']->author->follower_count)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 followers</div>
      <?php endif; ?>
        </div>
    <div class="grid_8">
      <div class="post">
        <?php if ($this->_tpl_vars['t']->post_text): ?>
          <?php if ($this->_tpl_vars['scrub_reply_username']): ?>
            <?php if ($this->_tpl_vars['reply_count'] && $this->_tpl_vars['reply_count'] > $this->_tpl_vars['top_20_post_min']): ?>
                <div class="reply_text" id="reply_text-<?php echo $this->_foreach['foo']['iteration']; ?>
">
            <?php endif; ?> 
            <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['t']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^@[a-zA-Z0-9_]+/", "") : smarty_modifier_regex_replace($_tmp, "/^@[a-zA-Z0-9_]+/", "")))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

            <?php if ($this->_tpl_vars['reply_count'] && $this->_tpl_vars['reply_count'] > $this->_tpl_vars['top_20_post_min']): ?></div><?php endif; ?>
          <?php else: ?>
           <?php if ($this->_tpl_vars['t']->network == 'google+'): ?>
            <?php echo $this->_tpl_vars['t']->post_text; ?>

           <?php else: ?>
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['t']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

            <?php endif; ?>
          <?php endif; ?>
        <?php endif; ?>
      <?php if ($this->_tpl_vars['t']->link->expanded_url): ?>
        <?php if ($this->_tpl_vars['t']->post_text != ''): ?><br><?php endif; ?>
        <?php if ($this->_tpl_vars['t']->link->image_src): ?>
         <div class="pic" style="float:left;margin-right:5px;margin-top:5px;"><a href="<?php echo $this->_tpl_vars['t']->link->expanded_url; ?>
"><img src="<?php echo $this->_tpl_vars['t']->link->image_src; ?>
" style="margin-bottom:5px;"/></a></div>
        <?php endif; ?>
         <span class="small"><a href="<?php echo $this->_tpl_vars['t']->link->url; ?>
" title="<?php echo $this->_tpl_vars['t']->link->expanded_url; ?>
"><?php if ($this->_tpl_vars['t']->link->title): ?><?php echo $this->_tpl_vars['t']->link->title; ?>
<?php else: ?><?php echo $this->_tpl_vars['t']->link->url; ?>
<?php endif; ?></a>
        <?php if ($this->_tpl_vars['t']->link->description): ?><br><small><?php echo $this->_tpl_vars['t']->link->description; ?>
</small><?php endif; ?></span>
      <?php endif; ?>
        
        <?php if (! $this->_tpl_vars['post'] && $this->_tpl_vars['t']->in_reply_to_post_id): ?>
          <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['t']->in_reply_to_post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['t']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><span class="ui-icon ui-icon-arrowthick-1-w" title="reply to..."></span></a>
        <?php endif; ?>

      <span class="small gray">
        <br clear="all">
       <span class="metaroll">
          <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['t']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['t']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['t']->adj_pub_date)) ? $this->_run_mod_handler('relative_datetime', true, $_tmp) : smarty_modifier_relative_datetime($_tmp)); ?>
 ago</a>
          <?php if ($this->_tpl_vars['t']->is_geo_encoded < 2): ?>
            <?php if ($this->_tpl_vars['show_distance']): ?>
                <?php if ($this->_tpl_vars['unit'] == 'km'): ?>
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['t']->reply_retweet_distance)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 kms away
                  <?php else: ?>
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['t']->reply_retweet_distance)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 miles away in 
                <?php endif; ?>
            <?php endif; ?>
           from <?php echo ((is_array($_tmp=$this->_tpl_vars['t']->location)) ? $this->_run_mod_handler('truncate', true, $_tmp, 60, ' ...') : smarty_modifier_truncate($_tmp, 60, ' ...')); ?>

          <?php endif; ?>
          <?php if ($this->_tpl_vars['t']->network == 'twitter'): ?>
          <a href="http://twitter.com/intent/tweet?in_reply_to=<?php echo $this->_tpl_vars['t']->post_id; ?>
"><span class="ui-icon ui-icon-arrowreturnthick-1-w" title="reply"></a>
          <a href="http://twitter.com/intent/retweet?tweet_id=<?php echo $this->_tpl_vars['t']->post_id; ?>
"><span class="ui-icon ui-icon-arrowreturnthick-1-e" title="retweet"></a>
          <a href="http://twitter.com/intent/favorite?tweet_id=<?php echo $this->_tpl_vars['t']->post_id; ?>
"><span class="ui-icon ui-icon-star" title="favorite"></a>
          <?php endif; ?>
       </span><br>&nbsp;
      </span>
 
      </div>
    </div>
    <div class="grid_2 center">
    <?php if ($this->_tpl_vars['t']->network == 'twitter'): ?>
      <?php if ($this->_tpl_vars['t']->all_retweets > 0): ?>
        <span class="reply-count"><a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['t']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['t']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&v=fwds"><?php echo ((is_array($_tmp=$this->_tpl_vars['t']->all_retweets)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php if ($this->_tpl_vars['t']->rt_threshold): ?>+<?php endif; ?><!-- retweet<?php if ($this->_tpl_vars['t']->retweet_count_cache == 1): ?><?php else: ?>s<?php endif; ?>--></a></span>
      <?php endif; ?>
    <?php else: ?>
        <?php if ($this->_tpl_vars['t']->favlike_count_cache > 0): ?>
        <span class="reply-count">
            <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['t']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['t']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&v=likes"><?php echo ((is_array($_tmp=$this->_tpl_vars['t']->favlike_count_cache)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</a>
        </span>
        <?php else: ?>&nbsp;<?php endif; ?>
    <?php endif; ?>
    
    </div>
    <div class="grid_2 center omega">
      <?php if ($this->_tpl_vars['t']->reply_count_cache > 0): ?>
        <span class="reply-count">
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['t']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['t']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['t']->reply_count_cache)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<!-- repl<?php if ($this->_tpl_vars['t']->reply_count_cache == 1): ?>y<?php else: ?>ies<?php endif; ?>--></a></span>
      <?php else: ?>
        &#160;
      <?php endif; ?>
    </div>
  </div>
</div>