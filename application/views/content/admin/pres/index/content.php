<section class="grid col-three-quarters mq2-col-full">
  <h2>媒體管理 > 列表</h2>
  <hr>
  
  <article id="navphilo">
    <form action="<?php echo base_url (array ('admin', 'pres'));?>" method="post">
      日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期：
      <input type='text' class="date" value='<?php echo $start ? $start : '';?>' name='start' pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" required title="請輸入正確的時間格式 (ex: 1999-01-01)"/> ~ <input type='text' class="date" value='<?php echo $end ? $end : '';?>' name='end' pattern="^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$" required title="請輸入正確的時間格式 (ex: 1999-01-01)"/>
      <br />
      <br />
      媒體分類：
      <select name="pre_tag_id" class="search">
        <option value='0'<?php echo $pre_tag_id ? '' : ' selected';?>>請選擇</option>
    <?php foreach (PreTag::all () as $pre_tag) { ?>
            <option value='<?php echo $pre_tag->id;?>'<?php echo $pre_tag_id == $pre_tag->id ? ' selected' : '';?>><?php echo $pre_tag->name;?></option>
    <?php } ?>
      </select>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit">搜尋</button>
      <hr>
    </form>
  </article>

  <article id="navplace">
    <form action="<?php echo base_url (array ('admin', 'pres'));?>" method="post">
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
  <?php if ($pres) {
          foreach ($pres as $pre) { ?>
            <tr>
              <td><label><input type="checkbox" name='delete_ids[]' value='<?php echo $pre->id;?>'></label></td>
              <td><?php echo $pre->date->format ('Y-m-d');?></td>
              <td class="textleft"><?php echo $pre->pre_tag ? $pre->pre_tag->name : '未分類';?></td>
              <td class="textleft"><?php echo $pre->title;?></td>
              <td><a href="<?php echo base_url (array ('admin', 'pres', 'edit', $pre->id));?>">修改</a></td>
              <td><?php echo $pre->is_enabled ? '上架' : '下架';?></td>
            </tr>
    <?php } 
        } else { ?>
          <tr>
            <td colspan='6'>沒有任何資料媒體</td>
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