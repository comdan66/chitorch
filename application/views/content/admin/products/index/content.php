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
              <td class="textleft"><?php echo $product->title;?></td>
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