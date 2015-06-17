<div id="RIGHTC">
  <div id="TOPTITLE">
    <p class="bigtitle">PRESS</p>
  </div>
  <div id="CENTRB">
    <div id="NDTO">
      <p class="pdtype">// <?php echo $pre->pre_tag ? $pre->pre_tag->name : '未分類';?></p>
      <a href="<?php echo base_url (array ('pres'));?>" class="btnB">返回</a>
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
      <?php if ($pre->pictures) {
              foreach ($pre->pictures as $i => $picture) { ?>
                <div class="item<?php echo !$i ? ' active' : '';?>">
                  <img src="<?php echo $picture->file_name->url ('855w');?>" width="100%">
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
    <?php if ($pre->pictures) {
            foreach ($pre->pictures as $i => $picture) { ?>
              <img src="<?php echo $picture->file_name->url ('64x64');?>" data-url="<?php echo $picture->file_name->url ('855w');?>" width="100%" />
            <?php }
          }?>
        </div>
    </div>

    <div id="prodtype">
      <p class="prtop"> </p>
      <div class="prodeleft">
        <p class="LEFType"><?php echo $pre->title;?></p>
        <p class="date"><?php echo $pre->date->format ('Y年m月');?></p>
      </div>
      <div class="proderight">
 <?php  if ($pre->blocks) {
          foreach ($pre->blocks as $block) { ?>
            <p class="Rprotitle"><?php echo $block->title;?></p>
      <?php if ($block->specs) {
              foreach ($block->specs as $spec) {
                if ($spec->title) {
                  if (strpos ($spec->content, "http://") !== false) { ?>
                    <p class="Rprosmtitle"><?php echo $spec->title;?><span class="Rprosmtype"><a href='<?php echo $spec->content;?>'><?php echo $spec->content;?></a></span></p><br/>
            <?php } else { ?>
                    <p class="Rprosmtitle"><?php echo $spec->title;?><span class="Rprosmtype"><?php echo $spec->content;?></span></p><br/>
            <?php }
                } else { ?>
                  <!-- <p class="Rprosmtitle"><span class="Rprosmtypeall"><?php echo nl2br ($spec->content);?></span></p><br/> -->
        <?php   }
              }
            }
          }
        } ?>
      </div>
    </div>
  </div>
</div>
