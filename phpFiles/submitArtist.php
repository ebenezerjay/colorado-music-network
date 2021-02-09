<?php
// connect to database
$submitData = new mysqli("localhost:3306", "indieliv_eb", "Helpontheway2112!", "indieliv_cmn_bands");

// check connection
if ($submitData->connect_error) {
  die('Connect error: ' . $submitData->connect_errno . ': ' . $submitData->connect_error);
}

// get input data
$name = $_POST['ArtistFormName'];
$location = $_POST['ArtistFormLocation'];
$url = $_POST['ArtistFormUrl'];
$description = $_POST['ArtistFormDescription'];

// inserts input data into table
$submissionData = "INSERT INTO bands (ArtistName,ArtistLocation,Website,ArtistDescription) VALUES (
  '{$submitData->real_escape_string($_POST['ArtistFormName'])}',
  '{$submitData->real_escape_string($_POST['ArtistFormLocation'])}',
  '{$submitData->real_escape_string($_POST['ArtistFormUrl'])}',
  '{$submitData->real_escape_string($_POST['ArtistFormDescription'])}')";


$insertData = $submitData->query($submissionData); 



?>