
<div id="RIGHTC">
  <div id="TOPTITLE">
    <p class="bigtitle">PRESS</p>
  </div>

  <div id="SMATITLE">
  <?php if ($prev) { ?>
    <div id="padechMML">
      <a href="<?php echo base_url (array ('medias', $prev->year));?>" class="MML">UP</a>
    </div>
  <?php } ?>
      
    <div id="timenumber">
      <ul class="timeul">
        <li class="timecheck">
    <?php foreach ($media_years as $media_year) { ?>
            <a href='<?php echo base_url (array ('medias', $media_year->year));?>'>
        <?php if ($year->year == $media_year->year) { ?>
                <span class="timechecko active"><?php echo $media_year->year;?></span>
        <?php } else { ?>
                <span class="timechecko"><?php echo $media_year->year;?></span>
        <?php } ?>
            </a>
    <?php } ?>
        </li>
      </ul>
      <p class="timeon"></p>
    </div>
      <?php if ($next) { ?>
    <div id="padechMMR">
      <a href="<?php echo base_url (array ('medias', $next->year));?>" class="MMR">NEXT</a>
    </div>
  <?php } ?>
  </div>

  <div id="CENTRB">
    <div class="container">
<?php if ($medias) {
        foreach ($medias as $media) { ?>
          <h2 class="acc_trigger">
            <a href="#"><?php echo $media->title;?></a>
          </h2> 
          <div class="acc_container" style="display:none";> 
      <?php foreach ($media->mpics as $mpic) { ?>
              <div class="block">
                <img src="<?php echo $mpic->file_name->url ();?>" width="100%">
              </div> 
      <?php } ?>
          </div> 
          <?php
        }
      } ?>
    </div> 
  </div>
</div>
  
  