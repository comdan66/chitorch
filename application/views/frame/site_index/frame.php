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
  </head>
  <body class="centbg" style='background: #000 url(<?php echo Banner::find ('one', array ('order' => 'id DESC', 'conditions' => array ()))->file_name->url ();?>) center center fixed no-repeat;;'>
<?php echo isset ($hidden) ? $hidden:'';?>
<?php echo isset ($content) ? $content : '';?>
  </body>
</html>
