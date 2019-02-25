/**
 * Javascript for Notification System.
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */
var nf_system = {

  // Notification Icon
  nf_icon: $ ( ".notification-icon" ),

  // Notification System Wrap
  nf_wrap: $ ( ".notification-system-wrap" ),

  // Notification System
  nf_sys: $ ( ".notification-system" )
};

// When notification is clicked
nf_system.nf_icon.click(function() {

  nf_system.nf_wrap.css ( "display", "block" );
  nf_system.nf_sys.addClass ( "notification-system-expand" );
});

// When notification system wrap is clicked
nf_system.nf_wrap.click(function() {

  nf_system.nf_wrap.css ( "display", "none" );
  nf_system.nf_sys.removeClass ( "notification-system-expand" );
});



/**
 * Accpets and adds user to requested startup team
 *
 *
 * @package SET
 *
 * @param {String} [_sid]       Startup ID
 * @param {String} [_tmrid]     Team member request ID
 * @return void
 */
function user_join_team (
  _sid,
  _tmrid
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to accept invitaion and add user to startup team
  $.ajax({
    cache: false,
    type: "POST",
    url: nf_ajax_url,
    data: {
      action: "accept-team-member-request",
      sid: _sid,
      tmreq_id: _tmrid
    },
    success: function ( data ) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
      }
      else if ( data == "already-in-the-team" ) {
        set.show_system_notification ( "We ran into an error, just a second we will fix it.", "danger", 4500 );
        setTimeout(() => {
          document.location.reload();
        }, 4000);
      }
      else if ( data == "already-working-in-different-startup" ) {
        set.show_system_notification ( "We ran into an error, just a second we will fix it.", "danger", 4500 );
        setTimeout(() => {
          document.location.reload();
        }, 4000);
      }
      else {
        set.show_system_notification ( "We ran into an Error. Try Again Later.", "danger", 2500 );
        return;
      }
    }
  });
}



/**
 * Rejects and deletes startups team member joining request
 *
 *
 * @package SET
 *
 * @param {String} [_sid]       Startup ID
 * @param {String} [_tmrid]     Team member request ID
 * @return void
 */
function user_reject_join_team (
  _sid,
  _tmrid
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to accept invitaion and add user to startup team
  $.ajax({
    cache: false,
    type: "POST",
    url: nf_ajax_url,
    data: {
      action: "reject-team-member-request",
      sid: _sid,
      tmreq_id: _tmrid
    },
    success: function(data) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
        return;
      }
      else {
        set.show_system_notification ( "We ran into a Error. Try Again Later.", "", 2500 );
        return;
      }
    }
  });
}



/**
 * Accpets and adds investor (user) to requested startup ivnestor section.
 *
 *
 * @package SET
 *
 * @param {String} [_sid]       Startup ID
 * @param {String} [_inrid]     Investor request ID
 * @return void
 */
function investor_accept_request (
  _sid,
  _inrid
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to accept invitaion and add user to startup team
  $.ajax({
    cache: false,
    type: "POST",
    url: nf_ajax_url,
    data: {
      action: "accept-investor-request",
      sid: _sid,
      inreq_id: _inrid
    },
    success: function ( data ) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
      }
      else if ( data == "already-in-the-team" ) {
        set.show_system_notification ( "We ran into an error, just a second we will fix it.", "danger", 4500 );
        setTimeout(() => {
          document.location.reload();
        }, 4000);
      }
      else {
        set.show_system_notification ( "We ran into an Error. Try Again Later.", "danger", 2500 );
        return;
      }
    }
  });
}



/**
 * Rejects and investor (user) to requested startup ivnestor section.
 *
 *
 * @package SET
 *
 * @param {String} [_sid]       Startup ID
 * @param {String} [_inrid]     Investor request ID
 * @return void
 */
function investor_reject_request (
  _sid,
  _inrid
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to accept invitaion and add user to startup team
  $.ajax({
    cache: false,
    type: "POST",
    url: nf_ajax_url,
    data: {
      action: "reject-investor-request",
      sid: _sid,
      inreq_id: _inrid
    },
    success: function ( data ) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
      }
      else {
        set.show_system_notification ( "We ran into an Error. Try Again Later.", "danger", 2500 );
        return;
      }
    }
  });
}



/**
 * Accpets and adds IC as startup's incubator.
 *
 *
 * @package SET
 *
 * @param {String} [_sid]       Startup ID
 * @param {String} [_icrid]     IC request ID
 * @return void
 */
function ic_accept_request (
  _sid,
  _icrid
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to accept invitaion and add user to startup team
  $.ajax({
    cache: false,
    type: "POST",
    url: nf_ajax_url,
    data: {
      action: "accept-ic-request",
      sid: _sid,
      icreq_id: _icrid
    },
    success: function ( data ) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
      }
      else if ( data == "already-incubator" ) {
        set.show_system_notification ( "We ran into an error, just a second we will fix it.", "danger", 4500 );
        setTimeout(() => {
          document.location.reload();
        }, 4000);
      }
      else {
        console.log(data);
        set.show_system_notification ( "We ran into an Error. Try Again Later.", "danger", 2500 );
        return;
      }
    }
  });
}



/**
 * Rejects IC as startup's incubator.
 *
 *
 * @package SET
 *
 * @param {String} [_sid]       Startup ID
 * @param {String} [_icrid]     IC request ID
 * @return void
 */
function ic_reject_request (
  _sid,
  _icrid
) {

  // Telling user
  set.show_system_notification ( "Working...", "", -1 );

  // Sending request to accept invitaion and add user to startup team
  $.ajax({
    cache: false,
    type: "POST",
    url: nf_ajax_url,
    data: {
      action: "reject-ic-request",
      sid: _sid,
      icreq_id: _icrid
    },
    success: function ( data ) {
      
      if ( data == "success" ) {
        set.show_system_notification ( "Success!", "", 2500 );
        document.location.reload();
      }
      else {
        console.log(data);
        set.show_system_notification ( "We ran into an Error. Try Again Later.", "danger", 2500 );
        return;
      }
    }
  });
}