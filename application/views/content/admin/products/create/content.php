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
      .add_spec {
        margin-top: 5px;
        float: right;

      }
      .textleft .files {
        position: relative;
        display: inline-block;
        width: 100%;
      }
      .textleft .files .add_pic {
        position: absolute;
        right: 0;
        top: 4px;
        display: inline-block;
        width: 40px;
        height: 40px;
        padding: 8.5px;
      }
      .textleft .files .file {
        width: calc(100% - 40px);
        cursor: pointer;
        border-bottom: 1px solid rgba(238, 238, 238, 1);
      }
      .error {
        margin-bottom: 20px;
        color: rgba(202, 12, 12, 1);
      }
    </style>
    <script type="text/javascript">
      $(function () {
        $('.add_pic').click (function () {
          $('.files').append (_.template ($('#_file').html (), {}) ({}))
        }).click ();
        $('.add_spec').click (function () {
          var $specs_selector = $('.' + $(this).data ('parent') + '_specs');
          var obj = {i: $specs_selector.children ('table').length + 1, parent: $(this).data ('parent')};
          $specs_selector.append (_.template ($('#_spec').html (), obj) (obj));
        }).click ();
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
          <h2>產品管理 > 新增產品</h2>
          <hr>
          <h4>＊為必填欄位</h4>
          <form action="<?php echo base_url (array ('admin', 'products', 'create'));?>" method="post" enctype="multipart/form-data" >
            <article>
        <?php if (isset ($message) && $message) { ?>
                <div class='error'><?php echo $message;?></div>
        <?php } ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="20%">日期</td>
                  <td width="80%" class="textleft">
                    <input type='text' name='date' value="<?php echo date ('Y-m-d');?>" placeholder='請選擇日期' />
                    &nbsp;&nbsp;* 設定當天日期
                  </td>
                </tr>
                <tr>
                  <td>分類＊</td>
                  <td class="textleft">
                    <select name='category_id'>
                      <option value='0'>未分類</option>
                <?php if ($categories = Category::all ()) {
                        foreach ($categories as $category) { ?>
                          <option value='<?php echo $category->id;?>'><?php echo $category->name;?></option>
                  <?php }
                      } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>標題＊</td>
                  <td class="textleft">
                    <input type='text' name='title' value="" placeholder='請輸入標題' maxlength='100' />
                    &nbsp;&nbsp;輸入100個字元以內
                  </td>
                </tr>
                <tr>
                  <td>產品圖片＊</td>
                  <td class="textleft">
                    <div class='files'>
                      <button type="button" class='add_pic'>＋</button>
                    </div>
                    <br />
                    ( 圖片格式：jpg / gif / png )
                    <br />
                    ( 圖片尺寸：XXX*XXX像素 )
                    <br />
                    * 最多12張圖
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#F7F7F7">標題一 ＊</td>
                  <td bgcolor="#F7F7F7" class="textleft">
                    <input type='text' name='block_1[title]' value="" placeholder='請輸入標題一' maxlength='100' />
                    <button type="button" class='add_spec' data-parent='block_1'>＋ 新增規格</button>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="left" valign="top" class='block_1_specs'></td>
                </tr>
                <tr>
                  <td bgcolor="#F7F7F7">標題二 ＊</td>
                  <td bgcolor="#F7F7F7" class="textleft">
                    <input type='text' value="" name='block_2[title]' placeholder='請輸入標題二' maxlength='255' >
                    <button type="button" class='add_spec' data-parent='block_2'>＋ 新增規格</button>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="left" valign="top" class='block_2_specs'></td>
                </tr>
                <tr>
                  <td bgcolor="#F7F7F7">標題三 ＊</td>
                  <td bgcolor="#F7F7F7" class="textleft">
                    <input type='text' value="" name='block_3[title]' placeholder='請輸入標題三' maxlength='255' >
                  </td>
                </tr>
                <tr>
                  <td >內文</td>
                  <td  class="textleft">
                    <label>
                      <input type='hidden' name='block_3[specs][0][title]' value='' />
                      <textarea placeholder='內文' name='block_3[specs][0][content]' cols="45" rows="5"></textarea>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>狀態＊</td>
                  <td class="textleft">
                    <select name='is_enabled'>
                      <option value='1'>上架</option>
                      <option value='0'>下架</option>
                    </select>
                  </td>
                </tr>
              </table>
              <br>
              <p>
                <a href="products.html">
                  <button type="submit">確定新增</button>
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

<script id='_spec' type='text/x-html-template'>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="110">規格 <%=i%> </td>
      <td width="391"  class="textleft">
        <input type='text' name='<%=parent%>[specs][<%=i%>][title]' value="" placeholder='請輸入規格 <%=i%>' maxlength='255' >
      </td>
      </td>
    </tr>
    <tr>
      <td>內文 <%=i%></td>
      <td  class="textleft">
        <input type='text' name='<%=parent%>[specs][<%=i%>][content]' value="" placeholder='請輸入內文 <%=i%>' maxlength='255' >
      </td>
    </tr>
  </table>
</script>

<script id='_file' type='text/x-html-template'>
  <input type="file" name='files[]' class='file' value='' accept="image/*" />
</script>
