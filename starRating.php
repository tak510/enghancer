<?php
include "db.php";
$user_id = 1;
$teacher_id = $_POST['teacher_id'];
$rating = $_POST['rating'];
// Check rating inside the table
$query = "SELECT COUNT(*) AS countProduct FROM teacher_rating WHERE teacher_id = " . $teacher_id . " and user_id = " . $user_id;
$result = mysqli_query($connection, $query);
$getdata = mysqli_fetch_array($result);
$count = $getdata['countProduct'];
if($count == 0){
 $insertquery = "INSERT INTO teacher_rating(user_id, teacher_id, rating) values(". $user_id .", ". $teacher_id .", ". $rating .")";
 mysqli_query($connection, $insertquery);
}else {
 $updateRating = "UPDATE product_rating SET rating=" . $rating . " where user_id=" . $user_id . " and teacher_id=" . $teacher_id;
 mysqli_query($connection, $updateRating);
}
// fetch rating
$query = "SELECT ROUND(AVG(rating),1) as numRating FROM teacher_rating WHERE teacher_id=".$teacher_id;
$result = mysqli_query($connection, $query) or die(mysqli_error());
$getAverage = mysqli_fetch_array($result);
$numRating = $getAverage['numRating'];
$return_arr = array("numRating"=>$numRating);
echo json_encode($return_arr);