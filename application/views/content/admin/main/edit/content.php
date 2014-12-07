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

    <style type="text/css">
    .error {
      position: relative;
      display: inline-block;
      width: 100%;
      color: rgba(202, 12, 12, 1);
    }
    </style>
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
          <h2>網站管理員 > 修改帳號密碼</h2>

          <div class='error'>
            <?php echo $message;?>
          </div>
          <article id="navplace">
            <form action="<?php echo base_url (array ('admin', 'edit'));?>" method="post" >
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="13%">帳號</td>
                  <td width="56%" class="textleft">
                    <input type='text' name='account' value="<?php echo identity ()->user ()->account;?>" placeholder='請輸入E-mail電子信箱' pattern="^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$" required title="請輸入正確的 E-mail"/>
                    請輸入E-mail電子信箱
                  </td>
                </tr>
                <tr>
                  <td>密碼</td>
                  <td class="textleft">
                    <input type="password" name='password' value="" placeholder='請輸入6~8個英數字元' pattern=".{6,8}" required title="請輸入6~8個英數字元" / >
                    請輸入6~8個英數字元
                  </td>
                </tr>
                <tr>
                  <td>再次確認密碼</td>
                  <td class="textleft">
                    <input type="password" name='re_password' value="" placeholder='再次輸入您的密碼' pattern=".{6,8}" required title="請輸入6~8個英數字元" />
                    再次輸入您的密碼
                  </td>
                </tr>
              </table>
              <br>
              <p>
                <button type="submit">確定修改</button>
              </p>
            </form>
          </article>
        </section>
      </div>
      <!--main-->
      <?php echo render_cell ('admin_cells', 'footer');?>
    </div>
  </body>
  <!-- InstanceEnd -->
</html>