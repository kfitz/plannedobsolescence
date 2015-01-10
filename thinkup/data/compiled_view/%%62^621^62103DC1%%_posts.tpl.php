<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:36
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_posts.tpl', 9, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_posts.tpl', 11, false),array('modifier', 'cat', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_posts.tpl', 24, false),)), $this); ?>

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

<?php $_from = $this->_tpl_vars['i']->related_data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bar'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bar']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uid'] => $this->_tpl_vars['p']):
        $this->_foreach['bar']['iteration']++;
?>

        <?php if (! $this->_tpl_vars['expand'] && $this->_foreach['bar']['total'] > 1 && ($this->_foreach['bar']['iteration'] <= 1)): ?>
        <div class="pull-right detail-btn"><button class="btn btn-info btn-mini" data-toggle="collapse" data-target="#flashback-<?php echo $this->_tpl_vars['i']->id; ?>
"><i class="icon-chevron-down icon-white"></i></button></div>
    <?php endif; ?>

        <?php if (! $this->_tpl_vars['expand'] && ($this->_foreach['bar']['iteration']-1) == 1): ?>
        <div class="collapse in" id="flashback-<?php echo $this->_tpl_vars['i']->id; ?>
">
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, "_post.tpl") : smarty_modifier_cat($_tmp, "_post.tpl")), 'smarty_include_vars' => array('post' => $this->_tpl_vars['p'],'hide_insight_header' => '1')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if (! $this->_tpl_vars['expand'] && $this->_foreach['bar']['total'] > 1 && ($this->_foreach['bar']['iteration'] == $this->_foreach['bar']['total'])): ?>
        </div>
    <?php endif; ?>

    <?php $this->assign('prev_post_year', ((is_array($_tmp=$this->_tpl_vars['p']->adj_pub_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y"))); ?>
<?php endforeach; endif; unset($_from); ?>