<?php 
    $vn_set_id = $this->getVar('item_id');
    $t_set_item = new ca_set_items($vn_set_id);
?>

<?php echo 'Bild '.$this->getVar('set_item_num').' von '.$this->getVar('set_num_items').'<br/><br/>'; ?>

<?php
    if ($va_set_caption = $t_set_item->get('ca_set_items.preferred_labels')) {
        if ($va_set_caption != '[LEER]') {
            echo "<div style='margin-bottom:10px;'><h1>".$va_set_caption.'</h1><hr></div>';
        }
    }
?>

{{{<H4>Karte: „^ca_objects.preferred_labels.name“</H4>}}}
{{{<ifdef code="ca_objects.idno"><b>ID: </b>^ca_objects.idno<br/><br/></ifdef>}}}

<?php
    if ($va_set_desc = $t_set_item->get('ca_set_items.set_item_description')) {
        echo "<div class='trimText'><h6></h6>".$va_set_desc.'</div>';
    }
?>

<hr>
<?php echo caDetailLink($this->request, _t('<button class="gallerybutton">→ zur Detailansicht</button>'), '', 'ca_objects', $this->getVar('object_id')); ?>
<br/><a href=""><button class="gallerybutton">→ Zurück zur Austellungsübersicht</button></a>
