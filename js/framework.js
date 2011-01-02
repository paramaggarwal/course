function toggleDiv(divid,arrowid) {
	var element = document.getElementById(divid);
	var toggle  = document.getElementById(divid + '_toggle');

	if (element.style.display == 'none') {
		element.style.display = 'block';
		toggle.innerHTML = '<img src="images/arrow_down_'+arrowid+'.gif">';
		createCookie('toggle_' + divid, 'open', 360);
	} else {
		element.style.display = 'none';
		toggle.innerHTML = '<img src="images/arrow_right_'+arrowid+'.gif">';
		createCookie('toggle_' + divid, 'closed', 360);
	}
}