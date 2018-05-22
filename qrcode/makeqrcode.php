<?php    


    include "qrlib.php";           
    
    QRcode::gif(urldecode($_REQUEST['qrlink']), false, 'H', '4', 2);    
    


?>