/**
 * Javascript related to Job Dashboard Tab only
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

let job = {

  // Remove from work button
  remove_from_work_btn: $ ( "#remove_from_work" ),

  // Upload CV Button
  upload_cv_btn: document.querySelector ( "#upload_cv_btn" ),

  // CV File Selector
  cv_file_selector: document.querySelector ( "#cv_file_selector" ),

  // Update CV Button
  update_cv_btn: document.querySelector ( "#update_cv" ),

  // Remove CV Button
  remove_cv_btn: document.querySelector ( "#remove_cv" ),

  // Function to remove particular job application which user has applied
  remove_job_application: function() {}
};



/** 
 * Remove user from work
 * 
 */
job.remove_from_work_btn.click(function() {

  // User changed their mind
  if ( !confirm("Are you sure you want to remove yourself from the Startup? \nThis action cannot be undone.") )
    return;

  // Sending request to delete data
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "remove-from-work",
      confirm: 1
    },
    success: function ( data ) {
      
      if ( data == "success" ) {
        document.location.reload();
        return;
      } else {
        set.show_system_notification ( "We ran into and error. Try Again Later.", "danger", 2500 );
        return;
      }
    }
  });
});



/** 
 * Upload CV
 * 
 */
if ( job.upload_cv_btn ) {

  job.upload_cv_btn.onclick = function() {

    // Open File Explorer
    job.cv_file_selector.click();
  }
}



/** 
 * Update CV
 * 
 */
if ( job.update_cv_btn ) {

  job.update_cv_btn.onclick = function() {

    // Open File Explorer
    job.cv_file_selector.click();
  }
}



/**
 * CV File Upload
 * NOTE: Whether user is uploading CV for first time or updating their CV, 
 * same AJAX request is used.
 * 
 */
if ( job.cv_file_selector ) {

  job.cv_file_selector.oninput = function() {

    // Telling user to wait
    set.show_system_notification ( "Please Wait...", "", -1 );
  
    // PDF is not selected
    if ( job.cv_file_selector.value.length <= 0 ) {
      return;
    }
  
    // Accessing CV Selected File Details
    cv_selected = job.cv_file_selector.files[0];
  
    // Checking file extension
    // If file is not type of specified type (PDF)
    // then it is rejected and uploading process is cancelled
    if ( set.check_file_extension(cv_selected.name, 'pdf') !== true ) {
      set.show_system_notification ( "Incorrect file selected. You can select files with PDF extension only. Try Again.", "danger", 3500 );
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
  
    // When CV is uploaded successfully
    ajax.addEventListener("load", function(event) {
      
      // Telling user to wait
      set.show_system_notification ( "Please wait...", "", -1 );
  
      // CV selected is too big
      if ( event.currentTarget.responseText == "too-big" ) {
        set.show_system_notification ( "CV file size is too big. Cannot be more than 15MB. Try Again.", "", 3000 );
        return;
      }
      // Unknown Error occurred
      else if ( event.currentTarget.responseText == "unknown" ) {
        set.show_system_notification ( "Error Ocurred. Try again.", "", 2000 );
        return;
      }
      // Success, responded with upload image name
      else if ( event.currentTarget.responseText == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
      }
      // Unknown error, server error
      else {
        set.show_system_notification ( "Unknown Error. Try Again.", "", 2500 );
        return;
      }
    }, false);
  
    // While CV is uploading
    ajax.upload.addEventListener("progress", function() {
      set.show_system_notification ( "Uploading...", "", -1 );
    }, false);
  
    // Setting
    // request type and request URL
    ajax.open ( "POST", "../../" + "ajax/system" );
  
    // Accessing file and
    // adding it to form data
    var file = new FormData();
    file.append ( "update-cv", cv_selected );
  
    // Sending request to server to upload file
    ajax.send ( file );
  };
}



/** 
 * Remove CV
 * 
 */
if ( job.remove_cv_btn ) {

  job.remove_cv_btn.onclick = function() {

    // Confirming from user to remove CV or not
    let remove_cv_confirmation = confirm ( "Are you sure you want to remove your CV? \nThis action cannot be undone." );

    // User changed their mind and cancelled removing of their CV
    if ( !remove_cv_confirmation )
      return;

    // Sending request to remove CV
    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "remove-cv",
        confirm_remove: 1
      },
      success: function(data) {
        
        if ( data == "success" ) {
          set.show_system_notification ( "Success!", "", 2500 );
          document.location.reload();
        } else if ( data == "unknown" ) {
          set.show_system_notification ( "There was an error while removing your CV. Try Again later.", "danger", 2500 );
          return;
        }
      }
    });
  };
}



/**
 * Removes particular job application
 *
 *
 * @package SET
 *
 * @param {String} [job_application_id]
 * @param {String} [job_applied_startup_name]
 * @return Boolean
 */
job.remove_job_application = function (
  job_application_id = "",
  job_applied_startup_name = ""
) {

  // User cancelled operation of removing job application
  if ( !confirm("Are you sure you want to remove your Job Application sent to " + job_applied_startup_name + "? \nThis action cannot be undone.") )
    return;

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to remove job application
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "remove-job-application",
      id: job_application_id
    },
    success: function ( data ) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
        return;
      } else {
        console.log(data);
        set.show_system_notification ( "We ran into an error. Try Again Later.", "", 2500 );
        return;
      }
    }
  });
}