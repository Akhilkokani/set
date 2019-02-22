/**
 * Javascript related to Investor Dashboard Tab only
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

var investor = {

  // Make me as investor button
  make_me_investor_btn: $ ( "#make_me_investor_btn" ),

  // Remove as investor button
  remove_as_investor_btn: $ ( "#remove_as_investor" )
};



/** 
 * Make user investor
 * 
 */
investor.make_me_investor_btn.click(function() {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to make user investor
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "make-investor"
    },
    success: function(data) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
        return;
      } else {
        set.show_system_notification ( "We ran into an error. Try Again.", "danger", 2500 );
        return;
      }
    }
  });
});



/** 
 * Remove user as investor
 * 
 */
investor.remove_as_investor_btn.click(function() {

  // User changed their mind
  if ( !confirm("Are you sure you want to remove yourself as investor? \nDoing so will remove you from all startups who have listed you their investor. \nThis action cannot be undone.") ) {
    return;
  }

  // Sending request to remove as investor
  $.ajax({
    cache: false,
    type: "POST",
    url: "../../ajax/system",
    data: {
      action: "remove-as-investor",
      confirm: 1
    },
    success: function(data) {

      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
        return;
      } else {
        set.show_system_notification ( "We ran into an error. Try Again.", "danger", 2500 );
        return;
      }
    }
  });
});