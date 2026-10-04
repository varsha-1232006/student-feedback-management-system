function validateRegistration() {

    let password =
        document.getElementById("password").value;

    if (password.length < 6) {

        alert(
            "Password must contain at least 6 characters."
        );

        return false;
    }

    return true;
}


function confirmDelete() {

    return confirm(
        "Are you sure you want to delete this feedback?"
    );
}