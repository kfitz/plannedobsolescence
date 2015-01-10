<?php /* Smarty version 2.6.26, created on 2013-05-31 11:07:22
         compiled from /home/plannedo/plannedobsolescence.net/thinkup/_lib/view/api.embed.v1.embed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', '/home/plannedo/plannedobsolescence.net/thinkup/_lib/view/api.embed.v1.embed.tpl', 4, false),)), $this); ?>
ThinkUp<?php echo $this->_tpl_vars['post_id']; ?>
 = new function() <?php echo ' {
  var BASE_URL = '; ?>
'http<?php if ($_SERVER['HTTPS']): ?>s<?php endif; ?>://<?php echo $_SERVER['SERVER_NAME']; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
';<?php echo '
  var STYLESHEET = BASE_URL + "assets/css/thinkupembedthread.css"
  var CONTENT_URL = BASE_URL + \'api/embed/v1/thread_js.php?p='; ?>
<?php echo $this->_tpl_vars['post_id']; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['network'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
';
  var ROOT = 'thinkup_embed_<?php echo $this->_tpl_vars['post_id']; ?>
<?php echo '\';

  function requestStylesheet(stylesheet_url) {
    stylesheet = document.createElement("link");
    stylesheet.rel = "stylesheet";
    stylesheet.type = "text/css";
    stylesheet.href = stylesheet_url;
    stylesheet.media = "all";
    document.lastChild.firstChild.appendChild(stylesheet);
  }

  function requestContent( local ) {
    var script = document.createElement(\'script\');
    // How you\'d pass the current URL into the request
    // script.src = CONTENT_URL + \'&url=\' + escape(local || location.href);
    script.src = CONTENT_URL;
    // IE7 doesn\'t like this: document.body.appendChild(script);
    // Instead use:
    document.getElementsByTagName(\'head\')[0].appendChild(script);
  }

  this.serverResponse = function( data ) {
    if (!data[0].status) {return;}
    var div = document.getElementById(ROOT);
    var txt = \'\';
    //console.debug(data);
    //console.debug(\'status \' + data[0].status);
    if ( data[0].status == \'failed\') {
        if ( data[0].message ) {txt = \'<div class="thinkup_error">Error: \' + data[0].message + \'</div>\';}
    } else {
    //    console.debug(\'post \' + data[0].post);
    //    console.debug(\'replies \' + data[0].replies[1].text);
        txt += \'<div style="float:left">\';
        if (data[0].author_link != \'null\') {
          txt += \'<a href="\'+data[0].author_link+\'">\';
        }
        txt += \'<img src="\' + data[0].author_avatar + \'" class="thinkup_avatar"/>\';
        if (data[0].author_link != \'null\') {
          txt += \'</a">\';
        }
        txt += \'</div><div class="thinkup_post">\';
        if (data[0].post_link != \'null\') {
          txt += \'<a href="\'+data[0].post_link+\'">\';
        }
        txt += data[0].author;
        if (data[0].author_link != \'null\') {
          txt += \'</a>\';
        }
        txt += \': \' + data[0].post + 
        \'</div><br clear="all">\';
        for (var i = 0; i < data[0].replies.length; i++) {
          if (txt.length > 0) { txt += " "; }
          txt += \'<div class="thinkup_post_reply"><div style="float:left">\'
          if (data[0].replies[i].author_link != \'null\') {
            txt += \'<a href="\'+data[0].replies[i].author_link+\'">\';
          }
          txt += \'<img src="\' + 
          data[0].replies[i].author_avatar + \'"  class="thinkup_avatar"/>\';
          if (data[0].replies[i].author_link != \'null\') {
            txt += \'</a>\';
          }
          txt += \'</div>\';
          if (data[0].replies[i].post_link != \'null\') {
            txt += \'<a href="\' + data[0].replies[i].post_link + \'">\';
          }
          txt += data[0].replies[i].author;
          if (data[0].replies[i].post_link != \'null\') {
            txt += \'</a>\';
          }
          txt += ": " + data[0].replies[i].text + \'</div><br clear="all">\';
        }
    }
    txt += \'Powered by <a href="http://thinkup.com">ThinkUp</a>\';
    div.innerHTML =  txt;  // assign new HTML into #ROOT
    div.style.display = \'block\'; // make element visible
  }

  requestStylesheet(STYLESHEET);
  document.write("<div id=\'" + ROOT + "\' style=\'display: none\'></div>");
  requestContent();
}
'; ?>