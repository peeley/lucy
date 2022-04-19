
addLoadEvent(hideGuestButtons);


function hideGuestButtons() {
    var user_id = document.getElementById("user-id").textContent;
    if (!user_id) {
        hideElement("swap-button");
        hideElement("settings-button");
    }
}
function hideElement(name){
    var ele = document.getElementsByClassName(name);
    Array.from(ele).forEach(function(e) {
        e.style.display = "none";
    });
}
function addLoadEvent(func) { 
	var oldonload = window.onload; 
	if (typeof window.onload != 'function') { 
		window.onload = func; 
	} else { 
		window.onload = function() { 
			oldonload(); 
			func(); 
		} 
	} 
}