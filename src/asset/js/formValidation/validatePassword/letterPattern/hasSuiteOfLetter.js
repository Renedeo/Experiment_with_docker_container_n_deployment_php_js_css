/**
 * Identifies sequences of three or more consecutive letters in a given string.
 *
 * @param {string} string - The string to be analyzed for sequences of letters.
 * @returns {Array<Object>} An array of objects, each containing the index, length, and pattern of the identified sequences.
 */
export function hasSuiteOfLetter(string) {
  let regex = /([a-z|A-Z]{3,})/g;
  let match;
  let patterns = [];
  while ((match = regex.exec(string)) !== null) {
    patterns.push({
      index: match.index,
      pattern_length: match[0].length,
      pattern: match[0]
    });
  };
  return patterns;
}


// console.log('testing function hasSuiteOfLetter')

// let testStrings = ['Hello World', 'Abc123', 'ABC123', 'abc123', 'Abc123Abc123', 'Abd123Abc123Abc123', 'Abc123Abc123Abc123Abc123']

// testStrings.forEach(string => {
//   console.log(`String: ${string}`)
//   console.log(`Has suite of letters: ${hasSuiteOfLetter(string).length > 0}`)
// })
