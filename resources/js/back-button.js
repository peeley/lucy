
addLoadEvent(settingsBackSeeder);



function settingsBackSeeder() {
    var queryString = location.search.substring(1); //grab url from the params in the url

    if (!queryString) { //if the string is empty it means a post refreshed the page
        queryString = document.getElementById('url').innerText; //get the saved url
    }

    var myInputs = document.getElementsByClassName('update-url');
    Array.from(myInputs).forEach(function(e) {
        e.value = queryString; //seeding the next value with the url if the user does a post again
    });
    document.getElementById('back').action = queryString; //set the back destination to the previous page
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
			oldonload(); 
			func(); 
		} 
	} 
}