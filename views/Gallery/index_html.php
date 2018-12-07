<div class="container">
<div class="col-xs-12">

	<H1><?php print $this->getVar("section_name"); ?></H1>
<?php
	$va_sets = $this->getVar("sets");
	$va_first_items_from_set = $this->getVar("first_items_from_sets");
	if(is_array($va_sets) && sizeof($va_sets)){
		# --- main area with info about selected set loaded via Ajax
?>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class='col-xs-12 col-md-8'>
					<!-- Ende 1. text -->
				 <div class="row">
						<div class="col-sm-2">
							<img src="http://via.placeholder.com/200x200" width="100%">
						</div>
						<div class="col-sm-10">
						<h2>Wagner Ausstellung</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						<ul>
						<li><a href="http://vm240.rz.uos.de/frontend/index.php/Gallery/45">Wagner und die Frauen</a></li>
						<li><a href="">Wagner als Komponist</a></li>
						</ul>
				 	</div>
					</div>
					<hr>
					<!-- Ende 1. text -->
					<!-- Anfang 2. text -->
					<div class="row">
						<div class="col-sm-2">
							<img src="http://via.placeholder.com/200x200" width="100%">
						</div>
						<div class="col-sm-10">
						<h2>Weitere Ausstellung</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						<ul>
						<li><a href="http://vm240.rz.uos.de/frontend/index.php/Gallery/4">Unterpunkt 1</a></li>
						<li><a href="">Unterpunkt 2</a></li>
						</ul>
				 	</div>
					</div>
					<hr>
					<!-- Ende 2. text -->
					<!-- Anfang 3. text -->
					<div class="row">
						<div class="col-sm-2">
							<img src="http://via.placeholder.com/200x200" width="100%">
						</div>
						<div class="col-sm-10">
						<h2>Schubert Ausstellung</h2>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						<ul>
							<li><a href="http://vm240.rz.uos.de/frontend/index.php/Gallery/4">Schubert als Mensch</a></li>
							<li><a href="">Schubert als Koch</a></li>
						</ul>
						</div>
						</div>
					<!-- Ende 3. text -->
				<div class="col-md-2"></div>
				
			</div><!-- end row -->
		</div><!-- end container -->
		<script type='text/javascript'>
			jQuery(document).ready(function() {		
				jQuery("#gallerySetInfo").load("<?php print caNavUrl($this->request, '*', 'Gallery', 'getSetInfo', array('set_id' => $vn_first_set_id)); ?>");
			});
		</script>
<?php
	}
?>
</div>
</div>
</div>
