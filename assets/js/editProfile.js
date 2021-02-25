//This will modify the modal active or inactive text in the sql changes.
function disableMyTextName(textid,checkid)
{
    if(document.getElementById(checkid).checked === false)
    {
        document.getElementById(textid).disabled = "disable";
    }
    else if(document.getElementById(checkid).checked !== false)
    {
        document.getElementById(textid).disabled ="";
    }
}










