<?php /* Smarty version 2.6.26, created on 2014-10-18 15:24:01
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/plugins/geoencoder/view/geoencoder.map.iframe.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php if ($this->_tpl_vars['controller_title']): ?><?php echo $this->_tpl_vars['controller_title']; ?>
 | <?php endif; ?><?php echo $this->_tpl_vars['app_title']; ?>
</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/favicon.png">
  <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/css/base.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/css/style.css">

  <script type="text/javascript">var site_root_path = '<?php echo $this->_tpl_vars['site_root_path']; ?>
';</script>
  <?php $_from = $this->_tpl_vars['header_scripts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['script']):
?>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo $this->_tpl_vars['script']; ?>
"></script>
  <?php endforeach; endif; unset($_from); ?>

<script type="text/javascript"><?php echo $this->_tpl_vars['posts_data']; ?>
</script>
<script type="text/javascript">
    var geo = "<?php echo $this->_tpl_vars['post']->geo; ?>
";
    var latlng = geo.split(',');
</script>
<?php if ($this->_tpl_vars['gmaps_api']): ?>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=<?php echo $this->_tpl_vars['gmaps_api']; ?>
" type="text/javascript">
</script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/geoencoder/assets/js/markerclusterer_packed.js"></script>
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/geoencoder/assets/css/maps.css" />
</head>

<body <?php if ($this->_tpl_vars['error_msg']): ?>>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php else: ?>
       onload="initializeMap()" onunload="GUnload()">
    <div id="wrap">
      <div id="mappanel">
        <div id="map"></div>
      </div>
      <div id="userpanel">
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
                <tr>
                    <td id="markerlist0"></td>
                    <td id="markerlist1"></td>
                    <td id="markerlist2"></td>
                </tr>
            </tbody>
        </table>

      </div>
      <?php endif; ?>
     </div>
</body>
</html>