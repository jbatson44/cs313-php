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
	if (document.getElementsByClassName('deletions').style.display == 'none') {
		console.log("show delete!");
		document.getElementsByClassName('deletions').style.display = 'block';
		
	} else {//if(document.getElementsByName("newRoutine")[0].style.visibility == 'visible') {
		console.log("hide delete!");
		document.getElementsByClassName('deletions').style.display = 'none';
	}
}