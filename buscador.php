<?php

//llamamos la clase libros donde vamos a buscar...
require 'class/books.php';
$objBook = new Books();

$words = explode(' ',$_POST['word']);
$num = count($words);

$result = $objBook->buscar($_POST['word'], $num);

?>

<table border="1">
    <tr>
        <th>CODIGO</th>
        <th>TITULO</th>
        <th>AUTOR</th>
        <th>EDITORIAL</th>
        <th>DESCRIPCION</th>
    </tr><?php 
    if($result){
        foreach ($result as $key => $value) {?>
            <tr>
                <td><?php echo $value['codeBo'];?></td>
                <td><?php echo $value['titleB'];?></td>
                <td><?php echo $value['autorB'];?></td>
                <td><?php echo $value['descrB'];?></td>
                <td><?php echo $value['editoB'];?></td>
            </tr>
            <?php
        
        }
    }else{?>
        <tr>
            <td colspan="5">No hubo ningun resultado...</td>
        </tr>
        <?php
        
    }
    ?>
</table>