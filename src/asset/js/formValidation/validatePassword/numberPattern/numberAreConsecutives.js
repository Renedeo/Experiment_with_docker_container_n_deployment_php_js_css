/**
 * Checks if the string are a series of consecutive number
 * @param {string} $string String to test
 * @param {number} $length length of the $string parameter
 */
export function numberAreConsecutives($string, $length, ) {
    if ($string.length >= $length) {
        if ($length > 1) {
            for (let i = 0; i < $length - 1; i++) {
                try {
                    if (parseInt($string.at(i + 1)) - parseInt($string.at(i)) != 1) {
                        return false;
                    }
                } catch (error) {
                    console.error("Error while parsing character to int:", error);
                    return false;
                }
            }
            return true;
        }
        console.warn("This functions awaits a series of consecutive numbers");
        return false;
    }
    //   console.warn("String length should be equals to length parameter");
    console.warn("String length should be greater or equals than the length parameter");
    return false;
}
// test function
// console.log("Testing function numberAreConsecutives");
// console.log("# .");
// console.log(numberAreConsecutives("12345", 5)); // true

// console.log("## .");
// console.log(numberAreConsecutives("123456", 5)); // false

// console.log("### .");
// console.log(numberAreConsecutives("abcde", 5)); // false

// console.log("#### .");
// console.log(numberAreConsecutives("abcde", 3)); // false

// console.log("##### .");
// console.log(numberAreConsecutives("abcde", 4)); // true

// console.log("###### .");
// console.log(numberAreConsecutives("abcde", 4)); // true

