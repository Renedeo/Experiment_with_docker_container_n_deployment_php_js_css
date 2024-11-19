/**
 * @param {string} tag - HTML tag
 * @param {string} content - Message content
 * @param {string} className - Tag class name
 * @returns {jQuery} - jQuery object
 */
export function message_container(tag, content, className) {
    return $("<" + tag + ">", {
      class: className,
      text: content
    });
  }
  