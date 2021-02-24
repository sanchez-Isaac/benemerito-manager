//This will modify the modal active or inactive text in profile for th the sql changes.
function disableMyText(idtext, idcheck){
    if(document.getElementById(idtext).checked === false){
        document.getElementById(idcheck).disabled = "disable";
    }else if(document.getElementById(idtext).checked !== false){
        document.getElementById(idcheck).disabled ="";
    }
}