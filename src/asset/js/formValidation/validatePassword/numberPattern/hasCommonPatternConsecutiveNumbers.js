import { hasSuiteOfNumbers } from "./hasSuiteOfNumbers.js";
import { numberAreConsecutives } from "./numberAreConsecutives.js";

/**
 * This function check if the string contains 
 * consecutive numbers pattern(s)
 * 
 * @param {string} string string to test
 * @returns {object|number} return the pattern(s) or -1 if no pattern found
 */
function hasCommonPatternConsecutiveNumbers(string) {
    const consecutivesNumbers = hasSuiteOfNumbers(string);
    let consecutiveNumbersPattern = [];
    if (consecutivesNumbers.length > 0) {

        for (let element of consecutivesNumbers) {
        
            if (numberAreConsecutives(element.pattern, element.pattern_length)) {
                console.log("The string contains consecutive numbers with the same pattern: " + element.pattern);
                consecutiveNumbersPattern.push(element); 
                continue
            }
        }
        
        if (consecutiveNumbersPattern.length > 0) {
            return consecutiveNumbersPattern;
        }
        return -1;
    }
    return -1;
}

// console.log("test function hasCommonPatternConsecutiveNumbers");
// console.log(hasCommonPatternConsecutiveNumbers("password123"));
