import appConfig from "./config/app.config.js";
import { message_container } from "./functions/message.container.js";
import { Message } from "./models/message.models.js";

/**
 * Fetches and displays all messages in the chat interface.
 * 
 * This function retrieves all messages from the server and displays each message
 * in the chat interface. It updates the message container length in the application
 * configuration after successfully displaying the messages.
 * 
 * @returns {Promise<void>} A promise that resolves when all messages have been displayed.
 * If an error occurs during the retrieval or display process, it logs the error to the console.
 */
async function DisplayAllMessages() {
  try {
    const message_object = await getAllMessages();
    message_object.forEach((message) => {
      displayMessage(message.toJSON()); // Assuming messages are already JSON objects
    });
    appConfig.message_container.messages_container_length =
      message_object.length;
  } catch (error) {
    console.error("Failed to display messages:", error);
  }
}

/**
 * Displays a single message in the chat interface.
 *
 * @param {Message} message - The message object to be displayed.
 * @property {string} message.content - The content of the message.
 * @property {string} message.created_at - The timestamp of when the message was created.
 * @property {string} message.userName - The username of the user who sent the message.
 * @property {string} message.user_id - The unique identifier of the user who sent the message.
 *
 * @returns {void}
 */
export function displayMessage(message) {
  const message_retrieved = message_container(
    "p",
    message.content,
    "message-content"
  );
  const message_date = message_container(
    "span",
    message.created_at,
    "message-date"
  );
  const message_user = message_container(
    "span",
    message.userName,
    "message-user-id"
  );


  const message_div = $("<div></div>", {
    class: (message.user_id == localStorage.getItem("user_id")) ? "current-user message-div" : "other-user message-div",
  });
  const message_information= $("<div></div>", {
    class: "message-information",
  })
  message_information.append(message_user, message_date);
  message_div.append(message_information, message_retrieved);
  $("#messages-container").append(message_div);
}

/**
 * Retrieves all messages from the server using AJAX.
 *
 * @returns {Promise<Message[]>} A promise that resolves with an array of Message objects.
 * If the retrieval is successful, the promise will be fulfilled with the array of Message objects.
 * If the retrieval fails, the promise will be rejected with an Error object.
 */
export async function getAllMessages() {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "GET",
      url: appConfig.ajax.url.baseURL + appConfig.ajax.url.messages,
      // contentType: "application/json",
      dataType: "json",
      cache: false,

      success: function (response) {
        console.log("Retrieving messages from the database...");
        let messagesObjectList = [];
        response.data.forEach(message => {
          messagesObjectList.push(new Message(JSON.parse(message)));
        })
        resolve(messagesObjectList);
      },
      error: function (xhr, status, error) {

        console.error(
          "Error while retrieving messages:",
          xhr.responseText,
          "Status:",
          xhr.status,
          "Error:",
          error
        );
        reject(new Error("Failed to retrieve messages"));
      }
    });
  });
}

// $(document).ready(DisplayAllMessages);
