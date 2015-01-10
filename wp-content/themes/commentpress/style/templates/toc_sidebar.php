<!-- toc_sidebar.php -->

<div id="toc_sidebar" class="sidebar_container">



<div class="sidebar_header">

<h2>Table of Contents</h2>

</div>



<div class="sidebar_minimiser">

<div class="sidebar_contents_wrapper">

<?php 

// declare access to globals
global $commentpress_obj;

// if we have the plugin enabled...
if ( is_object( $commentpress_obj ) ) {

	?><ul id="toc_list">
	<?php

	// show the TOC
	echo $commentpress_obj->get_toc_list();

	?></ul>
	<?php

}

?>
	
</div><!-- /sidebar_contents_wrapper -->

</div><!-- /sidebar_minimiser -->



</div><!-- /toc_sidebar -->


