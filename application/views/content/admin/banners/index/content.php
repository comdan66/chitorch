<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" --> <!--<![endif]-->

  <head>
    <meta charset="UTF-8">
    <!-- Remove this line if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Designa Studio, a HTML5 / CSS3 template.">
    <meta name="author" content="Sylvain Lafitte, Web Designer, sylvainlafitte.com">
    
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>奇拓室內裝修設計 CHI-TORCH</title>
    <!-- InstanceEndEditable -->
    
    <link rel="chitorch icon" href="/resource/admin/images/tiicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/resource/admin/css/style.css">
    
    <!--左邊選單效果-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="/resource/underscore_v1.7.0/underscore-min.js"></script>
    
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="/resource/admin/css/form.css" rel="stylesheet" type="text/css">
    <link href="/resource/admin/css/DropMenu05.css" rel="stylesheet" type="text/css">
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->

    <script type="text/javascript">
      $(function () {
        $('.del_banner').click (function () {
          var $li = $(this).parents ('li');
          $.ajax ({
            url: $('#get_delete_url').val (),
            data: { id: $li.data ('id') },
            async: true, cache: false, dataType: 'json', type: 'POST',
            beforeSend: function () {}
          })
          .done (function (result) {
            result.status && $li.remove ();
          })
          .fail (function (result) {  })
          .complete (function (result) { });
        });
      });
    </script>
  </head>

  <body>
  <!-- Prompt IE 7 users to install Chrome Frame -->
  <!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <div class="container">
      <?php echo render_cell ('admin_cells', 'main_header');?>

      <!-- InstanceBeginEditable name="main" -->
      <div class="services-page main grid-wrap">
        <?php echo render_cell ('admin_cells', 'sub_header');?>
        <?php echo render_cell ('admin_cells', 'side_menu');?>

        <section class="grid col-three-quarters mq2-col-full">
          <h2>新增/修改Banner</h2>
          <hr>
          <article id="navphilo"> 上傳圖片:
            <form action="<?php echo base_url (array ('admin', 'banners'));?>" method="post" enctype="multipart/form-data" >
              <input type="hidden" name='get_delete_url' value='<?php echo base_url (array ('admin', 'banners')); ?>' />
              <input type="file" value='' name='file' accept="image/jpg, image/jpeg, image/png" />
              &nbsp;&nbsp;
              <button type="submit">新增</button>
            </form>
            <br>
            ( 圖片格式：jpg / gif / png )<br>
            ( 圖片尺寸：XXX*XXX像素 )<br>
              * 最多五張圖片
            <br><br>
        <?php if ($banners) { ?>
                <table width="100%" border="1">
                  <tr>
                    <td>
                      <div class="pic">
                        <ul>
                    <?php foreach ($banners as $banner) { ?>
                            <li data-id='<?php echo $banner->id;?>'>
                              <img src="<?php echo $banner->file_name->url ('80x80');?>" alt="" width="80" height="80" />
                              <a href="#" class='del_banner'>刪除</a>
                            </li>
                    <?php } ?>
                        </ul>
                      </div>
                    </td>
                  </tr>
                </table>
        <?php } ?>
            <br>
            <hr>
            </article>
          <article id="navplace"> </article>
        </section>
      </div>
      <!-- InstanceEndEditable -->
      <!--main-->
      <?php echo render_cell ('admin_cells', 'footer');?>
    </div>
  </body>
  <!-- InstanceEnd -->
</html>