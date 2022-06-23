<?php
if(isset($_GET['confirm'])){
    if($_GET['confirm']==91901){
        unlink("../../../Model/testgame.php");
    }
    
}