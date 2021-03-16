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

// displays the appropriate search form
$(document).ready(function() {
  $(".search-venue-form").css("display", "none");
  $("#search-venue-btn-id").on("click", function() {
    $(".search-venue-form").toggle();
  });
});

// sends ajax call to search database and display results
$( "#search-venue-form-id" ).submit(function(e) {
  e.preventDefault();
	// serialize the form data
	let	formData = $(this).serialize();
  // fetch the data using post
	$.post( "searchVenue.php", formData,function(data) {
		$("tbody").html(data);
	});
});