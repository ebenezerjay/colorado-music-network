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

// displays the appropriate search form
$(document).ready(function() {
  $(".search-artist-form").css("display", "none");
  $(".search-venue-form").css("display", "none");
  $("#search-artist-btn-id").on("click", function() {
    $(".search-artist-form").toggle();
  });
  $("#search-venue-btn-id").on("click", function() {
    $(".search-venue-form").toggle();
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

