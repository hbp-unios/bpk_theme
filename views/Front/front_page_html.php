<style>
figure{
  margin: 0;
}

figure.einzel {
  display: inline-block;
  padding: 10px;
  width: 50%;
  border: 0px solid gainsboro;
}

figure img {
    display: block;
    margin-right: auto;
    margin-left: auto;
}

figcaption {
    bottom: 0;
    width: 100%;
    text-align: center;
}

@media only screen and (max-width:800px) {
  figure.einzel {
    width: 25%;
  }
}   

@media only screen and (max-width:600px) {
  figure.einzel {
    width: 96%;
  }
}

</style>
<!-- Pfad abrufen: -->
<?php
$va_tmp = explode('/', str_replace('\\', '/', $_SERVER['SCRIPT_NAME']));
  array_pop($va_tmp);
$vs_path = join('/', $va_tmp);
?>

<?php

        echo $this->render('Front/featured_set_slideshow_html.php');
?>
<div class="container"><!-- content -->
    <div class="row"><!-- Logo Row -->
      <div class="col-sm-2"></div>
        <div class="col-sm-8">
                <img src="/frontend/themes/default/assets/pawtucket/graphics/bpklogo.png" style="display: block; margin-left: auto; margin-right: auto; padding-bottom: 10px; width: 100%;max-width: 400px;">
                </div>
        <div class="col-sm-2"></div>
    </div><!-- End logo Row -->
    <div class="row"><!-- Text Row -->
        <HR>
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="margin: 0 5px 0 5px;"><!-- Text -->
             
            <form class="front-search" role="search" action="<?php echo caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>">
                <div class="formOutline">
                    <div class="form-group">
                        <input type="text" class="form-control" style="display: inline-block;" placeholder="Schnellsuche" name="frontsearch">
                     <button type="submit" class="btn-search" ><span class="glyphicon glyphicon-search"></span></button>
		  </div>
                     
                 </div>
                
             </form>
        </div>

        <!-- Ausstellungen -->
         <!-- <h2 style="text-align: center;">Empfohlene Ausstellungen</h2>
                <?php
                    echo $this->render('Front/gallery_set_links_html.php');
                ?>
              -->
       
        <div class="col-sm-2"></div>
    </div><!-- end row2 -->
</div> <!--end container-->
