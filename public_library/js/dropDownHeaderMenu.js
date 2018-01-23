function myFunction() {
	  $( "#myDropdown" ).slideToggle( "fast", function() {
		//Animation complete
	  });
}

function hover() {
    document.getElementById("logo").src="../public_library/images/CNLogoNoTextGlow.png";
}
function unhover() {
    document.getElementById("logo").src="../public_library/images/CNLogoNoText.png";
}