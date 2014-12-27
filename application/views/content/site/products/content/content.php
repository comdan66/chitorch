<div id="RIGHTC">
  <div id="TOPTITLE">
    <p class="bigtitle">PROJECT</p>
  </div>
  <div id="CENTRB">
    <div id="NDTO">
      <p class="pdtype">// <?php echo $product->category ? $product->category->name : '未分類';?></p>
      <a href="<?php echo base_url (array ('products'));?>" class="btnB">返回</a>
    </div>

    <div class="container coverflow">
      <div class="bs-example">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators hidden-xs">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>

          <div class="carousel-inner">
      <?php if ($product->pictures) {
              foreach ($product->pictures as $i => $picture) { ?>
                <div class="item<?php echo !$i ? ' active' : '';?>">
                  <img src="<?php echo $picture->file_name->url ('855x575');?>" width="100%">
                </div>
        <?php }
            }?>
          </div>

          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left hidden-xs"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right hidden-xs"></span>
          </a>
        </div>
      </div>
    </div>

    <div id="prophotobox">
      <img src="" width="100%" id="BIG">
        <div id="SMALL">
    <?php if ($product->pictures) {
            foreach ($product->pictures as $i => $picture) { ?>
              <img src="<?php echo $picture->file_name->url ('64x64');?>" data-url="<?php echo $picture->file_name->url ('855x575');?>" width="100%" />
            <?php }
          }?>
        </div>
    </div>

    <div id="prodtype">
      <p class="prtop"><?php echo $product->category ? $product->category->name : '未分類';?></p>
      <div class="prodeleft">
        <p class="LEFType"><?php echo $product->title;?></p>
      </div>
      <div class="proderight">
 <?php  if ($product->blocks) {
          foreach ($product->blocks as $block) { ?>
            <p class="Rprotitle"><?php echo $block->title;?></p>
      <?php if ($block->specs) {
              foreach ($block->specs as $spec) {
                if ($spec->title) { ?>
                  <p class="Rprosmtitle"><?php echo $spec->title;?><span class="Rprosmtype"><?php echo $spec->content;?></span></p>
          <?php } else { ?>
                  <p class="Rprosmtitle"><span class="Rprosmtypeall"><?php echo nl2br ($spec->content);?></span></p>
        <?php   }
              }
            }
          }
        } ?>
      </div>
    </div>




  </div>
</div>
