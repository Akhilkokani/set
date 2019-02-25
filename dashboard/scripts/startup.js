/**
 * Javascript related to Startup Dashboard Tab only
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

/** 
 * List Startup Section Elements Only
 * 
 */
var list_startup = {


  // List My Startup button
  my_startup_modal_opener: $ ( ".no-startup-wrap .no-startup-action-wrap > button" ),


  // My Startup Modal Cancel button
  my_startup_modal_close_button: $ ( ".list-startup-modal div.modal-close-wrap" ),


  // My Startup Modal Wrapper
  my_startup_modal_wrapper: $ ( ".list-startup-modal-wrap" ),

  
  // General Information Phase
  phase_general_info: $ ( "#phase_gen_info" ),

  
  // Next button inside General Info phase
  next_button_inside_general_info_phase: $ ( "#phase_gen_info div.next-phase-action-wrap > button" ),

  
  // Address and Contact Phase
  phase_address_contact: $ ( "#phase_addr_cnct_info" ),

  
  // Previous button inside Address and Contact Phase
  previous_button_inside_address_contact_phase: $ ( "#phase_addr_cnct_info .previous-phase-action-wrap > button" ),

  
  // Next button inside Address and Contact Phase
  next_button_inside_address_contact_phase: $ ( "#phase_addr_cnct_info div.next-phase-action-wrap > button" ),

  
  // Incubation and Hiring Phase
  phase_incubation_hiring: $ ( "#phase_incbn_hirn_info" ),

  
  // Previous button inside Incubation and Hiring Phase
  previous_button_inside_incubation_hiring_phase: $ ( "#phase_incbn_hirn_info .previous-phase-action-wrap > button" ),

  
  // Next button inside Incubation and Hiring Phase
  next_button_inside_incubation_hiring_phase: $ ( "#phase_incbn_hirn_info .next-phase-action-wrap > button" ),

  
  // Legal Phase
  phase_legal: $ ( "#phase_legal_info" ),

  
  // Previous button inside Legal Phase
  previous_button_inside_legal_phase: $ ( "#phase_legal_info .previous-phase-action-wrap > button" ),

  
  // Next button inside Legal Phase
  next_button_inside_legal_phase: $ ( "#phase_legal_info .next-phase-action-wrap > button" ),

  
  // Social Links Phase
  phase_social_links: $ ( "#phase_social_links" ),

  
  // Previous button inside Social Links Phase
  previous_button_inside_social_links_phase: $ ( "#phase_social_links .previous-phase-action-wrap > button" ),


  // Finsih & Validate button inside Social Links Phase
  finish_and_validate: $ ( "#phase_social_links .next-phase-action-wrap > button" ),

  // Name
  name: document.querySelector ( "#stup-name" ),

  // Vision
  vision: document.querySelector ( "#stup-vision" ),

  // Descriptiom
  description: document.querySelector ( "#stup-desc" ),

  // Story
  story: document.querySelector ( "#stup-complete-story" ),

  // Link
  link: document.querySelector ( "#stup-link" ),

  // Category
  category: document.querySelector ( "#stup-cat" ),

  // Profile Picture
  profile_picture: document.querySelector ( "#stup-profile-picture" ),

  // Profile Picture File Selector
  profile_picture_file_selector: document.querySelector ( "#profile_picture_file_selector" ),

  // State
  state: document.querySelector ( "#stup-state" ),

  // City
  city: document.querySelector ( "#stup-city" ),

  // Pincode
  pincode: document.querySelector ( "#stup-pcode" ),

  // Address
  address: document.querySelector ( "#stup-addr" ),

  // Contact Number
  contact_number: document.querySelector ( "#stup-cnct-num" ),

  // Incubation Center
  incubation_center_email: document.querySelector ( "#stup-icbctr" ),

  // Hiring
  hiring: document.querySelectorAll ( "input[name='hiring']" ),

  // Startup Class
  class: document.querySelector ( "#stup-class" ),

  // Startup CIN
  cin: document.querySelector ( "#stup-cin" ),

  // Startup Day
  day: document.querySelector ( "#stup-day" ),

  // Startup Month
  month: document.querySelector ( "#stup-month" ),

  // Startup Year
  year: document.querySelector ( "#stup-year" ),

  // Startup LinkedIn
  linkedin: document.querySelector ( "#stup-lkdin" ),

  // Startup Twitter
  twitter: document.querySelector ( "#stup-twtr" ),

  // Startup Facebook
  facebook: document.querySelector ( "#stup-fb" ),

  // Startup Instagram
  instagram: document.querySelector ( "#stup-gram" )
};

// Checking if modal opener is present in DOM
if ( list_startup.my_startup_modal_opener ) {

  // Event listener to open My Startup when clicked
  list_startup.my_startup_modal_opener.click (function() {

    // Tellling user
    set.show_system_notification ( "Working...", "", -1 );

    // Sending request to initialise startup on user
    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "init-startup",
      },
      success: function ( data ) {

        // Initialised new startup
        if ( data == "success" ) {
          set.hide_system_notification();
          list_startup.my_startup_modal_wrapper.css ( "display", "block" );
        }
        else {
          // Telling user
          set.show_system_notification ( "We ran into Error. Try Again Later.", "danger", -1 );
        }
      }
    });
  });
}

// Modal Close Button Exists in DOM
if ( list_startup.my_startup_modal_close_button ) {

  list_startup.my_startup_modal_close_button.click (function() {

    // User changed their mind
    if ( !confirm("Are you sure you want to cancel adding your Startup?\nThis action cannot be undone.") ) {
      return;
    }

    // Tellling user
    set.show_system_notification ( "Working...", "", -1 );

    // Sending request to remove startup on user
    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "remove-startup",
        confirm: '1'
      },
      success: function ( data ) {

        // Initialised new startup
        if ( data == "success" ) {
          set.hide_system_notification();
          list_startup.my_startup_modal_wrapper.css ( "display", "none" );
          document.location.reload();
        }
      }
    });
  });
}

// Next button inside General Info phase
list_startup.next_button_inside_general_info_phase.click (function() {

  list_startup.phase_general_info.css ("display", "none");
  list_startup.phase_address_contact.css ("display", "block");
});

// Previous button inside Address and Contact Phase
list_startup.previous_button_inside_address_contact_phase.click (function() {

  list_startup.phase_address_contact.css ("display", "none");
  list_startup.phase_general_info.css ("display", "block");
});

// Next button inside Address and Contact Phase
list_startup.next_button_inside_address_contact_phase.click (function() {

  list_startup.phase_address_contact.css ("display", "none");
  list_startup.phase_incubation_hiring.css ("display", "block");
});

// Previous button inside Incubation and Hiring Phase
list_startup.previous_button_inside_incubation_hiring_phase.click (function() {

  list_startup.phase_incubation_hiring.css ( "display", "none" );
  list_startup.phase_address_contact.css ( "display", "block" );
});

// Next button inside Incubation and Hiring Phase
list_startup.next_button_inside_incubation_hiring_phase.click (function() {

  list_startup.phase_incubation_hiring.css ( "display", "none" );
  list_startup.phase_legal.css ( "display", "block" );
});

// Previous button inside Legal Phase
list_startup.previous_button_inside_legal_phase.click (function() {

  list_startup.phase_legal.css ( "display", "none" );
  list_startup.phase_incubation_hiring.css ( "display", "block" );
});

// Next button inside Legal Phase
list_startup.next_button_inside_legal_phase.click (function() {

  list_startup.phase_legal.css ( "display", "none" );
  list_startup.phase_social_links.css ( "display", "block" );
});

// Previous button inside Social Links Phase
list_startup.previous_button_inside_social_links_phase.click (function() {

  list_startup.phase_social_links.css ( "display", "none" );
  list_startup.phase_legal.css ( "display", "block" );
});

// Validate and Finish button inside Social Links Phase
list_startup.finish_and_validate.click (function() {
  document.location.reload();
  return;
});



/** 
 * All Startup Page Elements
 * 
 */
var startup = {

  // Options
  options: {
    uploading_profile_picture_through: ""
  },

  // Edit Profile Floor
  edit_profile_floor: $ ( "#edit_profile_floor" ),

  // Button which will Collapse or Expand Edit Profile Section
  edit_startup_settings_collapse_expand_button: $ ( "#edit_profile_floor a#expand_collapse_action" ),

  // Edit Startup Wrap
  edit_startup_wrap: $ ( "#edit_profile_floor .edit-startup-wrap" )
};

// Edit Profile Expand/Collapse Button exists in DOM
if ( startup.edit_startup_settings_collapse_expand_button ) {

  // Click event listener
  startup.edit_startup_settings_collapse_expand_button.click (function() {

    // Edit startup settings panel has to be expanded
    if ( 
      startup.edit_startup_settings_collapse_expand_button.attr("title") == "Expand" 
    ) {

      startup.edit_profile_floor.css ( "height", "877px" );
      startup.edit_startup_wrap.fadeIn();
      startup.edit_startup_settings_collapse_expand_button.attr ( "title", "Collapse" );
      startup.edit_startup_settings_collapse_expand_button.text ( "Collapse" );
    }
    // Edit startup settings panel has to be collapsed
    else if ( 
      startup.edit_startup_settings_collapse_expand_button.attr("title") == "Collapse"
    ) {
      
      startup.edit_profile_floor.css ( "height", "81px" );
      startup.edit_startup_wrap.fadeOut();
      startup.edit_startup_settings_collapse_expand_button.attr ( "title", "Expand" );
      startup.edit_startup_settings_collapse_expand_button.text ( "Expand" );
    }
  });
}



/*********************************************************************
* FIELD VALIDATE & UPDATE FUNCTIONS FOR STARTUP PAGE
**********************************************************************/

/**
 * Validates and Updates Startup Name.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [name_textbox]
 * @return boolean
 */
update_name = function (
  name_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( name_textbox ) {

    // Name is empty
    if ( name_textbox.value.length == 0 ) {
      set.show_system_notification ( "Name cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC name
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-name",
        updated_stup_name: name_textbox.value
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
 * Validates and Updates Startup Vision.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [desc_textbox]
 * @return boolean
 */
update_vision = function (
  vision_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( vision_textbox ) {

    // Vision is empty
    if ( vision_textbox.value.length == 0 ) {
      set.show_system_notification ( "Vision cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC vision
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-vision",
        updated_stup_vision: vision_textbox.value
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
 * Validates and Updates Startup Description.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [desc_textbox]
 * @return boolean
 */
update_description = function (
  desc_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( desc_textbox ) {

    // Name is empty
    if ( desc_textbox.value.length == 0 ) {
      set.show_system_notification ( "Description cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC name
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-desc",
        updated_stup_desc: desc_textbox.value
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
 * Validates and Updates Startup Story.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [story_textbox]
 * @return boolean
 */
update_story = function (
  story_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( story_textbox ) {

    // Story is empty
    if ( story_textbox.value.length == 0 ) {
      set.show_system_notification ( "Story cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC story
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-story",
        updated_stup_story: story_textbox.value
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
 * Validates and Updates Startup Link.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [link_textbox]
 * @return boolean
 */
update_link = function (
  link_textbox
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( link_textbox ) {

    // Link is empty
    if ( link_textbox.value.length == 0 ) {
      set.show_system_notification ( "Link cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Link is invalid
    if ( set.validate_link(link_textbox.value) == false ) {
      set.show_system_notification ( "Link in invalid. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC link
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-link",
        updated_stup_link: link_textbox.value
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
 * Validates and Updates Startup Category.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [category]
 * @return boolean
 */
update_category = function (
  category
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( category ) {

    // Link is empty
    if ( category.value.length == 0 ) {
      set.show_system_notification ( "Category is not selected. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC category
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-category",
        updated_stup_category: category.value
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
 * Profile Picture File Selector
 * NOTE: Whether user is uploading custom profile picture while adding 
 * startup, or updating profile picture through edit profile, 
 * same AJAX request is used.
 * 
 */
if ( list_startup.profile_picture_file_selector ) {

  list_startup.profile_picture_file_selector.oninput = function() {

    // Telling user to wait
    set.show_system_notification ( "Please Wait...", "", -1 );

    // Profile Picture is not selected
    if ( list_startup.profile_picture_file_selector.value.length <= 0 ) {
      return;
    }

    // Accessing Profile Picture Selected File Details
    profile_picture_selected = list_startup.profile_picture_file_selector.files[0];
  
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

        // Uploading image through add startup modal
        if ( startup.options.uploading_profile_picture_through === "add-startup-modal" ) {
          $ ( ".gen-info-right-side img" ).attr ( "src", "../../files/profile_pictures/" + event.currentTarget.responseText );
          return;
        } 
        // Uploading image through edit profile section
        else if ( startup.options.uploading_profile_picture_through === "edit-profile" ) {
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
    file.append ( "update-stup-profile-picture", profile_picture_selected );
  
    // Sending request to server to upload file
    ajax.send ( file );
  };
}



/**
 * Validates and Updates Startup State.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [state]
 * @return boolean
 */
update_state = function (
  state
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( state ) {

    // State is empty
    if ( state.value.length == 0 ) {
      set.show_system_notification ( "State is not selected. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC state
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-state",
        updated_stup_state: state.value
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
 * Validates and Updates Startup City.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [city]
 * @return boolean
 */
update_city = function (
  city
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( city ) {

    // City is empty
    if ( city.value.length == 0 ) {
      set.show_system_notification ( "City is not selected. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC city
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-city",
        updated_stup_city: city.value
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
 * Validates and Updates Startup Pincode.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [pincode]
 * @return boolean
 */
update_pincode = function (
  pincode
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( pincode ) {

    // Pincode is empty
    if ( pincode.value.length == 0 ) {
      set.show_system_notification ( "Pincode cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC pincode
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-pincode",
        updated_stup_pincode: pincode.value
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
 * Validates and Updates Startup Address.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [address]
 * @return boolean
 */
update_address = function (
  address
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( address ) {

    // Address is empty
    if ( address.value.length == 0 ) {
      set.show_system_notification ( "Address cannot be empty. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC address
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-address",
        updated_stup_address: address.value
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
 * Validates and Updates Startup Contact Number.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [number]
 * @return boolean
 */
update_contact_number = function (
  number
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( number ) {

    // Contact Number is empty
    if ( number.value.length == 0 || number.value.length > 11 ) {
      set.show_system_notification ( "Address cannot be empty or invalid. Try Again.", "danger", 2500 );
      return false;
    }

    // Sending request to update IC contact number
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-contact-number",
        updated_stup_contact_number: number.value
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
 * Validates and Checks whether incubation center is proper or not.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [ic_email]
 * @return boolean
 */
check_incubation_center = function (
  ic_email
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Email ID is invalid
  if ( ic_email.value.length != 0 && set.validate_email(ic_email.value) == false ) {
    set.show_system_notification ( "Invalid Email. Try Again.", "danger", 2500 );
    return;
  }

  // Element exists in DOM
  if ( ic_email ) {

    // Sending request to update IC email ID
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-ic-email",
        updated_stup_ic_email: ic_email.value
      },
      url: "../../ajax/system",
      success: function(data) {

        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          return;
        }
        else if ( data == "incorrect-email" ) {
          set.show_system_notification ( "Incorrect Email. Try Again.", "danger", 2500 );
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
 * Validates and Updates Startup Hiring Status.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [hiring]
 * @return boolean
 */
update_hiring = function (
  hiring
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( hiring ) {

    // Determining whether user wants to hire or no
    if ( hiring.value == "yes" )
      hiring_status = '1';
    else 
      hiring_status = '0';

    // Sending request to update IC contact number
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-hiring",
        updated_stup_hiring: hiring_status
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
 * Validates and Updates Startup Class.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [_class]
 * @return boolean
 */
update_class = function (
  _class
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( _class ) {

    // Invalid Class Selected
    if ( _class.value.length <= 0 ) {
      set.show_system_notification ( "Invalid Class Selected. Try Again Later.", "danger", 2500 );
      return;
    }

    // Private Limited
    if ( _class.value == "private_limited" ) {
      $ ( ".startup-uniq-num > label" ).text ( "CIN" );
      $ ( ".startup-uniq-num > input" ).attr ( "placeholder", "Startup CIN" );
    }
    // Other than private limited
    else {
      $ ( ".startup-uniq-num > label" ).text ( "PAN" );
      $ ( ".startup-uniq-num > input" ).attr ( "placeholder", "Startup PAN" );
    }

    // Sending request to update IC contact number
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-class",
        updated_stup_class: _class.value
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
 * Validates and Updates Startup CIN.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [cin]
 * @return boolean
 */
update_cin = function (
  cin
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( cin ) {

    // CIN/PAN is empty
    if ( cin.value.length <= 0 ) {
      set.show_system_notification ( "Startup CIN/PAN cannot be empty. Try Again Later.", "danger", 2500 );
      return;
    }

    // Sending request to update IC CIN/PAN
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-cin",
        updated_stup_cin: cin.value
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
 * Validates and Updates Startup Date of Registration (DOR).
 *
 *
 * @package SET
 *
 * @param {DOM Node} [day]
 * @return boolean
 */
update_date_of_registration = function (
  day
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( day ) {

    // Day is empty
    if ( day.value.length <= 0 ) {
      set.show_system_notification ( "Day cannot be empty. Try Again Later.", "danger", 2500 );
      return;
    }

    // Month is empty
    if ( list_startup.month.value.length <= 0 ) {
      set.show_system_notification ( "Month cannot be empty. Try Again Later.", "danger", 2500 );
      return;
    }

    // Year is empty
    if ( list_startup.year.value.length <= 0 ) {
      set.show_system_notification ( "Year cannot be empty. Try Again Later.", "danger", 2500 );
      return;
    }

    // Sending request to update startup DOR
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-dor",
        updated_stup_dor: day.value + "-" + list_startup.month.value + "-" + list_startup.year.value
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
 * Validates and Updates Startup LinkedIn.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [linkedin]
 * @return boolean
 */
update_linkedin = function (
  linkedin
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( linkedin ) {

    // Sending request to update startup linkedin
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-linkedin",
        link: linkedin.value
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
 * Validates and Updates Startup Twitter.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [twitter]
 * @return boolean
 */
update_twitter = function (
  twitter
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( twitter ) {

    // Sending request to update startup twitter
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-twitter",
        link: twitter.value
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
 * Validates and Updates Startup Facebook.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [facebook]
 * @return boolean
 */
update_facebook = function (
  facebook
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( facebook ) {

    // Sending request to update startup facebook
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-facebook",
        link: facebook.value
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
 * Validates and Updates Startup Instagram.
 *
 *
 * @package SET
 *
 * @param {DOM Node} [instagram]
 * @return boolean
 */
update_instagram = function (
  instagram
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Element exists in DOM
  if ( instagram ) {

    // Sending request to update startup instagram
    $.ajax({
      cache: false,
      type: "POST",
      data: {
        action: "update-stup-instagram",
        link: instagram.value
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



/************************************************************************************
* FIELD EVENT HANDLERS INSIDE LIST MY STARTUP MODAL & EDIT PROFILE SECTION
*************************************************************************************/

// Name
list_startup.name.onchange = function() {
  update_name ( list_startup.name );
}

// Vision
list_startup.vision.onchange = function() {
  update_vision ( list_startup.vision );
}

// Description
list_startup.description.onchange = function() {
  update_description ( list_startup.description );
}

// Story
list_startup.story.onchange = function() {
  update_story ( list_startup.story );
}

// Link
list_startup.link.onchange = function() {
  update_link ( list_startup.link );
}

// Category
list_startup.category.onchange = function() {
  update_category ( list_startup.category );
}

// Uploading Profile Picture through list startup modal
if ( list_startup.profile_picture ) {

  list_startup.profile_picture.onclick = function() {
    startup.options.uploading_profile_picture_through = "add-startup-modal";
    list_startup.profile_picture_file_selector.click();
  }
}

// Uploading Profile Picture through edit profile section
document.querySelector ( ".change_startup_profile_picture" ).onclick = function() {
  startup.options.uploading_profile_picture_through = "edit-profile";
  list_startup.profile_picture_file_selector.click();
}

// State
list_startup.state.onchange = function() {
  update_state ( list_startup.state );
}

// City
list_startup.city.onchange = function() {
  update_city ( list_startup.city );
}

// Pincode
list_startup.pincode.onchange = function() {
  update_pincode ( list_startup.pincode );
}

// Address
list_startup.address.onchange = function() {
  update_address ( list_startup.address );
}

// Contact Number
list_startup.contact_number.onchange = function() {
  update_contact_number ( list_startup.contact_number );
}

// Startup's Incubation Center Email
list_startup.incubation_center_email.onchange = function() {
  check_incubation_center ( list_startup.incubation_center_email );
}

// Hiring
for (let index = 0; index < list_startup.hiring.length; index++) {

  list_startup.hiring[index].onchange = function() {
    update_hiring ( list_startup.hiring[index] );
  }
}

// Startup Class
list_startup.class.onchange = function() {
  update_class ( list_startup.class );
}

// Startup CIN
list_startup.cin.onchange = function() {
  update_cin ( list_startup.cin );
}

// Startup Day of Registration
list_startup.day.onchange = function() {
  update_date_of_registration ( list_startup.day );
}

// Startup Month of Registration
list_startup.month.onchange = function() {
  update_date_of_registration ( list_startup.day );
}

// Startup Year of Registration
list_startup.year.onchange = function() {
  update_date_of_registration ( list_startup.day );
}

// Startup Linkedin
list_startup.linkedin.onchange = function() {
  update_linkedin ( list_startup.linkedin );
}

// Startup Twitter
list_startup.twitter.onchange = function() {
  update_twitter ( list_startup.twitter );
}

// Startup Facebook
list_startup.facebook.onchange = function() {
  update_facebook ( list_startup.facebook );
}

// Startup Instagram
list_startup.instagram.onchange = function() {
  update_instagram ( list_startup.instagram );
}

// Hire
hire_start_stop_btn = document.querySelector("#hire");
if ( hire_start_stop_btn ) {

  hire_start_stop_btn.onclick = function() {

    // Telling user
    set.show_system_notification ( "Working...", "", -1 );
    
    // Sending request to update hiring ajax
    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "update-stup-hiring",
        updated_stup_hiring: hire_start_stop_btn.getAttribute ( "data-action" )
      },
      success: function ( data ) {
        
        if ( data == "success" ) {
          document.location.reload();
          return;
        }
        else {
          set.show_system_notification ( "We Ran Into An Error. Try Again.", "danger", 3500 );
          return;
        }
      }
    });
  };
}



/**
 * Adds a particular joc applicant to startup
 *
 *
 * @package SET
 *
 * @param {String} [applicant_id]
 * @return void
 */
let add_to_team = function (
  applicant_id
) {

  // Sending request to add applicant to team
  $.ajax({
    cache: false,
    type: "POST",
    data: {
      action: "add-to-team",
      applicant: applicant_id
    },
    url: "../../ajax/system",
    success: function ( data ) {

      if ( data == "success" ) {
        document.location.reload();
      }
      else {
        set.show_system_notification ( "Something went wrong. Try Again Later.", "", 3000 );
        return;
      }
    }
  });
}



/**
 * Sends a request to a particular user to join startup
 *
 *
 * @package SET
 *
 * @return void
 */
let request_user_to_join_team = function () {

  // Getting user's username to be added
  _uname = prompt ( "Enter Username:", "" );

  // Username is empty
  if ( _uname == null ) return;

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to add applicant to team
  $.ajax({
    cache: false,
    type: "POST",
    data: {
      action: "request-user-to-join-team",
      uname: _uname
    },
    url: "../../ajax/system",
    success: function ( data ) {

      if ( data == "success" ) {
        set.show_system_notification ( "Invitation Sent!", "", 2500 );
        return;
      }
      else if ( data == "wrong-username" ) {
        set.show_system_notification ( "Incorrect Username, Try Again.", "", 2500 );
        return;
      }
      else if ( data == "already-working" ) {
        set.show_system_notification ( "Cannot Add User. Try Adding Different Person.", "danger", 2500 );
        return;
      }
      else if ( data == "requesting-again" ) {
        set.show_system_notification ( "Request Sent Already. No Need to Send Again.", "danger", 2500 );
        return;
      }
      else {
        set.show_system_notification ( "Something went wrong. Try Again Later.", "", 3000 );
        return;
      }
    }
  });
}



/**
 * Sends a request to a particular investor (user) to join startup
 *
 *
 * @package SET
 *
 * @return void
 */
let request_investor_to_join = function () {

  // Getting investor's account username to be added
  _uname = prompt ( "Enter Username:", "" );

  // Username is empty
  if ( _uname == null ) return;

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to add applicant to team
  $.ajax({
    cache: false,
    type: "POST",
    data: {
      action: "request-investor-to-join",
      uname: _uname
    },
    url: "../../ajax/system",
    success: function ( data ) {

      if ( data == "success" ) {
        set.show_system_notification ( "Invitation Sent!", "", 2500 );
        return;
      }
      else if ( data == "wrong-username" ) {
        set.show_system_notification ( "Incorrect Username, Try Again.", "danger", 2500 );
        return;
      }
      else if ( data == "not-an-investor" ) {
        set.show_system_notification ( "Could not send request. User is not an investor.", "danger", 2500 );
        return;
      }
      else if ( data == "requesting-again" ) {
        set.show_system_notification ( "Request Sent Already. No Need to Send Again.", "danger", 2500 );
        return;
      }
      else {
        set.show_system_notification ( "Something went wrong. Try Again Later.", "", 3000 );
        return;
      }
    }
  });
}