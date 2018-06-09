function add() {
	if (document.getElementsByName("newRoutine")[0].style.visibility == 'hidden') {
		console.log("show add!");
		document.getElementsByName("newRoutine")[0].style.visibility = 'visible';
		document.getElementsByName("submitRoutine")[0].style.visibility = 'visible';
		//document.getElementsByName("addExName")[0].style.visibility = 'visible';
		//document.getElementsByName("addExercise")[0].style.visibility = 'visible';
		var exNames = document.getElementsByName("addExName");
		var addEx = document.getElementsByName("addExercise");
		for (var i = 0; i < exNames.length; i++) {
			exNames[i].style.visibility = 'visible';
			addEx[i].style.visibility = 'visible';
		}
	} else {
		console.log("hide add!");
		document.getElementsByName("newRoutine")[0].style.visibility = 'hidden';
		document.getElementsByName("submitRoutine")[0].style.visibility = 'hidden';
		//document.getElementsByName("addExName")[0].style.visibility = 'hidden';
		//document.getElementsByName("addExercise")[0].style.visibility = 'hidden';
		var exNames = document.getElementsByName("addExName");
		var addEx = document.getElementsByName("addExercise");
		for (var i = 0; i < exNames.length; i++) {
			exNames[i].style.visibility = 'hidden';
			addEx[i].style.visibility = 'hidden';
		}
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