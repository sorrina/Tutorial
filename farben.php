<?php
for($i=0; $i<5; $i++){
    $farbe1 = rand(1,255);
    $farbe2 = rand(1,255);
    $farbe3 = rand(1,255);
    echo'<div style="background-color:rgb('.$farbe1.', '.$farbe2.', '.$farbe3.');
                     width:150px;
                     height:150px;
                     display:inline-block;">
                     rgb('.$farbe1.', '.$farbe2.', '.$farbe3.')
         </div>';
}
?> 
