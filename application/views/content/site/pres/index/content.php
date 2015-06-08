<div id="RIGHTC">
  <div id="TOPTITLE">
    <p class="bigtitle">PORTFOLIO</p>
  </div>

  <div id="SMATITLE">
    <div id="padech">
<?php echo $pagination; ?>
    </div>
  </div>

  <div id="CENTRB">
    <div id="probox">
<?php if ($pres) {
        foreach ($pres as $pre) { ?>
          <div class="pcasebox pres" data-id='<?php echo $pre->id;?>' data-pre_tag_id='<?php echo $pre->pre_tag_id;?>'>
            <a href="<?php echo base_url (array ('pres', $pre->id));?>">
              <img src="<?php echo $pre->first_picture ? $pre->first_picture->file_name->url ('191x168') : '';?>" width="100%">
            </a>
            <p class="protitle">
              <a href="<?php echo base_url (array ('pres', $pre->id));?>">// <?php echo $pre->title;?></a>
            </p>
          </div>
  <?php }
      } ?>
    </div>
  </div>
</div>