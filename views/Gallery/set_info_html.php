
<?php
	$va_set_item = $this->getVar("set_item");
?>
<div class="row" style="margin-bottom: 25px;">
	<div class='col-xs-12 col-sm-6'>
		<?php print caNavLink($this->request, $va_set_item["representation_tag"], "", "", "Gallery", $this->getVar("set_id")); ?>
		<div class="caption"><?php print $va_set_item["set_item_label"]; ?></div>
	</div><!-- end col -->
	<div class='col-xs-12 col-sm-6'>
<?php
		print "<H4>".$this->getVar("label")."</H4>";
		print "<p><small class='uppercase'>".$this->getVar("num_items")." ".(($this->getVar("num_items") == 1) ? _t("Objekt") : _t("Objekte"))."</small></p>";
		print "<p>".$this->getVar("description")."</p>";
		
		print "<br/>".caNavLink($this->request, "<span class='glyphicon glyphicon-th-large'></span>", "", "", "Galerie", $this->getVar("set_id"))."&nbsp;&nbsp;&nbsp;".caNavLink($this->request, _t("%1 ansehen", $this->getVar("section_item_name")), "", "", "Gallery", $this->getVar("set_id"));
?>
	</div><!-- end col -->
</div><!-- end col --></div><!-- end row -->

