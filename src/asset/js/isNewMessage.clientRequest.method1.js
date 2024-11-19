import appConfig from "./config/app.config.js";
import { displayMessage, getAllMessages } from "./display.clientRequest.js";
import { Message } from "./models/message.models.js";

let myInterval = null;

/**
 * This function is responsible for periodically checking for new messages and handling the response.
 * It uses the `setInterval` function to execute the `isThereNewMessages` function every 1 second.
 * When new messages are found, it displays them in the message container and scrolls down.
 * If no new messages are found, it logs a message indicating that.
 * If an error occurs during the fetch process, it logs the error.
 * The function also listens for the 'beforeunload' event to clear the interval when the window is closed.
 */
$(document).ready(function () {
  // setTimeout(function () {
  let myInterval = setInterval(function () {
    console.log("fetched messages")
    const response = isThereNewMessages();
    response
      .then((response) => {
        if (response.isNew) {
          console.log("New Messages found!");
          response.newMessages.forEach((message) => {
            displayMessage(new Message(message).toJSON());
          });

          // Scroll down
          $("#messages-container").animate({scrollTop: $("#messages-container")[0].scrollHeight}, 1000);
        }
        else {
          console.log("No new messages found.");
        }
      })
      .catch((error) => {
        console.error("Failed to fetch new messages:", error);
      })
  }, 1000);
  // }, 500);

  window.addEventListener('beforeunload', () => {
    clearInterval(myInterval);
  });

});


/**
 * Checks for new messages by comparing the current message count with the previously stored count.
 * If new messages are found, it returns them along with a flag indicating their presence.
 *
 * @returns {Promise<Object>} A promise that resolves to an object containing:
 * - `isNew` {boolean}: Indicates whether new messages were found.
 * - `newMessages` {Array}: An array of new message objects if any were found, otherwise an empty array.
 */
async function isThereNewMessages() {
  const message_object = await getAllMessages();
  let newRetreivedMessagesLength = message_object.length;

  if (
    newRetreivedMessagesLength >
    appConfig.message_container.messages_container_length
  ) {
    console.log("Refreshing Message List...");

    const newMessages = message_object.slice(
      appConfig.message_container.messages_container_length,
      newRetreivedMessagesLength
    );

    appConfig.message_container.messages_container_length =
      newRetreivedMessagesLength;

    return {
      isNew: true,
      newMessages: newMessages
    }

  } else {
    return {
      isNew: false,
      newMessages: []
    }
  }
}



export default { isThereNewMessages, getAllMessages };
