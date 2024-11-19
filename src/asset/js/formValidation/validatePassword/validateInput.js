// Script to validate the form


/**
 * Validates if the given password meets the required criteria.
 *
 * @param {string} $password - The password string to be validated.
 * @returns {boolean} - Returns true if the password is at least 8 characters long,
 * contains at least one digit, one lowercase letter, and one uppercase letter.
 */
function validatePassword($password) {
  return (
    $password.length >= 8 &&
    /\d/.test($password) &&
    /[a-z]/.test($password) &&
    /[A-Z]/.test($password)
  );
}


function validateUsername($username) {
  return /^[a-zA-Z0-9]+$/.test($username) && $username.length >= 4;
}

export { validatePassword, validateUsername }
