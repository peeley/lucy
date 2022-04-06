addLoadEvent(inactivityTime);
addLoadEvent(resetTimer);


//The idle detection
var time;
var idle_threshold = 10000;
function inactivityTime(){
    document.onmousemove = resetTimer;
    document.onmousedown = resetTimer;
    document.ontouchstart = resetTimer;
    document.onkeydown = resetTimer;
}
function resetTimer(){
    clearTimeout(time);
    time = setTimeout(guided_use, idle_threshold);
}
function stopIdleDetection(){
    document.onmousemove = null;
    document.onmousedown = null;
    document.ontouchstart = null;
    document.onkeydown = null;
}
//the guided use
function guided_use(){
    stopIdleDetection();
    clearTimeout(time);
    guidedSequence1();
}
function guidedSequence1(){
    displayElement("guidedPopup1");
    addPulse("default-tile");

    var myButtons = document.getElementsByClassName("default-tile");
    Array.from(myButtons).forEach(function(e) {
        e.addEventListener('click', function handler() {
            guidedSequence2();
            e.removeEventListener('click', handler);
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
        e.addEventListener('click', function handler() {
            guidedSequence3();
            e.removeEventListener('click', handler);
        });
    });
}
function guidedSequence3(){
    hideElement("guidedPopup2");
    removePulse("sentence-bar");
    removePulse("sentence-speak");

    displayElement("guidedPopup3");
   
    addEventListener("mousedown", function handler() {
        guidedSequence4();
        removeEventListener("mousedown", handler);
    });
}
function guidedSequence4(){
    hideElement("guidedPopup3");

    //turn back on the guided use
    inactivityTime();
}






//============aux functions=================//
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
// this function was written by Simon Willison and retrieved from:
// https://brefere.com/fbapps/bcom.nsf/cvbdate/D514491209EE5C848725801A0074AE6E?opendocument#:~:text=Unfortunately%2C%20you%20cannot%20place%20multiple,use%20the%20addLoadEvent%20function%20below.
// Essentially, this function checks if there is already an window.onload and if there is, it will add the function.
// If there isn't one, it will create a new one with the function. 
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