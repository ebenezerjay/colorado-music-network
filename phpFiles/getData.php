<?php
// connect to database
$retreiveData = new mysqli("localhost:3306", "indieliv_eb", "Helpontheway2112!", "indieliv_cmn_bands");

// check connection
if ($retreiveData->connect_error) {
  die('Connect error: ' . $retreiveData->connect_errno . ': ' . $retreiveData->connect_error);
}

// select table data
$sel = mysqli_query($retreiveData, "SELECT * FROM bands ORDER BY ArtistName limit 50");

// loop through table data on database and insert into dom table
 if(mysqli_num_rows($sel) > 0) {
	$submissions = mysqli_fetch_all($sel,MYSQLI_ASSOC);
	foreach($submissions as $submission) : ?>
		<tr class="flex" id="tr-id">
			<td class="td-name td-styles"><?php echo $submission['ArtistName']; ?></td>
			<td class="td-location td-styles"><?php echo $submission['ArtistLocation']; ?> </td>
			<td class="td-link td-styles"><a href="<?php echo $submission['Website'];?>">Website</a></td>
			<td class="td-description td-styles"><?php echo $submission['ArtistDescription']; ?> </td>
		</tr>
		<?php endforeach;
 }


?>