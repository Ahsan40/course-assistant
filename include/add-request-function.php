<?php
  function  add_post($conn,$POST,$user_data){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
       $course_code = $POST['request_course_code'];
        $course_name = $POST['request_course_name'];
        $course_des = $POST['request_course_des'];
        $r_course_link = "NULL";
        $post_admin = $user_data['email'];
        $domain = $user_data['domain'];
        //$helper_id = "NULL";
        
        $query = "INSERT INTO request(r_course_code,r_course_name,r_course_des,r_course_link,request_admin,	domain)
                                VALUE('$course_code','$course_name','$course_des','$r_course_link','$post_admin','$domain')";
       
       if(mysqli_query($conn, $query)){
           return "Information Added Successfully";
        }
        else{
           // echo $course_code;
            //echo $course_name;
            return "SOMETHIS WRONG!";
        }
     }
   }

   function desplay_my_data($conn,$user_data){
      $post_admin = $user_data['email'];
      $query = "SELECT * FROM request WHERE request_admin='$post_admin'";
          if(mysqli_query($conn, $query)){
              return mysqli_query($conn, $query);
          }
   }

   function view_request($conn , $user_data){
      $post_domain = $user_data['domain'];
      $query = "SELECT * FROM request WHERE domain='$post_domain' ORDER BY dt DESC";
          if(mysqli_query($conn, $query)){
              return mysqli_query($conn, $query);
          }
          else{
             echo  "Something wrong!";
          }
   }
//    function view_request_search($conn , $user_data, $key){
//       $post_domain = $user_data['domin'];
//       $query = "SELECT * FROM request WHERE domain='$post_domain' AND (r_course_name LIKE '%$key%' OR r_course_code LIKE '%$key%' OR r_course_des LIKE '%$key%')";
//       if(mysqli_query($conn, $query)){
//           return mysqli_query($conn, $query);
//       }
//   }
  function admin_image($conn,$admin_email){
   $query = "SELECT * FROM users WHERE email='$admin_email'";
       if(mysqli_query($conn, $query)){
           return mysqli_query($conn, $query);
       }

  }

  function upload_data($conn,$data,$request_id,$admin){
   $temp_name = $_FILES['file']['tmp_name'];
   $file_name = $_FILES['file']['name'];
   $file_address = "files/".$file_name;
   $halper = $admin['email'];
   move_uploaded_file($temp_name,$file_address);
   $query = "UPDATE request 
    SET  r_course_link = '$file_address',
         helper_id   =  '$halper' 
    WHERE r_id=$request_id";
    if(mysqli_query($conn, $query)){
      header("Location: " . PAGES['home']);
      die();
    }
  }
?>