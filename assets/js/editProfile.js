//This will modify the modal active or inactive text in the sql changes.
function disableMyTextName(){
    if(document.getElementById("flexCheckUser_name").checked === false){
        document.getElementById("recipient-name").disabled = "disable";
    }else if(document.getElementById("flexCheckUser_name").checked !== false){
        document.getElementById("recipient-name").disabled ="";
    }
}