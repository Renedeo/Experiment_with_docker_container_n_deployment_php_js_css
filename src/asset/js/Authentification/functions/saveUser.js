import appConfig from "../../config/app.config.js";

/**
 * Saves user data by sending a POST request to the server.
 *
 * @param {Object} data - The user data to be saved. This should be an object containing the necessary user information.
 * @returns {Promise<Object>} A promise that resolves with the server's response if the request is successful, or rejects with an error if the request fails.
 */
export async function saveUser(data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: appConfig.ajax.url.baseURL + appConfig.ajax.url.registerUser,
            data: data,
            dataType: "json",
            success: function (response) {
                resolve(response);
            },
            error: function (xhr, status, error) {
                console.warn(xhr.responseText);
                reject(new Error("Failed to save user. Error: "));
            }
        });
    });
}
