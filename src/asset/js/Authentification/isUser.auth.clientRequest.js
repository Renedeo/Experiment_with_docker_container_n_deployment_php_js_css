import { displayServerMessage } from "../functions/displayServerMessage.js";
import { authenticateUser } from "./functions/authentificateUser.js";

/**
 * Handles the form submission for user authentication.
 * Prevents the default form submission behavior, authenticates the user,
 * and redirects to the message page if authentication is successful.
 *
 * @param {Event} e - The event object representing the form submission event.
 * @returns {void} This function does not return a value.
 */
$("form").submit(async function (e) {
  e.preventDefault();
  try {

    const response = await authenticateUser(
      $("#username").val(),
      $("#password").val()
    );
    if (response.success) {
        // Getting to message page -> Method 1 : Using JS to submit the form 
        // And redirect using url parameter as action form attribute value
        // // this.action = appConfig.ajax.url.baseURL + '?phase=messages'
        // appConfig.username = response.session.username;
        localStorage.setItem("username", response.session.username);
        localStorage.setItem("user_id", response.session.user_id);

        this.submit();

        // Getting to message page -> Method 1.5 : Using JS to directly redirect to the message page
        // And using the url parameter with php to redirect to the message page
        // // window.location.href = "http://localhost/?phase=message"  
    }
    else{
        displayServerMessage(response.message);
    }

    // Handle the response accordingly
  } catch (error) {
    console.error("Failed to authenticate user:", error);
  }
});

