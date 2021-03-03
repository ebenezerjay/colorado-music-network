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
