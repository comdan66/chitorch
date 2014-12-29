
<div id="LEFTC">
  <div id="CENTLL">
    <a href="<?php echo base_url (array ());?>">
      <img src="<?php echo base_url (array ('resource', 'site', 'images', 'clogo.png'));?>" width="100%" border="0">
    </a>
  </div>
    
    <!-- 左邊菜單_桌機板+平板 START -->
  <div id="warpB">
    <a href="<?php echo base_url (array ());?>" class="CMENU">Home</a>
    <a href="<?php echo base_url (array ('abouts'));?>" class="CMENU">About</a>
    <div class="sub_menu about">
      <ul>
        <li><a href="<?php echo base_url (array ('abouts'));?>" class='menu_category'>公司理念</a></li>
        <li><a href="<?php echo base_url (array ('abouts', 1));?>" class='menu_category'>公司概況與經營理念</a></li>
        <li><a href="<?php echo base_url (array ('abouts', 2));?>" class='menu_category'>設計師簡介</a></li>
      </ul>
    </div>
    <a href="<?php echo $categories ? '#' : base_url (array ('products'));?>" data-url='<?php echo base_url (array ('products'));?>' class="CMENU<?php echo $categories ? ' menu_project' : '';?>">Projtct</a>
<?php if ($categories) {?>
        <div class="sub_menu">
          <ul>
      <?php foreach ($categories as $category) { ?>
              <li><a href="#" data-id='<?php echo $category->id;?>' class='menu_category'><?php echo $category->name;?></a></li>
      <?php } ?>
          </ul>
        </div>
<?php } ?>
    
    <a href="<?php echo base_url (array ('medias'));?>" class="CMENU">Media</a>
    <a href="<?php echo base_url (array ('news'));?>" class="CMENU">News</a>
    <a href="<?php echo base_url (array ('services'));?>" class="CMENU">Service</a>
    <a href="<?php echo base_url (array ('contacts'));?>" class="CMENU">Contact</a>
  </div>    

  <h5>NAV</h5>

</div>
<div id='right_slide' class='close'>
  <div class='units'>
    <a href='<?php echo base_url (array ());?>'><div class='unit title'>Home</div></a>
    <a href='<?php echo base_url (array ('abouts'));?>'><div class='unit title'>About</div></a>
    <div class='ug about'>
      <a href='<?php echo base_url (array ('abouts'));?>'><div class='unit'>公司理念</div></a>
      <a href='<?php echo base_url (array ('abouts', 1));?>'><div class='unit'>公司概況與經營理念</div></a>
      <a href='<?php echo base_url (array ('abouts', 2));?>'><div class='unit'>設計師簡介</div></a>
    </div>
    <a href='<?php echo base_url (array ('products'));?>'><div class='unit title'>Projtct</div></a>
    <div class='ug ps'>
<?php foreach ($categories as $category) { ?>
        <a href="#" data-id='<?php echo $category->id;?>'><div class='unit'><?php echo $category->name;?></div></a>
<?php } ?>
    </div>
    <a href='<?php echo base_url (array ('medias'));?>'><div class='unit title'>Media</div></a>
    <a href='<?php echo base_url (array ('news'));?>'><div class='unit title'>News</div></a>
    <a href='<?php echo base_url (array ('services'));?>'><div class='unit title'>Service</div></a>
    <a href='<?php echo base_url (array ('contacts'));?>'><div class='unit title'>Contact</div></a>
  </div>
</div>
<div id='slide_cover'></div>