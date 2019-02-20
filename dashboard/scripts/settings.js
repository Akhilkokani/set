/**
 * Javascript related to Settings Dashboard Tab only
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

var elements = {

  // Name
  name: $("#edit_name"),

  // Email
  email: $("#edit_email"),

  // Username
  username: $("#edit_username"),

  // Password
  password: $("#edit_password"),

  // Bio Textarea
  bio: $ ( "#edit_bio" )
};


/** 
 * Update User's Name
 * 
 */
elements.name.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Removing whitespace (if any) from both sides of string
  let updated_name = elements.name.val().trim();

  // Name was left empty
  if ( 
    updated_name == "" ||
    updated_name.length === 0 ||
    updated_name == null
  ) {
    set.show_system_notification("Name cannot be empty. Try Again.", "danger", 2500);
    return;
  }

  // Sending request to update name
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-name",
      name: updated_name,
    },
    success: function(data) {
      
      if ( data == "success" ) {
        set.show_system_notification("Success!", "", 2500);
        return;
      }
      else {
        set.show_system_notification("ERROR: Unknown. Try Again.", "", 2500);
        return;
      }
    }
  });

});


/** 
 * Update Email ID
 * 
 */
elements.email.change(function() {
  
  set.show_system_notification ( "Working...", "", -1 );

  // Fetching and Storing email input
  let email = elements.email.val();

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

  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-email",
      email: email,
    },
    success: function(data) {
      
      if ( data == "success" ) {
        set.show_system_notification("Success!", "", 2500);
        return;
      }
      else if ( data == "email-used" ) {
        set.show_system_notification("Email is already taken. Try Again.", "", 2500);
        return;
      }
      else {
        set.show_system_notification("ERROR: Unknown. Try Again.", "", 2500);
        return;
      }
    }
  });
});


/** 
 * Update Username
 * 
 */
elements.username.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Removing any type of whitespace from username textbox value
  elements.username.val ( 
    "" + set.remove_whitespace (
          elements.username.val()
        )
  );

  // Fetching username value
  let updated_username = elements.username.val();

  // Username is empty
  if ( updated_username === "" ) {
    set.show_system_notification ( "Username cannot be empty. Try again.", "danger", 2500 );
    return;
  }

  // Username is invalid
  if ( updated_username.length < 6 ) {
    set.show_system_notification ( "Username must be atleast 6 letters. Try again.", "danger", 2500 );
    return;
  }

  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-username",
      username: updated_username,
    },
    success: function(data) {
      
      if ( data == "success" ) {
        set.show_system_notification("Success!", "", 2500);
        return;
      }
      else if ( data == "uname-used" ) {
        set.show_system_notification("Username <b>" + updated_username + "</b> is not available. Try Again.", "", 2500);
        return;
      }
      else {
        set.show_system_notification("ERROR: Unknown. Try Again.", "", 2500);
        return;
      }
    }
  });
});


/** 
 * Update Password
 * 
 */
elements.password.click(function() {

  // Fetching username value
  let current_password = prompt ( "Current Password: ", "" ) + "";

  // Current Password was submitted empty
  if ( current_password === "" || current_password === null || current_password === undefined ) {
    set.show_system_notification("Current Password is invalid. Try Again.", "danger", 2500);
    return;
  }

  set.show_system_notification("Working...", "", 2500);

  // Checking if current password matches with password in DB
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "check-current-pwd",
      current_password: current_password,
    },
    success: function(data) {

      if ( data == "success" ) {

        // Asking user updated password
        let updated_password = prompt("New Password: ", "") || null;

        // Updated password is left empty
        if ( updated_password === "" || updated_password === null ) {
          set.show_system_notification ( "Password is invalid. Try again.", "danger", 2500 );
          return;
        }

        // Password is less than 6 charachters
        if ( updated_password.length < 6 ) {
          set.show_system_notification ( "Password must be combination of atleast 6 letters or numbers. Try again.", "danger", 2500 );
          return;
        }

        // Asking user to confirm updated password
        let confirm_updated_password = prompt("Confirm Password: ", "") || null;

        // Confirmation password did not match against updated password
        if ( 
          confirm_updated_password === "" || 
          confirm_updated_password.length < 6 ||
          confirm_updated_password !== updated_password
        ) {
          set.show_system_notification ( "Passwords did not match. Try again.", "danger", 2500 );
          return;
        }

        // Passwords matched, sending request to update password
        $.ajax({
          cache: false,
          type: "POST",
          url: "../../ajax/system",
          data: {
            action: "update-pwd",
            updated_password: updated_password,
          },
          success: function(data) {
            
            if ( data == "success" ) {
              set.show_system_notification("Success!", "", 2500);
              return;
            }
            else {
              set.show_system_notification("ERROR: Unknown. Try Again.", "", 2500);
              return;
            }
          }
        });
        return;
      }
      else if ( data == "no_match" ) {
        set.show_system_notification("Password did not match. Try Again.", "danger", 2500);
        return;
      }
      else {
        set.show_system_notification("ERROR: Unknown. Try Again.", "", 2500);
        return;
      }
    }
  });
});


/** 
 * Update Bio
 * 
 */
elements.bio.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Storing updated bio and trimming spaces
  let updated_bio = elements.bio.val().trim();

  // Too large bio
  if ( updated_bio.length > 5000 ) {
    set.show_system_notification("Bio cannot contain more than 5000 characters. Try Again.", "danger", 3000);
    return;
  }

  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-bio",
      bio: updated_bio,
    },
    success: function(data) {
      
      if ( data == "success" ) {
        set.show_system_notification("Success!", "", 2500);
        return;
      }
      else {
        set.show_system_notification("ERROR: Unknown. Try Again.", "", 2500);
        return;
      }
    }
  });
});