
<section class="grid col-three-quarters mq2-col-full">
  <h2>媒體露出 > 新增</h2>
  <hr>
  <h4>＊為必填欄位</h4>
<?php if (isset ($message) && $message) { ?>
        <div class='error'><?php echo $message;?></div>
<?php } ?>
  <form action="<?php echo base_url (array ('admin', 'medias', 'create'));?>" method="post" enctype="multipart/form-data" >
    <article id="navplace">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="13%">年份＊</td>
          <td width="56%" class="textleft">
            <select name='year'>
        <?php for ($i = 1988; $i < 2100; $i++) { ?>
                <option<?php echo $i == date ('Y') ? ' selected' : '';?>><?php echo $i;?></option>
        <?php }?>
            </select>
          </td>
        </tr>
        <tr>
          <td>標題＊</td>
          <td class="textleft">
            <input type='text' name='title' value='' placeholder='輸入100個字元以內' pattern=".{1,100}" required title="輸入100個字元以內"/>
          </td>
        </tr>
        <tr>
          <td>圖片＊</td>
          <td  class="textleft">
            <label class='files'>
              <button type="button" id="add_pic" name="add_pic" class='add_pic'>＋</button>
            </label>
          ( 圖片格式：jpg / gif / png )<br>
          </td>
        </tr>
        <tr>
          <td>狀態＊</td>
          <td class="textleft">
            <select name="is_enabled">
              <option value='1'>上架</option>
              <option value='0'>下架</option>
            </select>
          </td>
        </tr>
      </table>
      <br>
      <button type="submit" id="submit" name="submit">確定新增</button>
    </article>
  </form>
</section>

<script id='_file' type='text/x-html-template'>
  <input type="file" name='files[]' class='file' value='' accept="image/jpg, image/jpeg, image/png" />
</script>
