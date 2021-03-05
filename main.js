// sends ajax request to submit artist form
$("#submit-artist-form-id").submit(function(e) {
  e.preventDefault();
  // Send the data using post with a response
  $.post("submitArtist.php", $(this).serialize(), function() {
    $(".submit-artist-form").html("Thanks for submiting!  Refresh the page and you'll see it listed.");
  });
});

// gets all artist table data on page load
$(document).ready(function() {
	$.post("getData.php", function(data) {
		$("tbody").html(data);
	});
});

// sends ajax call to search database and display results
$( "#search-artist-form-id" ).submit(function(e) {
  e.preventDefault();
	// serialize the form data
	let	formData = $(this).serialize();
  // fetch the data using post
	$.post( "searchArtist.php", formData,function(data) {
		$("tbody").html(data);
	});
});
