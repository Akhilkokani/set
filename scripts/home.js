/**
 * Javascript related to homepage only.
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

window.onload = function() {

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

};

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