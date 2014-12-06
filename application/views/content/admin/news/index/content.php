<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" --> <!--<![endif]-->

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
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
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
  <!-- InstanceBeginEditable name="main" -->
  <div class="services-page main grid-wrap">
    <header class="grid col-full">
      <hr>
      <p class="fleft">奇拓室內裝修設計</p>
      <strong><a href="login.html" class="alignright">CHI-TORCH(管理者ID)</a></strong> </header>
        
    <aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">
      
      <menu>
        <div id="wrapper">
          <ul class="menu">
            <li class="item1"><a href="banner.html">Banner管理</a>
              <ul>
                <li class="subitem1"><a href="banner.html">新增/修改Banner</a></li>
                </ul>
              </li>
            <li class="item2"><a href="news.html">最新消息管理</a>
              <ul>
                <li class="subitem1"><a href="news.html">最新消息列表</a></li>
                <li class="subitem2"><a href="news_add.html">新增最新消息</a></li>
                </ul>
              </li>
            <li class="item3"><a href="products.html"><span>產品管理</span></a>
              <ul>
                <li class="subitem1"><a href="products.html">產品列表</a></li>
                <li class="subitem2"><a href="products_category.html">新增產品分類</a></li>
                <li class="subitem3"><a href="products_add.html">新增產品</a></li>
                </ul>
              </li>
            <li class="item4"><a href="ad.html">媒體露出管理</a>
              <ul>
                <li class="subitem1"><a href="ad.html">媒體露出列表</a></li>
                <li class="subitem2"><a href="ad_add.html">新增媒體露出</a></li>
                </ul>
              </li>
            <li class="item5"><a href="admin_edit.html">網站管理員</a>
              <ul>
                <li class="subitem1"><a href="admin_edit.html">修改帳號密碼 </a></li>
                </ul>
              </li>
            </ul>
          </div>
        </menu>
        
      </aside>
       
    <section class="grid col-three-quarters mq2-col-full">
      <h2>最新消息 > 列表</h2>
      <hr>
      <article id="navphilo"> 日&nbsp;&nbsp;&nbsp;&nbsp;期：
        <input class="date">
        &nbsp;-
        &nbsp;
        <input class="date">
        &nbsp;&nbsp;
        <button type="submit" id="submit" name="submit">搜尋</button>
        <hr>
        </article>
      <article id="navplace">
        <button type="submit" id="submit" name="submit">刪除</button>
        &nbsp;&nbsp;
        <button type="submit" id="submit" name="submit">全選</button>
        &nbsp;&nbsp; 
          <!--<button type="submit" id="submit" name="submit">＋ 新增消息</button>-->
         
        <br>
        <br>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="7%" bgcolor="#F7F7F7"><input type="checkbox" name="checkbox11" id="checkbox11"></td>
            <td width="13%" bgcolor="#F7F7F7">日期</td>
            <td width="56%" bgcolor="#F7F7F7">標題</td>
            <td width="10%" bgcolor="#F7F7F7">修改</td>
            <td width="7%" bgcolor="#F7F7F7">狀態</td>
            </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="checkbox" id="checkbox">
              </label></td>
            <td>2014-06-06</td>
            <td class="textleft">名模Izabel Goulart 的大捲髮好性感啊!!</td>
            <td><a href="news_edit.html">修改</a></td>
            <td><span class="added">上架</span></td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
            <td>2014-06-03</td>
            <td class="textleft">這個晚上抬腿的時候可以順便一起做吧？</td>
            <td><a href="news_edit.html">修改</a></td>
            <td><span class="added">上架</span></td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox3" id="checkbox3"></td>
            <td>2014-06-02</td>
            <td class="textleft">波卡原點回來囉！這次出現在Ralph Lauren上，全系列請看</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox4" id="checkbox4"></td>
            <td>2014-05-31</td>
            <td class="textleft">紐約酷女孩都愛的品牌</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox5" id="checkbox5"></td>
            <td>2014-05-28</td>
            <td class="textleft">台中的朋友們注意～全台灣星巴克得來速第二站降臨！！</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox6" id="checkbox6"></td>
            <td>2014-05-23</td>
            <td class="textleft">名模Izabel Goulart 的大捲髮好性感啊!!</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox7" id="checkbox7"></td>
            <td>2014-05-22</td>
            <td class="textleft">這個晚上抬腿的時候可以順便一起做吧？</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox8" id="checkbox8"></td>
            <td>2014-05-15</td>
            <td class="textleft">波卡原點回來囉！這次出現在Ralph Lauren上，全系列請看</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox9" id="checkbox9"></td>
            <td>2014-05-10</td>
            <td class="textleft">紐約酷女孩都愛的品牌</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          <tr>
            <td><input type="checkbox" name="checkbox10" id="checkbox10"></td>
            <td>2014-05-06</td>
            <td class="textleft">台中的朋友們注意～全台灣星巴克得來速第二站降臨！！</td>
            <td><a href="news_edit.html">修改</a></td>
            <td>下架</td>
            </tr>
          </table>
        <p><a href="#" class="arrowpre"></a><a href="#">1</a> / 10 <a href="#" class="arrow"></a>｜ 筆數共100筆</p>
        </article>
      </section>
  </div>
  <!-- InstanceEndEditable -->
  <!--main-->

<div class="divide-top">
  <footer >
    © copyright 2014 ZEUS Design CO., Ltd.
  </footer>
</div>

</div>
</body>
<!-- InstanceEnd --></html>