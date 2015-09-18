
<div id="LEFTC">
  <div id="CENTLL">
    <a href="<?php echo base_url (array ());?>">
      <img src="<?php echo base_url (array ('resource', 'site', 'images', 'clogo.png'));?>" width="100%" border="0">
    </a>
  </div>
    
    <!-- 左邊菜單_桌機板+平板 START -->
  <div id="warpB">
    <a href="<?php echo base_url (array ());?>" class="CMENU">Home</a>
    <a href="<?php echo base_url (array ('abouts'));?>" class="CMENU">PROFILE</a>
    <div class="sub_menu about">
      <ul>
        <li><a href="<?php echo base_url (array ('abouts'));?>" class='menu_category'>公司理念</a></li>
        <li><a href="<?php echo base_url (array ('abouts', 1));?>" class='menu_category'>公司概況與經營理念</a></li>
        <li><a href="<?php echo base_url (array ('abouts', 2));?>" class='menu_category'>設計師簡介</a></li>
      </ul>
    </div>
    <a href="<?php echo base_url (array ('products'));?>" data-url='<?php echo base_url (array ('products'));?>' class="CMENU<?php echo $categories ? ' menu_project' : '';?>">PORTFOLIO</a>
<?php if ($categories) {?>
        <div class="sub_menu">
          <ul>
      <?php foreach ($categories as $category) { ?>
              <li><a href="<?php echo base_url (array ('products', 0, $category->id));?>" data-id='<?php echo $category->id;?>' class='menu_category'><?php echo $category->name;?></a></li>
      <?php } ?>
          </ul>
        </div>
<?php } ?>
    
    <a href="<?php echo base_url (array ('pres'));?>" data-url='<?php echo base_url (array ('pres'));?>' class="CMENU<?php echo $pre_tags ? ' menu_pre' : '';?>">PRESS</a>
<?php if ($pre_tags) {?>
        <div class="sub_menu">
          <ul>
      <?php foreach ($pre_tags as $pre_tag) { ?>
              <li><a href="<?php echo base_url (array ('pres', 0, $pre_tag->id));?>" data-id='<?php echo $pre_tag->id;?>' class='menu_pre_tag'><?php echo $pre_tag->name;?></a></li>
      <?php } ?>
          </ul>
        </div>
<?php } ?>
    <a href="<?php echo base_url (array ('news'));?>" class="CMENU">NEWS</a>
    <a href="<?php echo base_url (array ('services'));?>" class="CMENU">SERVICE</a>
    <a href="<?php echo base_url (array ('contacts'));?>" class="CMENU">CONTACT</a>
  </div>    

  <h5>NAV</h5>

</div>
<div id='right_slide' class='close'>
  <div class='units'>
    <a href='<?php echo base_url (array ());?>'><div class='unit title'>Home</div></a>
    <a href='<?php echo base_url (array ('abouts'));?>'><div class='unit title'>PROFILE</div></a>
    <div class='ug about'>
      <a href='<?php echo base_url (array ('abouts'));?>'><div class='unit'>公司理念</div></a>
      <a href='<?php echo base_url (array ('abouts', 1));?>'><div class='unit'>公司概況與經營理念</div></a>
      <a href='<?php echo base_url (array ('abouts', 2));?>'><div class='unit'>設計師簡介</div></a>
    </div>
    <a href='<?php echo base_url (array ('products'));?>'><div class='unit title'>PORTFOLIO</div></a>
<?php if ($categories) {?>
        <div class='ug ps'>
    <?php foreach ($categories as $category) { ?>
            <a href="#" data-id='<?php echo $category->id;?>'><div class='unit'><?php echo $category->name;?></div></a>
    <?php } ?>
        </div>
<?php } ?>
    <a href='<?php echo base_url (array ('pres'));?>'><div class='unit title'>PRESS</div></a>
<?php if ($pre_tags) {?>
        <div class='ug prs'>
    <?php foreach ($pre_tags as $pre_tag) { ?>
            <a href="#" data-id='<?php echo $pre_tag->id;?>'><div class='unit'><?php echo $pre_tag->name;?></div></a>
    <?php } ?>
        </div>
<?php } ?>
    <a href='<?php echo base_url (array ('news'));?>'><div class='unit title'>NEWS</div></a>
    <a href='<?php echo base_url (array ('services'));?>'><div class='unit title'>SERVICE</div></a>
    <a href='<?php echo base_url (array ('contacts'));?>'><div class='unit title'>CONTACT</div></a>
  </div>
</div>
<div id='slide_cover'></div>