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
            <input type='text' name='date' value="<?php echo date ('Y-m-d');?>" placeholder='請選擇日期' pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" required title="請輸入正確的時間格式 (ex: 1999-01-01)" />
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
            <input type='text' name='title' value="" placeholder='請輸入標題' maxlength='100' pattern=".{1,100}" required title="輸入100個字元以內" />
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
            <input type='text' name='block_1[title]' value="" placeholder='請輸入標題一' maxlength='100' pattern=".{1,100}" required title="輸入100個字元以內" />
            <button type="button" class='add_spec' data-parent='block_1'>＋ 新增規格</button>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class='block_1_specs'></td>
        </tr>
        <tr>
          <td bgcolor="#F7F7F7">標題二 ＊</td>
          <td bgcolor="#F7F7F7" class="textleft">
            <input type='text' value="" name='block_2[title]' placeholder='請輸入標題二' maxlength='255' pattern=".{1,100}" required title="輸入100個字元以內" >
            <button type="button" class='add_spec' data-parent='block_2'>＋ 新增規格</button>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class='block_2_specs'></td>
        </tr>
        <tr>
          <td bgcolor="#F7F7F7">標題三 ＊</td>
          <td bgcolor="#F7F7F7" class="textleft">
            <input type='text' value="" name='block_3[title]' placeholder='請輸入標題三' maxlength='255' pattern=".{1,100}" required title="輸入100個字元以內" >
          </td>
        </tr>
        <tr>
          <td >內文</td>
          <td  class="textleft">
            <label>
              <input type='hidden' name='block_3[specs][0][title]' value='' />
              <textarea placeholder='內文' name='block_3[specs][0][content]' cols="45" rows="5" pattern=".{1,}" required title="輸入內容"></textarea>
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

<script id='_spec' type='text/x-html-template'>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="110">規格 <%=i%> </td>
      <td width="391"  class="textleft">
        <input type='text' name='<%=parent%>[specs][<%=i%>][title]' value="" placeholder='請輸入規格 <%=i%>' pattern=".{1,200}" required title="輸入200個字元以內"/>
      </td>
      </td>
    </tr>
    <tr>
      <td>內文 <%=i%></td>
      <td class="textleft">
        <input type='text' name='<%=parent%>[specs][<%=i%>][content]' value="" placeholder='請輸入內文 <%=i%>' pattern=".{1,}" required title="輸入內文"/>
      </td>
    </tr>
  </table>
</script>

<script id='_file' type='text/x-html-template'>
  <input type="file" name='files[]' class='file' value='' accept="image/jpg, image/jpeg, image/png" />
</script>
