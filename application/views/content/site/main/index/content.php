
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
        <li><a href="<?php echo base_url (array ('abouts'));?>" data-en='PROFILE' data-tw='公司簡介'>PROFILE</a></li>
        <li><a href="<?php echo base_url (array ('products'));?>" data-en='PORTFOLIO' data-tw='作品欣賞'>PORTFOLIO</a></li>
        <li><a href="<?php echo base_url (array ('pres'));?>" data-en='PRESS' data-tw='媒體報導'>PRESS</a></li>
        <li><a href="<?php echo base_url (array ('news'));?>" data-en='NEWS' data-tw='最近消息'>NEWS</a></li>
        <li><a href="<?php echo base_url (array ('services'));?>" data-en='SERVICE' data-tw='關於服務'>SERVICE</a></li>
        <li><a href="<?php echo base_url (array ('contacts'));?>" data-en='CONTACT' data-tw='聯絡我們'>CONTACT</a></li>
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