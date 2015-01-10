<?php /* Smarty version 2.6.26, created on 2014-11-06 02:46:11
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_links.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_links.tpl', 9, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_links.tpl', 12, false),array('modifier', 'truncate', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_links.tpl', 42, false),array('modifier', 'cat', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_links.tpl', 58, false),)), $this); ?>

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


<?php $this->assign('collapse_links', true); ?>
<?php $_from = $this->_tpl_vars['i']->related_data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bar'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bar']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pid'] => $this->_tpl_vars['p']):
        $this->_foreach['bar']['iteration']++;
?>

    <?php $_from = $this->_tpl_vars['p']->links; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lnk'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lnk']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lid'] => $this->_tpl_vars['l']):
        $this->_foreach['lnk']['iteration']++;
?>

                <?php if (! $this->_tpl_vars['expand'] && ( $this->_foreach['bar']['total'] > 1 || $this->_foreach['lnk']['total'] > 1 ) && ( ($this->_foreach['bar']['iteration'] <= 1) && ($this->_foreach['lnk']['iteration'] <= 1) )): ?>
            <div class="pull-right detail-btn"><button class="btn btn-info btn-mini" data-toggle="collapse" data-target="#flashback-<?php echo $this->_tpl_vars['i']->id; ?>
"><i class="icon-chevron-down icon-white"></i></button></div>
        <?php endif; ?>

                <?php if (! $this->_tpl_vars['expand'] && $this->_tpl_vars['collapse_links'] && ( ($this->_foreach['bar']['iteration']-1) == 1 || ( ($this->_foreach['bar']['iteration']-1) == 0 && ($this->_foreach['lnk']['iteration']-1) == 1 ) )): ?>
            <div class="collapse in" id="flashback-<?php echo $this->_tpl_vars['i']->id; ?>
">
            <?php $this->assign('collapse_links', false); ?>
        <?php endif; ?>

<table class="table table-condensed">
    <tr>
    <td class="link-image">
        <?php if (isset ( $this->_tpl_vars['l']->image_src ) && $this->_tpl_vars['l']->image_src != ''): ?>
            <h3><a href="<?php echo $this->_tpl_vars['l']->url; ?>
" title="<?php echo $this->_tpl_vars['l']->caption; ?>
"><img src="<?php echo $this->_tpl_vars['l']->image_src; ?>
" class="avatar2"  width="48" height="48"/></a></h3>
        <?php else: ?>
            <h3><a href="<?php echo $this->_tpl_vars['l']->url; ?>
" title="<?php echo $this->_tpl_vars['l']->caption; ?>
"><a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['p']->author_user_id; ?>
" title="<?php echo $this->_tpl_vars['p']->author_username; ?>
"><img src="<?php echo $this->_tpl_vars['p']->author_avatar; ?>
" class=""  width="48" height="48"/></a></h3>
        <?php endif; ?>
    </td>

    <td>
        <?php if (isset ( $this->_tpl_vars['l']->title ) && $this->_tpl_vars['l']->title != ''): ?>
            <h3><a href="<?php echo $this->_tpl_vars['l']->url; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['l']->title)) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</a></h3>
        <?php else: ?>
            <h3><a href="<?php echo $this->_tpl_vars['l']->url; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['l']->expanded_url)) ? $this->_run_mod_handler('truncate', true, $_tmp, 75) : smarty_modifier_truncate($_tmp, 75)); ?>
</a></h3>
        <?php endif; ?>

        <?php if (isset ( $this->_tpl_vars['l']->expanded_url ) && $this->_tpl_vars['l']->expanded_url != ''): ?>
            <p class="link-url"><small><a href="<?php echo $this->_tpl_vars['l']->url; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['l']->expanded_url)) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a></small></p>
        <?php endif; ?>

        <div class="link">
            <?php if (isset ( $this->_tpl_vars['l']->description ) && $this->_tpl_vars['l']->description != ''): ?>
                <p class="link-description"><?php echo ((is_array($_tmp=$this->_tpl_vars['l']->description)) ? $this->_run_mod_handler('truncate', true, $_tmp, 300) : smarty_modifier_truncate($_tmp, 300)); ?>
</p>
            <?php endif; ?>

            <p class="link-detail"><small>
                <?php if ($this->_tpl_vars['p']->network == 'twitter'): ?>
                    tweeted by <?php echo ((is_array($_tmp=((is_array($_tmp='@')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['p']->author_username) : smarty_modifier_cat($_tmp, $this->_tpl_vars['p']->author_username)))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

                    at <a href="http://twitter.com/<?php echo $this->_tpl_vars['p']->author_user_id; ?>
/statuses/<?php echo $this->_tpl_vars['p']->post_id; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']->adj_pub_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M %p - %d %b %y") : smarty_modifier_date_format($_tmp, "%l:%M %p - %d %b %y")); ?>
</a>
                <?php else: ?>
                    posted by <?php echo $this->_tpl_vars['p']->author_fullname; ?>
 at <?php echo ((is_array($_tmp=$this->_tpl_vars['p']->adj_pub_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M %p - %d %b %y") : smarty_modifier_date_format($_tmp, "%l:%M %p - %d %b %y")); ?>

                <?php endif; ?>
            </small></p>
        </div>
    </td>
    </tr>
</table>

                <?php if (! $this->_tpl_vars['expand'] && ! $this->_tpl_vars['collapse_links'] && ( ( $this->_foreach['bar']['total'] > 1 && ($this->_foreach['bar']['iteration'] == $this->_foreach['bar']['total']) && ($this->_foreach['lnk']['iteration'] == $this->_foreach['lnk']['total']) ) || ( $this->_foreach['bar']['total'] == 1 && $this->_foreach['lnk']['total'] > 1 && ($this->_foreach['lnk']['iteration'] == $this->_foreach['lnk']['total']) ) )): ?>
            </div>
        <?php endif; ?>

    <?php endforeach; endif; unset($_from); ?>

<?php endforeach; endif; unset($_from); ?>