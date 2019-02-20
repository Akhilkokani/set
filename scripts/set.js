/**
 * Front-end library for Startup Ecosystem Tracker.
 * Helps in validating user data, displaying custom information to user and much more.
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

// SET Object
var set = function () {};

/**
 * Displays a system notification on screen.
 *
 *
 * @package SET
 *
 * @param {string}  [notification_message]
 * @param {string}  [notification_type]
 * @param {integer}     [notification_display_limit]
 * @return void
 */
set.prototype.show_system_notification = function (
  notification_message = "Error: No Message Was Passed.",
  notification_type = "default",
  notification_display_limit = -1
) {
  
  // Notification Wrapper
  // Notification Box
  // Notification Message Container
  let system_notification_wrap = document.querySelector ( ".system-notification-wrap" );
  let system_notification = document.querySelector ( ".system-notification-wrap > .system-notification" );
  let system_notification_span = document.querySelector ( ".system-notification-wrap > .system-notification span" );

  // Notification Wrapper not present in DOM Tree
  if ( !system_notification_wrap ) {
    console.log ( 'System Notification DOM Node could not be found. Try Again.' );
    return;
  }

  // Notification Box not present in DOM Tree
  if ( !system_notification ) {
    console.log ( 'System Notification Box DOM Node could not be found. Try Again.' );
    return;
  }

  // Notification Message Container not present in DOM Tree
  if ( !system_notification_span ) {
    console.log ( 'System Notification Message Container DOM Node could not be found. Try Again.' );
    return;
  }

  // Adding message to message container
  // Removing .danger CSS class if already exists
  system_notification_span.innerHTML = notification_message;
  system_notification.classList.remove("danger");

  // Notification type is set to danger
  if ( notification_type.toLowerCase() === "danger" ) {
    system_notification.classList += " danger";
  }

  // Custom display limit was set
  if ( notification_display_limit !== -1 ) {

    // Auto hiding notification after specified time
    setTimeout(() => {
      system_notification_span.innerHTML = "";
      system_notification_wrap.style.display = "none";
    }, notification_display_limit);
  }

  // Showing message to user
  system_notification_wrap.style.display = "block";
}



/**
 * Hides system notification from screen, and clears its contents.
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */
set.prototype.hide_system_notification = function () {

  // Notification Wrapper
  // Notification Message Container
  let system_notification_wrap = document.querySelector ( ".system-notification-wrap" );
  let system_notification_span = document.querySelector ( ".system-notification-wrap > .system-notification span" );

  // Notification Wrapper not present in DOM Tree
  if ( !system_notification_wrap ) {
    console.log ( 'System Notification DOM Node could not be found. Try Again.' );
    return;
  }

  // Notification Message Container not present in DOM Tree
  if ( !system_notification_span ) {
    console.log ( 'System Notification Message Container DOM Node could not be found. Try Again.' );
    return;
  }

  // Clearing message contents
  // & Hiding system notification
  system_notification_span.innerHTML = "";
  system_notification_wrap.style.display = "none";
}



/**
 * Removes all kinds all spaces from given string.
 *
 *
 * @package SET
 *
 * @param {string} [text]
 * @return string
 */
set.prototype.remove_whitespace = function ( text ) {
  return text.replace ( /\s/g, '' );
}



 /**
  * Validates Email ID.
  *
  *
  * @package SET
  *
  * @param {string} [email]
  * @return boolean
  */
set.prototype.validate_email = function ( email ) {

  let emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return emailRegEx.test ( email.toLowerCase() );
}



/**
 * Validates Link
 *
 *
 * @package SET
 *
 * @param {string} [link]
 * @return boolean
 */
set.prototype.validate_link = function ( link ) {

  var urlRegEx = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
  return urlRegEx.test(link);
}



/**
 * Checks for File Extension
 *
 *
 * @package SET
 *
 * @param {string} [file_name]
 * @param {string} [file_allowed_type]
 * @return boolean
 */
set.prototype.check_file_extension = function (
  file_name = "", 
  file_allowed_type = ""
) {

  // Finding file extension and making it lowercase
  file_extension = file_name.split('.').pop().toLowerCase();

  // Checking which file extensions to match Image or PDF
  // If to match with image
  if( file_allowed_type == 'image' ||  file_allowed_type == 'img') {
    fileAllowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  }
  // If to match with .pdf
  else if ( file_allowed_type == 'pdf') {
    fileAllowedExtensions = ['pdf'];
  }

  // Finding number of extensions
  length = fileAllowedExtensions.length;

  // Checking file extension
  for (i = 0; i < length; i++) {

    // Extension found
    if (file_extension == fileAllowedExtensions[i]) {
      return(true);
    }
  }

  // Extension not found
  return(false);
};

// Adding Global Object to Window
window.set = new set;