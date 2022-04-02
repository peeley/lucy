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
var inProgress = false;
function inactivityTime(){
    var time;
    var idle_threshold = 5000;
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    function guided_use(){
        if(inProgress) {return;}
        inProgress = true;
        //alert("test");
        guidedSequence1();
    }

    function resetTimer(){
        clearTimeout(time);
        time = setTimeout(guided_use, idle_threshold);
    }
}

//aux functions
function displayElement(name){
    var ele = document.getElementById(name);
    ele.style.display = "block";
}
function hideElement(name){
    var ele = document.getElementById(name);
    ele.style.display = "none";
}
function addPulse(name){
    var ele = document.getElementsByClassName(name);
    Array.from(ele).forEach(function(e) {
        e.classList.add("pulse");
    });
}
function removePulse(name){
    var ele = document.getElementsByClassName(name);
    Array.from(ele).forEach(function(e) {
        e.classList.remove("pulse");
    });
}
function guidedSequence1(){
    displayElement("guidedPopup1");
    addPulse("default-tile");

    var myButtons = document.getElementsByClassName("default-tile");
    Array.from(myButtons).forEach(function(e) {
        e.addEventListener('click', function handler1() {
            guidedSequence2();
            e.removeEventListener('click', handler1);
        });
    });
}
function guidedSequence2(){
    hideElement("guidedPopup1");
    removePulse("default-tile");

    displayElement("guidedPopup2")
    addPulse("sentence-bar");
    addPulse("sentence-speak");

    var array1 = Array.prototype.slice.call(document.getElementsByClassName("sentence-bar"), 0);
    var array2 = Array.prototype.slice.call(document.getElementsByClassName("sentence-speak"), 0);
    var myButtons = array1.concat(array2);
    myButtons.forEach(function(e) {
        e.addEventListener('click', function handler1() {
            finishSequence();
            e.removeEventListener('click', handler1);
        });
    });
}
function finishSequence(){
    hideElement("guidedPopup2");

    removePulse("sentence-bar");
    removePulse("sentence-speak");
    inProgress = false;
}