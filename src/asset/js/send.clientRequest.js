import appConfig from "./config/app.config.js";

/**
 * Handles the click event for the send button, sending the message input to the server.
 *
 * @param {Event} e - The click event object.
 * @returns {void}
 */
$("#sendButton").click(async function (e) {

  let message = $("#message-input").val();

  // If the message is empty, display a warning message and return early.
  if (message.trim() === "") {
    console.warn("Empty Message: ", "Message cannot be empty.");
    return;
  }

  try {
    const response = await saveMessage(message.trim());
    // Empty the message input
    $("#message-input").val("");
    // Scroll to the bottom of the chat window
  } catch (error) {
    console.error("Message sending failed: " + error.message);
  }
});


/**
 * Sends a message to the server using an AJAX POST request.
 *
 * @param {string} message - The message to be sent to the server.
 * @returns {Promise} A promise that resolves with the server's response if the message is successfully sent,
 *                    or rejects with an error if the message sending fails.
 */
async function saveMessage(message) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: appConfig.ajax.url.baseURL + appConfig.ajax.url.sendMessage,
      type: "POST",
      content: "application/json",
      data: {
        message: message,
      },
      datatype: "json",
      success: function (response) {
        resolve(response);
      },
      error: function (xhr, status, error) {
        reject(new Error("Failed to save message"));
      },
    })
  });
}

