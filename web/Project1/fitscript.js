function addRoutines() {
	if (document.getElementsByName("newRoutine")[0].style.visibility == 'hidden') {
		console.log("show add!");
		document.getElementsByName("newRoutine")[0].style.visibility = 'visible';
		document.getElementsByName("submitRoutine")[0].style.visibility = 'visible';
	} else {//if(document.getElementsByName("newRoutine")[0].style.visibility == 'visible') {
		console.log("hide add!");
		document.getElementsByName("newRoutine")[0].style.visibility = 'hidden';
		document.getElementsByName("submitRoutine")[0].style.visibility = 'hidden';
	}
}

function deleteRoutines() {
	var elems = document.getElementsByClassName('deletions');
	for (var i = 0; i < elems.length; i++) {
		if (elems[i].style.display == 'none') {
			console.log("show delete!");
			elems[i].style.display = 'block';
		} else {
			console.log("hide delete!");
			elems[i].style.display = 'none';
		}
	}
}