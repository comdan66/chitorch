<script type="text/javascript">
  $(function() {
    var $menu_ul = $('.menu > li > ul'),
        $menu_a  = $('.menu > li > a');
    $menu_ul.hide ();
    $menu_a.click (function (e) {
        e.preventDefault ();
        if(!$(this).hasClass ('active')) {
          $menu_a.removeClass ('active');
          $menu_ul.filter (':visible').slideUp ('normal');
          $(this).addClass ('active').next ().stop (true, true).slideDown ('normal');
        } else {
          $(this).removeClass ('active');
          $(this).next ().stop (true, true).slideUp ('normal');
        }
    });
  });
</script>
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
            <li class="subitem1"><a href="/admin/products">產品列表</a></li>
            <li class="subitem2"><a href="/admin/products/categories">新增產品分類</a></li>
            <li class="subitem3"><a href="/admin/products/create">新增產品</a></li>
          </ul>
        </li>

        <li class="item5"><a href="#">網站管理員</a>
          <ul>
            <li class="subitem1"><a href="/admin/edit">修改帳號密碼 </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </menu>
</aside>