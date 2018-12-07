    <?php
    $t_item = $this->getVar('item');
    $va_comments = $this->getVar('comments');
    $vn_comments_enabled = $this->getVar('commentsEnabled');
    $vn_share_enabled = $this->getVar('shareEnabled');
?>
<!-- Navigation -->
<div class='col-xs-12 navTop'><!--- NAV only shown at small screen size -->
    {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
    </div><!-- end detailTop -->
<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'> <!-- NAV -->
    <div class="detailNavBgLeft">
        {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
        </div><!-- end detailNavBgLeft -->
    </div><!-- end col -->
<!-- Inhalt -->
<div class="row" style="margin-bottom: 25px;"><!-- Main Row -->
    <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'> <!-- Content -->
        <div class="container">
            <div class="row"> <!-- Titel Row -->
                <div class='col-md-12 col-lg-12'>
                    <H1>{{{^ca_entities.preferred_labels.displayname}}}</H1><HR>
                    {{{^ca_entities.lifespan}}}<br>
                        {{{<unit relativeTo="ca_places" delimiter="<br/>">^relationship_typename <l>^ca_places.preferred_labels.name</l></unit>}}}  {{{<ifdef code="ca_entities.historische_adresse">(^ca_entities.historische_adresse)<br></ifdef>}}} <!-- War ansässig in... -->
                        {{{<ifdef code="ca_entities.kommentar"><i>Kommentar:</i> ^ca_entities.kommentar</blockquote></ifdef>}}}
                        {{{^ca_entities.schenker}}}
                    </div>
             </div><!-- end Titel row -->
            <div class="row"><!-- Inhalts Row -->
                <p style="text-align: right; font-size: 6pt"><i>{{{<a href="--url--/backend/index.php/editor/entities/EntityEditor/Edit/entity_id/^ca_entities.entity_id" target="_blank">Bearbeiten</a>}}}</i></p>

                <div class="card col-xs-12 col-sm-6"><!-- Externe Links -->
                     {{{<ifdef code="ca_entities.externe_websites_entitaeten">
                        <H2>Externe Links</H2><HR>
                        <ifdef code="ca_entities.externe_websites_entitaeten.wikipedia3"><a href="^ca_entities.externe_websites_entitaeten.wikipedia3.fullurl" target="_blank">→ Wikipedia</a><br></ifdef>
                        <ifdef code="ca_entities.externe_websites_entitaeten.ndb"><a href="^ca_entities.externe_websites_entitaeten.ndb.url" target="_blank">→ Deutsche Biographie ^ca_entities.externe_websites_entitaeten.ndb.ps_url</a><br></ifdef>                
                        <ifdef code="ca_entities.externe_websites_entitaeten.gnd_link3"><a href="^ca_entities.externe_websites_entitaeten.gnd_link3" target="_blank">→ GND</a><br></ifdef> 
                        <ifdef code="ca_entities.externe_websites_entitaeten.viaf"><a href="^ca_entities.externe_websites_entitaeten.viaf" target="_blank">→ VIAF</a><br></ifdef>
                        <ifdef code="ca_entities.externe_websites_entitaeten.ulan3">   
                            <?php
                                $str = $t_item->get('ca_entities.externe_websites_entitaeten.ulan3');
                                $re = "/\[(.+)\]\s(.*)/";
                                $subst_id = '$1';
                                $id = preg_replace($re, '$1', $str);
                                $name = preg_replace($re, '$2', $str);
                                echo '<a href="http://www.getty.edu/vow/ULANFullDisplay?find=&role=&nation=&subjectid='.$id.' " target="_blank">→ '.ULAN.'</a>';
                              ?>    <br></ifdef>
                        <ifdef code="ca_entities.externe_websites_entitaeten.externe_links3"><unit delimiter="<br/>"><a href="^ca_entities.externe_websites_entitaeten.externe_links3" target="_blank">→ ^ca_entities.externe_websites_entitaeten.name_externe_links3</a></unit><br></ifdef>
                     </ifdef>}}}
                        {{{<ifdef code="ca_entities.locnh"><!-- Library of Congress Name Headings -->
                            <?php
                                $str = $t_item->get('ca_entities.locnh');
                                $re = '/(.+?(\[info:lc))(.+)(\])/';
                                $result = preg_replace($re, '$3', $str);
                                echo '<a href="http://id.loc.gov'.$result.' " target="_blank">→ '.'Library of Congress Name Authority File'.'</a>';
                            ?>
                        </ifdef>}}}
                        {{{<ifdef code="ca_entities.externe_websites_entitaeten.gnd_link3"><!-- Entity Facts -->
                            <h3>Entity Facts</h3>
                            <?php
                                    $str = $t_item->get('ca_entities.externe_websites_entitaeten.gnd_link3');
                                    $re = "/(http:\/\/d-nb\.info\/gnd\/)/";
                                    $subst_id = '$1';
                                    $id = preg_replace($re, '', $str);
                                    $url = 'http://hub.culturegraph.org/entityfacts/'.$id;
                                    $json_source = file_get_contents($url);
                                    $decodedjson = json_decode($json_source, true);
                                    foreach ($decodedjson['sameAs'] as $item) {
                                        echo '<a href="'.$item['@id'].'" target="_blank">'.'→ '.$item['collection']['name'].'</a>'.'<br>';
                                        echo '';
                                    }
                                ?>
                                <br>Quelle: <a href="http://www.dnb.de/entityfacts.html" target="_blank">Entity Facts</a>
                        </ifdef>}}}
                         {{{<ifdef code="ca_occurrences" restrictToTypes="normincipit" min="1"> <!-- Ifdef Norminicipits-Container -->
                            <ifcount code="ca_occurrences" restrictToTypes="normincipit" min="1" max="1"><H2>Verknüpftes Normincipit</H2><HR></ifcount>
                            <ifcount code="ca_occurrences" restrictToTypes="normincipit" min="2"><H2>Verknüpfte Normincipits</H2><HR></ifcount>
                            <unit relativeTo="ca_occurrences" restrictToTypes="normincipit" restrictToRelationshipTypes="malte,komponierte,textete" delimiter="<br/>"><l>^ca_occurrences.preferred_labels.name</l> (^relationship_typename)</unit>
                         </ifdef>}}}
                        {{{<ifdef code="ca_occurrences" restrictToTypes="serie" min="1"> <!-- Ifdef Serie-Container -->
                            <ifcount code="ca_occurrences" restrictToTypes="serie" min="1" max="1"><H2>Verknüpfte Serie</H2><HR></ifcount>
                            <ifcount code="ca_occurrences" restrictToTypes="serie" min="2"><H2>Verknüpfte Serien</H2><HR></ifcount>
                            <unit relativeTo="ca_occurrences" restrictToTypes="serie" restrictToRelationshipTypes="veroeffentlichte" delimiter="<br/>">^relationship_typename die Serie <l>^ca_occurrences.preferred_labels.name</l></unit>
                        </ifdef>}}}
                           {{{<ifdef code="ca_entities.biography"><H5>Biographie</H5>^ca_entities.biography<br/></ifdef>}}}
                            {{{<ifdef code="ca_entities.wikipedia"><H2>Wikipedia</H2><hr><p style="color: #c8c7c9;"><i>Der folgende Text sowie das Bild werden automatisiert aus der deutschen Wikipedia abgerufen. Um Links in dem Wikipedia-Artikel folgen zu können, klicken Sie bitte oben auf → Wikipedia.</i><br/></p></ifdef>}}}
                            {{{<ifdef code="ca_entities.wikipedia"><img src="^ca_entities.wikipedia.image_thumbnail" style="float: left;margin-right: 10px">^ca_entities.wikipedia.extract</ifdef>}}}
                            {{{<ifdef code="ca_entities.externe_websites_entitaeten.wikipedia3"><H2>Wikipedia</H2><hr><p style="color: #454545;"><i>Der folgende Text sowie das Bild werden automatisiert aus der deutschen Wikipedia abgerufen. Um Links in dem Wikipedia-Artikel folgen zu können, klicken Sie bitte oben auf → Wikipedia.</i></p><hr></ifdef>}}}
                            {{{<ifdef code="ca_entities.externe_websites_entitaeten.wikipedia3"><div><img src="^ca_entities.externe_websites_entitaeten.wikipedia3.image_thumbnail" style="float: left;margin-right: 10px">^ca_entities.externe_websites_entitaeten.wikipedia3.extract</div></ifdef>}}}
                </div>
                <div class='card col-xs-12 col-sm-6'> <!-- Verknüpfte Objekte -->               
                    {{{<ifcount code="ca_objects" min="1">
                            <H2>Verknüpfte Objekte</H2><HR><!-- Count, wird aber falsch angezeigt: (^ca_objects._count) -->
                    <div id="browseResultsContainer">
                        <?php echo caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>
                        <script type="text/javascript">
                        jQuery(document).ready(function() {
                            jQuery("#browseResultsContainer").load("<?php echo caNavUrl($this->request, '', 'Search', 'objects', array('search' => 'entity_id:^ca_entities.entity_id'), array('dontURLEncodeParameters' => true)); ?>", function() {
                                jQuery('#browseResultsContainer').jscroll({
                                    autoTrigger: true,
                                    loadingHtml: '<?php echo caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>',
                                    padding: 20,
                                    nextSelector: 'a.jscroll-next'
                                });
                            });
                        });
                        </script>
                    </div>
                    </ifcount>}}}
                </div>
                </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end Content -->
</div><!-- end Main row -->
