import appConfig from "../../config/app.config.js";

/**
 * Authenticates a user with the provided username and password.
 *
 * @param {string} username - The username of the user attempting to authenticate.
 * @param {string} password - The password of the user attempting to authenticate.
 * @returns {Promise<Object>} A promise that resolves with the server response if authentication is successful,
 *                            or rejects with an error if authentication fails.
 */
export async function authenticateUser(username, password) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: appConfig.ajax.url.baseURL + appConfig.ajax.url.loginUser,
        type: "POST",
        data: {
          username: username,
          password: password,
        },
        dataType: "json", 
        success: function (response) {
          resolve(response);
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText)
          reject(new Error("Failed to authenticate user"));
        },
      });
    });
  }
  