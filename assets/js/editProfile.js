function disableMyText(){
    if(document.getElementById("flexCheckUser_name").checked == true){
        document.getElementById("recipient-name").disabled = "disabled";
    }else if(document.getElementById("flexCheckUser_name").checked == false){
        document.getElementById("recipient-name").disabled ="";
    }
}