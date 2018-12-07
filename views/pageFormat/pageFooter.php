<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This source code is free and modifiable under the terms of
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
?>

        <div style="clear:both; height:1px;"><!-- empty --></div>
            <div id="footer">
                <div class="container">
                <div class="row"  style="background-color: #efefef;">
                    <div class="col-lg-2 col-md-0 col-xs-0" ></div>
                    <div class='col-lg-2 col-md-3 col-xs-6' style="margin-top: 10px;"><h4 style="font-weight: 600; margin-bottom: 10px">Wir</h4>
                        
                        
                        </div>
                    <div class='col-lg-2 col-md-3 col-xs-6' style="background-color: #efefef; margin-top: 10px;"><h4 style="font-weight: 600; margin-bottom: 10px">Navigation</h4>
                       
                        </div>
                    <div class='col-lg-2 col-md-3 col-xs-6' style="background-color: #efefef; margin-top: 10px;"><h4 style="font-weight: 600; margin-bottom: 10px">Gefördert durch</h4></div>
                    <div class='col-lg-2 col-md-3 col-xs-6' style="background-color: #efefef; margin-top: 10px;"><h4 style="font-weight: 600; margin-bottom: 10px">Kooperationen</h4>
                    
                    <div class="col-lg-2 col-md-0 col-xs-0"></div>
                </div>
                </div>
                <div id="cookienotice"><div>
  <span style="color: #fff;">Unsere Webseite verwendet, wie fast alle Seiten im Internet, Cookies um Ihren Besuch bei uns so komfortabel wie möglich zu gestalten.</span> 
  <b>Hier können Sie unsere Datenschutzbestimmungen einsehen und Ihre Cookie Einstellungen anpassen.</a></b></div>
 <span id="cookienoticeCloser" onclick="document.cookie = 'hidecookienotice=1;path=/';jQuery('#cookienotice').slideUp()">&#10006;</span>
</div>

                 </div><!-- end row -->
                </div><!-- end footer -->
            </div>
<?php
    //
    // Output HTML for debug bar
    //
    if (Debug::isEnabled()) {
        echo Debug::$bar->getJavascriptRenderer()->render();
    }
?>


		<?php echo TooltipManager::getLoadHTML(); ?>
		<div id="caMediaPanel" style="background: #EFEFEF;"> 
			<div id="caMediaPanelContentArea">
			
			</div>
		</div>
		<script type="text/javascript">
			/*
				Set up the "caMediaPanel" panel that will be triggered by links in object detail
				Note that the actual <div>'s implementing the panel are located here in views/pageFormat/pageFooter.php
			*/
			var caMediaPanel;
			jQuery(document).ready(function() {
				if (caUI.initPanel) {
					caMediaPanel = caUI.initPanel({ 
						panelID: 'caMediaPanel',										/* DOM ID of the <div> enclosing the panel */
						panelContentID: 'caMediaPanelContentArea',		/* DOM ID of the content area <div> in the panel */
						exposeBackgroundColor: '#FFFFFF',						/* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
						exposeBackgroundOpacity: 0.7,							/* opacity of background color masking out page content; 1.0 is opaque */
						panelTransitionSpeed: 400, 									/* time it takes the panel to fade in/out in milliseconds */
						allowMobileSafariZooming: true,
						mobileSafariViewportTagID: '_msafari_viewport',
						closeButtonSelector: '.close'					/* anything with the CSS classname "close" will trigger the panel to close */
					});
				}
			});
			/*(function(e,d,b){var a=0;var f=null;var c={x:0,y:0};e("[data-toggle]").closest("li").on("mouseenter",function(g){if(f){f.removeClass("open")}d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mousemove",function(g){if(Math.abs(c.x-g.ScreenX)>4||Math.abs(c.y-g.ScreenY)>4){c.x=g.ScreenX;c.y=g.ScreenY;return}if(f.hasClass("open")){return}d.clearTimeout(a);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mouseleave",function(g){d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.removeClass("open")},b)})})(jQuery,window,200);*/
		</script>
        <script>
 if(document.cookie.indexOf('hidecookienotice=1') != -1){
 jQuery('#cookienotice').hide();
 }
 else{
 jQuery('#cookienotice').prependTo('body');
 jQuery('#cookienoticeCloser').show();
 }
</script>
	</body>
</html>
