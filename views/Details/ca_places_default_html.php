<?php
    $t_item = $this->getVar('item');
    $va_comments = $this->getVar('comments');
    $vn_comments_enabled = $this->getVar('commentsEnabled');
    $vn_share_enabled = $this->getVar('shareEnabled');
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
				<div class='col-md-12 col-lg-12'>
					<H1>{{{^ca_places.preferred_labels.name}}}</H1>
					<!-- <H6>{{{^ca_places.type_id}}}{{{<ifdef code="ca_places.idno">: ^ca_places.idno</ifdef>}}}</H6> -->
					<H6>{{{^ca_places.type_id}}}</H6>
					{{{<ifcount code="ca_places.related" min="1" max="1"><H2>Verknüpfter Ort</H2><hr></ifcount>}}}
					{{{<ifcount code="ca_places.related" min="2"><H2>Verknüpfte Orte</H2><hr></ifcount>}}}
					{{{<unit relativeTo="ca_places.related" delimiter="<br/>"><a href="/frontend/index.php/Detail/places/^ca_places.idno">^ca_places.preferred_labels.name</a></unit>}}}
					<p style="text-align: right; font-size: 6pt"><i>{{{<a href="--url--/backend/index.php/editor/places/PlaceEditor/Save/Screen43/place_id/^ca_places.place_id" target="_blank">Bearbeiten</a>}}}</i></p>
					<div>
				</div>
				</div><!-- end col -->
			</div><!-- end row -->
			<div class="row"><!-- Links -->			
				<div class="col-xs-12">	<!-- Links -->
					 {{{<ifdef code="ca_places.wikipedia">
					 	<h2>Externe Links</h2>
					 	<hr>
					 	<a href="^ca_places.wikipedia.fullurl" target="_blank">→ Wikipedia</a><br>
	                    <ifdef code="ca_places.normdaten.ag_gnd"><a href="^ca_places.normdaten.ag_gnd" target="_blank">→ GND</a><br></ifdef> 
    	                <ifdef code="ca_places.normdaten.ag_viaf"><a href="^ca_places.normdaten.ag_viaf" target="_blank">→ VIAF</a><br></ifdef>
                 	  	<ifdef code="ca_places.lcsh_terms" min="1">
      		              <?php
                                $str = $t_item->get('ca_places.lcsh_terms');
                                $re = '/(.+?(\[info:lc))(.+)(\])/';
                                $result = preg_replace($re, '$3', $str);
                                echo '<a href="http://id.loc.gov'.$result.' " target="_blank">→ '.'Library of Congress Name Authority File'.'</a>';
                            ?>
                		</ifdef>
                 	</ifdef>}}}
					</div>
				</div><!-- end Links Row -->
				<div class="row"><!-- Karte & Objekte -->
				<div class='col-xs-12 col-md-6'> <!-- Map und Beschreibungs-Div -->
					 
					{{{<ifdef code="ca_places.georeference" min="1">
						 <h2>Karte</h2><hr>
					</ifdef>}}}
						 {{{map}}}
					{{{<ifdef code="ca_places.description"><H2>Beschreibung</H2>^ca_places.description<br/></ifdef>}}}
					{{{<ifcount code="ca_entities" min="1" max="1"><H2>Verknüpfte Entität</H2><hr></ifcount>}}}
						{{{<ifcount code="ca_entities" min="2"><H2>Verknüpfte Entitäten</H2><hr></ifcount>}}}
						{{{<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l></unit>}}}
				</div><!-- end Karte, Beschreibung... -->
				<div class='col-xs-12 col-md-6'><!-- Verknüpfte Objekte -->
				{{{<ifcount code="ca_objects" min="1"><h2>Verknüpfte Objekte</h2><hr>
					
			
				<div id="browseResultsContainer">
					<?php echo caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>
				</div><!-- end browseResultsContainer -->
			
			<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery("#browseResultsContainer").load("<?php echo caNavUrl($this->request, '', 'Search', 'objects', array('search' => 'place_id:^ca_places.place_id'), array('dontURLEncodeParameters' => true)); ?>", function() {
						jQuery('#browseResultsContainer').jscroll({
							autoTrigger: true,
							loadingHtml: '<?php echo caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>',
							padding: 20,
							nextSelector: 'a.jscroll-next'
						});
					});
				});
			</script>
			</ifcount>}}}
			</div>
			
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end col -->
	
</div><!-- end row -->
