/**
 * Javascript related to adding new incubation center only
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

let incubation = {

  // Options with respect to incubation dashboard page
  options: {

    // To indicate after uploading profile picture which <img> tag src has to be modified
    // values can be "add-incubation-center-modal" or "edit-profile"
    uploading_profile_picture_through: null
  },

  // Open "Add Incubation Center" Modal Button
  open_add_incubation_center_modal_btn: $ ( "#add_incubation_center_btn" ),

  // Add Incubation Center Modal Wrap
  incubation_center_modal_wrap: $ ( ".add-incubation-center-modal-wrap" ),

  // Add "Incubation Center" Modal Close Button
  close_incubation_center_modal_btn: $ ( "#add_incubation_center_modal_close" ),

  // General Information Phase
  phase_general_info: $ ( "#phase_gen_info" ),

  // IC Name Textbox
  ic_name: document.querySelector ( "#ic-name" ),

  // IC Email Textbox
  ic_email: document.querySelector ( "#ic-email" ),

  // Custom Profile Picture
  custom_profile_picture_btn: document.querySelector ( "#custom_profile_picture" ),

  // IC Description Textbox
  ic_desc: document.querySelector ( "#ic-desc" ),

  // IC Story Textbox
  ic_story: document.querySelector ( "#ic-story" ),

  // IC Link Textbox
  ic_link: document.querySelector ( "#ic-link" ),

  // IC Reg. No. Textbox
  ic_reg_no: document.querySelector ( "#ic-reg-no" ),

  // Next button inside General Info. Phase
  next_btn_inside_general_info_phase: $ ( "#phase_gen_info .next-prev-phase-action-wrap button" ),
  
  // Address and Contact Phase
  phase_address_and_contact: $ ( "#phase_addr_cnct_info" ),

  // IC State
  ic_state: document.querySelector ( "#ic-state" ),

  // IC City
  ic_city: document.querySelector ( "#ic-city" ),

  // IC Pincode
  ic_pincode: document.querySelector ( "#ic-pcode" ),

  // IC Address
  ic_address: document.querySelector ( "#ic-addr" ),

  // IC Contact number
  ic_contact_number: document.querySelector ( "#ic-cnct-num" ),

  // Previous button inside Address and Contact Phase
  previous_btn_inside_phase_address_and_contact: $( "#phase_addr_cnct_info .previous-phase-action-wrap button" ),

  // Next button inside Address and Contact Phase
  next_btn_inside_phase_address_and_contact: $ ( "#phase_addr_cnct_info .next-phase-action-wrap button" ),

  // Social Links Phase
  phase_social_links: $ ( "#phase_social_links" ),

  // LinkedIn
  ic_linkedin: document.querySelector ( "#ic-lkdin" ),

  // Twitter
  ic_twitter: document.querySelector ( "#ic-twtr" ),
  
  // Facebook
  ic_facebook: document.querySelector ( "#ic-fb" ),

  // Instagram
  ic_instagram: document.querySelector ( "#ic-gram" ),

  // Previous button inside Social Links Phase
  previous_btn_inside_phase_social_links: $ ( "#phase_social_links .previous-phase-action-wrap > button" ),

  // Validate and Finish button inside Social Links Phase
  validate_and_finish_btn_inside_phase_social_links: $ ( "#phase_social_links .next-phase-action-wrap button" ),

  // Profile Picture file explorer
  profile_picture_file_selector: document.querySelector ( "#edit_profile_picture_file_selector" ),

  /** 
   * All input elements inside edit profile section
   * 
   */
  // Change profile picture
  change_profile_picture: document.querySelector ( "#change_startup_profile_picture" ),

  // Name
  edit_name: document.querySelector ( "#edit_ic_name" ),

  // Email
  edit_email: document.querySelector ( "#edit_ic_email" ),

  // Description
  edit_desc: document.querySelector ( "#edit_ic_desc" ),

  // Story
  edit_story: document.querySelector ( "#edit_ic_stry" ),

  // Link
  edit_link: document.querySelector ( "#edit_ic_link" ),

  // Registration Number
  edit_reg_no: document.querySelector ( "#edit_ic_reg_no" ),

  // State
  edit_state: document.querySelector ( "#edit_ic_state" ),

  // City
  edit_city: document.querySelector ( "#edit_ic_city" ),

  // Pincode
  edit_pincode: document.querySelector ( "#edit_ic_pcode" ),

  // Address
  edit_address: document.querySelector ( "#edit_ic_addr" ),

  // Contact Number
  edit_contact_num: document.querySelector ( "#edit_cnct_num" ),

  // LinkedIn
  edit_linkedin: document.querySelector ( "#edit_ic_lkdin" ),

  // Twitter
  edit_twitter: document.querySelector ( "#edit_ic_titter" ),

  // Facebook
  edit_facebook: document.querySelector ( "#edit_ic_fb" ),

  // Instagram
  edit_instagram: document.querySelector ( "#edit_ic_ig" )
};



/**
 * Validates and Updates Incubation Center Name.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_name_textbox]
 * @return boolean
 */
incubation.update_ic_name = function (
  ic_name_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_name_textbox ) {

    // Name is empty
    if ( ic_name_textbox.value.length == 0 ) {
      set.show_system_notification ( "Name cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC name
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-name",
        updated_ic_name: ic_name_textbox.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Email ID.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_email_textbox]
 * @return boolean
 */
incubation.update_ic_email = function (
  ic_email_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_email_textbox ) {

    // Description is empty
    if ( ic_email_textbox.value.length == 0 ) {
      set.show_system_notification ( "Email cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Email is invalid
    if ( set.validate_email(ic_email_textbox.value) === false ) {
      set.show_system_notification ( "Email is invalid. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC email
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-email",
        updated_ic_email: ic_email_textbox.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else if ( data == "email-used" ) {
          set.show_system_notification ( "Email is already being used. Try Again.", "danger", 2500 );
          return;
        }
        else {
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Description.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_desc_textbox]
 * @return boolean
 */
incubation.update_ic_desc = function (
  ic_desc_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_desc_textbox ) {

    // Description is empty
    if ( ic_desc_textbox.value.length == 0 ) {
      set.show_system_notification ( "Description cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC name
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-desc",
        updated_ic_desc: ic_desc_textbox.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Story.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_story_textbox]
 * @return boolean
 */
incubation.update_ic_story = function (
  ic_story_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_story_textbox ) {

    // Sending request to update IC name
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-story",
        updated_ic_story: ic_story_textbox.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Link.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_link_textbox]
 * @return boolean
 */
incubation.update_ic_link = function (
  ic_link_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Validating link
  if ( ic_link_textbox.value.length > 0 && set.validate_link(ic_link_textbox.value) === false ) {
    set.show_system_notification ( "Invalid Link. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_link_textbox ) {

    // Sending request to update IC link
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-link",
        updated_ic_link: ic_link_textbox.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Reg. No.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_reg]
 * @return boolean
 */
incubation.update_ic_reg = function (
  ic_reg
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Reg. no. is empty
  if ( ic_reg.value.length == 0 ) {
    set.show_system_notification ( "Registration Number cannot be Empty. Try Again.", "danger", 2500 );
    return;
  }

  // Validating reg. no.
  if ( ic_reg.value.length < 10 ) {
    set.show_system_notification ( "Invalid Registration Number. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_reg ) {

    // Sending request to update IC link
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-reg",
        updated_ic_reg: ic_reg.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center State.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_state]
 * @return boolean
 */
incubation.update_ic_state = function (
  ic_state
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // State is empty
  if ( ic_state.value.length == 0 ) {
    set.show_system_notification ( "State cannot be Empty. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_state ) {

    // Sending request to update IC state
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-state",
        updated_ic_state: ic_state.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center City.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_city]
 * @return boolean
 */
incubation.update_ic_city = function (
  ic_city
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // City is empty
  if ( ic_city.value.length == 0 ) {
    set.show_system_notification ( "City cannot be Empty. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_city ) {

    // Sending request to update IC city
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-city",
        updated_ic_city: ic_city.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Pincode.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_pincode]
 * @return boolean
 */
incubation.update_ic_pincode = function (
  ic_pincode
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Pincode is empty
  if ( ic_pincode.value.length == 0 ) {
    set.show_system_notification ( "Pincode cannot be Empty. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_pincode ) {

    // Sending request to update IC pincode
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-pcode",
        updated_ic_pcode: ic_pincode.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Address.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_address]
 * @return boolean
 */
incubation.update_ic_address = function (
  ic_address
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Pincode is empty
  if ( ic_address.value.length == 0 ) {
    set.show_system_notification ( "Address cannot be Empty. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_address ) {

    // Sending request to update IC pincode
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-addr",
        updated_ic_address: ic_address.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Contact Number.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_contact_number]
 * @return boolean
 */
incubation.update_ic_contact_number = function (
  ic_contact_number
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Contact Number is empty
  if ( ic_contact_number.value.length == 0 ) {
    set.show_system_notification ( "Contact Number cannot be Empty. Try Again.", "danger", 2500 );
    return;
  }

  // Contact Number is invalid
  if ( ic_contact_number.value.length > 11 ) {
    set.show_system_notification ( "Contact Number is invalid. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_contact_number ) {

    // Sending request to update IC contact number
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-cnct-num",
        updated_ic_contact_num: ic_contact_number.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center LinkedIn.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_linkedin]
 * @return boolean
 */
incubation.update_ic_linkedin = function (
  ic_linkedin
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_linkedin ) {

    // Sending request to update IC twitter
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-linkedin",
        updated_ic_lkdin: ic_linkedin.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Twitter.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_twitter]
 * @return boolean
 */
incubation.update_ic_twitter = function (
  ic_twitter
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_twitter ) {

    // Sending request to update IC twitter
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-twitter",
        updated_ic_twtr: ic_twitter.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Facebook.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_facebook]
 * @return boolean
 */
incubation.update_ic_facebook = function (
  ic_facebook
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_facebook ) {

    // Sending request to update IC facebook
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-facebook",
        updated_ic_fb: ic_facebook.value
      },
      url: "../../ajax/system",
      success: function ( data ) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/**
 * Validates and Updates Incubation Center Instagram.
 *
 *
 * @package SET
 *
 * @param {DOMNode} [ic_instagram]
 * @return boolean
 */
incubation.update_ic_instagram = function (
  ic_instagram
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( ic_instagram ) {

    // Sending request to update IC linkedin
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-ic-instagram",
        updated_ic_ig: ic_instagram.value
      },
      url: "../../ajax/system",
      success: function ( data ) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    });
  }
}



/** 
 * Upload custom profile picture while adding incubation center
 * 
 */
if ( incubation.custom_profile_picture_btn ) {

  // Opening file explorer
  // Setting profile picture uploading through option
  incubation.custom_profile_picture_btn.onclick = function() {
    incubation.options.uploading_profile_picture_through = "add-incubation-center-modal";
    incubation.profile_picture_file_selector.click();
  };
}



/** 
 * Profile Picture File Selector
 * NOTE: Whether user is uploading custom profile picture while adding 
 * incubation center, or updating profile picture through edit profile, 
 * same AJAX request is used.
 * 
 */
if ( incubation.profile_picture_file_selector ) {

  incubation.profile_picture_file_selector.oninput = function() {

    // Telling user to wait
    set.show_system_notification ( "Please Wait...", "", -1 );

    // Profile Picture is not selected
    if ( incubation.profile_picture_file_selector.value.length <= 0 ) {
      return;
    }

    // Accessing Profile Picture Selected File Details
    profile_picture_selected = incubation.profile_picture_file_selector.files[0];
  
    // Checking file extension
    // If file is not type of specified type
    // then it is rejected and uploading process is cancelled
    if ( set.check_file_extension(profile_picture_selected.name, 'img') !== true ) {
      set.show_system_notification ( "Incorrect file selected. Try Again.", "danger", 3500 );
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

    // When Profile Picture is uploaded successfully
    ajax.addEventListener ( "load", function ( event ) {
      
      // Telling user to wait
      set.show_system_notification ( "Please wait...", "", -1 );

      // Profile Picture selected is too big
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

        // Uploading image through add incubation center modal
        if ( incubation.options.uploading_profile_picture_through === "add-incubation-center-modal" ) {
          $ ( ".gen-info-right-side img" ).attr ( "src", "../../files/profile_pictures/" + event.currentTarget.responseText );
          return;
        } 
        // Uploading image through edit profile section
        else if ( incubation.options.uploading_profile_picture_through === "edit-profile" ) {
          $ ( ".edit-profile-pic img" ).attr ( "src", "../../files/profile_pictures/" + event.currentTarget.responseText );
          return;
        }
        return;
      }
      // Unknown error, server error
      else {
        set.show_system_notification ( "Unknown Error. Try Again.", "danger", 2500 );
        return;
      }
    }, false);

    // While Profile Picture is uploading
    ajax.upload.addEventListener ( "progress", function() {
      set.show_system_notification ( "Uploading...", "", -1 );
    }, false);
  
    // Setting
    // request type and request URL
    ajax.open ( "POST", "../../" + "ajax/system" );
  
    // Accessing file and
    // adding it to form data
    var file = new FormData();
    file.append ( "update-ic-profile-picture", profile_picture_selected );
  
    // Sending request to server to upload file
    ajax.send ( file );
  };
}



// Open Add Incubation Center Modal Button exists in DOM
if ( incubation.open_add_incubation_center_modal_btn ) {

  // Opening incubation center modal when clicked
  incubation.open_add_incubation_center_modal_btn.click (function() {

    // Telling user
    set.show_system_notification ( "Working...", "", -1 );

    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "init-new-ic"
      },
      success: function (data) {

        if ( data == "success" ) {
          set.hide_system_notification();
          incubation.incubation_center_modal_wrap.css ("display", "block");
          return;
        } else {
          set.show_system_notification ( "We ran into an error. Try Again Later.", "danger", 2500 );
          return;
        }
      }
    }); 
  });
}



// Add "Incubation Center" Modal Close Button
if ( incubation.close_incubation_center_modal_btn ) {

  // Closing add incubation center modal when clicked
  incubation.close_incubation_center_modal_btn.click (function() {

    // User changed their mind
    if ( !confirm("Are you sure you want to cancel adding incubation center?\nDoing so will delete data which has been filled. \nThis action cannot be undone.") ) {
      return;
    }

    // Requesting to delete incubation center
    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "remove-ic",
        confirm: 1
      },
      success: function ( data ) {

        if ( data == "success" ) {
          document.location.reload();
          return;
        }
        else {
          console.log(data);
          set.show_system_notification ( "We ran into error. Try Again.", "danger", 2500 );
          return;
        }
      }
    });
  });
}



/** 
 * Update IC Name
 * 
 */
incubation.ic_name.onblur = function() {
  incubation.update_ic_name ( incubation.ic_name );
}



/** 
 * Update IC Email
 * 
 */
incubation.ic_email.onblur = function() {
  incubation.update_ic_email ( incubation.ic_email );
}



/** 
 * Update IC Description
 * 
 */
incubation.ic_desc.onblur = function() {
  incubation.update_ic_desc ( incubation.ic_desc );
}



/** 
 * Update IC Story
 * 
 */
incubation.ic_story.onblur = function() {
  incubation.update_ic_story ( incubation.ic_story );
}



/** 
 * Update IC Link
 * 
 */
incubation.ic_link.onblur = function() {
  incubation.update_ic_link ( incubation.ic_link );
}



/** 
 * Update IC Reg. No.
 * 
 */
incubation.ic_reg_no.onblur = function() {
  incubation.update_ic_reg ( incubation.ic_reg_no );
}



/** 
 * Update IC State
 * 
 */
incubation.ic_state.onchange = function() {
  incubation.update_ic_state ( incubation.ic_state );
}



/** 
 * Update IC City
 * 
 */
incubation.ic_city.onchange = function() {
  incubation.update_ic_city ( incubation.ic_city );
}



/** 
 * Update IC Pincode
 * 
 */
incubation.ic_pincode.onchange = function() {
  incubation.update_ic_pincode ( incubation.ic_pincode );
}



/** 
 * Update IC Address
 * 
 */
incubation.ic_address.onchange = function() {
  incubation.update_ic_address ( incubation.ic_address );
}



/** 
 * Update IC Contact Number
 * 
 */
incubation.ic_contact_number.onchange = function() {
  incubation.update_ic_contact_number ( incubation.ic_contact_number );
}



/** 
 * Update IC Linkedin
 * 
 */
incubation.ic_linkedin.onchange = function() {
  incubation.update_ic_linkedin ( incubation.ic_linkedin );
}



/** 
 * Update IC Twitter
 * 
 */
incubation.ic_twitter.onchange = function() {
  incubation.update_ic_twitter ( incubation.ic_twitter );
}



/** 
 * Update IC Facebook
 * 
 */
incubation.ic_facebook.onchange = function() {
  incubation.update_ic_facebook ( incubation.ic_facebook );
}



/** 
 * Update IC Instagram
 * 
 */
incubation.ic_instagram.onchange = function() {
  incubation.update_ic_instagram ( incubation.ic_instagram );
}



// Next button inside general info. phase exists in DOM
if ( incubation.next_btn_inside_general_info_phase ) {

  // Hiding general info phase and
  // Showing address and contact phase
  incubation.next_btn_inside_general_info_phase.click(function() {

    incubation.phase_general_info.css("display", "none");
    incubation.phase_address_and_contact.css("display", "block");
  });
}



// Previous button inside Address and Contact Phase exists in DOM
if ( incubation.previous_btn_inside_phase_address_and_contact ) {
  
  // Hiding Address and Contact Phase
  // Showing General Info Phase
  incubation.previous_btn_inside_phase_address_and_contact.click(function() {

    incubation.phase_address_and_contact.css("display", "none");
    incubation.phase_general_info.css("display", "block");
  });
}



// Next button inside Address and Contact Phase exists in DOM
if ( incubation.next_btn_inside_phase_address_and_contact ) {

  // Hiding Address and Contact Phase
  // Showing Social Links Phase
  incubation.next_btn_inside_phase_address_and_contact.click(function() {

    incubation.phase_address_and_contact.css("display", "none");
    incubation.phase_social_links.css("display", "block");
  });
}



// Previous button inside social links phase exists in DOM
if ( incubation.previous_btn_inside_phase_social_links ) {

  // Hiding social links phase
  // Showing address and contact phase
  incubation.previous_btn_inside_phase_social_links.click(function() {

    incubation.phase_social_links.css("display", "none");
    incubation.phase_address_and_contact.css("display", "block");
  });
}



// Validate and finish inside social links phase exists in DOM
if ( incubation.validate_and_finish_btn_inside_phase_social_links ) {

  // Validating and adding new incubation center when clicked
  incubation.validate_and_finish_btn_inside_phase_social_links.click(function() {
    document.location.reload();
    return;
  });
}



/** 
 * Upload custom profile picture through edit profile section
 * 
 */
if ( incubation.change_profile_picture ) {

  // Opening file explorer
  // Setting profile picture uploading through option
  incubation.change_profile_picture.onclick = function() {
    incubation.options.uploading_profile_picture_through = "edit-profile";
    incubation.profile_picture_file_selector.click();
  };
}



/** 
 * Update IC Name
 * 
 */
incubation.edit_name.onblur = function() {
  incubation.update_ic_name ( incubation.edit_name );
}



/** 
 * Update IC Email
 * 
 */
incubation.edit_email.onblur = function() {
  incubation.update_ic_email ( incubation.edit_email );
}



/** 
 * Update IC Description
 * 
 */
incubation.edit_desc.onblur = function() {
  incubation.update_ic_desc ( incubation.edit_desc );
}



/** 
 * Update IC Story
 * 
 */
incubation.edit_story.onblur = function() {
  incubation.update_ic_story ( incubation.edit_story );
}



/** 
 * Update IC Link
 * 
 */
incubation.edit_link.onblur = function() {
  incubation.update_ic_link ( incubation.edit_link );
}



/** 
 * Update IC Reg. No.
 * 
 */
incubation.edit_reg_no.onblur = function() {
  incubation.update_ic_reg ( incubation.edit_reg_no );
}



/** 
 * Update IC State
 * 
 */
incubation.edit_state.onchange = function() {
  incubation.update_ic_state ( incubation.edit_state );
}



/** 
 * Update IC City
 * 
 */
incubation.edit_city.onchange = function() {
  incubation.update_ic_city ( incubation.edit_city );
}



/** 
 * Update IC Pincode
 * 
 */
incubation.edit_pincode.onchange = function() {
  incubation.update_ic_pincode ( incubation.edit_pincode );
}



/** 
 * Update IC Address
 * 
 */
incubation.edit_address.onchange = function() {
  incubation.update_ic_address ( incubation.edit_address );
}



/** 
 * Update IC Contact Number
 * 
 */
incubation.edit_contact_num.onchange = function() {
  incubation.update_ic_contact_number ( incubation.edit_contact_num );
}



/** 
 * Update IC Linkedin
 * 
 */
incubation.edit_linkedin.onchange = function() {
  incubation.update_ic_linkedin ( incubation.edit_linkedin );
}



/** 
 * Update IC Twitter
 * 
 */
incubation.edit_twitter.onchange = function() {
  incubation.update_ic_twitter ( incubation.edit_twitter );
}



/** 
 * Update IC Facebook
 * 
 */
incubation.edit_facebook.onchange = function() {
  incubation.update_ic_facebook ( incubation.edit_facebook );
}



/** 
 * Update IC Instagram
 * 
 */
incubation.edit_instagram.onchange = function() {
  incubation.update_ic_instagram ( incubation.edit_instagram );
}