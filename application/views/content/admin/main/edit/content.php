<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  
  <!-- Remove this line if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta name="viewport" content="width=device-width">
  
  <meta name="description" content="Designa Studio, a HTML5 / CSS3 template.">
  <meta name="author" content="Sylvain Lafitte, Web Designer, sylvainlafitte.com">
  
  <title>HOME // ZEUSDESIGN</title>
  
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link rel="shortcut icon" type="image/png" href="favicon.png">
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/resource/admin/css/style.css">
    
   
       <!--左邊選單效果-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
 
    var menu_ul = $('.menu > li > ul'),
        menu_a  = $('.menu > li > a');
     
    menu_ul.hide();
 
    menu_a.click(function(e) {
        e.preventDefault();
        if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
        }
    });
 
});
</script>
  
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<link href="/resource/admin/css/form.css" rel="stylesheet" type="text/css">
<link href="/resource/admin/css/DropMenu05.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Prompt IE 7 users to install Chrome Frame -->
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div class="container">

  <header id="navtop">
    <a href="index.html" class="logo fleft">
      <img src="/resource/admin/images/logo.png" alt="ZEUS DESIGN">
    </a>
    
    <nav class="fright">
      <ul>
        <li><a href="index.html" class="navactive">登出</a></li>
      </ul>
      
    </nav>
  </header>


<div class="services-page main grid-wrap">

    <header class="grid col-full">
      <hr>
      <p class="fleft">奇拓室內裝修設計</p>
      <strong><a href="login.html" class="alignright">CHI-TORCH(管理者ID)</a></strong> </header>
    </header>
    
        <aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">

<menu>
<div id="wrapper">
 
    <ul class="menu">
         <li class="item1"><a href="#">Banner管理</a>
            <ul>
             <li class="subitem1"><a href="banner.html">新增/修改Banner</a></li>
            </ul>
        </li>
        <li class="item2"><a href="#">最新消息管理</a>
            <ul>
             <li class="subitem1"><a href="news.html">最新消息列表</a></li>
             <li class="subitem2"><a href="news_add.html">新增最新消息</a></li>
            </ul>
        </li>
        <li class="item3"><a href="#"><span>產品管理</span></a>
            <ul>
             <li class="subitem1"><a href="products.html">產品列表</a></li><li class="subitem2"><a href="products_category.html
">新增產品分類</a></li>

<li class="subitem3"><a href="products_add.html">新增產品</a></li>
            </ul>
        </li>
        <li class="item4"><a href="#">媒體露出管理</a>    <ul>
            <li class="subitem1"><a href="ad.html">媒體露出列表</a></li>  <li class="subitem2"><a href="ad_add.html">新增媒體露出</a></li>
          </ul>
  </li>
        
         <li class="item5"><a href="#">網站管理員</a>
            <ul>
               <li class="subitem1"><a href="admin_edit.html">修改帳號密碼
</a></li>
            </ul>
        </li> 
    </ul>
 
</div>
               
      </menu>
      
      
    </aside>
        
        <section class="grid col-three-quarters mq2-col-full"> 
          <h2>網站管理員 > 修改帳號密碼</h2>
      <hr>
      </article>
      
      <article id="navplace">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%">帳號</td>
            <td width="56%" class="textleft"><input value="777wang@msn.com">
              請輸入E-mail電子信箱</td>
            </tr>
          <tr>
            <td>密碼</td>
            <td class="textleft"><input type="password" value="984135467987">
              請輸入6~8個英數字元</td>
            </tr>
          <tr>
            <td>再次確認密碼</td>
            <td class="textleft"><input type="password" value="984135467987">
              再次輸入您的密碼</td>
            </tr>
          </table>
              <br>
        <p><a href="login.html"><button type="submit" id="submit" name="submit">確定修改</button></a></p>
</article>
          
      
    
    </section>  
    
    
    </section>
  

  </div> <!--main-->

<div class="divide-top">
  <footer >
    © copyright 2014 ZEUS Design CO., Ltd.
  </footer>
</div>

</div>
<!---side menu-->
<!--
<script type="text/javascript" src="/resource/admin/js/show_ads.js"></script>
-->
<script src="/resource/admin/js/jquery.min.js"></script> 
<script src="/resource/admin/js/VerticalNavigation.min.js"></script> 
<script src="/resource/admin/js/app.js"></script>

<!-- Javascript - jQuery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/resource/admin/js/jquery-1.7.2.min.js"><\/script>')</script>

<!--[if (gte IE 6)&(lte IE 8)]>
<script src="/resource/admin/js/selectivizr.js"></script>
<![endif]-->

<script src="/resource/admin/js/jquery.flexslider-min.js"></script>
<script src="/resource/admin/js/scripts.js"></script>

<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>