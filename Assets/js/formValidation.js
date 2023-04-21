function checkForm(id) {

const form = document.querySelector(id);
let errorMessage = "";

function inValidName(array) {
    const pattern = /^(?!.[-']{2,})(?=.[-']?[a-zA-Z]{1,19}[a-zA-Z])[a-zA-Z\s'-]{1,20}$/;
    if (!pattern.test(array)) {
        return true;
    } else {
        return false;
    }
}

function inValidEmail(array) {
    const pattern = /^([a-zA-Z0-9._%+-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/;
    if (!pattern.test(array)) {
        return true;
    } else {
        return false;
    }
}

form.addEventListener('submit', (event) => {
    let inputFields = form.querySelectorAll('input');
    inputFields += form.querySelectorAll('select');
    let hasEmptyFields = false;
    let invalidName = false;
    let invalidEmail = false;

    for (let i = 0; i < inputFields.length; i++) {

        if (inputFields[i].value === '') {
            hasEmptyFields = true;
            inputFields[i].style.borderWidth = "2px";
            inputFields[i].style.borderColor = "#FF0000";
            //break;
        } else {
            inputFields[i].style.borderWidth = "1px";
            inputFields[i].style.borderColor = "#000000";
        }
        
        if (inputFields[i].classList.contains('name')) {

            if (inValidName(inputFields[i].value)) {
                invalidName = true;
                inputFields[i].style.borderColor = "#FF0000";
                inputFields[i].style.borderWidth = "2px";
            } else {
                inputFields[i].style.borderWidth = "1px";
                inputFields[i].style.borderColor = "#000000";
            }
        }

        if (inputFields[i].classList.contains('email')) {

            if (inValidEmail(inputFields[i].value)) {
                invalidEmail = true;
                inputFields[i].style.borderColor = "#FF0000";
                inputFields[i].style.borderWidth = "2px";
            } else {
                inputFields[i].style.borderWidth = "1px";
                inputFields[i].style.borderColor = "#000000";
            }
        }
    }

    if (invalidEmail || invalidName || hasEmptyFields) {
        errorMessage += "Cannot proceed: ";

        if (invalidName) {
            errorMessage += "Invalid Name(s)";
        }

        if (invalidEmail) {
            errorMessage += "Invalid Email";
        }

        if (hasEmptyFields) {
            errorMessage += "Some fields missing";
        }

        event.preventDefault();
        document.getElementById("errorMessage").innerHTML = "test";
        document.getElementById("errorMessage").style.color = "#FF0000";
    }
});

}