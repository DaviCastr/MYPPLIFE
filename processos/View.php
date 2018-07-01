<?php
    $foto = $_FILES['fotos']['tmp_name'];
    // $img = fopen($foto, "rb");
    // echo $foto;
    
    // echo $img;
    header("Content-type: image");
    echo "<img src=\"$foto\" />";
    echo "oi";
?>