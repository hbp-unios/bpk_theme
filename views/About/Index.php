<?php
    MetaTagManager::setWindowTitle($this->request->config->get('app_display_name').': Über Uns');
?>

<style>
 #help_popup {
    background: #fff;
    padding: 10px;
    max-width: 50%;
    border: 2px solid #efefef;
    }
</style>

<div class="row">
	<div class="col-sm-2"><h6>Links</h6><br>
        <ul>
            <li><?php echo caNavLink($this->request, _t('Mitwirkende'), '', '', 'About', 'mitwirkende'); ?></li>
            <li><?php echo caNavLink($this->request, _t('Herkunft und Anordnung / Leitvorstellungen der Sammlung'), '', '', 'About', 'leitvorstellung'); ?></li>
            <li><?php echo caNavLink($this->request, _t('Impressum'), '', '', 'About', 'impressum'); ?></li>
        </ul>
    </div>
    <div class="col-sm-8">
        <H1><?php echo _t('Über Uns'); ?></H1>

</div>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
<!-- Add an optional button to open the popup -->
  <button class="help_popup_open">Popup</button>

  <br><h2><a href="" class="help_popup_open">Hilfe</a></h2>
  <!-- Add content to the popup -->
  <div id="help_popup">

    <h1>Hilfe</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <!-- Add an optional button to close the popup -->
    <button class="help_popup_close">Schließen</button>

  </div>

  <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>
  <script>
    $(document).ready(function() {
      $('#help_popup').popup({
        type: 'overlay',
        opacity: 0.2,
        background: true,
        vertical: 'top',
        transition: 'all 1s'});
    });
  </script>
    </div>
    <div class="col-sm-2"></div>
    </div>
