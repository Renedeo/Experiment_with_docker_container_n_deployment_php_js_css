import { hasSuiteOfLetter } from "./hasSuiteOfLetter";
import { letterAreSuccessive } from "./letterAreSuccessive";

/**
 * Analyzes a string to identify patterns of successive letters.
 * 
 * @param {string} string - The input string to be analyzed for successive letter patterns.
 * @returns {Array|number} An array of objects representing patterns of successive letters if found, 
 *                         or -1 if no such patterns exist.
 */
function hasCommonPatternSuccessiveLetters(string) {
  const consecutivesLetters = hasSuiteOfLetter(string);
  let consecutivesLettersPattern = [];
  if (consecutivesLetters.length > 0) {

    for (let element of consecutivesLetters) {

      if (letterAreSuccessive(element.pattern, element.pattern_length)) {
        // console.log("The string contains successive letters patterns: " + element.pattern);
        consecutivesLettersPattern.push(element);
        continue;
      }
    }

    if (consecutivesLettersPattern.length > 0) {
      return consecutivesLettersPattern;
    }
    return -1;
  }
  return -1;
}


// console.log("testing function hasCommonPatternSuccessiveLetters");
// let testStrings = ['Hello World', 'Abc123', 'ABC123', 'abc123', 'Abc123Abc123', 'Abd123Abc123Abc123', 'Abc123Abc123Abc123Abc123'];
// testStrings.forEach(string => {
//   console.log("Testing string: " + string);
//   console.log(hasCommonPatternSuccessiveLetters(string));
// });
