<?php global $ruya_options; ?>
<?php $footer_v3_to_top =& $ruya_options["tb_footer_v3_to_top"]; ?>
<?php if($footer_v3_to_top == 1){ ?>
<a href="#" id="back-to-top">
  <div class="arrow-top"></div><div class="arrow-top-line"></div>
</a>
<?php } ?>
<?php $footer_v3_fixed =& $ruya_options["tb_footer_v3_fixed"]; ?>
<footer class="footer footer_v3 <?php if($footer_v3_fixed == 1){ echo "footer-fixed"; }?>"> 
   <div class="container">
     <div class="row">
      <?php if (is_active_sidebar("ruya-footer-widget")) { ?>
        <div class="footer-widget-1 center col-sm-12 col-xs-12">
            <?php dynamic_sidebar("ruya-footer-widget"); ?>
        </div>
     <?php } ?>
     <div class="clearfix>"></div>
	 <?php if (is_active_sidebar("ruya-footer-widget-6")) { ?>
       <div class="col-sm-12 col-xs-12">
        <div class="footer-widget-6 footer-bottom">
            <?php dynamic_sidebar("ruya-footer-widget-6"); ?>
        </div>
        </div>
     <?php } ?>
     </div>
  </div> 
</footer>