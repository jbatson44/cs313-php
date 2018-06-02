function editRoutines() {
	if (document.getElementsByName("newRoutine")[0].style.visibility == 'hidden') {
		console.log("show!");
		document.getElementsByName("newRoutine")[0].style.visibility = 'visible';
		document.getElementsByName("submitRoutine")[0].style.visibility = 'visible';
	} else //if(document.getElementsByName("newRoutine")[0].style.visibility == 'visible') {
		console.log("show!");
		document.getElementsByName("newRoutine")[0].style.visibility = 'hidden';
		document.getElementsByName("submitRoutine")[0].style.visibility = 'hidden';
	}
}