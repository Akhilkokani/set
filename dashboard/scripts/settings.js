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
  
  // Change Profile Picture Button
  change_profile_picture: document.querySelector ( "#change_profile_picture" ),

  // Change Profile Picture File Selector input[type=file]
  change_profile_picture_file_selector: document.querySelector ( "#edit_profile_picture_file_selector" ),

  // Name
  name: $("#edit_name"),

  // Email
  email: $("#edit_email"),

  // Username
  username: $("#edit_username"),

  // Password
  password: $("#edit_password"),

  // Description
  description: $("#edit_description"),

  // Bio Textarea
  bio: $ ( "#edit_bio" ),

  // Website/App Link
  link: $ ( "#edit_link" ),

  // LinkedIn URL
  linkedin: $ ( "#edit_lkdin" ),

  // Twitter URL
  twitter: $ ( "#edit_titter" ),

  // Facebook URL
  facebook: $ ( "#edit_fb" ),

  // Instagram URL
  instagram: $ ( "#edit_ig" )
};


/** 
 * Update Profile Picture
 * 
 */
elements.change_profile_picture.onclick = function() {

  // Opens file explorer
  elements.change_profile_picture_file_selector.click();
}
// When profile picture is selected
elements.change_profile_picture_file_selector.oninput = function() {

  // Telling user to wait
  set.show_system_notification ( "Please Wait...", "", -1 );

  // Image is not selected
  if ( elements.change_profile_picture_file_selector.value.length <= 0 ) {
    return;
  }

  // Accessing updated profile picture details
  updated_profile_picture = elements.change_profile_picture_file_selector.files[0];

  // Checking file extension
  // If file is not type of specified images
  // then it is rejected and uploading process is cancelled
  if ( set.check_file_extension(updated_profile_picture.name, 'img') !== true ) {
    set.show_system_notification ( "Incorrect file selected. Try Again.", "", 2000 );
    return;
  }

  // Creating request
  // Code for modern browsers
  if(window.XMLHttpRequest) {
    ajax = new XMLHttpRequest();
  }
  // Code for old IE browsers
  else {
    ajax = new ActiveXObject("Microsoft.XMLHTTP");
  }

  // When profile picture is uploaded successfully
  ajax.addEventListener("load", function(event) {

    // Telling user to wait
    set.show_system_notification ( "Please wait...", "", -1 );

    // Thumbnail selected is too big
    if ( event.currentTarget.responseText == "too-big" ) {
      set.show_system_notification ( "Profile Picture size is too big. Cannot be more than 3MB. Try Again.", "", 3000 );
      return;
    }
    // Unknown Error occurred
    else if ( event.currentTarget.responseText == "unknown" ) {
      set.show_system_notification ( "Error Ocurred. Try again.", "", 2000 );
      return;
    }
    // Success, responded with upload image name
    else if ( event.currentTarget.responseText.length > 20 ) {
      set.show_system_notification ( "Success!", "", 2500 );
      $ ( ".edit-profile-pic > img" ).attr ( "src", "../../files/profile_pictures/" + event.currentTarget.responseText );
    }
    // Unknown error, server error
    else {
      set.show_system_notification ( "Unknown Error. Try Again.", "", 2500 );
      return;
    }
  }, false);

  // While profie picture is uploading
  ajax.upload.addEventListener("progress", function() {
    set.show_system_notification ( "Uploading...", "", -1 );
  }, false);

  // Setting
  // request type and request URL
  ajax.open ( "POST", "../../" + "ajax/system" );

  // Accessing file and
  // adding it to form data
  var file = new FormData();
  file.append ( "update-profile-picture", updated_profile_picture );

  // Sending request to server to upload file
  ajax.send ( file );
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
 * Update Decription
 * 
 */
elements.description.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Storing updated bio and trimming spaces
  let updated_description = elements.description.val().trim();

  // Too large bio
  if ( updated_description.length > 200 ) {
    set.show_system_notification("Profile Description cannot contain more than 200 characters. Try Again.", "danger", 3000);
    return;
  }

  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-description",
      description: updated_description,
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


/** 
 * Update Link
 * 
 */
elements.link.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Removing any type of whitespace from link textbox value
  elements.link.val ( 
    "" + set.remove_whitespace (
          elements.link.val()
        )
  );

  // Fetching and Storing Updated Link Value
  let updated_link = elements.link.val();

  // Link is not empty and
  // Invalid Link Provided
  if ( 
    updated_link.length != 0 && 
    set.validate_link(updated_link) === false
  ) {
    set.show_system_notification ( "Invalid Link Provided. Try Again.", "danger", 2500 );
    return;
  }

  // Sending request to update link
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-link",
      link: updated_link
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
 * Update LinkedIn Username
 * 
 */
elements.linkedin.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Removing any type of whitespace from linkedin textbox value
  elements.linkedin.val ( 
    "" + set.remove_whitespace (
          elements.linkedin.val()
        )
  );

  // Fetching and Storing Updated Linkedin Value
  let updated_linkedin = elements.linkedin.val();

  // Sending request to update linkedin
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-linkedin",
      link: updated_linkedin
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
 * Update Twitter Username
 * 
 */
elements.twitter.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Removing any type of whitespace from twitter textbox value
  elements.twitter.val ( 
    "" + set.remove_whitespace (
          elements.twitter.val()
        )
  );

  // Fetching and Storing Updated Twitter Value
  let updated_twitter = elements.twitter.val();

  // Sending request to update twitter
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-twitter",
      link: updated_twitter
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
 * Update Facebook Username
 * 
 */
elements.facebook.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Removing any type of whitespace from facebook textbox value
  elements.facebook.val ( 
    "" + set.remove_whitespace (
          elements.facebook.val()
        )
  );

  // Fetching and Storing Updated Facebook Value
  let updated_facebook = elements.facebook.val();

  // Sending request to update facebook
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-facebook",
      link: updated_facebook
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
 * Update Instagram Username
 * 
 */
elements.instagram.change(function() {

  set.show_system_notification ( "Working...", "", -1 );

  // Removing any type of whitespace from Instagram textbox value
  elements.instagram.val ( 
    "" + set.remove_whitespace (
          elements.instagram.val()
        )
  );

  // Fetching and Storing Updated Instagram Value
  let updated_instagram = elements.instagram.val();

  // Sending request to update facebook
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "update-instagram",
      link: updated_instagram
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