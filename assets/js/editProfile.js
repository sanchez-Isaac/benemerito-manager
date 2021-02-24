function disableMyText(){
    if(document.getElementById("flexCheckUser_name").checked == true){
        document.getElementById("recipient-name").disabled = true;
    }else{
        document.getElementById("recipient-name").disabled = false;
    }
}