/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_type = new ActiveXObject("Microsoft.XMLHTTP");
}else{
request_type = new XMLHttpRequest();
}
return request_type;
}

var http = createObject();



/* -------------------------- */
/* LOGIN */
/* -------------------------- */
/* Required: var nocache is a random number to add to request. This value solve an Internet Explorer cache issue */
var nocache = 0;
function login() {
// Optional: Show a waiting message in the layer with ID ajax_response
document.getElementById('login_response').innerHTML = "Loading..."
// Required: verify that all fileds is not empty. Use encodeURI() to solve some issues about character encoding.
var idnumber = encodeURI(document.getElementById('idnumber').value);
var password = encodeURI(document.getElementById('password').value);
// Set the random number to add to URL request
nocache = Math.random();
// Pass the login variables like URL variable
http.open('get', 'http://smcgrades.websitebuilderteam.com/www/php_script/checklogin.php?idnumber='+idnumber+'&password='+password+'&nocache = '+nocache);
http.onreadystatechange = loginReply;
http.send(null);
}

function loginReply() {
	if(http.readyState == 4){ 
		var response = http.responseText;
			if(response == 0){
				// if login fails
				document.getElementById('login_response').innerHTML = 'Login failed! Wrong ID Number and/or Password';
				// else if login is ok show a message: "Welcome + the user name".
			} else {
				//document.getElementById('login_response').innerHTML = response;
				window.location="../php_script/profile.php";
			}
		}
}




function logout() {
  $.get("http://smcgrades.websitebuilderteam.com/www/php_script/logout.php");
  window.location="login.php";
  //return false;
}





