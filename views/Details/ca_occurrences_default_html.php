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
			<div class="row"> <!-- Name und Typ -->
				<div class='col-md-12 col-lg-12'>
					<H1>{{{^ca_occurrences.preferred_labels.name}}}</H1>
                    {{{<ifdef code="ca_occurrences.nonpreferred_labels"><unit delimiter="/">Alternativer Titel: ^ca_occurrences.nonpreferred_labels</unit></ifdef>}}}
					<H3>{{{^ca_occurrences.type_id}}}</H3>
					<p style="text-align: right; font-size: 6pt"><i>{{{<a href="--url--/backend/index.php/editor/occurrences/OccurrenceEditor/Edit/occurrence_id/^ca_occurrences.occurrence_id" target="_blank">Bearbeiten</a>}}}</i></p>
                    <!--
                    {{{<unit relativeTo="ca_occurrences" resrictToTypes="serie" delimiter=", ">Folgende Nummern der Serie sind im Archiv vorhanden: ^ca_objects.seriennummer</unit>}}}<HR>
                	-->
					<!-- <H5>{{{<unit relativeTo="ca_objects_x_occurrences">^relationship_typename</unit>}}}</H5> -->
				</div><!-- end col -->
			</div><!-- end row Name und Typ -->
			<div class="row"><!-- Externe Links, Beschreibung, Verknüpfte Personen/Orte -->	
				{{{<ifdef code="ca_occurrences.externe_websites" min="1">
                <div class="col-xs-12 col-sm-6"><!-- externe Links -->
    				<ifdef code="ca_occurrences.externe_websites" min="1"><H2>Externe Links</H2><HR>
    			   	<ifdef code="ca_occurrences.externe_websites.gnd_link2"><a href="^ca_occurrences.externe_websites.gnd_link2" target="_blank">→ GND</a><br></ifdef>					
    			   	<ifdef code="ca_occurrences.externe_websites.link_liederlexikon"><a href="^ca_occurrences.externe_websites.link_liederlexikon" target="_blank">→ Liederlexikon des Zentrums für Populäre Kultur und Musik Freiburg</a><br></ifdef>
                    <ifdef code="ca_occurrences.externe_websites.viaf_link"><a href="^ca_occurrences.externe_websites.viaf_link" target="_blank">→ VIAF</a><br></ifdef>
    			    <ifdef code="ca_occurrences.externe_websites.wikipedia2"><a href="^ca_occurrences.externe_websites.wikipedia2.fullurl" target="_blank">→ Wikipedia</a><br></ifdef>
    			    <ifdef code="ca_occurrences.externe_websites.weitere_links"><a href="^ca_occurrences.externe_websites.weitere_links" target="_blank">→ ^ca_occurrences.externe_websites.name_externe_links</a><br></ifdef>
				</div>
                 </ifdef>}}}
				<div class='col-xs-12 col-sm-6'> <!-- beschreibung -->
                     {{{<ifdef code="description"><H2>Beschreibung / Text</H2><HR>^description</ifdef>}}} 
                 </div><!-- end beschreibung -->
            </div>
            <div class="row"><!-- Verknüpfte Personen/Occurrences -->
				{{{<ifcount code="ca_entities" min="1">
                    <div class='col-xs-12 col-sm-6'>
    					<ifcount code="ca_entities" min="1" max="1"><H2>Verknüpfte Person</H2><HR></ifcount>
    					<ifcount code="ca_entities" min="2"><H2>Verknüpfte Personen</H2><HR></ifcount>
    					<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</unit>
                    </div>
                </ifcount>}}}
                <div class='col-xs-12 col-sm-6'>    
                    {{{<ifcount code="ca_occurrences.related" min="1" max="1"><H2>Verknüpftes Normincipit</H2><HR</ifcount>}}}
                    {{{<ifcount code="ca_occurrences.related" min="2"><H2>Verknüpfte Normincipits</H2><HR</ifcount>}}}
                    {{{<unit relativeTo="ca_occurrences" delimiter="<br/>"><a href="/frontend/index.php/Detail/occurrences/^ca_occurrences.related.idno">^ca_occurrences.related.preferred_labels.name</a></unit>}}}					
				</div>
		    </div><!-- end row -->
            <div class="row">
                {{{<ifdef code="ca_occurrences.externe_websites.wikipedia2">
        	<div class="col-xs-12 col-sm-6"><!-- wikipedia -->
                     <ifdef code="ca_occurrences.externe_websites.wikipedia2"><H2>Wikipedia</H2><hr><p style="color: #454545;"><i>Der folgende Text sowie das Bild werden automatisiert aus der deutschen Wikipedia abgerufen. Um Links in dem Wikipedia-Artikel folgen zu können, klicken Sie bitte oben auf → Wikipedia.</i></p><hr></ifdef>
                     <ifdef code="ca_occurrences.externe_websites.wikipedia2"><div><img src="^ca_occurrences.externe_websites.wikipedia2.image_thumbnail" style="float: left;margin-right: 10px">^ca_occurrences.externe_websites.wikipedia2.extract</div></ifdef>
            </div>
            </ifdef>}}}
            <div class="col-xs-12 col-sm-6"> <!-- Verknüpfte Objekte -->
        	   {{{<ifcount code="ca_objects" min="1"><h2>Verknüpfte Objekte (^ca_objects._count)</h2><hr>
            					<div class="row">
            						<div id="browseResultsContainer">
            						<?php echo caBusyIndicatorIcon($this->request).' '.addslashes(_t('Lädt...')); ?>
            							</div><!-- end browseResultsContainer -->
            						</div><!-- end row -->
            						<script type="text/javascript">
            				jQuery(document).ready(function() {
            					jQuery("#browseResultsContainer").load("<?php echo caNavUrl($this->request, '', 'Search', 'objects', array('search' => 'occurrence_id:^ca_occurrences.occurrence_id'), array('dontURLEncodeParameters' => true)); ?>", function() {
            						jQuery('#browseResultsContainer').jscroll({
            							autoTrigger: true,
            							loadingHtml: '<?php echo caBusyIndicatorIcon($this->request).' '.addslashes(_t('Lädt...')); ?>',
            							padding: 20,
            							nextSelector: 'a.jscroll-next'
            						});
            					});
            				});
            						</script>
            					</ifcount>}}}
        		</div>
			</div>			
        </div><!-- end container -->
	
	</div><!-- end col -->
	
</div><!-- end row -->
