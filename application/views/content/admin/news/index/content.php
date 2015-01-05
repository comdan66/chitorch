
<section class="grid col-three-quarters mq2-col-full">
  <h2>最新消息 > 列表</h2>
  <hr>
  <form action="<?php echo base_url (array ('admin', 'news'));?>" method="post">
    <article id="navphilo"> 日&nbsp;&nbsp;&nbsp;&nbsp;期：
      <input type='text' class="date" value='<?php echo $start ? $start : '';?>' name='start' pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" required title="請輸入正確的時間格式 (ex: 1999-01-01)"/> ~ <input type='text' class="date" value='<?php echo $end ? $end : '';?>' name='end' pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" required title="請輸入正確的時間格式 (ex: 1999-01-01)"/>
      <button type="submit" id="submit" name="submit">搜尋</button>
      <hr>
    </article>
  </form>

  <article id="navplace">
    <form action="<?php echo base_url (array ('admin', 'news'));?>" method="post">
      <button type="submit" id="delete">刪除</button>
      &nbsp;
      <button type="button" id="select_all">全選</button>
      <br>
      <br>

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="7%" bgcolor="#F7F7F7"><input type="checkbox" id='check_all'></td>
          <td width="13%" bgcolor="#F7F7F7">日期</td>
          <td width="56%" bgcolor="#F7F7F7">標題</td>
          <td width="10%" bgcolor="#F7F7F7">修改</td>
          <td width="7%" bgcolor="#F7F7F7">狀態</td>
          </tr>
    <?php if ($news) {
            foreach ($news as $new) { ?>
              <tr>
                <td><label><input type="checkbox" name='delete_ids[]' value='<?php echo $new->id;?>'></label></td>
                <td><?php echo $new->date;?></td>
                <td class="textleft"><?php echo $new->title;?></td>
                <td><a href="<?php echo base_url (array ('admin', 'news', 'edit', $new->id));?>">修改</a></td>
                <td><span class="added"><?php echo $new->is_enabled ? '上架' : '下架';?></span></td>
              </tr>
    <?php   }
          } else { ?>
            <tr>
              <td colspan='5'>沒有任何媒體</td>
            </tr>
  <?php   } ?>

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
