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

var a = null;
document.addEventListener('select', function (event) {
    if(event.target.hasAttributes(['selectable'])) {
        a = event.target;
        var targetAttribute = event.target.parentElement.parentElement.getAttribute('selectable');
        start = document.querySelector('[selected-start-pos="'+targetAttribute+'"] input');
        if(start){
            start.value = event.target.selectionStart;
        }
        end = document.querySelector('[selected-end-pos="'+targetAttribute+'"] input');
        if(end){
            end.value = event.target.selectionEnd;
        }
    }
});