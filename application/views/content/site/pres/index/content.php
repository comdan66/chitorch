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
          <a href="<?php echo base_url (array ('pres', $pre->id));?>">
            <div class="pcasebox pres" data-id='<?php echo $pre->id;?>' data-pre_tag_id='<?php echo $pre->pre_tag_id;?>'>
              <img src="<?php echo $pre->first_picture ? $pre->first_picture->file_name->url ('191x168') : '';?>" width="100%">
              <p class="protitle">// <?php echo $pre->title;?></p>
              <p class="protag"><?php echo $pre->pre_tag->name;?></p>
          </div>
  <?php }
      } ?>
    </div>
  </div>
</div>