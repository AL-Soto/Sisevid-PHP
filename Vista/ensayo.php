<?php
print_r($_FILES);
$nombre=$_FILES['Archivo']['name'];
$guardado=$_FILES['Archivo']['tmp_name'];
if(!file_exists('Archivo'))
{
    mkdir('Archivo',0777,true);
    if(file_exists('Archivo')){
        if(move_uploaded_file($guardado, 'Archivo/'.$nombre)){
            echo 'Archivo guardado';
        }
        else{
            echo'Archivo no guardado';
        }
    }
    
}
else{
    if(move_uploaded_file($guardado, 'Archivo/'.$nombre)){
        echo 'Archivo guardado';
    }
    else{
        echo'Archivo no guardado';
    }
}

echo'
<form action="ensayo.php" method="post" enctype="multipart/form-data">
    <input type="file" name="Archivo">
    <input type="submit" value="Enviar">
</form>
';


?>