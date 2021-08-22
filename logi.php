<?php
  

    $username= $_POST['bankname1'];
    

    // Database connection


    $conn = new mysqli('localhost','root','','see');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $SELECT = "SELECT bankname1 From dekho Where bankname1 = ? Limit 1";
         $stmt = $conn->prepare($SELECT);
         $stmt->bind_param("s", $username);
            $stmt->execute();
             $stmt->bind_result($username);
              $stmt->store_result();
                $rnum = $stmt->num_rows;
                 if ($rnum==0) {
                      $stmt->close();

        $stmt = $conn->prepare("insert into dekho(bankname1) values(?)");

        $stmt->bind_param("s", $username);

        $execval = $stmt->execute();
        echo $execval;

        echo "Thanks";
       }
    else {
      echo "Someone already register using this bankname";
     }

        $stmt->close();
        $conn->close();
    }

?>