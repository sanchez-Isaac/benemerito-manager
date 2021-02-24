function disableMyText(){
    if(document.getElementById("flexCheckUser_name").checked === false){
        document.getElementById("recipient-name").disabled = "disable";
    }else if(document.getElementById("flexCheckUser_name").checked !== false){
        document.getElementById("recipient-name").disabled ="";
    }
}