<!doctype html>
<html>
    <head>
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
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    	<script src="galleria/galleria-1.3.1.min.js"></script>
    </head>
    <body>
<style>
    #galleria{ width: 700px; height: 400px; background: #000 }
</style>

<div class="content">
    <div class="sub-content">
        <div id="tr">
            <div id="galleria">
                <?php foreach($data as $v):?>
                <a href="http://vimeo.com/<?php echo $v['vimeo_id'] ?>"><span class="video">Watch this on Vimeo!</span></a>
                    <?php endforeach; ?>
               <!--  <a href="http://vimeo.com/57879298"><span class="video">Watch this on Vimeo!</span></a>
                <a href="http://vimeo.com/57970228"><span class="video">Watch this on Vimeo!</span></a>
                <a href="http://vimeo.com/58259433"><span class="video">Watch this on Vimeo!</span></a> -->
            </div>
        </div>

    </div>
</div>

<script>
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
     Galleria.run('#galleria');
</script>
    </body>
</html>