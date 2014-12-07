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
    
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="/resource/admin/css/form.css" rel="stylesheet" type="text/css">
    <link href="/resource/admin/css/DropMenu05.css" rel="stylesheet" type="text/css">
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
    <script type="text/javascript">
      $(function () {
        $('#select_all').click (function () {
          $('input[type="checkbox"][name="delete_ids[]"]').prop ('checked', $('#check_all').click ().is (':checked'));
        });
        $('#check_all').click (function () {
          $('input[type="checkbox"][name="delete_ids[]"]').prop ('checked', this.checked);
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
          <h2>產品管理 > 列表</h2>
          <hr>
          
          <article id="navphilo">
            <form action="<?php echo base_url (array ('admin', 'products'));?>" method="post">
              日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期：
              <input type='text' class="date" value='<?php echo $start ? $start : '';?>' name='start' /> ~ <input type='text' class="date" value='<?php echo $end ? $end : '';?>' name='end' />
              <br />
              <br />
              產品分類：
              <select name="category_id" class="search">
                <option value='0'<?php echo $category_id ? '' : ' selected';?>>請選擇</option>
            <?php foreach (Category::all () as $category) { ?>
                    <option value='<?php echo $category->id;?>'<?php echo $category_id == $category->id ? ' selected' : '';?>><?php echo $category->name;?></option>
            <?php } ?>
              </select>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit">搜尋</button>
              <hr>
            </form>
          </article>

          <article id="navplace">
            <form action="<?php echo base_url (array ('admin', 'products'));?>" method="post">
              <button type="submit" id="delete">刪除</button>
              &nbsp;
              <button type="button" id="select_all">全選</button>
              &nbsp;
              <br><br>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="12%" bgcolor="#F7F7F7"><input type="checkbox" id='check_all'></td>
                  <td width="18%" bgcolor="#F7F7F7">日期</td>
                  <td width="34%" bgcolor="#F7F7F7">分類</td>
                  <td width="20%" bgcolor="#F7F7F7">專案名稱</td>
                  <td width="8%" bgcolor="#F7F7F7">修改</td>
                  <td width="8%" bgcolor="#F7F7F7">狀態</td>
                </tr>
          <?php if ($products) {
                  foreach ($products as $product) { ?>
                    <tr>
                      <td><label><input type="checkbox" name='delete_ids[]' value='<?php echo $product->id;?>'></label></td>
                      <td><?php echo $product->date->format ('Y-m-d');?></td>
                      <td class="textleft"><?php echo $product->category ? $product->category->name : '未分類';?></td>
                      <td class="textleft"><?php echo $product->id;?></td>
                      <td><a href="<?php echo base_url (array ('admin', 'products', 'edit', $product->id));?>">修改</a></td>
                      <td><?php echo $product->is_enabled ? '上架' : '下架';?></td>
                    </tr>
            <?php } 
                } else { ?>
                  <tr>
                    <td colspan='6'>沒有任何資料產品</td>
                  </tr>
          <?php } ?>
                </table>
              <p>
                <a href="<?php echo $pagination['prev_link'];?>" class="arrowpre"></a>
                <?php echo $pagination['now_page'];?> / <?php echo $pagination['page_total'];?>
                <a href="<?php echo $pagination['next_link'];?>" class="arrow"></a>
                ｜ 筆數共<?php echo $pagination['total'];?>筆
              </p>
            </form>
          </article>
        </section>
      </div>
      <!-- InstanceEndEditable -->
      <!--main-->
      <?php echo render_cell ('admin_cells', 'footer');?>
    </div>
  </body>
  <!-- InstanceEnd -->
</html>