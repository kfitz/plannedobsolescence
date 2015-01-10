<?php get_header(); ?>

<div id="main">
	<div id="content">
		<div id="page">
	
	<h2>404, Dude.</h2>
		<br /><p>Whoops. Whatever you're looking for, it's not here. A couple of things you might try:</p>
		<ol><li>If the URL you're trying to load is something like:
				<ul style="list-style-type:none"><li>http://www.plannedobsolescence.net/post-title/</li></ul>
			try changing it to
				<ul style="list-style-type:none"><li>http://www.plannedobsolescence.net/blog/post-title/</li></ul>
			(This should happen automatically, but every once in a while, the rewrite fails.)</li>

			<li>If that wasn't the problem, you might try using the box at left to search.</li></ol>



		</div>
		<!--end Page-->
	</div>
	<!--end Content-->

<?php get_sidebar('secondary'); ?>

</div>
<!--end Main-->

<?php get_footer(); ?>