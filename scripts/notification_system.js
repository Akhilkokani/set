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