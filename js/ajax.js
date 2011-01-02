function DoCallback_login(data)
{
    // branch for native XMLHttpRequest object
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = processReqChange_login;
        req.open('POST', url, true);
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        req.send(data);
    // branch for IE/Windows ActiveX version
    } else if (window.ActiveXObject) {
        req = new ActiveXObject('Microsoft.XMLHTTP')
        if (req) {
            req.onreadystatechange = processReqChange_login;
            req.open('POST', url, true);
            req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            req.send(data);
        }
    }
}

function processReqChange_login() {
    // only if req shows 'loaded'
    if (req.readyState == 4) {
        // only if 'OK'
        if (req.status == 200) {
            eval(what);
        } else {
            alert('There was a problem retrieving the XML data: ' +
                req.responseText);
        }
    }
}


function DoCallback_feedback(data)
{
    // branch for native XMLHttpRequest object
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = processReqChange_feedback;
        req.open('POST', urlf, true);
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        req.send(data);
    // branch for IE/Windows ActiveX version
    } else if (window.ActiveXObject) {
        req = new ActiveXObject('Microsoft.XMLHTTP')
        if (req) {
            req.onreadystatechange = processReqChange_feedback;
            req.open('POST', urlf, true);
            req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            req.send(data);
        }
    }
}

function processReqChange_feedback() {
    // only if req shows 'loaded'
    if (req.readyState == 4) {
        // only if 'OK'
        if (req.status == 200) {
            eval(whatf);
        } else {
            alert('There was a problem retrieving the XML data: ' +
                req.responseText);
        }
    }
}
