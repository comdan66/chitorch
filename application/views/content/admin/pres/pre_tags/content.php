<section class="grid col-three-quarters mq2-col-full">
  <h2>媒體管理 > 新增媒體分類</h2>

  <form action="<?php echo base_url (array ('admin', 'pres', 'pre_tags'));?>" method="post">
    <article id="navphilo"> 媒體分類：
      <input type='text' value='' name='name' placeholder='請輸入媒體分類' pattern=".{1,100}" required title="輸入100個字元以內" />
      <button type="submit">新增</button>
      <br /><hr />
    </article>
  </form>

  <form action="<?php echo base_url (array ('admin', 'pres', 'pre_tags'));?>" method="post">
    <input type='hidden' name='pre_tags[0][id]' value='0' />
    <article id="navplace">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="28%" bgcolor="#F7F7F7">標題</td>
          <td width="27%" bgcolor="#F7F7F7">排序</td>
          <td width="7%" bgcolor="#F7F7F7">刪除</td>
        </tr>
  <?php if ($pre_tags) {
          foreach ($pre_tags as $i => $pre_tag) { ?>
            <tr>
              <input type='hidden' name='pre_tags[<?php echo $i;?>][id]' value='<?php echo $pre_tag->id;?>' />
              <td class="textleft">
                <input type='text' name='pre_tags[<?php echo $i;?>][name]' value="<?php echo $pre_tag->name;?>" size="50" maxlength='100' pattern=".{1,100}" required title="輸入100個字元以內" />
              </td>
              <td class="textleft">
                <input type='number' name='pre_tags[<?php echo $i;?>][sort]' value="<?php echo $pre_tag->sort;?>" maxlength='10' pattern=".{1,10}" required title="輸入10個字元以內" />
              </td>
              <td>
                <a href="#" class='del_cate'>刪除</a>
              </td>
            </tr>
    <?php }
        } else { ?>
          <tr><td colspan='3'>沒有任何媒體分類</td></tr>
  <?php } ?>
        </table>

        <br>

        <p>
          <a href="pres.html">
            <button type="submit">確定修改</button>
          </a>
        </p>
      </article>
  </form>
  </section>