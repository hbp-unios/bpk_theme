<?php
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");	
?>
	<div class='col-xs-12 navTop'><!--- only shown at small screen size -->
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
	</div><!-- end detailTop -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
<div class="row" style="margin-bottom: 25px;">

	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container">
			<div class="row"><!-- Titel Row -->			
				<div class='col-md-12 col-lg-12'> <!-- Titel -->
					<H1>{{{<unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.hierarchy.preferred_labels%delimiter=_➔_</unit>}}}</H1>
                	<!-- Syonym: -->
                	<H3>{{{<ifdef code="ca_list_items.nonpreferred_labels"><unit relativeTo="ca_list_items" delimiter="<br/>">Alternativ: ^ca_list_items.nonpreferred_labels</unit></ifdef>}}}</H3>
					<HR>
				</div><!-- end Titel -->
			</div><!-- end Titelrow -->
			<div class="row">
				<div class='col-md-12 col-lg-12'> <!-- Related Objects -->
					{{{<ifdef code="ca_list_items.kategorientexte"><h2>Beschreibung</h2></ifdef>}}}
					{{{<ifdef code="ca_list_items.kategorientexte"><unit relativeTo="ca_list_items"><HR>^ca_list_items.kategorientexte</unit></ifdef>}}}
					<HR><h3>→ {{{<a href="/frontend/index.php/Browse/objects/facet/sammlungkategorien/id/^ca_list_items.item_id">Zu den Karten</a>}}}</h3>
					
					<!--
					{{{<ifcount code="ca_occurrences.related" min="1" max="1"><H6>Related occurrence</H6></ifcount>}}}
					{{{<ifcount code="ca_occurrences.related" min="2"><H6>Related occurrences</H6></ifcount>}}}
					{{{<unit relativeTo="ca_occurrences" delimiter="<br/>"><l>^ca_occurrences.related.preferred_labels.name</l></unit>}}}

					{{{<ifcount code="ca_places" min="1" max="1"><H6>Related place</H6></ifcount>}}}
					{{{<ifcount code="ca_places" min="2"><H6>Related places</H6></ifcount>}}}
					{{{<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels.name</l></unit>}}}					
				-->
				</div>
			</div><!-- End Row -->
			<div class="row">
				<div class='col-md-12 col-lg-12'>
					<!--
					{{{<ifcount code="ca_objects" min="1"><h2>Verknüpfte Objekte</h2><hr>
					
						<div id="browseResultsContainer">
							<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Lädt...')); ?>
							<script type="text/javascript">
				        	jQuery(document).ready(function() {
					        	jQuery("#browseResultsContainer").load("<?php print caNavUrl($this->request, '', 'Search', 'objects', array('search' => '^ca_list_items.item_id', 'sort' => 'ca_objects.idno'), array('dontURLEncodeParameters' => true)); ?>", function() {
						        	jQuery('#browseResultsContainer').jscroll({
							        	autoTrigger: true,
							        	LädtHtml: '<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Lädt...')); ?>',
							        	padding: 20,
							        	nextSelector: 'a.jscroll-next'
						        	});
					        	});
				        	});
							</script>
						</div>
					
					</ifcount>}}}
					{{{<ifcount code="ca_objects" min="1" max="1"><H6>Verknüpftes Objekt</H6><hr></ifcount>}}}
					{{{<ifcount code="ca_objects" min="2"><H6>Verknüpfte Objekte</H6><hr></ifcount>}}}
					{{{<unit relativeTo="ca_objects" delimiter="<br/>"><l>^ca_objects.idno: ^ca_objects.preferred_labels</l></unit>}}}
					-->
				</div>
				</div><!-- end row -->

	</div><!-- end col -->
</div><!-- end row -->
