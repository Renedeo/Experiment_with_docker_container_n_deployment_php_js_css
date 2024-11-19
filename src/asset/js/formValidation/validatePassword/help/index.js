/**
 * Updates the CSS color of the specified element based on a condition.
 *
 * @param {string} element_class - The class of the element to update.
 * @param {boolean} cond - The condition to evaluate for color selection.
 * @param {string} color_true - The color to apply if the condition is true.
 * @param {string} color_false - The color to apply if the condition is false.
 */
function passwordHelper(element_class, cond, color_true, color_false) {
    $(element_class).css({
        color: cond ? color_true : color_false
    })
}


/**
 * Checks if the password length is greater than 8 characters and updates the CSS color of the specified element.
 * 
 * @function
 * @returns {void}
 */
function passwordLengthCheck() {
    passwordHelper(
        ".help-car",
        $("#register-password").val().length > 8,
        "green",
        "red"
    )
}


/**
 * Checks if the password contains at least one numeric digit and updates the CSS color of the specified element.
 *
 * @function
 * @returns {void}
 */
function passwordContainsNumber() {
    passwordHelper(
        ".help-number",
        /\d/.test($("#register-password").val()),
        "green",
        "red"
    )
}


/**
 * Checks if the password contains at least one uppercase letter and updates the CSS color of the specified element.
 *
 * @function
 * @returns {void}
 */
function passwordContainsUppercase() {
    passwordHelper(
        ".help-upper",
        /[A-Z]/.test($("#register-password").val()),
        "green",
        "red"
    )
}


/**
 * Checks if the password contains at least one lowercase letter and updates the CSS color of the specified element.
 *
 * @function
 * @returns {void}
 */
function passwordContainsLowercase() {
    passwordHelper(
        ".help-lower",
        /[a-z]/.test($("#register-password").val()),
        "green",
        "red"
    )
}


/**
 * Checks if the password contains at least one special character and updates the CSS color of the specified element.
 *
 * @function
 * @returns {void}
 */
function passwordContainsSpecialCharacter() {
    passwordHelper(
        ".help-special",
        /[!@#$%^&*(),.?":{}|<>]/.test($("#register-password").val()),
        "green",
        "red"
    )
}


[passwordContainsLowercase,
    passwordContainsUppercase,
    passwordContainsNumber,
    passwordContainsSpecialCharacter,
    passwordLengthCheck].forEach(function (element) {
        document.getElementById('register-password').addEventListener(
            'input',
            element,
            false)
    })