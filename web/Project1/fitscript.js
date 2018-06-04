function addRoutines() {
	if (document.getElementsByClassName("edits")[0].style.display == 'none') {
		console.log("show add!");
		document.getElementsByName("newRoutine")[0].style.display = 'block';
		document.getElementsByName("submitRoutine")[0].style.display = 'block';
	} else {//if(document.getElementsByName("newRoutine")[0].style.visibility == 'visible') {
		console.log("hide add!");
		document.getElementsByName("newRoutine")[0].style.display = 'none';
		document.getElementsByName("submitRoutine")[0].style.display = 'none';
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