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

window.onload = function() {

  var elements = {

    // Edit Profile Floor
    edit_profile_floor: $ ( "#edit_profile_floor" ),

    // Button which will Collapse or Expand Edit Profile Section
    edit_startup_settings_collapse_expand_button: $ ( "#edit_profile_floor a#expand_collapse_action" ),

    // Edit Startup Wrap
    edit_startup_wrap: $ ( "#edit_profile_floor .edit-startup-wrap" )
  };

  // Button exists in DOM
  if ( elements.edit_startup_settings_collapse_expand_button ) {

    // Click event listener
    elements.edit_startup_settings_collapse_expand_button.click (function() {

      // Edit startup settings panel has to be expanded
      if ( 
        elements.edit_startup_settings_collapse_expand_button.attr("title") == "Expand" 
      ) {

        elements.edit_profile_floor.css ( "height", "877px" );
        elements.edit_startup_wrap.fadeIn();
        elements.edit_startup_settings_collapse_expand_button.attr ( "title", "Collapse" );
        elements.edit_startup_settings_collapse_expand_button.text ( "Collapse" );
      }
      // Edit startup settings panel has to be collapsed
      else if ( 
        elements.edit_startup_settings_collapse_expand_button.attr("title") == "Collapse"
      ) {
        
        elements.edit_profile_floor.css ( "height", "81px" );
        elements.edit_startup_wrap.fadeOut();
        elements.edit_startup_settings_collapse_expand_button.attr ( "title", "Expand" );
        elements.edit_startup_settings_collapse_expand_button.text ( "Expand" );
      }
    });
  }
}