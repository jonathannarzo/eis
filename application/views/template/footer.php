	<script type="text/javascript" src="<?=base_url('/assets/js/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('/assets/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('/assets/js/ie10-viewport-bug-workaround.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('/assets/jquery-ui/jquery-ui.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('/assets/js/app/age-compute.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('/assets/js/app/app.js')?>"></script>
	<?php if(isset($page_scripts)) foreach($page_scripts as $page_script) echo $page_script; // Loads specific script in a view ?>
</body>
</html>