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
        $('.del_cate').click (function () {
          if ($(this).parents ('table').find ('tr').length <= 2)
            $(this).parents ('table').append ($('<tr />').append ($('<td />').attr ('colspan', 3).text ('沒有任何產品分類')));
          $(this).parents ('tr').remove ();
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
          <h2>產品管理 > 新增產品分類</h2>

          <form action="<?php echo base_url (array ('admin', 'products', 'categories'));?>" method="post">
            <article id="navphilo"> 產品分類：
              <input type='text' value='' name='name' placeholder='請輸入產品分類'/>
              <button type="submit">新增</button>
              <br /><hr />
            </article>
          </form>

          <form action="<?php echo base_url (array ('admin', 'products', 'categories'));?>" method="post">
            <input type='hidden' name='categories[0][id]' value='0' />
            <article id="navplace">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="28%" bgcolor="#F7F7F7">標題</td>
                  <td width="27%" bgcolor="#F7F7F7">排序</td>
                  <td width="7%" bgcolor="#F7F7F7">刪除</td>
                </tr>
          <?php if ($categories) {
                  foreach ($categories as $i => $category) { ?>
                    <tr>
                      <input type='hidden' name='categories[<?php echo $i;?>][id]' value='<?php echo $category->id;?>' />
                      <td class="textleft">
                        <input type='text' name='categories[<?php echo $i;?>][name]' value="<?php echo $category->name;?>" size="50" maxlength='100' />
                      </td>
                      <td class="textleft">
                        <input type='number' name='categories[<?php echo $i;?>][sort]' value="<?php echo $category->sort;?>" maxlength='10' />
                      </td>
                      <td>
                        <a href="#" class='del_cate'>刪除</a>
                      </td>
                    </tr>
            <?php }
                } else { ?>
                  <tr><td colspan='3'>沒有任何產品分類</td></tr>
          <?php } ?>
                </table>

                <br>

                <p>
                  <a href="products.html">
                    <button type="submit">確定修改</button>
                  </a>
                </p>
              </article>
          </form>
          </section>
      </div>
      <!-- InstanceEndEditable -->
      <!--main-->
      <?php echo render_cell ('admin_cells', 'footer');?>
    </div>
  </body>
  <!-- InstanceEnd -->
</html>