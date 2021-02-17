<?php global $ruya_options; ?>
<?php $footer_v6_to_top =& $ruya_options["tb_footer_v6_to_top"]; ?>
<?php if($footer_v6_to_top == 1){ ?>
<a href="#" id="back-to-top">
  <div class="arrow-top"></div><div class="arrow-top-line"></div>
</a>
<?php } ?>
<?php $footer_v6_fixed =& $ruya_options["tb_footer_v6_fixed"]; ?>
<footer class="footer footer_v6 <?php if($footer_v6_fixed == 1){ echo "footer-fixed"; }?>">
   <div class= "container">
     <div class="row">
     <div class= "footer_container_v6">
		  <?php if (is_active_sidebar("ruya-footer-widget")) { ?>
			<div class="footer-widget-1 col-sm-3 col-xs-12">
				<?php dynamic_sidebar("ruya-footer-widget"); ?>
			</div>
		 <?php } 
		  if (is_active_sidebar("ruya-footer-widget-2")) { ?>
			<div class="footer-widget-2 col-sm-3 col-xs-12">
				<?php dynamic_sidebar("ruya-footer-widget-2"); ?>
			</div>
		 <?php }
		 if (is_active_sidebar("ruya-footer-widget-3")) { ?>
			<div class="footer-widget-3 col-sm-3 col-xs-12">
				<?php dynamic_sidebar("ruya-footer-widget-3"); ?>
			</div>
		<?php }
		if (is_active_sidebar("ruya-footer-widget-5")) { ?>
			<div class="footer-widget-4 col-sm-3 col-xs-12">
			   <?php dynamic_sidebar("ruya-footer-widget-5"); ?>
			</div>
		<?php } ?> 
     </div>
    </div> 
   </div> 
    <div class= "clearfix>"></div>
	<?php if (is_active_sidebar("ruya-footer-widget-6")) { ?>
        <div class="footer-widget-6 footer-bottom ">
          <div class= "container">
            <?php dynamic_sidebar("ruya-footer-widget-6"); ?>
           </div> 
        </div>
    <?php } ?>
</footer>