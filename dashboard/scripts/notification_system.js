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
var elements = {

  // Notification Icon
  nf_icon: $ ( ".notification-icon" ),

  // Notification System Wrap
  nf_wrap: $ ( ".notification-system-wrap" ),

  // Notification System
  nf_sys: $ ( ".notification-system" )
};

// When notification is clicked
elements.nf_icon.click(function() {

  elements.nf_wrap.css ( "display", "block" );
  elements.nf_sys.addClass ( "notification-system-expand" );
});

// When notification system wrap is clicked
elements.nf_wrap.click(function() {

  elements.nf_wrap.css ( "display", "none" );
  elements.nf_sys.removeClass ( "notification-system-expand" );
});