<form action="<?php echo base_url (array ('admin', 'news', 'edit', $new->id));?>" method="post" enctype="multipart/form-data" >

  <section class="grid col-three-quarters mq2-col-full">
    <h2>最新消息 > 新增</h2>
    <hr>
    <h4>＊為必填欄位</h4>
    <input type="hidden" id='get_delete_url' value='<?php echo base_url (array ('admin', 'news', 'delete')); ?>' />
<?php if (isset ($message) && $message) { ?>
        <div class='error'><?php echo $message;?></div>
<?php } ?>
    <article id="navplace">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="13%">日期＊</td>
          <td width="56%" class="textleft">
            <input type='text' name='date' value="<?php echo $new->date;?>" pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" required title="請輸入正確的時間格式 (ex: 1999-01-01)" />
          </td>
        </tr>
        
        <tr>
          <td>標題＊</td>
          <td class="textleft">
            <input type='text' name='title' value='<?php echo $new->title;?>' placeholder='輸入100個字元以內' pattern=".{1,100}" required title="輸入100個字元以內"/>
          </td>
        </tr>

        <tr>
          <td>影片網址</td>
          <td class="textleft">
            <input type='text' name='y2' value='<?php echo $new->y2 ? 'https://www.youtube.com/watch?v=' . $new->y2 : '';?>' placeholder='請輸入 Youtube 鏈結..'/>
          </td>
        </tr>

        <tr>
          <td>封面＊</td>
          <td class="textleft">
            <img src="<?php echo $new->cover->url ('80x80');?>" alt="" width="80" height="80">
            <hr/>
            <input type='file' name='cover' value=''/>
          </td>
        </tr>

        <tr>
          <td>上傳圖片</td>
          <td class="textleft">
            <label class='files'>
              <button type="button" id="add_pic" name="add_pic" class='add_pic'>＋</button>
            </label>
            ( 圖片格式：jpg / gif / png )<br>
            ( 圖片尺寸：XXX*XXX像素 )<br>
            <div class="pic">
              <ul>
          <?php foreach ($new->npics as $npic) { ?>
                  <li data-id='<?php echo $npic->id;?>'>
                    <input type='hidden' name='pics[]' value='<?php echo $npic->id;?>' />
                    <img src="<?php echo $npic->file_name->url ('80x80');?>" alt="" width="80" height="80">
                    <a class='del'>刪除</a>
                  </li>
          <?php } ?>
              </ul>
            </div>
          </td>
        </tr>
        
        <tr>
          <td><p>內文＊</p></td>
          <td class="textleft">
            <textarea name="content" cols="45" rows="5" placeholder='輸入內文..' pattern=".{1,}" required title="輸入內文!"><?php echo $new->content;?></textarea>
          </td>
        </tr>

        <tr>
          <td>狀態＊</td>
          <td class="textleft">
            <select name='is_enabled'>
              <option value='1'<?php echo $new->is_enabled ? ' selected': '';?>>上架</option>
              <option value='0'<?php echo $new->is_enabled ? '' : ' selected';?>>下架</option>
            </select>
          </td>
        </tr>
      </table>
      <br>
      <button type="submit" id="submit" name="submit">確定新增</button>
    </article>
  </section>
</form>

<script id='_file' type='text/x-html-template'>
  <input type="file" name='files[]' class='file' value='' accept="image/jpg, image/jpeg, image/png" />
</script>
