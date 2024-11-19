/**
 * This function check if the specified string 
 * contains a suite of numbers
 * @param {string} $string string to test
 * @returns {object} pattern result object
 */
export function hasSuiteOfNumbers(string) {
    let regex = /(\d{3,})/g;
    let match;
    let patterns = [];
    while ((match = regex.exec(string)) !== null) {
        patterns.push({
            index: match.index,
            pattern_length: match[0].length,
            pattern: match[0]
        })
    };
    return patterns;
}

// Test function
// console.log("test function hasSuiteOfNumbers");
// console.log(hasSuiteOfNumbers("145 12345")); // { success: true, index: 4, pattern: '12345', length: 5 }
