<style type="text/css">
@media print {
.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
  float: left;
  width: 100%;
  padding: 5px;
}
.h4, .h5 {
    margin-bottom: 2px;
    margin-top: 2px;
}
#footer, #cookienotice, .navLeftRight, .detailNavBgLeft {
    display: none;
}
.bildanzeige>.jcarousel-wrapper>.jcarousel {
    visibility: visible;
}
.bildanzeige {
    visibility: hidden;
    width: 0;
    height: 0;
    margin: 0;
    padding: 0;
}
.metadaten {
    margin-top: 250px;
}
</style>

<?php
    $t_object = $this->getVar('item');
    $va_comments = $this->getVar('comments');
    $va_tags = $this->getVar('tags_array');
    $vn_comments_enabled = $this->getVar('commentsEnabled');
    $vn_share_enabled = $this->getVar('shareEnabled');
?>

<div class='col-xs-12 navTop'><!--- Navigation; only shown at small screen size -->
        {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
    </div> <!-- end Navgigation small Screensize -->
<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'> <!-- Navigation -->
    <div class="detailNavBgLeft">
            {{{nextLink}}}{{{resultsLink}}}{{{previousLink}}}
    </div><!-- end detailNavBgLeft -->
</div><!-- end Navgigation -->

<div class="row" style="margin-bottom: 25px;"><!-- Das ist die Row in der der ganze Inhalt steht -->

    <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10' style="border:0px solid black; margin-bottom: 25px"> <!-- Titel -->
        <H1 style="text-align:center;padding-bottom: 1em">{{{<unit relativeTo="ca_collections" delimiter="<br/>"><a href="/frontend/index.php/Browse/objects/facet/sammlung/id/^ca_collections.collection_id">^ca_collections.preferred_labels.name</a></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H1>
        <div class="container">
            <div class="row">
            <div class='col-sm-6 col-md-6 col-lg-5 col-lg-offset-1 bildanzeige'> <!-- Bild -->
                {{{representationViewer}}}
                {{{<ifdef code="ca_object_representations.rights.rightsHolder" min="1">© Bild: ^ca_object_representations.rights.rightsHolder</ifdef>}}}
                <div id="detailAnnotations"></div>
                
                <?php echo caObjectRepresentationThumbnails($this->request, $this->getVar('representation_id'), $t_object, array('returnAs' => 'bsCols', 'linkTo' => 'carousel', 'bsColClasses' => 'smallpadding col-sm-3 col-md-3 col-xs-4')); ?>
                
                <?php
                                // Comment and Share Tools
                                if ($vn_comments_enabled | $vn_share_enabled) {
                                    echo '<div id="detailTools">';
                                    if ($vn_comments_enabled) {
                                        ?>              
                <div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment"></span>Kommentare und Tags (<?php echo sizeof($va_comments) + sizeof($va_tags); ?>)</a></div><!-- end detailTool -->
                <div id='detailComments'><?php echo $this->getVar('itemComments'); ?></div><!-- end itemComments -->
                <?php
                                    }
                                    if ($vn_share_enabled) {
                                        echo '<div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>'.$this->getVar('shareLink').'</div><!-- end detailTool -->';
                                    }
                                    echo '</div><!-- end detailTools -->';
                                }
                ?>
            </div><!-- end Bild col -->         
    
    <div class='col-sm-6 col-md-6 col-lg-5 metadaten'> <!-- Kernerfassung -->              
        <div style="background: #F8F8F8;margin-bottom: 20px;padding: 1px 10px 10px 10px;width: 100%">
         {{{<ifdef code="ca_objects.date"><H5>Datierung</H5><unit relativeTo="ca_objects.date" delimiter="<br/>">^ca_objects.date.dc_dates_types ^ca_objects.date.dates_value</unit><hr/></ifdef>}}}
        <!-- PERSONEN -->       
                {{{<ifcount code="ca_entities" min="1">
                        <unit relativeTo="ca_entities" restrictToRelationshipTypes="contributor" delimiter=" "><H5>Beiträger_in</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>               
                        <unit relativeTo="ca_entities" restrictToRelationshipTypes="fotograf" delimiter=" "><H5>Fotograf_in</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>                
                        <unit relativeTo="ca_entities" restrictToRelationshipTypes="hersteller_vorlage" delimiter=" "><H5>Hersteller_in der Vorlage</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>                
                        <unit relativeTo="ca_entities" restrictToRelationshipTypes="lithograph" delimiter=" "><H5>Litograph_in</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit> 
                        <unit relativeTo="ca_entities" restrictToRelationshipTypes="scherenschneider" delimiter=" "><H5>Scherenschneider_in</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>                
                        <unit relativeTo="ca_entities" restrictToRelationshipTypes="source" delimiter=" "><H5>Quelle</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>                
                            
                    </ifcount>}}}
            <!-- maler_zeichner -->
                {{{<ifcount code="ca_entities" restrictToRelationshipTypes="maler_zeichner" min="1" max="1">
                   <unit relativeTo="ca_entities" restrictToRelationshipTypes="maler_zeichner" delimiter=" "><H5>Maler/Zeichner_in</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>
               </ifcount>}}}
                 {{{<ifcount code="ca_entities" restrictToRelationshipTypes="maler_zeichner" min="2">
                   <H5>Maler/Zeichner_innen</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="maler_zeichner" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit><hr/>
               </ifcount>}}}
            <!-- textdichter -->
                {{{<ifcount code="ca_entities" restrictToRelationshipTypes="textdichter" min="1" max="1">
                   <unit relativeTo="ca_entities" restrictToRelationshipTypes="textdichter" delimiter=" "><H5>Textdichter_in</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>
               </ifcount>}}}
                 {{{<ifcount code="ca_entities" restrictToRelationshipTypes="textdichter" min="2">
                   <H5>Textdichter_innen</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="textdichter" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit><hr/>
               </ifcount>}}}
            <!-- komponist -->
                {{{<ifcount code="ca_entities" restrictToRelationshipTypes="komponist" min="1" max="1">
                   <unit relativeTo="ca_entities" restrictToRelationshipTypes="komponist" delimiter=" "><H5>Komponist_in</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>
               </ifcount>}}}
                 {{{<ifcount code="ca_entities" restrictToRelationshipTypes="komponist" min="2">
                   <H5>Komponist_innen</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="komponist" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit><hr/>
               </ifcount>}}}
            <!-- Hersteller -->
                {{{<ifcount code="ca_entities" restrictToRelationshipTypes="creator" min="1" max="1">
                   <unit relativeTo="ca_entities" restrictToRelationshipTypes="creator" delimiter=" "><H5>Hersteller</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>
               </ifcount>}}}
                 {{{<ifcount code="ca_entities" restrictToRelationshipTypes="creator" min="2">
                   <H5>Hersteller</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="creator" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit><hr/>
               </ifcount>}}}
               <!-- FRANKIERUNG -->
                <H5>Frankierung und Postweg</H5>
                    <ul>
                        {{{<ifcount code="ca_list_items" min="1"><unit relativeTo="ca_list_items" restrictToRelationshipTypes="frankierung" delimiter="</br>"><li><a href="/frontend/index.php/Browse/objects/facet/frankierung/id/^ca_list_items.item_id"> ^ca_list_items.preferred_labels.name_singular</a></unit></ifcount>}}}                      
                        {{{<ifcount code="ca_list_items" min="1"><unit relativeTo="ca_list_items" restrictToRelationshipTypes="gestempelt" delimiter="</br>"><li><a href="/frontend/index.php/Browse/objects/facet/stempel/id/^ca_list_items.item_id">^ca_list_items.preferred_labels.name_singular</a></unit></ifcount>}}}                     
                        {{{<ifcount code="ca_list_items" min="1"><unit relativeTo="ca_list_items" restrictToRelationshipTypes="feldpost" delimiter="</br>"><li><a href="/frontend/index.php/Browse/objects/facet/feldpost/id/^ca_list_items.item_id">^ca_list_items.preferred_labels.name_singular</a></unit></ifcount>}}}                     
                        {{{<ifcount code="ca_list_items" min="1"><unit relativeTo="ca_list_items" restrictToRelationshipTypes="beschrieben" delimiter="</br>"><li><a href="/frontend/index.php/Browse/objects/facet/beschrieben/id/^ca_list_items.item_id">^ca_list_items.preferred_labels.name_singular</a></unit></ifcount>}}}                                                             
                    </ul>
                <!-- KARTENTYPUS -->
                {{{<ifcount code="ca_list_items" restrictToRelationshipTypes="kartentypus" min="1"><hr/><H5>Kartentypus</H5>
                       <unit relativeTo="ca_list_items" restrictToRelationshipTypes="kartentypus" delimiter="<br/>">^ca_list_items.preferred_labels</unit>
                </ifcount>}}}
                    <!-- BESCHAFFENHEIT -->
                <hr/><H5>Beschaffenheit</H5>
                    <ul>
                        {{{<ifcount code="ca_list_items" restrictToRelationshipTypes="drucktechnik" min="1"><li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="drucktechnik" delimiter="</br>">^ca_list_items.preferred_labels.name_singular</unit></ifcount>}}}                      
                        {{{<ifcount code="ca_list_items" restrictToRelationshipTypes="material" min="1"><li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="material" delimiter="<li>">^ca_list_items.preferred_labels.name_singular</unit></ifcount>}}}                     
                        {{{<ifcount code="ca_list_items" restrictToRelationshipTypes="besonderheit_druck" min="1"><li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="besonderheit_druck" delimiter="<li>">^ca_list_items.preferred_labels.name_singular</unit></ifcount>}}}                     
                    </ul>

                <!-- Maße -->        
                {{{<ifdef code="ca_objects.measure">
                    <hr/>
                    <h5>Maße</h5>
                    <!-- Breite: ^ca_objects.measure.breite1~units:cm<br>Länge: ^ca_objects.measure.laenge1~units:cm<hr/> -->
                    <?php
                        $length = $t_object->get('ca_objects.measure.breite1', array('returnAsDecimalMetric' => true));
                        if ($length) {
                            echo 'Breite: '.($length * 100).' cm <br>';
                        }
                    ?>
                    <?php
                        $length = $t_object->get('ca_objects.measure.laenge1', array('returnAsDecimalMetric' => true));
                        if ($length) {
                            echo 'Länge: '.($length * 100).' cm';
                        }
                    ?>
                    <hr/>
                    </ifdef>}}}

                     <!-- ORTE -->
                {{{<ifcount code="ca_places" min="1" max="1"><H5>Verknüpfter Ort</H5></ifcount>}}}
                {{{<ifcount code="ca_places" min="2"><H5>Verknüpfte Orte</H5></ifcount>}}}
                {{{<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels.name</l> (^relationship_typename)</unit>}}}
                {{{map}}}
                {{{<ifcount code="ca_places" min="1"><p><hr/><i class="fa fa-info-circle" aria-hidden="true"></i> <i>Bitte ggf. durch Klicken auf <code>-</code> aus der Karte herauszoomen, um alle verknüpften Orte zu sehen.</i></p></ifcount>}}} <!-- Eine HR nur wenn die Karte angezeigt wird (es einen verknüpften Ort gibt) -->
        
        </div>
        <div style="background: #F8F8F8;margin-bottom: 20px;padding: 1px 10px 10px 10px;width: 100%"><!-- Bildbeschreibung -->
        
        
        <!-- Beschriftung -->
        {{{<ifdef code="ca_objects.beschriftung_gedruckt"><H5>Bildbeschriftung</H5>
                <ifdef code="ca_objects.beschriftung_gedruckt.beschriftung_gedruck_vorder">Gedruckte Beschriftung der Vorderseite:<br><span class="trimText"><blockquote>^ca_objects.beschriftung_gedruckt.beschriftung_gedruck_vorder</blockquote></span></ifdef>
                <ifdef code="ca_objects.beschriftung_nutzer.beschriftung_nutzer_vorder">Handschriftlicher Text auf der Vorderseite:<br><span class="trimText"><blockquote>^ca_objects.beschriftung_nutzer.beschriftung_nutzer_vorder</blockquote></span></ifdef>
                <ifdef code="ca_objects.beschriftung_gedruckt.beschriftung_gedruckt_rueck">Gedruckte Beschriftung der Rückseite:<br><span class="trimText"><blockquote>^ca_objects.beschriftung_gedruckt.beschriftung_gedruckt_rueck</blockquote></span></ifdef>
                <ifdef code="ca_objects.beschriftung_nutzer.beschriftung_nutzer_rueck">Handschriftlicher Text auf der Rückseite:<br><span class="trimText"><blockquote>^ca_objects.beschriftung_nutzer.beschriftung_nutzer_rueck</blockquote></span></ifdef>
        <hr/></ifdef>}}}
              <!-- Abgebildete Person/Personen -->
                {{{<ifcount code="ca_entities" restrictToRelationshipTypes="ist_abgebildet" min="1" max="1">
                   <unit relativeTo="ca_entities" restrictToRelationshipTypes="ist_abgebildet" delimiter=" "><H5>Abgebildete Person</H5><l>^ca_entities.preferred_labels.displayname</l><hr/></unit>
               </ifcount>}}}
                 {{{<ifcount code="ca_entities" restrictToRelationshipTypes="ist_abgebildet" min="2">
                   <H5>Abgebildete Personen</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="ist_abgebildet" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit><hr/>
               </ifcount>}}}
                       <!-- NORMINCIPITS -->
                {{{<ifcount code="ca_occurrences" restrictToTypes="normincipit" max="1">
                    <unit relativeTo="ca_occurrences" restrictToTypes="normincipit"><H5>Normincipit</H5><l>^ca_occurrences.preferred_labels</l>
                    <hr/></unit>
                </ifcount>}}}
                {{{<ifcount code="ca_occurrences" restrictToTypes="normincipit" min="2">
                    <H5>Normincipits</H5>
                    <unit relativeTo="ca_occurrences" restrictToTypes="normincipit" delimiter="<br>"><l>^ca_occurrences.preferred_labels</l>
                    </unit><hr/>
                </ifcount>}}}
        <!-- SERIE & Seriennumer-->
                {{{<ifcount code="ca_occurrences" restrictToTypes="serie" min="1">
                    <unit relativeTo="ca_occurrences" restrictToTypes="serie" delimiter="<br/>">
                        <H5>Serie</H5>
                        <l>^ca_occurrences.preferred_labels</l>
                    </unit>
                    <unit relativeTo="ca_objects">^ca_objects.seriennummer</unit>
                <hr/>
                </ifcount>}}}
    {{{<ifcount code="ca_list_items" restrictToRelationshipTypes="schlagwort" min="1">    
                        <H5>Verknüpfte Schlagwörter</H5>
                        <ul>
                        <li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="schlagwort" delimiter="<li>"><a href="/frontend/index.php/Browse/objects/facet/schlagworte/id/^ca_list_items.item_id">^ca_list_items.preferred_labels.name_singular%delimiter=_➔_</a>
                    </unit>
                        </ul>
                    <hr/></ifcount>}}}
                   
                {{{<ifcount code="ca_objects.aat" min="1">
                        <H5>AAT</H5>
                        <ul>
                        <li><unit relativeTo="ca_objects.aat.url" delimiter="<li>"><a href="^ca_objects.aat.url" target="_blank">^ca_objects.aat</a></l></unit>
                        </ul>
                        <hr/></ifcount>}}}

                {{{<ifcount code="ca_objects.lcsh_terms" min="1">    
                        <H5>Library of Congress Subject Headings</H5>
                          <ul>
                          <?php 
                          // get metadata element lcsh_terms with structure as array
                          $lcshterms = $t_object->get('ca_objects.lcsh_terms', array('returnWithStructure' => true));
                            // iterate over nested arrays
                            foreach ($lcshterms as $ebene1) {
                                foreach ($ebene1 as $ebene2) {
                                    //get string
                                    $str = $ebene2['lcsh_terms'];
                                    // regex string to get term only
                                    $rename = '/(.+?)\[.*/m';
                                    $substname = '$1';
                                    $name = preg_replace($rename, $substname, $str);
                                    // regex string to get id only
                                    $reurl = '/(.+?)\[(.*)(\])/m';
                                    $substurl = '$2';
                                    $rawurl = preg_replace($reurl, $substurl, $str);
                                    // str_replace id to get URL
                                    $url = str_replace('info:lc', 'http://id.loc.gov', $rawurl);
                                    // output name as link to URL:
                                    echo '<li><a href="'.$url.'" target="_blank">'.$name.'</a>';
                                }
                            }
                          ?>
                           </ul>
                        <hr/></ifcount>}}}
                    
                    {{{<ifcount code="ca_objects.iconclass" min="1">    
                        <H5>Iconclass</H5>
                        <ul>
                            <li><unit relativeTo="ca_objects.iconclass.url" delimiter="<li>"><a href="^ca_objects.iconclass.url" target="_blank">^ca_objects.iconclass</a></unit>
                        </ul>
                        <hr/>
                    </ifcount>}}}
                 <!-- Beschreibung -->
          {{{<ifdef code="ca_objects.bildbeschreibung"><H5>Bildbeschreibung</H5><span class="trimText">^ca_objects.bildbeschreibung</span><hr/></ifdef>}}}
          
          <!-- Kommentar -->
        {{{<ifdef code="ca_objects.kommentar"><H5>Kommentar</H5>^ca_objects.kommentar<br/><hr/></ifdef>}}}
         <!-- Kategorien Giesbrecht -->
                {{{<ifcount code="ca_list_items" restrictToRelationshipTypes="kategorie" min="1">
                    <H5>Sammlungskategorie</H5>
                        <p><unit relativeTo="ca_list_items" restrictToRelationshipTypes="kategorie" ><a href="/frontend/index.php/Browse/objects/facet/sammlungkategorien/id/^ca_list_items.item_id">^ca_list_items.preferred_labels</a></unit>
                        <ifcount code="ca_list_items.kategorientexte" min="1"> (<unit relativeTo="ca_list_items" restrictToRelationshipTypes="kategorie"><a href="/frontend/index.php/Detail/terms/^ca_list_items.idno"><i class="fa fa-book"></i></a></unit>)</ifcount></p>
                   </ifcount>}}}
        </div><!-- end Bildbeschreibung -->
    {{{<ifdef code="ca_objects.literatur">
        <div style="background: #F8F8F8;margin-bottom: 20px;padding: 1px 10px 10px 10px;width: 100%"><!-- Sonstiges -->
            <!-- Literatur -->
                    <ifdef code="ca_objects.literatur"><H5>Literatur</H5><span class="trimText">^ca_objects.literatur</span><hr/></ifdef>
                    <p><ifdef code="ca_objects.external_link"><H5>Weiterführende Links</H5><a href="^ca_objects.external_link.external_link_url">^ca_objects.external_link.external_link_text</a></ifdef></p>
        </div><!-- end sonstiges -->
    </ifdef>}}}
    <div style="background: #F8F8F8;margin-bottom: 20px;padding: 1px 10px 10px 10px;width: 100%"><!-- Administrative Metadaten -->
        <!-- Idno / Signatur -->    
        {{{<ifdef code="ca_objects.idno"><h5>ID</H5>^ca_objects.idno<br/></ifdef>}}}<hr/>
        <!-- Sammlung -->    
        {{{<unit relativeTo="ca_collections" delimiter="<br/>"><h5>Sammlung</h5><a href="/frontend/index.php/Browse/objects/facet/sammlung/id/^ca_collections.collection_id">^ca_collections.preferred_labels.name</a></unit><ifcount min="1" code="ca_collections">}}}
        <!-- Alte Signatur -->
        {{{<ifdef code="ca_objects.signatur"><hr/><H5>Alte Signatur</H5>^ca_objects.signatur<br/></ifdef>}}}  
        <!-- Permalink -->     
        {{{<ifdef code="ca_objects.urn">  
        <h5>Permalink</h5><hr/>
        URN: <code>^ca_objects.urn</code><br/>
    Permalink: <code>http://nbn-resolving.org/^ca_objects.urn</code>
        </ifdef>}}}
        <!-- Dublette -->            
         {{{<ifcount code="ca_objects.related" min="1">
                <hr/>
                 <h5>Dublette</h5>
                 <ul>
                     <li>
                     <a href="/frontend/index.php/Detail/objects/^ca_objects.related.idno">^ca_objects.related.preferred_labels (^ca_objects.related.idno)</a>
                 </ul>
             </ifcount>}}}
          <!-- Schenker -->
                {{{<ifcount code="ca_entities" restrictToRelationshipTypes="schenker" min="1" max="1">
                   <hr/><H5>Schenker_in</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="schenker" delimiter=" "><l>^ca_entities.preferred_labels.displayname</l></unit>
               </ifcount>}}}
                 {{{<ifcount code="ca_entities" restrictToRelationshipTypes="schenker" min="2">
                   <hr/><H5>Schenker_innen</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="schenker" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit>
               </ifcount>}}}
                  <!-- Nachlasser/in -->
                {{{<ifcount code="ca_entities" restrictToRelationshipTypes="nachlass" min="1" max="1">
                   <hr/><H5>Nachlasser_in</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="nachlass" delimiter=" "><l>^ca_entities.preferred_labels.displayname</l></unit>
               </ifcount>}}}
                 {{{<ifcount code="ca_entities" restrictToRelationshipTypes="nachlass" min="2"> 
                   <hr/><H5>Nachlasser_innen</H5><unit relativeTo="ca_entities" restrictToRelationshipTypes="nachlass" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit>
               </ifcount>}}}
        <!-- Copyright/Rechte -->
               {{{ <ifdef code="ca_objects.rights">
                <hr/>
                <h5>Copyright</h5>
                  <ifdef code="ca_objects.rights">
                    <ifdef code="ca_objects.rights.rechtemodell"><a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.de" target="_blank"><img src="https://licensebuttons.net/l/by-nc-sa/3.0/80x15.png"></a> (Metadaten)</ifdef>
                    <ifdef code="ca_objects.rights.rightsHolder">: ^ca_objects.rights.rightsHolder</ifdef>
                    <ifdef code="ca_objects.rights.copyrightstatement"> (^ca_objects.rights.copyrightstatement)</ifdef><br>
                  </ifdef>
                  <ifdef code="ca_object_representations.rights">
                    <ifdef code="ca_object_representations.rights.rechtemodell">^ca_object_representations.rights.rechtemodell (Bild)</ifdef>
                    <ifdef code="ca_object_representations.rights.rightsHolder">: ^ca_object_representations.rights.rightsHolder</ifdef>
                    <ifdef code="ca_object_representations.rights.copyrightstatement"> (^ca_object_representations.rights.copyrightstatement)</ifdef>
                  </ifdef>
              </ifdef>
                }}}
                
                  
                <!-- Bearbeiten Link -->
                <p style="text-align: right; font-size: 10pt"><i>{{{<a href="--url--/backend/index.php/editor/objects/ObjectEditor/Edit/object_id/^ca_objects.object_id" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>}}}</i></p>
        <!-- DFG Viewer Code
            <?php
                $id = $t_object->get('ca_objects.object_id');
                $link = '/backend/service.php/OAI/bpk?verb=GetRecord&identifier=oai:vm240.rz.uos.de:'.$id.'&metadataPrefix=mets';
                echo '<a href="http://dfg-viewer.de/show/?tx_dlf[id]='.urlencode($link).'">DFG Viewer</a>';
            ?>
        -->
        </div><!-- end col -->

</div><!-- end row -->




<!-- Navigation next <div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'><div class="detailNavBgRight">{{{nextLink}}}</div></div>-->

    </div><!-- end container -->


    </div><!-- end col -->
    </div><!-- end row -->
<script type='text/javascript'>
    jQuery(document).ready(function() {
        $('.trimText').readmore({
          speed: 75,
          maxHeight: 100
        });
    });
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({html:true}); 
});
</script>

