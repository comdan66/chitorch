<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

  <head>
    <meta charset="UTF-8">
    <!-- Remove this line if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title>奇拓室內裝修設計 CHI-TORCH</title>
    <!-- TemplateEndEditable -->
    <link rel="chitorch icon" href="/resource/admin/images/tiicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/resource/admin/css/style.css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
      #error {
        width: 488px;
        color: rgba(202, 12, 12, 1);
      }
    </style>
  </head>

  <body>
    <!-- Prompt IE 7 users to install Chrome Frame -->
    <!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <div class="container">
      <header id="navtop">
        <a href="index.html" class="logo fleft"><img src="/resource/admin/images/logo.png" alt="ZEUS DESIGN"></a>

        <nav class="fright">
          <ul></ul>
        </nav>
      </header>

      <div class="home-page main">
        <section class="grid-wrap" >
          <header class="grid col-full">
            <hr>
          </header>
          <aside class="grid col-one-quarter mq2-col-full"></aside>
          <section  class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
            <form action="/admin" method="post">
              <ul>
                <li>
                  <label for="username">帳號</label>
                  <input type="text" id='account' name='account' calue=''placeholder='請輸入 E-mail 帳號' pattern="^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$" required title="請輸入正確的 E-mail 帳號"/>
                </li>
                <li>
                  <label for="password">密碼</label>
                  <input type="password" id='password' name='password' placeholder='請輸入密碼' pattern="[A-Z0-9]{6,8}" required title="請輸入密碼(6~8個英數字元)" / >
                </li>
                <li>
                  <div id='error'><?php echo $message;?></div>
                </li>
                <li>
                  <button type="submit" id="submit" name="submit" class="button fleft">登入</button>
                </li> 
              </ul>
            </form>
          </section>
        </section>
      </div>
      <!--main-->
      <?php echo render_cell ('admin_cells', 'footer');?>
    </div>

  </body>
</html>