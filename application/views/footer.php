<div class="small-spacer-50 medium-spacer-50 large-spacer-100"></div>


  <div class="footer">

  <div class="row">
    <div class="columns large-8 show-for-large-up">&nbsp;</div>
    <div class="columns large-4 small-12 large-text-left small-text-center">
      <div class="text-black size-2 weight-bold">Rogue Squadron</div>
	<p>rogue@diux.mil</p>
      <div style="height:50px;"></div>

      <div style="height:30px;"></div>

    </div>
  </div>

</div>
<script src="<?php echo base_url('website_files/foundation.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo base_url('website_files/foundation.tooltip.js'); ?>"></script>
<?php if(isset($intro) && $intro == 1): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.joyride.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/vendor/jquery.cookie.js"></script>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.reveal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.accordion.min.js"></script>
<script>
  $(function(){
    $(document).foundation();    
  })
  <?php if(isset($intro) && $intro == 1): ?>
  $(document).foundation('joyride', 'start');
  <?php endif; ?>
</script>
  <!-- footer code here -->

</body></html>
