<div id="RIGHTC">
  <div id="TOPTITLE">
    <p class="bigtitle">NEWS</p>
  </div>
      
  <div id="CENTRB">
    <div id="NDTO">
      <p class="NDBTitle"><?php echo $new->title;?></p>
      <a href="<?php echo base_url (array ('news'));?>" class="btnB">返回</a>
    </div>
      
    <div id="NDTT">
      <div class="timeboxD">
        <img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABGAAD/4QNvaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6N0NCOUYyNDMyOEVCRTMxMTg3OTZDRDdBRTQ2NkRFNzgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzkzNTREMUQ2REFEMTFFNDk1RTM5RDkyODBGQUFCNDQiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzkzNTREMUM2REFEMTFFNDk1RTM5RDkyODBGQUFCNDQiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFRkZEMDJGMUYxNDJFNDExQjNBM0VEQTRGQjg2NzlCQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3Q0I5RjI0MzI4RUJFMzExODc5NkNEN0FFNDY2REU3OCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv/uAA5BZG9iZQBkwAAAAAH/2wCEAAQDAwMDAwQDAwQGBAMEBgcFBAQFBwgGBgcGBggKCAkJCQkICgoMDAwMDAoMDA0NDAwRERERERQUFBQUFBQUFBQBBAUFCAcIDwoKDxQODg4UFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFP/AABEIABAADwMBEQACEQEDEQH/xABdAAADAQAAAAAAAAAAAAAAAAAAAQQIAQEAAAAAAAAAAAAAAAAAAAAAEAABBAAFBAMAAAAAAAAAAAACAQMEBRExURIUAEFxE6GxQhEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A2TOmWM6ulXIyXY8Fo9kRhgvWRp7EBSIk+tfkK4052O8te/P5NdKad404XBV1sgHEkJxO6IuO7xll0DaCRTC7WSoDlhUkRHHJkEeVEx3bTBdNddewEaG5IkFZv13GrYrTqxoAtijjpGmBKTafpUTDb4zz6D//2Q==" width="100%">
      </div>
          
      <p class="timesm"><?php echo $new->date;?></p>
    </div>
      
    <div id="NDTTT">
      <p class="smcentbox">
        <?php echo nl2br ($new->content);?>
      </p>
    </div>

<?php
    if ($new->npics) { ?>
      <div class='pics clearfix'>
  <?php foreach ($new->npics as $npic) { ?>
          <img src="<?php echo $npic->file_name->url ();?>" />
  <?php } ?>
      </div>      
<?php
    } ?>

<?php
    if ($new->y2) { ?>
      <div id="y2">
        <iframe src="http://www.youtube.com/embed/<?php echo $new->y2;?>?&showinfo=1&autohide=1&autoplay=1" frameborder="0" allowfullscreen width="800" height="450"></iframe>
      </div>   
<?php
    } ?>
  </div>  
</div>
        