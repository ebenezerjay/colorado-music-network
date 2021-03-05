<?php
  // connect to database
	$searchData = new mysqli("localhost:3306", "indieliv_eb", "Helpontheway2112!", "indieliv_cmn_bands");
	
	// check connection 
if ($searchData->connect_error) {
	die('Connect error: ' . $searchData->connect_errno . ': ' . $searchData->connect_error);
} 

// get search text
$searchText = $_POST['searchArtistName'];

// selects data based on search input
$query = "SELECT * FROM bands WHERE ArtistName like '%$searchText%' ";

// assigns query data to variable
$result = mysqli_query($searchData,$query);

// loop through table data on database and insert into dom table
if(mysqli_num_rows($result) > 0) {
	$submissions = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
