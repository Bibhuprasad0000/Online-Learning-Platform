<?php
  require("db.php");

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
     $email=$_POST['email'];
     $atc=$_POST['atc'];


     $check="SELECT * FROM users WHERE email='$email' AND activation_code='$atc'";
     $response=$db->query($check);
     if($response->num_rows !=0)
     {
      $status_update="UPDATE users SET status='activate' WHERE email='$email' ";
      if($db->query($status_update))
      {
         $get_id="SELECT id FROM users WHERE email='$email'";
         $id_res=$db->query($get_id);
         $id_array=$id_res->fetch_assoc();
         $user_table_name="user_".$id_array['id'];
         $create_user_table="CREATE TABLE  $user_table_name(
            id INT(11) NOT NULL AUTO_INCREMENT,
            user_name VARCHAR(100),
            date_time DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(ID)
         )";
       if($db->query($create_user_table))
       {
         if(mkdir("../data/".$user_table_name))
         {
            echo "active";
         }
         else{
            "folder not created ";
         }

       }
       else{
         echo "table not created ";
       }

               
      }
      else{
         echo "Status not updated ";
      }
        

     }
     else
     {
        echo "Wrong activation code ";
     }
  }
  else
  {
    echo "unauthorised request ";
  }


?>