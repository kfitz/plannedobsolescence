<?php /* Smarty version 2.6.26, created on 2014-10-24 04:18:59
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/interactions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/interactions.tpl', 1, false),array('modifier', 'date_format', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/interactions.tpl', 7, false),array('modifier', 'link_usernames_to_twitter', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/interactions.tpl', 10, false),array('modifier', 'json_encode', '/home/plannedo/plannedobsolescence.net/thinkup/plugins/insightsgenerator/view/interactions.tpl', 123, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_path'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_header.tpl') : smarty_modifier_cat($_tmp, '_header.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (! $this->_tpl_vars['expand']): ?>
<div class="pull-right detail-btn"><button class="btn btn-info btn-mini" data-toggle="collapse" data-target="#chart-<?php echo $this->_tpl_vars['i']->id; ?>
"><i class="icon-signal icon-white"></i></button></div>
<?php endif; ?>

<span class="label label-<?php if ($this->_tpl_vars['i']->emphasis == '1'): ?>info<?php elseif ($this->_tpl_vars['i']->emphasis == '2'): ?>success<?php elseif ($this->_tpl_vars['i']->emphasis == '3'): ?>error<?php else: ?>info<?php endif; ?>"><i class="icon-white icon-user"></i> <a href="?u=<?php echo $this->_tpl_vars['i']->instance->network_username; ?>
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

    <div id="interactions_<?php echo $this->_tpl_vars['i']->id; ?>
">&nbsp;</div>
    <script type="text/javascript">
        <?php echo '
        (function(d3) {
          var InteractionChart = function(placeholder_id, chart_size, interaction_data) {
            var vis = d3.select(\'#\'+placeholder_id)
            .append("svg")
            .attr("width", chart_size)
            .attr("height", chart_size)
            .style("display", "block")
            .style("margin", "0 auto");

            var min_val = getMinCount(interaction_data);
            var max_val = getMaxCount(interaction_data);

            var rad = d3.scale.linear()
            .domain([min_val, max_val])
            .range([(min_val == max_val ? 52 : 26), 78]);

            var bubble = d3.layout.pack()
            .sort(null)
            .size([chart_size, chart_size])
            .radius(rad);

            var node = vis.selectAll("g.node")
            .data(bubble.nodes(dataset(interaction_data)).filter(function(d) { return !d.children; }))
            .enter()
            .append("g")
            .attr("class", "interaction-node")
            .attr("transform", function(d) { return "translate("+d.x+","+d.y+")"; });

            var ring = d3.svg.arc()
            .innerRadius(function(d) { return (d.r - 2); })
            .outerRadius(function(d) { return (d.r); })
            .startAngle(0)
            .endAngle(2 * Math.PI);

            node.append("title")
            .text(function(d) { return "Mentioned " + d.name+" "+d.value+" "+((d.value == 1)?\'once\':(d.value == 2)?\'twice\':\'times\'); });

            node.append("circle")
            .attr("r", function(d) { return d.r; })
            .style("fill", "#d5f0fc");

            node.append("path")
            .attr("d", ring)
            .attr("fill", "#00aeef");

            node.append("text")
            .attr("text-anchor", "middle")
            .attr("dy", ".3em")
            .style("font-size", ".8em")
            .text(function(d) { return (d.avatar == null) ? truncate(d.name, (d.r / 4)) : ""; });

            node.append("clipPath")
            .attr("id", function(d) { return "avatar_clip_"+placeholder_id+"_"+d.index; })
            .append("circle")
            .attr("transform", "translate(24, 24)")
            .attr("r", "24");

            node.append("image")
            .attr("xlink:href", function(d) { return d.avatar; })
            .attr("width", "48")
            .attr("height", "48")
            .attr("transform", "translate(-24, -24)")
            .attr("clip-path", function(d) { return "url(#avatar_clip_"+placeholder_id+"_"+d.index+")"; });

            function getMaxCount(data) {
              var max = 0;

              for (var i = 0; i < data.length; i++) {
                max = Math.max(max, data[i].count);
              }

              return max;
            }

            function getMinCount(data) {
              var min = Number.MAX_VALUE;

              for (var i = 0; i < data.length; i++) {
                min = Math.min(min, data[i].count);
              }

              return min;
            }

            function truncate(text, max_length) {
              return text.length > max_length ? text.substring(0, (max_length - 1))+"..." : text;
            }

            function dataset(data) {
              var nodes = [];

              for (var i = 0; i < data.length; i++) {
                nodes.push({
                  index: i,
                  name: data[i].mention.substring(1),
                  value: data[i].count,
                  avatar: (data[i].user != null) ? data[i].user.avatar : null
                });
              }

              return {children: nodes};
            }
          };
          '; ?>

          var dataset = <?php echo json_encode($this->_tpl_vars['i']->related_data); ?>
;
          new InteractionChart("interactions_<?php echo $this->_tpl_vars['i']->id; ?>
", (dataset.length < 5 ? 400 : 600), dataset);
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