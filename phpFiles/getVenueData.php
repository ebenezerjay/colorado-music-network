<?php
// connect to database
$retreiveVenueData = new mysqli("localhost:3306", "indieliv_eben", "Helpontheway2112!", "indieliv_cmn_venues");

// check connection
if ($retreiveVenueData->connect_error) {
  die('Connect error: ' . $retreiveVenueData->connect_errno . ': ' . $retreiveVenueData->connect_error);
}

// select table data
$sel = mysqli_query($retreiveVenueData, "SELECT * FROM venues ORDER BY VenueName limit 50");

// loop through table data on database and insert into dom table
 if(mysqli_num_rows($sel) > 0) {
	$submissions = mysqli_fetch_all($sel,MYSQLI_ASSOC);
	foreach($submissions as $submission) : ?>
		<tr class="flex" id="tr-id">
			<td class="td-name td-styles"><?php echo $submission['VenueName']; ?></td>
			<td class="td-location td-styles"><?php echo $submission['VenueLocation']; ?> </td>
			<td class="td-link td-styles"><a href="<?php echo $submission['Website'];?>">Venue Website</a></td>
			<td class="td-description td-styles"><?php echo $submission['VenueDescription']; ?> </td>
		</tr>
		<?php endforeach;
 }


?>