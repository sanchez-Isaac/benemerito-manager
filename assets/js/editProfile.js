function disableMyText(){
    if(document.getElementById("flexCheckUser_name").checked == true){
        document.getElementById("recipient-name").disabled = "";
    }else{
        document.getElementById("recipient-name").disabled ="disabled";
    }
}