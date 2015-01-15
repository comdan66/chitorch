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
          <div class="pcasebox products" data-id='<?php echo $product->id;?>' data-category_id='<?php echo $product->category_id;?>'>
            <a href="<?php echo base_url (array ('products', $product->id));?>">
              <img src="<?php echo $product->first_picture ? $product->first_picture->file_name->url ('191x168') : '';?>" width="100%">
            </a>
            <p class="protitle">
              <a href="<?php echo base_url (array ('products', $product->id));?>">// <?php echo $product->title;?></a>
            </p>
          </div>
  <?php }
      } ?>
    </div>
  </div>
</div>