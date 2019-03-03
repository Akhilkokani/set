/**
 * Javascript related to SignIn and Signup only, nothing else.
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

(function() {

  // Sign In Modal related elements
  let signin_button = this.document.querySelector ( ".header-actions .signin-action-wrap" );
  let dont_have_account_link_in_signin_modal = this.document.querySelector ( ".signin-modal a.signin-modal-link" );
  let signin_modal_close_button = this.document.querySelector ( ".signin-modal button[title='Cancel']" );

  // Sign Up Modal related elements
  let signup_button = this.document.querySelector ( ".header-actions .signup-action-wrap" );
  let have_an_account_link_signup_modal = document.querySelector ( ".signup-modal a.signup-modal-link" );
  let signup_modal_close_button = this.document.querySelector ( ".signup-modal button[title='Cancel']" );

  // Opening Sign In Modal
  if ( signin_button ) {

    signin_button.onclick = function () {
      _open_signin_modal();
    };
  }

  // Opening Sign Up Modal, when clicked on "Don't have Account..."
  if ( dont_have_account_link_in_signin_modal ) {

    dont_have_account_link_in_signin_modal.onclick = function () {
      
      _open_signup_modal();
      _close_signin_modal();
    };
  }

  // Closing Sign In Modal
  if ( signin_modal_close_button ) {

    signin_modal_close_button.onclick = function() {
      _close_signin_modal();
    };
  }

  // Opening Sign Up Modal
  if ( signup_button ) {

    signup_button.onclick = function () {
      _open_signup_modal();
    };
  }

  // Opening Sign In Modal, when clicked on "Have an account..."
  if ( have_an_account_link_signup_modal ) {

    have_an_account_link_signup_modal.onclick = function () {

      _open_signin_modal();
      _close_signup_modal();
    };
  }

  // Closing Sign Up Modal
  if ( signup_modal_close_button ) {

    signup_modal_close_button.onclick = function () {
      _close_signup_modal();
    };
  }

  // Open's Sign in Modal
  function _open_signin_modal () {
    document.querySelector ( ".signin-modal-wrapper" ).style.display = "block";
  }

  // Closes Sign in Modal
  function _close_signin_modal () {
    document.querySelector ( ".signin-modal-wrapper" ).style.display = "none";
  }

  // Open's Sign Up Modal
  function _open_signup_modal () {
    document.querySelector ( ".signup-modal-wrapper" ).style.display = "block";
  }

  // Closes Sign Up Modal
  function _close_signup_modal () {
    document.querySelector ( ".signup-modal-wrapper" ).style.display = "none";
  }
})();

/** 
 * Sign In Modal Elements
 * 
 */
var signin_modal_elements = {

  // Username textbox
  username_textbox: $ ( ".signin-modal-wrapper input[name='uname']" ),
  
  // Password textbox
  password_textbox: $ ( ".signin-modal-wrapper input[name='pwd']" ),

  // Submit Button
  submit_button: $ ( ".signin-modal-wrapper input[name='submit']" )
};

signin_modal_elements.submit_button.click(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Username is empty
  if ( signin_modal_elements.username_textbox.val() === "" ) {
    set.show_system_notification ( "Username cannot be empty. Try again.", "danger", 2500 );
    return;
  }

  // Password is empty
  if ( signin_modal_elements.password_textbox.val() === "" ) {
    set.show_system_notification ( "Password cannot be empty. Try again.", "danger", 2500 );
    return;
  }

  $.ajax({
    cache: false,
    type: "POST",
    data: {
      action: "login",
      uname: signin_modal_elements.username_textbox.val(),
      pwd: signin_modal_elements.password_textbox.val()
    },
    url: "./ajax/system",

    success: function(data) {

      if ( data == "success" ) {
        document.querySelector("#after_signin_success_redirect").click();
        return;
      } else if ( data == "invalid_data" ) {
        set.show_system_notification ( "Username or Password is Incorrect. Try Again.", "danger", 3000 );
        return;
      } else {
        set.show_system_notification ( "We ran into an error. Try Again Later.", "danger" );
        return;
      }
    },

    error: function(data) {
      set.show_system_notification ( "Error: " + data, "danger" );
      return false;
    }
  });
});



/** 
 * Sign Up Elements
 * 
 */
var signup_modal_elements = {

  // Email Textbox
  email_textbox: $ ( ".signup-modal-wrapper input[name='email']" ),

  // Username Textbox
  username_textbox: $ ( ".signup-modal-wrapper input[name='uname']" ),

  // Password Textbox
  password_textbox: $ ( ".signup-modal-wrapper input[name='pwd']" ),

  // Submit button
  submit_button: $ ( ".signup-modal-wrapper input[name='submit']" ) 
};


signup_modal_elements.submit_button.click(function() {
  
  set.show_system_notification ( "Working...", "", -1 );

  // Removing any type of whitespace form username textbox value
  signup_modal_elements.username_textbox.val ( 
    "" + set.remove_whitespace (
          signup_modal_elements.username_textbox.val()
        )
  );

  // Removing any type of whitespace form email textbox value
  signup_modal_elements.email_textbox.val ( 
    "" + set.remove_whitespace (
          signup_modal_elements.email_textbox.val()
        )
  );

  // Fetching & Storing inputs
  let username = signup_modal_elements.username_textbox.val(),
      email = signup_modal_elements.email_textbox.val(),
      password = signup_modal_elements.password_textbox.val();

  // Email is empty
  if ( email === "" ) {
    set.show_system_notification ( "Email cannot be empty. Try again.", "danger", 2500 );
    return;
  }

  // Email is invalid
  if ( set.validate_email(email) === false ) {
    set.show_system_notification ( "Invalid Email ID. Try again.", "danger", 2500 );
    return;
  }

  // Username is empty
  if ( username === "" ) {
    set.show_system_notification ( "Username cannot be empty. Try again.", "danger", 2500 );
    return;
  }

  // Username is invalid
  if ( username.length < 6 ) {
    set.show_system_notification ( "Username must be atleast 6 letters. Try again.", "danger", 2500 );
    return;
  }

  // Password is invalid
  if ( password === "" ) {
    set.show_system_notification ( "Password cannot be empty. Try again.", "danger", 2500 );
    return;
  }

  // Password is invalid
  if ( password.length < 6 ) {
    set.show_system_notification ( "Password must be combination of atleast 6 letters or numbers. Try again.", "danger", 2500 );
    return;
  }

  // Sending request to add new user
  $.ajax({
    cache: false,
    type: "POST",
    url: "./ajax/system",
    data: {
      action: "signup",
      email: email,
      uname: username,
      pwd: password
    },
    success: function(data) {
      
      if ( data == "email_used" ) {
        set.show_system_notification ( "Email is already being used. Try Again.", "", 3000 );
        return;
      }
      else if ( data == "uname_used" ) {
        set.show_system_notification ( "Username is already being used. Try Again.", "", 3000 );
        return;
      }
      else if ( data == "success" ) {
        set.show_system_notification ( "Successfully Created Your Account!", "", 3500 );
        _close_signup_modal();
        _open_signin_modal();
        return;
      } else {
        alert(data);
        console.log(data);
        set.show_system_notification ( "We ran into an error. Try Again Later.", "danger" );
        return;
      }
    },

    error: function(data) {
      set.show_system_notification ( "Error: " + data, "danger" );
      return false;
    }
  });
});