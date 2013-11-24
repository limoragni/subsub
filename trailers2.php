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
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
     Galleria.run('#galleria', {
    dataConfig: function(img) {
        // img is now the image element
        // the function should return an object with the new data
        return {
            title: "Carlanlo", // sets title to "John Doe"
            description: "<ul><li>sdssdsd</li><li>sdssdsd</li><li>sdssdsd</li><li>sdryj</li></ul>"// sets description to "My picture"
        };
    }
});
</script>
    </body>
</html>
