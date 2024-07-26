// Get the modals
var createUserModal = document.getElementById("createUserModal");
var changePasswordModal = document.getElementById("changePasswordModal");
var userPermissionsModal = document.getElementById("userPermissionsModal");

// Get the links that open the modals
var createUserLink = document.getElementById("createUserLink");
var changePasswordLink = document.getElementById("changePasswordLink");
var userPermissionsLink = document.getElementById("userPermissionsLink");

// Get the <span> elements that close the modals
var closeButtons = document.getElementsByClassName("close");
var cancelButtons = document.getElementsByClassName("cancel");

// When the user clicks on the link, open the corresponding modal
createUserLink.onclick = function() {
    createUserModal.style.display = "block";
}
changePasswordLink.onclick = function() {
    changePasswordModal.style.display = "block";
}
userPermissionsLink.onclick = function() {
    userPermissionsModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < closeButtons.length; i++) {
    closeButtons[i].onclick = function() {
        this.parentElement.parentElement.style.display = "none";
    }
}

for (var i = 0; i < cancelButtons.length; i++) {
    cancelButtons[i].onclick = function() {
        this.parentElement.parentElement.style.display = "none";
    }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == createUserModal) {
        createUserModal.style.display = "none";
    } else if (event.target == changePasswordModal) {
        changePasswordModal.style.display = "none";
    } else if (event.target == userPermissionsModal) {
        userPermissionsModal.style.display = "none";
    }
}
