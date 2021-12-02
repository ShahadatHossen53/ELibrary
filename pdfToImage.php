<?php
$pdf = "PHP.pdf";
$info = pathinfo($pdf);
$file_name =  basename($pdf,'.'.$info['extension']);
echo $file_name;
$pdf = "filename.pdf[0]";
if(exec("convert $pdf $file_name.jpg")){
    echo "Done";
}
else{
    echo "Fuck";
}
 
?>