function getElementByAttribute(attr, value, root) {
    root = root || document.body;
    if(root.hasAttribute(attr) && root.getAttribute(attr) == value) {
        return root;
    }
    var children = root.children, 
        element;
    for(var i = children.length; i--; ) {
        element = getElementByAttribute(attr, value, children[i]);
        if(element) {
            return element;
        }
    }
    return null;
}

selectableField = document.querySelector('[selectable]');
selectableField.addEventListener("select", logSelection);

function logSelection(event) {
	var target = event.currentTarget.getAttribute("selectable");
	start = document.querySelector('[selected-start-pos="'+target+'"] input');
	if(start){
		start.value = event.target.selectionStart;
	}
	end = document.querySelector('[selected-end-pos="'+target+'"] input');
	if(end){
		end.value = event.target.selectionEnd;
	}
}