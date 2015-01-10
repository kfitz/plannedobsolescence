<?php /* Smarty version 2.6.26, created on 2014-10-18 15:54:18
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_email.daily_insight_digest.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'relative_datetime', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_email.daily_insight_digest.tpl', 5, false),array('modifier', 'replace', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_email.daily_insight_digest.tpl', 5, false),array('modifier', 'ucfirst', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_email.daily_insight_digest.tpl', 5, false),array('modifier', 'strip_tags', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_email.daily_insight_digest.tpl', 6, false),array('modifier', 'urlencode', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_email.daily_insight_digest.tpl', 7, false),array('modifier', 'date_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_email.daily_insight_digest.tpl', 7, false),)), $this); ?>
ThinkUp has new insights for you!

<?php $_from = $this->_tpl_vars['insights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['insight']):
?>
<?php if ($this->_tpl_vars['insight']->text != ''): ?>
* <?php echo ((is_array($_tmp=$this->_tpl_vars['insight']->time_updated)) ? $this->_run_mod_handler('relative_datetime', true, $_tmp) : smarty_modifier_relative_datetime($_tmp)); ?>
ago: <?php echo ((is_array($_tmp=$this->_tpl_vars['insight']->headline)) ? $this->_run_mod_handler('replace', true, $_tmp, ":", "") : smarty_modifier_replace($_tmp, ":", "")); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['insight']->instance->network)) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
)
  <?php echo ((is_array($_tmp=$this->_tpl_vars['insight']->text)) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)); ?>

  <?php echo $this->_tpl_vars['application_url']; ?>
?u=<?php echo ((is_array($_tmp=$this->_tpl_vars['insight']->instance->network_username)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['insight']->instance->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&d=<?php echo ((is_array($_tmp=$this->_tpl_vars['insight']->date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
&s=<?php echo $this->_tpl_vars['insight']->slug; ?>


<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

Sent to you by <?php echo $this->_tpl_vars['app_title']; ?>
.
Change your mail preferences: <?php echo $this->_tpl_vars['application_url']; ?>
account/index.php?m=manage#instances