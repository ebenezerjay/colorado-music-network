$("#submit-venue-form-id").submit(function(e) {
  e.preventDefault();
  // Send the data using post with a response
  $.post("submitVenue.php", $(this).serialize(), function() {
    $(".submit-venue-form").html("Thanks for submiting!  Refresh the page and you'll see it listed.");
  });
});

// gets all venue table data on page load
$(document).ready(function() {
	$.post("getVenueData.php", function(data) {
		$("tbody").html(data);
	});
});