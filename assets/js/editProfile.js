//This will modify the modal active or inactive text in the sql changes.
function disableMyTextName(textit,checkid){
    if(document.getElementById(checkid).checked === false){
        document.getElementById(textit).disabled = "disable";
    }else if(document.getElementById(checkid).checked !== false){
        document.getElementById(textit).disabled ="";
    }
}