import { validatePassword, validateUsername } from "../formValidation/validatePassword/validateInput.js";
import { displayServerMessage } from "../functions/displayServerMessage.js";
import { User } from "../models/user.models.js";
import { saveUser } from "./functions/saveUser.js";

/**
 * Handles the form submission for user registration.
 * Validates the input fields and attempts to save the user data.
 * 
 * @param {Event} e - The event object for the form submission.
 * @returns {void}
 */
$("form").submit(async function (e) {
    e.preventDefault();
    try {
        let username = $("#register-username").val()
        let password = $("#register-password").val()

        // Validate input
        if (!validateUsername(username)){
            console.warn("Invalid Username: ", "Username must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.");
            return;
        }
        if (!validatePassword(password)){
            console.warn("Invalid Password: ", "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
            $("#information-checkbox").attr('checked', false);
            return;
        }

        let user = new User(username, password);
        console.log(user);
        const response = await saveUser(user.toJSON());
        if (response.success) {
            console.log("Register")
            this.submit();
        }
        else {
            displayServerMessage(response.message);
        }

    } catch (error) {
        console.error("Failed to save user:", error);
    }
});


