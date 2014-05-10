       <?php include('connect.php');
        $rawData = mysql_query("SELECT * FROM videos");
    if (!$rawData ) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }
    $data = Array();
    $i = 0;
    while ($row = mysql_fetch_assoc($rawData)) {
        $data[$i] = $row;
        $i++;
    }?>

<!doctype html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/sliderstyle.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
      <script src="js/jquery.slides.min.js"></script>
    </head>
    <body>
<style>
   
</style>

<div class="content">
    <div class="sub-content">
        <div id="tr">
            <div id="slides">
                <?php foreach($data as $v):?>
                <div>
                  <iframe id="ifreim" src="//player.vimeo.com/video/<?php echo $v['vimeo_id'] ?>?title=0&amp;byline=0&amp;portrait=0&amp;badge=0" width="750" height="422" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>   
                  <ul id="lista"> 
                    <br>
                    <li>Nombre: <?php echo $v['nombre']?></li>
                    <li>Director: <?php echo $v['director']?></li>
                    <li>Pais: <?php echo $v['pais']?></li>
                    <li>Duracion: <?php echo $v['duracion']?></li>
                    <li>Comentario: <?php echo $v['comentario']?></li>
                  </ul> 
                </div>
                <?php endforeach; ?>
                <a href="#" class="slidesjs-previous slidesjs-navigation"><img id="flechas" src="imgs/Izq.png"></a>
                <a href="#" class="slidesjs-next slidesjs-navigation"><img id="flechas" src="imgs/Der.png"></a>
            </div>
        </div>

    </div>
    <!-- <img id="cams" src="imgs/C5.png"> -->
</div>

<script type="text/javascript">
    $(function(){
      $("#slides").slidesjs({
        width: 940,
        height: 700,
        navigation: false
      });
    });
</script>
    </body>
</html>