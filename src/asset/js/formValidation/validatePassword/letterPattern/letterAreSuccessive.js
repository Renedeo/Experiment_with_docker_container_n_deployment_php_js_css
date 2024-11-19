import { hasSuiteOfLetter } from "./hasSuiteOfLetter.js";

/**
 * This function checks if a given string contains a series of successive letters.
 *
 * @param {string} string - The string to be checked.
 * @param {number} length - The minimum length of the series of successive letters.
 * @returns {boolean} - Returns true if the string contains a series of successive letters of the specified length, false otherwise.
 */
export function letterAreSuccessive(string, length) {
  if (string.length >= length) {
    if (length > 1) {
      for (let i = 0; i < length - 1; i++) {
        if (string.toLowerCase().charCodeAt(i + 1)
          - string.toLowerCase().charCodeAt(i) != 1) {
          console.log(i);
          return false;
        }
      }
      return true;
    }
    console.warn("This function awaits a series of successive letters");
    return false;
  }
  //   console.warn("String length should be equals to length parameter");
  console.warn("String length should be greater or equals than the length parameter");
  return false;
}

// console.log('testing function letterAreSuccessive')
// let testStrings = ['Hello World', 'Abc123', 'ABC123', 'abc123', 'Abc123Abc123', 'Abd123Abc123Abc123', 'Abc123Abc123Abc123Abc123']

// testStrings.forEach(string => {
//   patterns = hasSuiteOfLetter(string)[0]
//   console.log(`String: ${patterns.pattern}`)
//   console.log(`Are letters successive: ${
//     letterAreSuccessive(patterns.pattern, 
//       patterns.pattern_length)}`)
// })