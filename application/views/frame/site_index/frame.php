<!DOCTYPE HTML>
<html>
  <head>
    <?php echo isset ($meta) ? $meta:''; ?>

    <title>奇拓室內裝修設計 CHI-TORCH</title>
    <link rel="chitorch icon" href="<?php echo base_url (array ('resource', 'site', 'images', 'tiicon.ico'));?>" />

    <?php echo isset ($css) ? $css:''; ?>

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
        <link href="<?php echo base_url (array ('resource', 'site', 'css', 'main.css'));?>" rel="stylesheet" type="text/css">
    <![endif]-->
    <style type="text/css">
    .centbg {
      margin:0;
      padding:0;
      max-width:100%;
      height:100%;
      background: #000 url(<?php echo ($banner = Banner::find ('one', array ('order' => 'id DESC', 'conditions' => array ()))) ? $banner->file_name->url () : '';?>) center center fixed no-repeat;
      -moz-background-size: cover;
      background-size: cover;
    }
    </style>
  </head>
  <body class="centbg">
<?php echo isset ($hidden) ? $hidden:'';?>
<?php echo isset ($content) ? $content : '';?>
  </body>
</html>
