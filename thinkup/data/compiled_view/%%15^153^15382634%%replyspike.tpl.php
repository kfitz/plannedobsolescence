<?php /* Smarty version 2.6.26, created on 2014-10-29 13:49:56
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/replyspike.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/replyspike.tpl', 1, false),array('modifier', 'date_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/replyspike.tpl', 7, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/replyspike.tpl', 10, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_header.tpl') : smarty_modifier_cat($_tmp, '_header.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (! $this->_tpl_vars['expand']): ?>
<div class="pull-right detail-btn"><button class="btn btn-info btn-mini" data-toggle="collapse" data-target="#chart-<?php echo $this->_tpl_vars['i']->id; ?>
"><i class="icon-signal icon-white"></i></button></div>
<?php endif; ?>

<span class="label label-<?php if ($this->_tpl_vars['i']->emphasis == '1'): ?>info<?php elseif ($this->_tpl_vars['i']->emphasis == '2'): ?>success<?php elseif ($this->_tpl_vars['i']->emphasis == '3'): ?>error<?php else: ?>info<?php endif; ?>"><i class="icon-white icon-fire"></i> <a href="?u=<?php echo $this->_tpl_vars['i']->instance->network_username; ?>
&n=<?php echo $this->_tpl_vars['i']->instance->network; ?>
&d=<?php echo ((is_array($_tmp=$this->_tpl_vars['i']->date)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
&s=<?php echo $this->_tpl_vars['i']->slug; ?>
"><?php echo $this->_tpl_vars['i']->headline; ?>
</a></span>

<i class="icon-<?php echo $this->_tpl_vars['i']->instance->network; ?>
<?php if ($this->_tpl_vars['i']->instance->network == 'google+'): ?> icon-google-plus<?php endif; ?> icon-muted"></i>
<?php echo ((is_array($_tmp=$this->_tpl_vars['i']->text)) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>


<div class="insight-attachment-detail post">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, "_post.tpl") : smarty_modifier_cat($_tmp, "_post.tpl")), 'smarty_include_vars' => array('post' => $this->_tpl_vars['i']->related_data[0],'hide_insight_header' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php if (! $this->_tpl_vars['expand']): ?>
<div class="collapse in" id="chart-<?php echo $this->_tpl_vars['i']->id; ?>
">
<?php endif; ?>

    <div id="response_rates_<?php echo $this->_tpl_vars['i']->id; ?>
">&nbsp;</div>
    <script type="text/javascript">
        // Load the Visualization API and the standard charts
        google.load('visualization', '1');
        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart<?php echo $this->_tpl_vars['i']->id; ?>
 );

        <?php echo '
        function drawChart'; ?>
<?php echo $this->_tpl_vars['i']->id; ?>
<?php echo '() {
        '; ?>

            var response_rates_data_<?php echo $this->_tpl_vars['i']->id; ?>
 = new google.visualization.DataTable(<?php echo $this->_tpl_vars['i']->related_data[1]; ?>
);

            <?php echo '
            var response_rates_chart_'; ?>
<?php echo $this->_tpl_vars['i']->id; ?>
<?php echo ' = new google.visualization.ChartWrapper({
              containerId: \'response_rates_'; ?>
<?php echo $this->_tpl_vars['i']->id; ?>
<?php echo '\',
              chartType: \'BarChart\',
              dataTable: response_rates_data_'; ?>
<?php echo $this->_tpl_vars['i']->id; ?>
<?php echo ',
              options: {
                  colors: [\'#3e5d9a\', \'#3c8ecc\', \'#BBCCDD\'],
                  isStacked: true,
                  width: 650,
                  height: 250,
                  chartArea:{left:300,height:"80%"},
                  legend: \'bottom\',
                  hAxis: {
                    textStyle: { color: \'#fff\', fontSize: 1 }
                  },
                  vAxis: {
                    minValue: 0,
                    baselineColor: \'#ccc\',
                    textStyle: { color: \'#999\' },
                    gridlines: { color: \'#eee\' }
                  },
                }
            });
            response_rates_chart_'; ?>
<?php echo $this->_tpl_vars['i']->id; ?>
<?php echo '.draw();
        }
        '; ?>

    </script>

<?php if (! $this->_tpl_vars['expand']): ?>
</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_footer.tpl') : smarty_modifier_cat($_tmp, '_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>