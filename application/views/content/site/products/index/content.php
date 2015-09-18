<div id="RIGHTC">
  <div id="TOPTITLE">
    <p class="bigtitle">PORTFOLIO</p>
  </div>

  <div id="SMATITLE">
    <div id="padech">
<?php echo $pagination; ?>
    </div>
  </div>

  <div id="CENTRB">
    <div id="probox">
<?php if ($products) {
        foreach ($products as $product) { ?>
          <div class="pcasebox products<?php echo $category_id && $product->category_id != $category_id ? ' cover' : '';?>" data-id='<?php echo $product->id;?>'>
            <a href="<?php echo base_url (array ('product', $product->id));?>">
              <img src="<?php echo $product->first_picture ? $product->first_picture->file_name->url ('191x168') : '';?>" width="100%">
            </a>
            <p class="protitle">
              <a href="<?php echo base_url (array ('product', $product->id));?>">// <?php echo $product->title;?></a>
            </p>
          </div>
  <?php }
      } ?>
    </div>
  </div>
</div>