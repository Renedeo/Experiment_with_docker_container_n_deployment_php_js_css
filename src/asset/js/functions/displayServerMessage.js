/**
 * Displays a server message on the webpage.
 *
 * @param {string} message - The message to be displayed from the server.
 * @returns {void} This function does not return a value.
 */
export function displayServerMessage(message) {
    let spanErrorMessage = $("<span>",
        { text: message }
    );
    $("#server-message").html(spanErrorMessage);
}

