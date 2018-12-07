<?php
require_once(__CA_MODELS_DIR__."/ca_sets.php");
include_once(__CA_LIB_DIR__."/ca/Search/OccurrenceSearch.php");
include_once(__CA_LIB_DIR__."/ca/Search/ObjectSearch.php");
include_once(__CA_MODELS_DIR__."/ca_occurrences.php");
$va_access_values = caGetUserAccessValues($this->request);
    if($vs_set_code = $this->request->config->get("featured_art_set")){
        AssetLoadManager::register("carousel");
        $t_set = new ca_sets();
        $t_set->load(array('set_code' => $vs_set_code));
        # Enforce access control on set
        if((sizeof($va_access_values) == 0) || (sizeof($va_access_values) && in_array($t_set->get("access"), $va_access_values))){
            $va_item_ids = array_keys(is_array($va_tmp = $t_set->getItemRowIDs(array('checkAccess' => $va_access_values, 'shuffle' => 0))) ? $va_tmp : array());
        }
        if(is_array($va_item_ids) && sizeof($va_item_ids)){
            $t_object = new ca_objects();
            $va_item_media = $t_object->getPrimaryMediaForIDs($va_item_ids, array("slideshowsmall"), array('checkAccess' => caGetUserAccessValues($this->request)));
        }
    }   
?>
<div class="container">
  <div class="row">
        <div class="col-sm-0 col-md-3"></div>
    <div class="col-sm-9 col-md-6"><!-- Suchfelder -->
      <h1>Erweiterte Suche: Postkarten</h1>
      <p>Bitte geben Sie Ihre Suchbegriffe in die Maske ein.</p>
    {{{form}}} 
    <div class='advancedContainer'>
      <div class='row'><!-- Volltext -->
        <div class="col-sm-12">
          <div class="advancedSearchField">
              <a href="#" title="Volltextsuche" data-toggle="popover" data-trigger="hover" data-content="In der Volltextsuche werden alle Felder und auch alle Verknüpfungen durchsucht. Geben Sie Ihre Suche hier ein, um die größte Bandbreite an möglichen Ergebnissen zu bekommen und diese im nächsten Schritt zu filtern. ">Volltext:</a>
              <br/> {{{_fulltext%height=1}}}
            </div>
          </div>
      </div>
      <div class='row'><!-- Titel, ID -->
              <div class="advancedSearchField col-sm-12">
                  Titel:
                  <br/> {{{ca_objects.preferred_labels.name%placeholder='Type word or phrase and click Search'}}}
              </div>
              <div class="advancedSearchField col-sm-12">
                  <a href="#" title="ID" data-toggle="popover" data-trigger="hover" data-content="Die ID muss im Format 'os_ub_' + Nummer gesucht werden, z. B. 'os_ub_65' für die Karte 'os_ub_0000065')">ID</a>
                  <br/> {{{ca_objects.idno}}}
              </div>
      </div>
      <div class='row'><!-- Alte Sig & Datum -->
          <div class="advancedSearchField col-sm-12">
              <a href="#" title="Datum oder Zeitspanne" data-toggle="popover" data-trigger="hover" data-content="Hier können Sie nach exakten Daten oder nur Jahren, Monaten oder Zeitspannen suchen. Beispiele: '25.09.1907' oder 'Januar' oder '1914-1918'">Datum oder Zeitspanne</a>
              <br/> {{{ca_objects.date.dates_value}}}
          </div>
          <!-- 
          <div class="advancedSearchField col-sm-6">
              Datierungstyp:
              <br/> {{{ca_objects.date.dc_dates_types}}}
          </div>
           -->
          <div class="advancedSearchField col-sm-12"><!-- Alte Sig & Serie -->
              <a href="#" title="Alte Signatur" data-toggle="popover" data-trigger="hover" data-content="Hier können Sie nach der Signatur des Kategoriensystems Prof. Dr. Sabine Giesbrecht suchen">Alte Signatur:</a>
              <br/> {{{ca_objects.signatur%width=70%&height=2}}}
          </div>
      </div>
      <div class='row'><!-- Kommentar & Bildbeschreibung -->
          <div class="advancedSearchField col-sm-12">
              Kommentar:
              <br/> {{{ca_objects.kommentar%width=70%&height=2}}}
          </div>
           <div class="advancedSearchField col-sm-12">
              Bildbeschreibung:
              <br/> {{{ca_objects.bildbeschreibung%width=70%&height=2}}}
          </div>
          <div class="advancedSearchField col-sm-12">
              Serie:
              <br/> {{{ca_occurrences.preferred_labels%restrictToRelationshipTypes=teil_von}}}
          </div>
          <div class="advancedSearchField col-sm-12">
              Normincipit:
              <br/> {{{ca_occurrences.preferred_labels%restrictToRelationshipTypes=musik}}}
          </div>
      </div>
      <div class='row'><!-- Schlagwort -->
         <div class="advancedSearchField col-sm-12">
              Schlagwort:
              <br/> {{{ca_list_items.preferred_labels%restrictToRelationshipTypes=schlagwort}}}
          </div>
      </div>
      <div class='row'><!-- Tags -->
          <div class="advancedSearchField col-sm-12">
              <a href="#" title="Tags" data-toggle="popover" data-trigger="hover" data-content="Von Benutzern vergeben Schlagwörter">Tags:</a>
              <br/> {{{ca_item_tags.tag}}}
          </div>
      </div>
      <!-- 
          <div class='row'>
          <div class="advancedSearchField col-sm-6">
              Typ:
              <br/> {{{ca_objects.type_id}}}
          </div>
          <div class="advancedSearchField col-sm-6">
              Sprache:
              <br/> {{{ca_objects.language%width=100%}}}
          </div>
      </div>
       -->
      <HR>
      <a href="#"><div class="expander btn btn-default">Beschriftung</div></a>
      <div style="display: none;" class='row expander'><!-- Beschriftung -->
          <div class="advancedSearchField col-sm-6">
             Beschriftung (Nutzer:)
              <br/> {{{ca_objects.beschriftung_nutzer%width=50%&height=2}}}
          </div>
          <div class="advancedSearchField col-sm-6">
             Beschriftung (gedruckt:)
              <br/> {{{ca_objects.beschriftung_gedruckt%width=50%&height=2}}}
          </div>
          <br><br><br><br><br><br><br>
      </div>      
      <a href="#"><div class="expander btn btn-default">Orte</div></a>
      <div style="display: none;" class='row expander'><!-- Orte -->
           <div class="advancedSearchField col-sm-12">
              Abgebildeter Ort:
              <br/> {{{ca_places.preferred_labels%restrictToRelationshipTypes=abgebildete_orte}}}
          </div>
          <div class="advancedSearchField col-sm-12">
              Absender Ort:
              <br/> {{{ca_places.preferred_labels%restrictToRelationshipTypes=wurde_abgesendet}}}
          </div>
          <div class="advancedSearchField col-sm-12">
              Adress Ort:
              <br/> {{{ca_places.preferred_labels%restrictToRelationshipTypes=wurde_empfangen}}}
          </div>
      </div>

      <a href="#"><div class="expander btn btn-default">Personen</div></a>
      <div style="display: none;" class='row expander'><!-- Künstler -->
          <div class="advancedSearchField col-sm-12">
              Künstler (momentan Textdichter & Komponist):
              <br/> {{{ca_entities.preferred_labels%restrictToRelationshipTypes=textdichter,komponist}}}
          </div>
          <div class="advancedSearchField col-sm-12">
              Verlag:
              <br/> {{{ca_entities.preferred_labels%restrictToRelationshipTypes=creator}}}
          </div>
          <div class="advancedSearchField col-sm-12">
              Abgebildete Person:
              <br/> {{{ca_entities.preferred_labels%restrictToRelationshipTypes=ist_abgebildet}}}
          </div>
      </div>
      <HR>

      <div class='row'><!-- Test -->
          <!-- 
         <div class="advancedSearchField col-sm-12">
              Briefmarke:
              <select id="ca_list_items[]" name="frankierung_search">
                <option value="">-</option>
                <option value="frankiert">Frankiert</option>
                <option value="frankiert, Briefmarke entfernt">Frankiert, Briefmarke entfernt </option>
                <option value="nicht frankiert">Nicht frankiert</option>
             </select>
             <input name="frankierung_search" value="" id="ca_list_items[]" type="hidden">
          </div>
           -->      
      </div>
    </div><!-- close advanced container -->
      <br style="clear: both;"/>
      <div style="margin-bottom: 50px;">
        <div style="float: center; margin-left: auto;" class="btn search-btn"><i class="fa fa-undo" aria-hidden="true"></i> {{{reset%label=Zurücksetzen}}}</div>
        <div style="float: right;" class="btn search-btn"><i class="fa fa-search" aria-hidden="true" ></i> {{{submit%label=Suchen}}}</div> 
      </div>
    {{{/form}}}
    </div><!-- close Suchfelder-Container --> 
    <div class="col-sm-3" style='border-left:1px solid #ddd;'><!-- Text -->
        <h1>Hilfe</h1>
        <br>
        <p>
       Sie können in der links stehenden Maske beliebige Suchbegriffe kombinieren, um die Datenbank nach genau den Objekten zu durchsuchen, die für Sie von Interesse sind. 
       <br>
       Benutzen Sie ein Sternchen (<b>*</b>) als Platzhalter.
       <br>
       <br>
       Mit einem Klick auf die Buttons "Beschriftung", "Orte" und "Personen" werden weitere Felder ausgeklappt.
       <br>
       Rote Feldbezeichnungen bedeuten, dass Sie mit der Maus über den Text fahren können, um feldspezifische Hilfen angezeigt zu bekommen.
       <br>
       Die Suche ist objektzentriert, d. h. dass die Suche nach Orten oder Personen nur nach Objekten sucht, die mit den entsprechenden Orten oder Personen verknüpft sind.
       <br>
       <br>
       Mit einem Klick auf den "Zurücksetzen"-Button werden alle Eintragungen in allen Feldern gelöscht.
       Mit dem Klick auf "Suchen" wird die Suche gestartet.
       <br><br>
       Suchergebnisse können weiter gefiltert werden.
        </p>
    </div>
  </div><!-- close  main row-->
</div><!-- close main container -->
<script type="text/javascript">
$(document).ready(function () {
    $('.text').hide();
    $('.expander').click(function () {
        // .parent() selects the A tag, .next() selects the P tag
        $(this).parent().next().slideToggle(200);
    });
    $('.text').slideUp(200);
});

</script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>
