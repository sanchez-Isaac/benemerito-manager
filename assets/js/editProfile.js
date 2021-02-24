document.getElementById('flexCheckUser_name').onchange = function() {
    document.getElementById('recipient-name').disabled = !this.checked;
};