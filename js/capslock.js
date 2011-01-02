function checkCaps(e) {
  kc = e.keyCode?e.keyCode:e.which;
  sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
  if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  	document.getElementById('Incorrect').innerHTML = "Caps Lock is ON";
  else
  	document.getElementById('Incorrect').innerHTML = "";
}

function checkEnterforLogin(e) {
  kc = e.keyCode?e.keyCode:e.which;
  if(kc == 13)
  	CheckLogin();
}

function checkEnterforFeedback(e) {
  kc = e.keyCode?e.keyCode:e.which;
  if(kc == 13)
  	PostFeedback();
}

function checkEnterforSearch(e) {
  kc = e.keyCode?e.keyCode:e.which;
  if(kc == 13)
  	LookupStudent();
}