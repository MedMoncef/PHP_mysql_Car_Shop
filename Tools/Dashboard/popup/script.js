function openPopup() {
    document.getElementById("popupOverlay").style.display = "flex";
}

function closePopup() {
    document.getElementById("popupOverlay").style.display = "none";
}

function openPopupMOD(buttonElement) {
    // Read data from data attributes
    var name = buttonElement.getAttribute("data-name");
    var email = buttonElement.getAttribute("data-email");
    var password = buttonElement.getAttribute("data-password");
    var type = buttonElement.getAttribute("data-type");

    // Populate the form fields
    document.getElementById("Name").value = name;
    document.getElementById("Email").value = email;
    document.getElementById("Password").value = password;
    document.getElementById("Type").value = type;

    // Open the popup
    document.getElementById("popupOver").style.display = "flex";
}


function closePopupMOD() {
    document.getElementById("popupOver").style.display = "none";
}

/* -------------------------------------------------------------------- */

function saveID(userId) {
    document.getElementById("userID").value = userId;
}

function saveNAME(userName) {
    document.getElementById("Name").value = userName;

}

function saveEMAIL(userEmail) {
    document.getElementById("Email").value = userEmail;
}

function saveTYPE(userType) {
    document.getElementById("Type").value = userType;
}