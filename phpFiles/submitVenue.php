<?php
// connect to database
$submitVenueData = new mysqli("localhost:3306", "indieliv_eben", "Helpontheway2112!", "indieliv_cmn_venues");

// check connection
if ($submitVenueData->connect_error) {
  die('Connect error: ' . $submitVenueData->connect_errno . ': ' . $submitVenueData->connect_error);
}

// get input data
$name = $_POST['VenueFormName'];
$location = $_POST['VenueFormLocation'];
$url = $_POST['VenueFormUrl'];
$description = $_POST['VenueFormDescription'];

// inserts input data into table
$submissionVenueData = "INSERT INTO venues (VenueName,VenueLocation,Website,VenueDescription) VALUES (
  '{$submitVenueData->real_escape_string($_POST['VenueFormName'])}',
  '{$submitVenueData->real_escape_string($_POST['VenueFormLocation'])}',
  '{$submitVenueData->real_escape_string($_POST['VenueFormUrl'])}',
  '{$submitVenueData->real_escape_string($_POST['VenueFormDescription'])}')";


$insertVenueData = $submitVenueData->query($submissionVenueData); 



?>