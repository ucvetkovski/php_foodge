<?php
session_start();

    include("../models/connection.php");
    include("../models/functions.php");

    $userID = $_SESSION['sessionHolder']->user_id;

/* Getting file name */
    $filename = $_FILES['file']['name'];/* Location */
    $location = "../upload/".time().$filename;
    $filenameToAdd = time().$_FILES['file']['name'];
    $uploadOk = 1;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);/* Valid Extensions */
    $valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
       $upload =  updateProfilePicture($filenameToAdd,$userID);
       return $upload;
   }else{
      return 0;
   }
}
?>