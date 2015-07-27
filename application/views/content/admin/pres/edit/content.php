<section class="grid col-three-quarters mq2-col-full">
  <h2>媒體管理 > 修改媒體</h2>
  <hr>
  <h4>＊為必填欄位</h4>
  <form action="<?php echo base_url (array ('admin', 'pres', 'edit', $pre->id));?>" method="post" enctype="multipart/form-data" >
    <article>
<?php if (isset ($message) && $message) { ?>
        <div class='error'><?php echo $message;?></div>
<?php } ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="20%">日期</td>
          <td width="80%" class="textleft">
            <input type='text' name='date' value="<?php echo $pre->date->format ('Y-m-d');?>" placeholder='請選擇日期' pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" required title="請輸入正確的時間格式 (ex: 1999-01-01)" />
            &nbsp;&nbsp;* 設定當天日期
          </td>
        </tr>
        <tr>
          <td>分類＊</td>
          <td class="textleft">
            <select name='pre_tag_id'>
              <option value='0'>未分類</option>
        <?php if ($pre_tags = PreTag::all ()) {
                foreach ($pre_tags as $pre_tag) { ?>
                  <option value='<?php echo $pre_tag->id;?>'<?php echo $pre_tag->id == $pre->pre_tag_id ? ' selected' : '';?>><?php echo $pre_tag->name;?></option>
          <?php }
              } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>標題＊</td>
          <td class="textleft">
            <input type='text' name='title' value="<?php echo $pre->title;?>" placeholder='請輸入標題' maxlength='100' pattern=".{1,100}" required title="輸入100個字元以內" />
            &nbsp;&nbsp;輸入100個字元以內
          </td>
        </tr>
        <tr>
          <td>媒體圖片＊</td>
          <td class="textleft">
            <div class='files'>
              <button type="button" class='add_pic'>＋</button>
            </div>
            <br />
            ( 圖片格式：jpg / gif / png )
            <br />
            <div class="pic">
              <ul>
          <?php foreach ($pre->pictures as $picture) { ?>
                  <li>
                    <input type='hidden' name='pics[]' value='<?php echo $picture->id;?>' />
                    <img src="<?php echo $picture->file_name->url ('80x80');?>" alt="" width="80" height="80">
                    <a href="#" class='del_pic'>刪除</a>
                  </li>
          <?php } ?>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <td>狀態＊</td>
          <td class="textleft">
            <select name='is_enabled'>
              <option value='1'<?php echo $pre->is_enabled ? ' selected': '';?>>上架</option>
              <option value='0'<?php echo $pre->is_enabled ? '' : ' selected';?>>下架</option>
            </select>
          </td>
        </tr>
      </table>

      <?php
foreach ($pre->blocks as $index => $block) {
  if ($block->type == 1) { ?>
    <table data-index='<?php echo $index;?>' data-count='<?php echo count ($block->specs);?>' width="100%" border="0" cellspacing="0" cellpadding="0" style='margin: 15px auto;'>
      <tr>
        <td bgcolor="#F7F7F7" width="110">標題</td>
        <td bgcolor="#F7F7F7" class="textleft" width="391">
          <input type="hidden" name='block[<?php echo $index;?>][type]' value='1' />
          <input type='hidden' value="<?php echo $block->title;?>" name='block[<?php echo $index;?>][title]' placeholder='請輸入標題' title="輸入100個字元以內" >
          <button type="button" class='add_spec'>＋ 新增規格</button>
          <div class='delete'>x</div>
        </td>
      </tr>
      <?php
      foreach ($block->specs as $i => $spec) { ?>
        <tr>
          <td>規格</td>
          <td class="textleft">
            <input type='text' name='block[<?php echo $index;?>][specs][<?php echo $i;?>][title]' value="<?php echo $spec->title;?>" placeholder='請輸入規格' title="輸入200個字元以內"/>
          </td>
          </td>
        </tr>
        <tr>
          <td>內文</td>
          <td class="textleft">
            <input type='text' name='block[<?php echo $index;?>][specs][<?php echo $i;?>][content]' value="<?php echo $spec->content;?>" placeholder='請輸入內文' title="輸入內文"/>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
      <?php
  } else { ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style='margin: 15px auto;'>
      <tr>
        <td bgcolor="#F7F7F7">標題</td>
        <td bgcolor="#F7F7F7" class="textleft">
          <input type="hidden" name='block[<?php echo $index;?>][type]' value='2' />
          <input type='hidden' value="<?php echo $block->title;?>" name='block[<?php echo $index;?>][title]' placeholder='請輸入標題' maxlength='255' title="輸入100個字元以內" >
          <div class='delete'>x</div>
        </td>
      </tr>
      <tr>
        <td >內文</td>
        <td  class="textleft">
          <label>
            <input type='hidden' name='block[<?php echo $index;?>][specs][0][title]' value='' />
            <textarea placeholder='內文' name='block[<?php echo $index;?>][specs][0][content]' cols="45" rows="5" title="輸入內文"><?php echo $block->specs[0]->content;?></textarea>
          </label>
        </td>
      </tr>
    </table>

      <?php
  }
}
      ?>



      <hr>
        <button type="button" id='add_block1'>加入區塊1</button>
        <button type="submit">確定修改</button>
    </article>
  </form>
</section>

<script id='_block1' type='text/x-html-template'>
  <table data-index='<%=index%>' data-count='0' width="100%" border="0" cellspacing="0" cellpadding="0" style='margin: 15px auto;'>
    <tr>
      <td bgcolor="#F7F7F7" width="110">標題</td>
      <td bgcolor="#F7F7F7" class="textleft" width="391">
        <input type="hidden" name='block[<%=index%>][type]' value='1' />
        <input type='text' value="" name='block[<%=index%>][title]' placeholder='請輸入標題' title="輸入100個字元以內" >
        <button type="button" class='add_spec' data-parent='block_2'>＋ 新增規格</button>
        <div class='delete'>x</div>
      </td>
    </tr>
  </table>
</script>
<script id='_block1_spec' type='text/x-html-template'>
  <tr>
    <td>規格</td>
    <td class="textleft">
      <input type='text' name='block[<%=i%>][specs][<%=c%>][title]' value="" placeholder='請輸入規格' title="輸入200個字元以內"/>
    </td>
    </td>
  </tr>
  <tr>
    <td>內文</td>
    <td class="textleft">
      <input type='text' name='block[<%=i%>][specs][<%=c%>][content]' value="" placeholder='請輸入內文' title="輸入內文"/>
    </td>
  </tr>
</script>
<script id='_block2' type='text/x-html-template'>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style='margin: 15px auto;'>
    <tr>
      <td bgcolor="#F7F7F7">標題</td>
      <td bgcolor="#F7F7F7" class="textleft">
        <input type="hidden" name='block[<%=index%>][type]' value='2' />
        <input type='hidden' value="" name='block[<%=index%>][title]' placeholder='請輸入標題' maxlength='255' title="輸入100個字元以內" >
        <div class='delete'>x</div>
      </td>
    </tr>
    <tr>
      <td >內文</td>
      <td  class="textleft">
        <label>
          <input type='hidden' name='block[<%=index%>][specs][0][title]' value='' />
          <textarea placeholder='內文' name='block[<%=index%>][specs][0][content]' cols="45" rows="5" title="輸入內文"></textarea>
        </label>
      </td>
    </tr>
  </table>
</script>

<script id='_file' type='text/x-html-template'>
  <input type="file" name='files[]' class='file' value='' accept="image/jpg, image/jpeg, image/png" />
</script>
