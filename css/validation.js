
function validateForm() {
        let isValid = true;

        // Validate Name
        const name = document.getElementById("name").value.trim();
        if (name === "") {
            document.getElementById("nameError").innerText = "Name is required.";
            isValid = false;
        } else {
            document.getElementById("nameError").innerText = "";
        }

        // Validate Email
        const email = document.getElementById("email").value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            document.getElementById("emailError").innerText = "Email is required.";
            isValid = false;
        } else if (!emailPattern.test(email)) {
            document.getElementById("emailError").innerText = "Invalid email format.";
            isValid = false;
        } else {
            document.getElementById("emailError").innerText = "";
        }

        // Validate Phone
        const phone = document.getElementById("phone").value.trim();
        if (phone === "") {
            document.getElementById("phoneError").innerText = "Phone is required.";
            isValid = false;
        }else if(phone.length != 10 || isNaN(phone)){
            document.getElementById("phoneError").innerText = "Enter a valid phone number";
            isValid = false;
        }else{
            document.getElementById("phoneError").innerText = "";
        }

        // Validate Age
        const age = document.getElementById("age").value.trim();
        if (age === "") {
            document.getElementById("ageError").innerText = "Age is required.";
            isValid = false;
        } else if (isNaN(age) || age <= 0) {
            document.getElementById("ageError").innerText = "Enter a valid age.";
            isValid = false;
        } else {
            document.getElementById("ageError").innerText = "";
        }

        // Validate Rate
        const rate = document.getElementById("rate").value;
        if (rate === "") {
            document.getElementById("rateError").innerText = "Please rate our service.";
            isValid = false;
        } else {
            document.getElementById("rateError").innerText = "";
        }

        // Validate Radio Buttons
        const yes = document.getElementById("yes").checked;
        const no = document.getElementById("no").checked;
        if (!yes && !no) {
            document.getElementById("radioError").innerText = "Please select an option.";
            isValid = false;
        } else {
            document.getElementById("radioError").innerText = "";
        }

        // Validate Checkboxes
        const genres = document.querySelectorAll('input[name="genres[]"]:checked');
        if (genres.length === 0) {
            document.getElementById("genresError").innerText = "Please select at least one genre.";
            isValid = false;
        } else {
            document.getElementById("genresError").innerText = "";
        }

        return isValid;
}


function login() {
    let isValid = true;
   

    // Validate Username
    const usernameField = document.getElementById("Username");
    const username = usernameField.value.trim();

    if (username === "") {
        usernameField.style.borderColor = "red";
        alert("Username is required");
        isValid = false;
    } else {
        usernameField.style.borderColor = "";
    }

    // Validate Password
    const passwordField = document.getElementById("Password");
    const password = passwordField.value.trim();
    

    if (password === "") {
        passwordField.style.borderColor = "red";
        alert("Password is required");
        isValid = false;
    } else if(password.length <= 6){
        passwordField.style.borderColor = "red";
        alert("Password or email is invalid");
        isValid = false;
    }
    else {
        passwordField.style.borderColor = "";
    }

    return isValid;
}


function register() {
    let isValid = true;
   

    // Validate Username
    const usernameField = document.getElementById("Username");
    const username = usernameField.value.trim();

    if (username === "") {
        usernameField.style.borderColor = "red";
        alert("Username is required");
        isValid = false;
    }else if(username.length < 3){
        usernameField.style.borderColor = "red";
        alert("Username is less than 4 character");
        isValid = false;
    } else {
        usernameField.style.borderColor = "";
    }


    // Validate Name
    const namefield = document.getElementById("Name");
    const name = namefield.value.trim();

    if (name === "") {
        namefield.style.borderColor = "red";
        alert("Name is required");
        isValid = false;
    }else if(name.length < 3){
        namefield.style.borderColor = "red";
        alert("Name is less than 4 character");
        isValid = false;
    } else {
        namefield.style.borderColor = "";
    }


    //validate Email
    const emailfield = document.getElementById("Email");
    const email = emailfield.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(email === "") {
        emailfield.style.borderColor = "red";
        alert("Email is required");
        isValid = false;
    }else if(email.length < 5 || !emailPattern.test(email)){
        emailfield.style.borderColor = "red";
        alert("Email is invalid");
        isValid = false;
    } else {
        emailfield.style.borderColor = "";
    }


    //validate Location
    const locationfield = document.getElementById("Location");
    const location = locationfield.value.trim();

    if(location === "") {
        locationfield.style.borderColor = "red";
        alert("Location is required");
        isValid = false;
    } else {
        locationfield.style.borderColor = "";
    }



    // Validate Password
    const passwordField = document.getElementById("Password");
    const password = passwordField.value.trim();

    if (password === "") {
        passwordField.style.borderColor = "red";
        alert("Password is required");
        isValid = false;
    }else if(password.length < 5){
        passwordField.style.borderColor = "red";
        alert("Password is less than 6 character");
        isValid = false;
    } else {
        passwordField.style.borderColor = "";
    }

    return isValid;
}



function book() {

    let isValid;

    // validate name book
    const namebookField = document.getElementById("add");
    const book = namebookField.value.trim();

    if (book === "") {
        namebookField.style.borderColor = "red";
        alert("Book name is required");
        isValid = false;
    }else if(book.length < 5){
        namebookField.style.borderColor = "red";
        alert("Book name is less than 6 character");
        isValid = false;
    } else {
        namebookField.style.borderColor = "";
    }

    // validate image book
    const fileField = document.getElementById("file");
    const imagebook = namebookField.value.trim();

    if (fileField.files.length === 0) {
        fileField.style.borderColor = "red";
        alert("Please upload a file");
        isValid = false;
    }else {
        const Extensions = ['image/jpeg', 'image/png'];
        const file = fileField.files[0];

        if (!Extensions.includes(file.type)) {
            fileField.style.borderColor = "red";
            alert("Only image files (JPEG, PNG) are allowed");
            isValid = false;
        }else{
            fileField.style.borderColor = "";
        }
    }
    


    return isValid;


}