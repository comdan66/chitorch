<!DOCTYPE HTML>
<html>
  <head>
    <?php echo isset ($meta) ? $meta:''; ?>

    <title>奇拓室內裝修設計 CHI-TORCH</title>
    <link rel="chitorch icon" href="<?php echo base_url (array ('resource', 'site', 'images', 'tiicon.ico'));?>" />

<?php
    echo isset ($css) ? $css:'';
    echo isset ($javascript) ? $javascript:''; ?>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
        <link href="<?php echo base_url (array ('resource', 'site', 'css', 'main.css'));?>" rel="stylesheet" type="text/css">
    <![endif]-->
  </head>
  <body>
<?php echo isset ($hidden) ? $hidden:'';?>


    <div id="ALLBCENT">

      <!-- 左邊 START -->
<?php echo render_cell ('site_cells', 'side_menu');?>
      <!-- 左邊 END -->
            
      <!-- 右邊 START -->
<?php echo isset ($content) ? $content : '';?>
      <!-- 右邊 END -->
        
      <!-- 下方 START -->
<?php echo render_cell ('site_cells', 'footer');?>
      <!-- 下方 END -->
    </div>

  </body>
</html>