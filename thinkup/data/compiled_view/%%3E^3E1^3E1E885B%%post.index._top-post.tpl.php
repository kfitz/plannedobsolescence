<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:38
         compiled from post.index._top-post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'get_plugin_path', 'post.index._top-post.tpl', 3, false),array('modifier', 'filter_xss', 'post.index._top-post.tpl', 12, false),array('modifier', 'link_usernames_to_twitter', 'post.index._top-post.tpl', 12, false),array('modifier', 'date_format', 'post.index._top-post.tpl', 49, false),)), $this); ?>
<div class="grid_2 alpha">
  <div class="avatar-container">
    <img src="<?php if ($this->_tpl_vars['post']->author->avatar): ?><?php echo $this->_tpl_vars['post']->author->avatar; ?>
<?php else: ?><?php echo $this->_tpl_vars['post']->author_avatar; ?>
<?php endif; ?>" class="avatar2" width="48" height="48"/><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('get_plugin_path', true, $_tmp) : smarty_modifier_get_plugin_path($_tmp)); ?>
/assets/img/favicon.png" class="service-icon2"/>
  </div>
</div>

<div class="grid_10">
  <div class="br" style="min-height:110px;margin-bottom:1em">
    <div class="tweet pr">
      <?php if ($this->_tpl_vars['post']->post_text): ?>
          <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

          <?php else: ?>
            <?php echo $this->_tpl_vars['post']->post_text; ?>

            <?php if ($this->_tpl_vars['post']->is_protected): ?>
                  <span class="sprite icon-locked"></span>
            <?php endif; ?>
          <?php endif; ?>
      <?php endif; ?>
    </div>
   <?php if ($this->_tpl_vars['post']->network == 'foursquare'): ?>
     <?php if ($this->_tpl_vars['post']->post_text != ' '): ?><br><?php endif; ?><?php echo $this->_tpl_vars['post']->place; ?>
<br>
     <a href="http://maps.google.com/maps?q=<?php echo $this->_tpl_vars['post']->geo; ?>
"><img src="http://maps.googleapis.com/maps/api/staticmap?size=350x150&zoom=15&maptype=roadmap&markers=color:blue%7C<?php echo $this->_tpl_vars['post']->geo; ?>
&sensor=false"></a>
   <?php endif; ?>

    <?php $_from = $this->_tpl_vars['post']->links; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['linkloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['linkloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lkey'] => $this->_tpl_vars['link']):
        $this->_foreach['linkloop']['iteration']++;
?>
    <div class="clearfix" style="word-wrap:break-word;">
        <?php if ($this->_tpl_vars['post']->network == 'foursquare' && ($this->_foreach['linkloop']['iteration'] <= 1)): ?>
          <br>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['link']->expanded_url): ?>
          <?php if ($this->_tpl_vars['link']->image_src): ?>
           <div class="pic" style="float:left;margin-right:5px;margin-top:5px;"><a href="<?php echo $this->_tpl_vars['link']->url; ?>
"><img src="<?php echo $this->_tpl_vars['link']->image_src; ?>
" style="margin-bottom:5px;"/></a></div>
          <?php endif; ?>
           <span class="small"><a href="<?php echo $this->_tpl_vars['link']->expanded_url; ?>
" title="<?php echo $this->_tpl_vars['link']->url; ?>
"><?php if ($this->_tpl_vars['link']->title): ?><?php echo $this->_tpl_vars['link']->title; ?>
<?php else: ?><?php echo $this->_tpl_vars['link']->expanded_url; ?>
<?php endif; ?></a>
          <?php if ($this->_tpl_vars['link']->description): ?><br><small><?php echo $this->_tpl_vars['link']->description; ?>
</small><?php endif; ?></span>
        <?php endif; ?>
    </div>
    <?php endforeach; endif; unset($_from); ?>

    <div class="clearfix gray" id="more-detail">
    <br>
      <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
        <a href="http://twitter.com/<?php echo $this->_tpl_vars['post']->author_username; ?>
/statuses/<?php echo $this->_tpl_vars['post']->post_id; ?>
">
      <?php endif; ?>
      <?php if ($this->_tpl_vars['post']->network == 'foursquare'): ?>
        <a href="https://foursquare.com/user/<?php echo $this->_tpl_vars['post']->author_user_id; ?>
/checkin/<?php echo $this->_tpl_vars['post']->post_id; ?>
">
      <?php endif; ?>
      <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->adj_pub_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %e, %Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%b %e, %Y %l:%M %p")); ?>

      <?php if ($this->_tpl_vars['post']->network == 'twitter' || $this->_tpl_vars['post']->network == 'foursquare'): ?>
        </a>
      <?php endif; ?>
      
      <?php if ($this->_tpl_vars['post']->location): ?> from <?php echo $this->_tpl_vars['post']->location; ?>
<?php endif; ?>
      <?php if ($this->_tpl_vars['post']->source): ?>
        <br />via
        <?php if ($this->_tpl_vars['post']->source == 'web'): ?>
          Web
        <?php else: ?>
          <?php echo $this->_tpl_vars['post']->source; ?>
<span class="ui-icon ui-icon-newwin"></span>
        <?php endif; ?>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
        <a href="http://twitter.com/intent/tweet?in_reply_to=<?php echo $this->_tpl_vars['post']->post_id; ?>
">
        <span class="ui-icon ui-icon-arrowreturnthick-1-w" title="reply"></span></a>
        <a href="http://twitter.com/intent/retweet?tweet_id=<?php echo $this->_tpl_vars['post']->post_id; ?>
">
        <span class="ui-icon ui-icon-arrowreturnthick-1-e" title="retweet"></span></a>
        <a href="http://twitter.com/intent/favorite?tweet_id=<?php echo $this->_tpl_vars['post']->post_id; ?>
">
        <span class="ui-icon ui-icon-star" title="favorite"></span></a>
      <?php endif; ?>
    <?php if ($this->_tpl_vars['disable_embed_code'] != true && $this->_tpl_vars['show_embed']): ?>
    <a href="javascript:;" title="Embed this thread" onclick="$('#embed-this-thread').show(); return false;">
    <span class="ui-icon ui-icon-carat-2-e-w"></span></a>
    <?php endif; ?>
    </div> <!-- /#more-detail -->
  </div>
</div>