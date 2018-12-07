

<div id="content" style="text-align: center;">
            <p>Ein Fehler ist aufgetreten beim Aufrufen von <code><?php echo $this->getVar('referrer'); ?></code></p>
            <img src="--url--/frontend/themes/default/assets/pawtucket/graphics/error_8865.jpg" width="75%" style="margin: 20px auto;display:block;max-width: 800px">
            <h3 style="margin-top: 24pt;"><a href="--url--">Zurück zur Startseite</a></h3>


<ul>
Detaillierte Fehlernachricht:

<?php
    foreach ($this->getVar('error_messages') as $vs_error) {
        echo "{$vs_error}</br>\n";
    }
?>
</ul>
        </div><!-- end content -->
