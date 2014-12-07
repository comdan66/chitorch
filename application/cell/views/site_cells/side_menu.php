
<div id="LEFTC">
  <div id="CENTLL">
    <a href="<?php echo base_url (array ());?>">
      <img src="<?php echo base_url (array ('resource', 'site', 'images', 'clogo.png'));?>" width="100%" border="0">
    </a>
  </div>
    
    <!-- 左邊菜單_桌機板+平板 START -->
  <div id="warpB">
    <a href="<?php echo base_url (array ());?>" class="CMENU">Home</a>
    <a href="<?php echo $categories ? '#' : base_url (array ('products'));?>" data-url='<?php echo base_url (array ('products'));?>' class="CMENU<?php echo $categories ? ' menu_project' : '';?>">Product</a>
<?php if ($categories) {?>
        <div class="sub_menu">
          <ul>
      <?php foreach ($categories as $category) { ?>
              <li><a href="#" data-id='<?php echo $category->id;?>' class='menu_category'><?php echo $category->name;?></a></li>
      <?php } ?>
          </ul>
        </div>
<?php } ?>
    
    <a href="<?php echo base_url (array ('services'));?>" class="CMENU">Service</a>
    
    <a href="<?php echo base_url (array ('contacts'));?>" class="CMENU">Contact</a>
  </div>    
  <!-- 左邊菜單_手機板 END -->
  
  
  <!-- 左邊菜單_手機板 START -->
  <h5>NAV</h5>
  <div id="warp" class="CLOSE">
    <h3>X</h3>
    <a href="<?php echo base_url (array ());?>" class="CMENU">Home</a>
 
    <a href="<?php echo $categories ? '#' : base_url (array ('products'));?>" data-url='<?php echo base_url (array ('products'));?>' class="CMENU<?php echo $categories ? ' menu_project' : '';?>">Product</a>
<?php if ($categories) {?>
        <div class="sub_menu">
          <ul>
      <?php foreach ($categories as $category) { ?>
              <li><a href="#" data-id='<?php echo $category->id;?>' class='menu_category'><?php echo $category->name;?></a></li>
      <?php } ?>
          </ul>
        </div>
<?php } ?>
    <a href="<?php echo base_url (array ('services'));?>" class="CMENU">Service</a>
    <a href="<?php echo base_url (array ('contacts'));?>" class="CMENU">Contact</a>
  </div>    
</div>

   <!--         <div class="menu_master" onclick="javascript:switchMenu(2, 5);">
      <a href="<?php echo base_url (array ('medias'));?>" class="CMENU">Media</a></span>
      </div>
      <div id="menu_sub_2"></div>
   
      <div class="menu_master" onclick="javascript:switchMenu(3, 5);">
      <a href="<?php echo base_url (array ('news'));?>" class="CMENU">News</a></span>
      </div>
      <div id="menu_sub_3"></div> -->
<!--         <div class="menu_master" onclick="javascript:switchMenu(8, 12);">
      <a href="<?php echo base_url (array ('medias'));?>" class="CMENU">Media</a></span>
      </div>
      <div id="menu_sub_8"></div>
   
      <div class="menu_master" onclick="javascript:switchMenu(9, 12);">
      <a href="<?php echo base_url (array ('news'));?>" class="CMENU">News</a></span>
      </div>
      <div id="menu_sub_9"></div> -->