/* Starting point:
 * 
 * http://www.safalra.com/web-design/javascript/collapsible-lists/
 *
 * $Id$
 */

var CLOSED_IMAGE = './Files/arrow_right_1.gif';
var OPEN_IMAGE = './Files/arrow_down_1.gif';
var EMPTY_IMAGE = './Files/icon_radio_unchecked.gif';
var sparktreeAlwaysOpen;

/* makeCollapsible - makes a list have collapsible sublists
 * 
 * listElement - the element representing the list to make collapsible
 */
function makeSparktree(listElement)
{
  // loop over all child elements of the list
  var child = listElement.firstChild;

  while (child != null) {

    // only process li elements (and not text elements)
    if (child.nodeType == 1) {

      // Handle cookies:
      if (child.id) {
        var storedState = readCookie(child.id);
        if (storedState && ( child.className != 'open' ) )
          child.className = storedState;
      }

      if (child.id == sparktreeAlwaysOpen) {
        child.className = 'open';
      }

      var imageSrc;
      switch (child.className) {
        case 'open'   : imageSrc = OPEN_IMAGE;   break;
        case 'closed' : imageSrc = CLOSED_IMAGE; break;
        default       : imageSrc = EMPTY_IMAGE;
      }

      // add buttons
      var image = document.createElement('img');
      image.setAttribute('src', imageSrc);
      image.id = child.id + '_toggle';

      if (child.className == 'closed' || child.className == 'open') {
        image.onclick = sparktreeToggleFunction(image, child);
        image.className = 'sparktree';
      } else {
        image.className = 'sparktree_empty';
      }

      child.insertBefore(image, child.firstChild);
    }

    child = child.nextSibling;
  }
}

/* createToggleFunction
 * returns a function that toggles sublist display
 * and stores state in a cookie
 * 
 * toggleElement - the element representing the toggle gadget
 * listElement - the collapsible <li>
 */
function sparktreeToggleFunction(toggleElement, listElement)
{
  return function(cookie)
  {
    var cookie = (cookie == null) ? true : cookie;

    // toggle status of toggle gadget
    if (listElement.className == 'closed') {
      toggleElement.setAttribute('src', OPEN_IMAGE);
      if (cookie) createCookie(listElement.id, 'open', 360);
      newClass = 'open';
    } else {
      toggleElement.setAttribute('src', CLOSED_IMAGE);
      if (cookie) createCookie(listElement.id, 'closed', 360);
      newClass = 'closed';
    }

    // toggle display of sublists
    listElement.className = newClass;
  }
}

function sparktreeOpen (elementId)
{
  element = document.getElementById(elementId);
  if (element.className == 'closed') {
    elementToggle = document.getElementById(elementId + '_toggle');
    elementToggle.onclick(false);
  }
}

function sparktreeHighlight (elementId)
{
  element = document.getElementById(elementId);
  element.style.backgroundColor = '#D8D5CB';
}
