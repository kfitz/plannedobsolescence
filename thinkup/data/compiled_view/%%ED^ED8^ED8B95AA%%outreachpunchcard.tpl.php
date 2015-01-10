<?php /* Smarty version 2.6.26, created on 2014-10-19 07:56:14
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/outreachpunchcard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/outreachpunchcard.tpl', 1, false),array('modifier', 'date_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/outreachpunchcard.tpl', 7, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/outreachpunchcard.tpl', 10, false),array('modifier', 'json_encode', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/outreachpunchcard.tpl', 119, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_header.tpl') : smarty_modifier_cat($_tmp, '_header.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (! $this->_tpl_vars['expand']): ?>
<div class="pull-right detail-btn"><button class="btn btn-info btn-mini" data-toggle="collapse" data-target="#chart-<?php echo $this->_tpl_vars['i']->id; ?>
"><i class="icon-signal icon-white"></i></button></div>
<?php endif; ?>

<span class="label label-<?php if ($this->_tpl_vars['i']->emphasis == '1'): ?>info<?php elseif ($this->_tpl_vars['i']->emphasis == '2'): ?>success<?php elseif ($this->_tpl_vars['i']->emphasis == '3'): ?>error<?php else: ?>info<?php endif; ?>"><i class="icon-white icon-time"></i> <a href="?u=<?php echo $this->_tpl_vars['i']->instance->network_username; ?>
&n=<?php echo $this->_tpl_vars['i']->instance->network; ?>
&d=<?php echo ((is_array($_tmp=$this->_tpl_vars['i']->date)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
&s=<?php echo $this->_tpl_vars['i']->slug; ?>
"><?php echo $this->_tpl_vars['i']->headline; ?>
</a></span>

<i class="icon-<?php echo $this->_tpl_vars['i']->instance->network; ?>
<?php if ($this->_tpl_vars['i']->instance->network == 'google+'): ?> icon-google-plus<?php endif; ?> icon-muted"></i>
<?php echo ((is_array($_tmp=$this->_tpl_vars['i']->text)) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>


<?php if (! $this->_tpl_vars['expand']): ?>
<div class="collapse in" id="chart-<?php echo $this->_tpl_vars['i']->id; ?>
">
<?php endif; ?>

    <div id="outreach_punchcard_<?php echo $this->_tpl_vars['i']->id; ?>
">&nbsp;</div>
    <div id="outreach_punchcard_legend_<?php echo $this->_tpl_vars['i']->id; ?>
" style="padding: 5px; display: block; float: right; font-family: sans-serif; font-size: 12px;">
      <div style="margin-right: 4px; padding: 2px; color: #0072bc; float: left;">posts</div>
      <div style="margin-right: 4px; padding: 2px; color: #7dd3f0; float: left;">responses</div>
    </div>
    <script type="text/javascript">
        <?php echo '
        (function(d3) {
          var OutreachPunchcard = function(placeholder_id, graph_size, outreach_data) {
            var vis = d3.select(\'#\'+placeholder_id)
            .append("svg")
            .attr("width", graph_size)
            .attr("height", (graph_size / 3))
            .style("display", "block")
            .style("margin", "0 auto");

            var x = d3.scale.linear().domain([0, 23]).range([(graph_size / 9), (graph_size - 20)]);
            var y = d3.scale.linear().domain([1, 7]).range([20, ((graph_size / 3) - 40)]);

            var xAxis = d3.svg.axis().scale(x).orient("bottom")
            .ticks(24)
            .tickFormat(function (d, i) {
              var m = (d < 12) ? \'a\' : \'p\';
              return (d % 12 == 0) ? 12+m :  (d % 12)+m;
            });
            var yAxis = d3.svg.axis().scale(y).orient("left")
            .ticks(7)
            .tickFormat(function (d, i) {
              return [\'Monday\', \'Tuesday\', \'Wednesday\', \'Thursday\', \'Friday\', \'Saturday\', \'Sunday\'][d - 1];
            });

            vis.append("g")
            .attr("class", "axis")
            .attr("transform", "translate(0, "+((graph_size / 3) - 20)+")")
            .call(xAxis);

            vis.append("g")
            .attr("class", "axis")
            .attr("transform", "translate(70, 0)")
            .call(yAxis);

            d3.selectAll(\'.axis path\')
            .style("fill", "none")
            .style("stroke", "#eee")
            .style("shape-rendering", "crispEdges");

            d3.selectAll(\'.axis line\')
            .style("fill", "none")
            .style("stroke", "#eee")
            .style("shape-rendering", "crispEdges");

            d3.selectAll(\'.axis text\')
            .style("font-family", "sans-serif")
            .style("font-size", "11px");

            var punches = {posts: [], responses: []};
            var max_val = 0;
            for (var i = 1; i <= 7; i++) {
              for (var j = 0; j < 24; j++) {
                max_val = Math.max(outreach_data.posts[i][j],max_val);
                max_val = Math.max(outreach_data.responses[i][j],max_val);

                punches.posts.push([i, j, outreach_data.posts[i][j]]);
                punches.responses.push([i, j, outreach_data.responses[i][j]]);
              }
            }
            var rad = d3.scale.linear()
            .domain([0, 1, max_val])
            .range([0, (max_val < 6 ? Math.round(12 / max_val) : 2), 12]);

            var post_punch = vis.selectAll(\'g.post-punch\')
            .data(punches.posts)
            .enter()
            .append("g")
            .attr("class", "post-punch");

            post_punch.append("title")
            .text(function(d) { return d[2]+" post"+(d[2] > 1 ? \'s\' : \'\'); });

            post_punch.append("circle")
            .attr("cx", function(d) { return x(d[1]); })
            .attr("cy", function(d) { return y(d[0]); })
            .attr("r", function(d) { return Math.round(rad(d[2])); })
            .style("fill", "#0072bc")
            .style("opacity", "1.0");

            var response_punch = vis.selectAll(\'g.response-punch\')
            .data(punches.responses)
            .enter()
            .append("g")
            .attr("class", "response-punch");

            response_punch.append("title")
            .text(function(d) { return d[2]+" response"+(d[2] > 1 ? \'s\' : \'\'); });

            response_punch.append("circle")
            .attr("cx", function(d) { return x(d[1]); })
            .attr("cy", function(d) { return y(d[0]); })
            .attr("r", function(d) { return Math.round(rad(d[2])); })
            .style("fill", "#7dd3f0")
            .style("opacity", "0.5");
          };
          '; ?>

          var dataset = <?php echo json_encode($this->_tpl_vars['i']->related_data); ?>
;
          new OutreachPunchcard("outreach_punchcard_<?php echo $this->_tpl_vars['i']->id; ?>
", $("#outreach_punchcard_<?php echo $this->_tpl_vars['i']->id; ?>
").width(), dataset);
          <?php echo '
        })(d3);
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