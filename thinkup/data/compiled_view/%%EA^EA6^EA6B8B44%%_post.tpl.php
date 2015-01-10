<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:36
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 4, false),array('modifier', 'urlencode', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 5, false),array('modifier', 'date_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 11, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 13, false),array('modifier', 'number_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 32, false),array('modifier', 'truncate', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 38, false),array('modifier', 'filter_xss', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 49, false),array('modifier', 'regex_replace', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 49, false),array('modifier', 'get_plugin_path', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 56, false),array('modifier', 'relative_datetime', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_post.tpl', 94, false),)), $this); ?>
<?php if ($this->_tpl_vars['hide_insight_header']): ?>

<?php else: ?>
    <?php if (((is_array($_tmp=$this->_tpl_vars['i']->slug)) ? $this->_run_mod_handler('substr', true, $_tmp, 24) : substr($_tmp, 24)) == 'replies_frequent_words_'): ?>
        <div class="pull-right detail-btn"><a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" class="btn btn-info btn-mini detail-btn" ><i class="icon-comment icon-white"></i></a></div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['i']->slug == 'geoencoded_replies'): ?>
        <div class="pull-right detail-btn"><a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?v=geoencoder_map&t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=twitter"><button class="btn btn-info btn-mini detail-btn" ><i class="icon-map-marker icon-white"></i></button></a></div>
    <?php endif; ?>

    <span class="label label-<?php if ($this->_tpl_vars['i']->emphasis == '1'): ?>info<?php elseif ($this->_tpl_vars['i']->emphasis == '2'): ?>success<?php elseif ($this->_tpl_vars['i']->emphasis == '3'): ?>error<?php else: ?>info<?php endif; ?>"><i class="icon-white icon-<?php echo $this->_tpl_vars['icon']; ?>
"></i> <a href="?u=<?php echo $this->_tpl_vars['i']->instance->network_username; ?>
&n=<?php echo $this->_tpl_vars['i']->instance->network; ?>
&d=<?php echo ((is_array($_tmp=$this->_tpl_vars['i']->date)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
&s=<?php echo $this->_tpl_vars['i']->slug; ?>
"><?php echo $this->_tpl_vars['i']->headline; ?>
</a></span>
        <i class="icon-<?php echo $this->_tpl_vars['i']->instance->network; ?>
<?php if ($this->_tpl_vars['i']->instance->network == 'google+'): ?> icon-google-plus<?php endif; ?> icon-muted"></i>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['i']->text)) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

<?php endif; ?>

<table class="table table-condensed lead">
    <tr>
    <td class="avatar-data">
            <a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['post']->author_user_id; ?>
" title="<?php echo $this->_tpl_vars['post']->author_username; ?>
"><img src="<?php echo $this->_tpl_vars['post']->author_avatar; ?>
" class=""  width="48" height="48"/></a>
    </td>
    <td>
            <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
                <?php if ($this->_tpl_vars['i']->instance->network_username != $this->_tpl_vars['post']->author_username): ?>

                    <h4><a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['post']->author_user_id; ?>
"><?php echo $this->_tpl_vars['post']->author_fullname; ?>
</a></h4>
                    <p class="twitter-bio-info"><i class="icon-twitter"></i> <a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['post']->author_user_id; ?>
">@<?php echo $this->_tpl_vars['post']->author_username; ?>
</a> <small><?php echo $this->_tpl_vars['post']->place; ?>
</small>

                        <?php if ($this->_tpl_vars['post']->is_geo_encoded < 2): ?>
                            <small>
                          <?php if ($this->_tpl_vars['show_distance']): ?>
                              <?php if ($this->_tpl_vars['unit'] == 'km'): ?>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->reply_retweet_distance)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 kms away
                                <?php else: ?>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->reply_retweet_distance)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 miles away in
                              <?php endif; ?>
                          <?php endif; ?>
                          <?php if ($this->_tpl_vars['post']->location): ?>
                          from <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->location)) ? $this->_run_mod_handler('truncate', true, $_tmp, 60, ' ...') : smarty_modifier_truncate($_tmp, 60, ' ...')); ?>

                          <?php endif; ?>
                            </small>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['post']->post_text): ?>
                    <?php if ($this->_tpl_vars['scrub_reply_username']): ?>
                        <?php if ($this->_tpl_vars['reply_count'] && $this->_tpl_vars['reply_count'] > $this->_tpl_vars['top_20_post_min']): ?>
                          <div class="reply_text post" id="reply_text-<?php echo $this->_foreach['foo']['iteration']; ?>
">
                        <?php endif; ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^@[a-zA-Z0-9_]+/", "") : smarty_modifier_regex_replace($_tmp, "/^@[a-zA-Z0-9_]+/", "")))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

                    <?php else: ?>
                        <div class="post"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

                    <?php endif; ?>
                <?php endif; ?>

            <?php else: ?>
                <h3><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('get_plugin_path', true, $_tmp) : smarty_modifier_get_plugin_path($_tmp)); ?>
/assets/img/favicon.png" class="service-icon2"/> <?php echo $this->_tpl_vars['post']->author_fullname; ?>

                    <?php if ($this->_tpl_vars['post']->network == 'foursquare'): ?><a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo $this->_tpl_vars['post']->place; ?>
</a><?php endif; ?>
                    <?php if ($this->_tpl_vars['post']->other['total_likes']): ?><small style="color:gray"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->other['total_likes'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 likes</small><?php endif; ?>
                </h3>
                <div class="post">
                    <?php echo $this->_tpl_vars['post']->post_text; ?>

                    <?php if ($this->_tpl_vars['post']->network == 'youtube'): ?>
                        <br>
                        <iframe id="ytplayer" type="text/html" width="427" height="260" src="http://www.youtube.com/embed/<?php echo $this->_tpl_vars['post']->post_id; ?>
"frameborder="0"/></iframe>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['post']->network == 'foursquare'): ?>From <?php echo $this->_tpl_vars['post']->location; ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['post']->link->expanded_url): ?>
              <?php if ($this->_tpl_vars['post']->post_text != ''): ?><br><?php endif; ?>
              <?php if ($this->_tpl_vars['post']->link->image_src): ?>
               <div class="pic" style="float:left;margin-right:5px;margin-top:5px;"><a href="<?php echo $this->_tpl_vars['post']->link->expanded_url; ?>
"><img src="<?php echo $this->_tpl_vars['post']->link->image_src; ?>
" style="margin-bottom:5px;"/></a></div>
              <?php endif; ?>
               <span class="small"><a href="<?php echo $this->_tpl_vars['post']->link->url; ?>
" title="<?php echo $this->_tpl_vars['post']->link->expanded_url; ?>
"><?php if ($this->_tpl_vars['post']->link->title): ?><?php echo $this->_tpl_vars['post']->link->title; ?>
<?php else: ?><?php echo $this->_tpl_vars['post']->link->url; ?>
<?php endif; ?></a>
              <?php if ($this->_tpl_vars['post']->link->description): ?><br><small><?php echo $this->_tpl_vars['post']->link->description; ?>
</small><?php endif; ?></span>
            <?php endif; ?>

            <?php if (! $this->_tpl_vars['post'] && $this->_tpl_vars['post']->in_reply_to_post_id): ?>
                <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->in_reply_to_post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><span class="ui-icon ui-icon-arrowthick-1-w" title="reply to..."></span></a>
            <?php endif; ?>


            <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
                <p class="twitter-bio-info">
                <a href="http://twitter.com/<?php echo $this->_tpl_vars['post']->author_user_id; ?>
/statuses/<?php echo $this->_tpl_vars['post']->post_id; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->adj_pub_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M %p - %d %b %y") : smarty_modifier_date_format($_tmp, "%l:%M %p - %d %b %y")); ?>
</a>

                &nbsp;&nbsp;
                <a href="http://twitter.com/intent/tweet?in_reply_to=<?php echo $this->_tpl_vars['post']->post_id; ?>
"><i class="icon icon-reply" title="reply"></i></a>
                <a href="http://twitter.com/intent/retweet?tweet_id=<?php echo $this->_tpl_vars['post']->post_id; ?>
"><i class="icon icon-retweet" title="retweet"></i></a>
                <a href="http://twitter.com/intent/favorite?tweet_id=<?php echo $this->_tpl_vars['post']->post_id; ?>
"><i class="icon icon-star-empty" title="favorite"></i></a>
                </p>
            <?php else: ?>
                <span class="metaroll">
                    <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->adj_pub_date)) ? $this->_run_mod_handler('relative_datetime', true, $_tmp) : smarty_modifier_relative_datetime($_tmp)); ?>
 ago</a>
                </span>
            <?php endif; ?>
        </div> <!-- end body of post div -->

    </td>
    </tr>
</table>