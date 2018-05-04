function clicked() {
	alert("Clicked!");
}

/*
function changeColor() {
	color = document.getElementsByName('newColor')[0].value;
	document.getElementById("div1").style.color = color;
}
*/

$(document).ready(function(){
	$("#change").click(function() {
		var color = $("#newColor").val();
		$("#div1").css("background-color", color);
	});
})

$(document).ready(function(){
	$("#newButton").click(function() {
		$("#div3").fadeToggle();
		alert("works");
	});
})

