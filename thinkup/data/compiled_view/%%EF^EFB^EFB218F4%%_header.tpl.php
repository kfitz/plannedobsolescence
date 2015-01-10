<?php /* Smarty version 2.6.26, created on 2014-10-18 15:19:35
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/_header.tpl */ ?>
<div class="alert <?php if ($this->_tpl_vars['i']->emphasis == '1'): ?>alert-info<?php elseif ($this->_tpl_vars['i']->emphasis == '2'): ?>alert-info<?php elseif ($this->_tpl_vars['i']->emphasis == '3'): ?>alert-error<?php else: ?>alert-info<?php endif; ?> emphasis-<?php echo $this->_tpl_vars['i']->emphasis; ?>
 insight-item">