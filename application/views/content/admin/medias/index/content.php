<section class="grid col-three-quarters mq2-col-full">
  <h2>媒體露出 > 列表</h2>
  <hr>
  <article id="navplace">
      <button type="submit" id="delete">刪除</button>
      &nbsp;
      <button type="button" id="select_all">全選</button>
     <br>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7%" bgcolor="#F7F7F7"><input type="checkbox" name="checkbox11" id="checkbox11"></td>
        <td width="13%" bgcolor="#F7F7F7">年分</td>
        <td width="56%" bgcolor="#F7F7F7">標題</td>
        <td width="10%" bgcolor="#F7F7F7">修改</td>
        <td width="7%" bgcolor="#F7F7F7">狀態</td>
      </tr>
  <?php if ($medias) {
          foreach ($medias as $media) { ?>
            <tr>
              <td><input type="checkbox" name="delete_ids[]"></td>
              <td><?php echo $media->year;?></td>
              <td class="textleft"><?php echo $media->title;?></td>
              <td><a href="ad_edit.html">修改</a></td>
              <td><span class="added"><?php echo $media->is_enabled ? '上架' : '下架';?></span></td>
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
    </article>
  </section>