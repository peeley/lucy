addLoadEvent(inactivityTime);

// this function was written by Simon Willison and retrieved from:
// https://brefere.com/fbapps/bcom.nsf/cvbdate/D514491209EE5C848725801A0074AE6E?opendocument#:~:text=Unfortunately%2C%20you%20cannot%20place%20multiple,use%20the%20addLoadEvent%20function%20below.
function addLoadEvent(func) { 
	var oldonload = window.onload; 
	if (typeof window.onload != 'function') { 
		window.onload = func; 
	} else { 
		window.onload = function() { 
			if (oldonload) { 
				oldonload(); 
			} 
			func(); 
		} 
	} 
}

//The idle detection
function inactivityTime(){
    var time;
    var idle_threshold = 5000;
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    var inProgress = false;
    function guided_use(){
        if(inProgress) {return;}
        inProgress = true;
        alert("test");
    }

    function resetTimer(){
        clearTimeout(time);
        time = setTimeout(guided_use, idle_threshold);
    }
}

function displayElement(name){
    var ele = document.getElementById(name);
    ele.style.display = "block";
}
function hideElement(name){
    var ele = document.getElementById(name);
    ele.style.display = "none";
}