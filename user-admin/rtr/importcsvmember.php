<?php
    function importCSV($file){
    //         private $host='localhost';  
    // private $user='u434590366_rtr';
    // private $pass='Siva.123';
    // private $dbname='u434590366_rtr';
        $conn= mysqli_connect('localhost','u883782638_rac','Impact@3201','u883782638_rac');

 
        $file=fopen($file,'r');
        $count=0;
        while($row =fgetcsv($file)){
  
            $val="'".implode("','",$row)."'";
            
            // print_r($val);
            try{
            $q="INSERT INTO membership(name,rid,cid,groups,dob,occupation,email,gender,doj,phone,blood,blooddonor,foodprefer,duestatus,status)
                VALUES(".$val.")";
                echo $q;
                echo "<br/>";
             mysqli_query($conn,$q);
            }
            catch(Exception $e){
                print_r($e);
                echo "<script>alert('Something went wrong');</script>";
                echo "<script>window.location.href='./memberlist.php'</script>";
                die();
            }
        }
        echo "<script>window.location.href='./memberlist.php'</script>";

    
        

    }
    if(isset($_POST['submit'])){
        importCSV($_FILES['file']['tmp_name']);
        
    }
?>