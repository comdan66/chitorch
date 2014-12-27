
<div id="supersize">
<?php
  if ($banners = Banner::find ('all')) {
    foreach ($banners as $banner) { ?>
      <a><img src="<?php echo $banner->file_name->url ();?>" /></a>
<?php
    }
  } ?>
</div>

<div id="ALLB">
  <div id="TOPI">
    <div id="LOGOI">
      <h1>
        <a href="<?php echo base_url (array ());?>">奇拓室內裝修設計 CHI-TORCH</a>
      </h1>
    </div>

    <div id="MENUI">
      <ul>
        <li><a href="<?php echo base_url (array ('abouts'));?>" data-en='About' data-tw='關於'>About</a></li>
        <li><a href="<?php echo base_url (array ('products'));?>" data-en='Product' data-tw='產品'>Product</a></li>
        <li><a href="<?php echo base_url (array ('medias'));?>" data-en='Media' data-tw='影音'>Media</a></li>
        <li><a href="<?php echo base_url (array ('new_products'));?>" data-en='News' data-tw='新聞'>News</a></li>
        <li><a href="<?php echo base_url (array ('services'));?>" data-en='Service' data-tw='服務'>Service</a></li>
        <li><a href="<?php echo base_url (array ('contacts'));?>" data-en='Contact' data-tw='聯絡'>Contact</a></li>
      </ul>
    </div>
  </div>

  <div id="DOWNI">
    <p class="IFN">106&nbsp;&nbsp;台北市大安區復興南路一段128號六樓</br>
    Tel&nbsp;&nbsp;+886-2-8772-1881</br>
    Fax&nbsp;+886-2-8772-1081</br>
    </br>
    Mon – Fri / 09:00 – 18:00</br>
    </br>
    © 2014 Chitorch interior Design Co., Ltd.</p>
  </div>
</div>