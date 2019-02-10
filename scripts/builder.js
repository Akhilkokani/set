/**
 * builder.js
 *
 * JS library which helps to creats/modifies/removes DOM structure.
 * For ex: Creating signin modal DOM, Removing signup modal DOM, etc...
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package Builder
 * @version 1.0
**/


// Builder object
builder = function() {};

/**
 * Build's signin DOM structure
 *
 *
 * @package builder
 *
 * @param {object} [args]               - JSON Object
 * @param {function} [args.submit]      - SignIn button click event handler
 * @return DOM
**/
builder.prototype.build_signin_modal = function ( 
  args = {
    submit: function() { return; },
    signup_link: function() { return; }
  }
) {

  // SIGN IN MODAL STRUCTURE
  // <div class="signin-modal-wrapper modal-wrapper">
  //   <div class="signin-modal modal">
  //     <div class="signin-modal-body modal-body">
  //       <div class="modal-title">
  //         <h1>Sign In</h1>
  //       </div>
  //       <form method="POST">
  //         <div class="signin-ip-block">
  //           <label for="uname">
  //             Username
  //           </label>
  //           <input type="text" class="signin-ip" name="uname" placeholder="Username">
  //         </div>

  //         <div class="signin-ip-block">
  //           <label for="pwd">
  //             Password
  //           </label>
  //           <input type="password" class="signin-ip" name="pwd" placeholder="Password">
  //         </div>

  //         <a href="#" class="signin-modal-link" title="Sign Up">
  //           Don't have an account? Create One.
  //         </a>
          
  //         <div class="disp-flex" style="margin-top: 4em;">
  //           <input type="submit" value="Sign In" title="Sign In">
  //           <button type="button" style="width: 90px; margin-left: auto;" data-secondary title="Cancel">Cancel</button>
  //         </div>
  //       </form>
  //     </div>
  //   </div>
  // </div>

  // Cancel button
  var cancel_button = document.createElement("button");
  cancel_button.setAttribute("data-secondary", "");
  cancel_button.title = "Cancel";
  cancel_button.innerText = "Cancel";
  cancel_button.style.width = 90 + "px";
  cancel_button.style.marginLeft = "auto";
  cancel_button.onclick = function() {
    this.closest ( "div.signin-modal-wrapper" ).outerHTML = "";
    return 0;
  };

  // Submit button
  var submit_button = document.createElement("input");
  submit_button.type = "submit";
  submit_button.value = "Sign In";
  submit_button.title = "Sign In";
  submit_button.onclick = function ( e ) {
    e.preventDefault();
    args.submit();
  }

  // DIV node to hold submit and cancel button
  var div_disp_flex = document.createElement("div");
  div_disp_flex.style.marginTop = 4 + "em";
  div_disp_flex.classList.add ( "disp-flex" );
  div_disp_flex.appendChild ( submit_button );
  div_disp_flex.appendChild ( cancel_button );

  // Anchor node
  var a_signup_link = document.createElement ( "a" );
  a_signup_link.classList.add ( "signin-modal-link" );
  a_signup_link.title = "Sign Up";
  a_signup_link.href = "#";
  a_signup_link.innerText = "Don't have an account? Create One.";
  a_signup_link.onclick = function(e) {

    e.preventDefault();
    $("div.modals-wrapper").append (
      builder.build_signup_modal()
    );
    cancel_button.click();
  }

  /** PASSWORD IP BLOCK => */
  // Password input box
  var password_input = document.createElement("input");
  password_input.name = "pwd";
  password_input.type = "password";
  password_input.placeholder = "Password";
  password_input.classList.add ( "signin-ip" );

  // Password label node
  var password_label = document.createElement("label");
  password_label.for = "pwd";
  password_label.innerText = "Password";

  // DIV node to hold password input box and password label
  var password_ip_block = document.createElement("div");
  password_ip_block.classList.add ( "signin-ip-block" );
  password_ip_block.appendChild ( password_label );
  password_ip_block.appendChild ( password_input );
  /** <= PASSWORD IP BLOCK */

  /** USERNAME IP BLOCK => */
  // Username input box
  var username_input = document.createElement("input");
  username_input.name = "uname";
  username_input.type = "text";
  username_input.placeholder = "Username";
  username_input.classList.add ( "signin-ip" );

  // Autofocus on username input
  setTimeout(() => {
    username_input.focus();
  }, 1);

  // Username label node
  var username_label = document.createElement("label");
  username_label.for = "uname";
  username_label.innerText = "Username";

  // DIV node to hold username input box and username label
  var username_ip_block = document.createElement("div");
  username_ip_block.classList.add ( "signin-ip-block" );
  username_ip_block.appendChild ( username_label );
  username_ip_block.appendChild ( username_input );
  /** <= USERNAME IP BLOCK */

  // FORM node
  var signin_form = document.createElement("form");
  signin_form.method = "POST";
  signin_form.appendChild ( username_ip_block );
  signin_form.appendChild ( password_ip_block );
  signin_form.appendChild ( a_signup_link );
  signin_form.appendChild ( div_disp_flex );

  // H1 node
  var h1_modal_title = document.createElement("h1");
  h1_modal_title.innerText = "Sign In";

  // DIV node to hold modal title (H1)
  var modal_title = document.createElement("div");
  modal_title.classList.add ( "modal-title" );
  modal_title.appendChild ( h1_modal_title );

  // DIV node to modal title and modal form
  var signin_modal_body = document.createElement("div");
  signin_modal_body.className += "signin-modal-body modal-body";
  signin_modal_body.appendChild ( modal_title );
  signin_modal_body.appendChild ( signin_form );

  // DIV node to hold signin modal body
  var signin_modal = document.createElement("div");
  signin_modal.className += "signin-modal modal";
  signin_modal.appendChild ( signin_modal_body );

  // DIV node to hold signin modal
  var signin_modal_wrapper = document.createElement("div");
  signin_modal_wrapper.className += "signin-modal-wrapper modal-wrapper";
  signin_modal_wrapper.appendChild ( signin_modal );
  signin_modal_wrapper.style.display = "block";

  // Returning signin modal with wrapper
  return signin_modal_wrapper;
}



/**
 * Build's signup DOM structure
 *
 *
 * @package builder
 *
 * @param {JSON} [args]
 * @return DOM
**/
builder.prototype.build_signup_modal = function ( 
  args = {
    submit: function() { return 0; }
  }
) {

  // SIGNUP MODAL STRUCTURE
  // <div class="signup-modal-wrapper modal-wrapper" style="display: none;">
  //     <div class="signup-modal modal">
  //       <div class="signup-modal-body modal-body">
  //         <div class="modal-title">
  //           <h1>Sign Up</h1>
  //         </div>
  //         <form method="POST">
  //           <div class="signup-ip-block">
  //             <label for="uname">
  //               Email
  //             </label>
  //             <input type="email" class="signup-ip" name="email" placeholder="Email" autocomplete="off">
  //           </div>

  //           <div class="signup-ip-block">
  //             <label for="uname">
  //               Username
  //             </label>
  //             <input type="text" class="signup-ip" name="uname" placeholder="Username" autocomplete="off">
  //           </div>

  //           <div class="signin-ip-block">
  //             <label for="pwd">
  //               Password
  //             </label>
  //             <input type="password" class="signin-ip" name="pwd" placeholder="Password">
  //           </div>

  //           <a href="#" class="signup-modal-link" title="Sign In">
  //             Have an account? Sign In.
  //           </a>
            
  //           <div class="disp-flex" style="margin-top: 4em;">
  //             <input type="submit" value="Sign Up" title="Sign Up">
  //             <button type="button" style="width: 90px; margin-left: auto;" data-secondary title="Cancel">Cancel</button>
  //           </div>
  //         </form>
  //       </div>
  //     </div>
  //   </div>

  // Cancel button
  var cancel_button = document.createElement("button");
  cancel_button.setAttribute("data-secondary", "");
  cancel_button.title = "Cancel";
  cancel_button.innerText = "Cancel";
  cancel_button.style.width = 90 + "px";
  cancel_button.style.marginLeft = "auto";
  cancel_button.onclick = function() {
    this.closest ( "div.signup-modal-wrapper" ).outerHTML = "";
    return 0;
  };

  // Submit button
  var submit_button = document.createElement("input");
  submit_button.type = "submit";
  submit_button.value = "Sign Up";
  submit_button.title = "Sign Up";
  submit_button.onclick = function(e) {
    e.preventDefault();
    args.submit();
  }

  // DIV node to hold submit and cancel button
  var div_disp_flex = document.createElement("div");
  div_disp_flex.style.marginTop = 4 + "em";
  div_disp_flex.classList.add ( "disp-flex" );
  div_disp_flex.appendChild ( submit_button );
  div_disp_flex.appendChild ( cancel_button );

  // Anchor node
  var a_signin_link = document.createElement ( "a" );
  a_signin_link.classList.add ( "signup-modal-link" );
  a_signin_link.title = "Sign In";
  a_signin_link.href = "#";
  a_signin_link.innerText = "Have an Account? Sign In.";
  a_signin_link.onclick = function(e) {

    e.preventDefault();
    $("div.modals-wrapper").append (
      builder.build_signin_modal()
    );
    cancel_button.click();
  }

  /** PASSWORD IP BLOCK => */
  // Password input box
  var password_input = document.createElement("input");
  password_input.name = "pwd";
  password_input.type = "password";
  password_input.placeholder = "Password";
  password_input.classList.add ( "signin-up" );

  // Password label node
  var password_label = document.createElement("label");
  password_label.for = "pwd";
  password_label.innerText = "Password";

  // DIV node to hold password input box and password label
  var password_ip_block = document.createElement("div");
  password_ip_block.classList.add ( "signup-ip-block" );
  password_ip_block.appendChild ( password_label );
  password_ip_block.appendChild ( password_input );
  /** <= PASSWORD IP BLOCK */

  /** USERNAME IP BLOCK => */
  // Username input box
  var username_input = document.createElement("input");
  username_input.name = "uname";
  username_input.type = "text";
  username_input.placeholder = "Username";
  username_input.setAttribute("autocomplete", "off");
  username_input.classList.add ( "signup-ip" );

  // Username label node
  var username_label = document.createElement("label");
  username_label.for = "uname";
  username_label.innerText = "Username";

  // DIV node to hold username input box and username label
  var username_ip_block = document.createElement("div");
  username_ip_block.classList.add ( "signup-ip-block" );
  username_ip_block.appendChild ( username_label );
  username_ip_block.appendChild ( username_input );
  /** <= USERNAME IP BLOCK */

  /** EMAIL IP BLOCK => */
  // Email input box
  var email_input = document.createElement("input");
  email_input.name = "email";
  email_input.type = "text";
  email_input.placeholder = "Email";
  email_input.setAttribute("autocomplete", "off");
  email_input.classList.add ( "signup-ip" );

  // Autofocusing on email input
  setTimeout(() => {
    email_input.focus();
  }, 1);

  // Email label node
  var email_label = document.createElement("label");
  email_label.for = "email";
  email_label.innerText = "Email";

  // DIV node to hold email input box and username label
  var email_ip_block = document.createElement("div");
  email_ip_block.classList.add ( "signup-ip-block" );
  email_ip_block.appendChild ( email_label );
  email_ip_block.appendChild ( email_input );
  /** <= EMAIL IP BLOCK */

  // FORM node
  var signup_form = document.createElement("form");
  signup_form.method = "POST";
  signup_form.appendChild ( email_ip_block );
  signup_form.appendChild ( username_ip_block );
  signup_form.appendChild ( password_ip_block );
  signup_form.appendChild ( a_signin_link );
  signup_form.appendChild ( div_disp_flex );

  // H1 node
  var h1_modal_title = document.createElement("h1");
  h1_modal_title.innerText = "Sign Up";

  // DIV node to hold modal title (H1)
  var modal_title = document.createElement("div");
  modal_title.classList.add ( "modal-title" );
  modal_title.appendChild ( h1_modal_title );

  // DIV node to modal title and modal form
  var signup_modal_body = document.createElement("div");
  signup_modal_body.className += "signup-modal-body modal-body";
  signup_modal_body.appendChild ( modal_title );
  signup_modal_body.appendChild ( signup_form );

  // DIV node to hold signup modal body
  var signup_modal = document.createElement("div");
  signup_modal.className += "signin-modal modal";
  signup_modal.appendChild ( signup_modal_body );

  // DIV node to hold signup modal
  var signup_modal_wrapper = document.createElement("div");
  signup_modal_wrapper.className += "signup-modal-wrapper modal-wrapper";
  signup_modal_wrapper.appendChild ( signup_modal );
  signup_modal_wrapper.style.display = "block";

  // Returning signup modal with wrapper
  return signup_modal_wrapper;
}



/**
 * Creates and shows notification to user with specified message.
 *
 *
 * @package Builder
 *
 * @param {string} [text]
 * @param {int} [close_after]
 * @return void
**/
builder.prototype.build_notification = function (
  text = "Unknown Error. Trying to resolve...", 
  close_after = 3500 
) {

  // Inside this noitification will be added
  this.notification_modal_wrapper = ".notification-modal-wrapper";

  // P Node to holder notification text
  var p_loading_text = document.createElement("p");
  p_loading_text.innerText = text;

  // DIV Node to hold notification text
  var div_notification_text = document.createElement("div");
  div_notification_text.classList.add("notification-text");
  div_notification_text.appendChild (
    p_loading_text
  );

  // DIV Node to hold notification modal
  var div_notification_modal = document.createElement("div");
  div_notification_modal.classList.add ( "notification-modal" );
  div_notification_modal.appendChild (
    div_notification_text
  );

  // Notification modal wrapper does not exist in the document body
  if ( !document.body.contains ( document.querySelector(notification_modal_wrapper) ) ) {

    // Creating notification modal wrapper and appending to document body
    var div_notifcation_modal_wrapper = document.createElement("div");
    div_notifcation_modal_wrapper.classList.add ( "notification-modal-wrapper" );
    document.body.appendChild ( 
      div_notifcation_modal_wrapper
    );
  }

  // Removing notificaiton modal after specified time
  setTimeout(() => {
    div_notification_modal.outerHTML = "";
  }, close_after + 0);

  // Appending notification modal
  document.querySelector(notification_modal_wrapper).appendChild (
    div_notification_modal
  );
}

// Assigning a global object to window property
window.builder = new builder;