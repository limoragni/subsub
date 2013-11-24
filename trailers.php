       <?php include('connect.php');
        $rawData = mysql_query("SELECT * FROM videos");
    if (!$rawData ) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }

    // Se inicializa un array de datos vacio
    $data = Array();
    $i = 0;
    //Se loopea sobre el array de datos que contiene rawData, pasando los datos a un array asociativo.
    // Esto se logra con la funcion mysql_fetch_assoc();
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
                    <iframe src="//player.vimeo.com/video/<?php echo $v['vimeo_id'] ?>?title=0&amp;byline=0&amp;portrait=0&amp;badge=0" width="750" height="422" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
                <?php endforeach; ?>
                <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(function(){
      $("#slides").slidesjs({
        width: 940,
        height: 528,
        navigation: false
      });
    });
</script>
    </body>
</html>