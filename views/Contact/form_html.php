<?php
	$va_errors = $this->getVar("errors");
	$vn_num1 = rand(1,10);
	$vn_num2 = rand(1,10);
	$vn_sum = $vn_num1 + $vn_num2;
?>

<?php
	if(sizeof($va_errors["display_errors"])){
		print "<div class='alert alert-danger'>".implode("<br/>", $va_errors["display_errors"])."</div>";
	}
?>
	<form id="contactForm" action="<?php print caNavUrl($this->request, "", "Contact", "send"); ?>" role="form" method="post">
		<div class="row">
			<div class="col-md-2"><br></div>
			<div class="col-md-8">
			<H1><?php print _t("Kontakt-Formular"); ?></H1>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group<?php print (($va_errors["name"]) ? " has-error" : ""); ?>">
						<label for="name">Name</label>
						<input type="text" class="form-control input-sm" id="email" placeholder="Ihr Name" name="name" value="{{{name}}}">
					</div>
				</div><!-- end col -->
				<div class="col-sm-4">
					<div class="form-group<?php print (($va_errors["email"]) ? " has-error" : ""); ?>">
						<label for="email">Email-Adresse</label>
						<input type="text" class="form-control input-sm" id="email" placeholder="Email" name="email" value="{{{email}}}">
					</div>
				</div><!-- end col -->
				<div class="col-sm-4">
					<div class="form-group<?php print (($va_errors["security"]) ? " has-error" : ""); ?>">
						<label for="security">Sicherheitsabfrage</label>
						<div class='row'>
							<div class='col-sm-4'>
								<p class="form-control-static"><?php print $vn_num1; ?> + <?php print $vn_num2; ?> = </p>
							</div>
							<div class='col-sm-4'>
								<input name="security" value="" id="security" type="text" class="form-control input-sm" />
							</div>
						</div><!--end col-sm-8-->	
						</div><!-- end row -->
					</div>
				</div><!-- end row -->
			</div><!-- end col -->
						<div class="col-md-2"><br></div>
		</div><!-- end row -->
		<div class="row">
			<div class="col-md-2"><br></div>
			<div class="col-sm-8">
				<div class="form-group<?php print (($va_errors["message"]) ? " has-error" : ""); ?>">
					<label for="message">Ihre Nachricht</label>
					<textarea class="form-control input-sm" id="message" name="message" rows="5">{{{message}}}</textarea>
				</div>
				<div class="form-group">
			<button type="submit" class="btn btn-default">Senden</button>
		</div><!-- end form-group -->
			</div><!-- end col -->
					<div class="col-md-2"><br></div>
		</div><!-- end row -->
		</div>
		<input type="hidden" name="sum" value="<?php print $vn_sum; ?>">
	</form>
