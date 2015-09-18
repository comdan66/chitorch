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
          <a href="<?php echo base_url (array ('pre', $pre->id));?>">
            <div class="pcasebox pres<?php echo $pre_tag_id && $pre->pre_tag_id != $pre_tag_id ? ' cover' : '';?>" data-id='<?php echo $pre->id;?>'>
              <img src="<?php echo $pre->first_picture ? $pre->first_picture->file_name->url ('200x265') : '';?>" width="100%">
              <p class="protitle">// <?php echo $pre->title;?></p>
              <p class="protag"><?php echo $pre->pre_tag ? $pre->pre_tag->name : '';?></p>
            </div>
          </a>
  <?php }
      } ?>
    </div>
  </div>
</div>