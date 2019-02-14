/**
 * Javascript related to creating new startup only
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
    finish_and_validate: $ ( "#phase_social_links .next-phase-action-wrap > button" )
  };

  // Checking if modal opener is present in DOM
  if ( elements.my_startup_modal_opener ) {

    // Event listener to open My Startup when clicked
    elements.my_startup_modal_opener.click (function() {
      elements.my_startup_modal_wrapper.css ( "display", "block" );
    });
  }

  if ( elements.my_startup_modal_close_button ) {

    elements.my_startup_modal_close_button.click (function() {
      elements.my_startup_modal_wrapper.css ( "display", "none" );
    });
  }

  // Next button inside General Info phase
  elements.next_button_inside_general_info_phase.click (function() {

    elements.phase_general_info.css ("display", "none");
    elements.phase_address_contact.css ("display", "block");
  });

  // Previous button inside Address and Contact Phase
  elements.previous_button_inside_address_contact_phase.click (function() {

    elements.phase_address_contact.css ("display", "none");
    elements.phase_general_info.css ("display", "block");
  });

  // Next button inside Address and Contact Phase
  elements.next_button_inside_address_contact_phase.click (function() {

    elements.phase_address_contact.css ("display", "none");
    elements.phase_incubation_hiring.css ("display", "block");
  });

  // Previous button inside Incubation and Hiring Phase
  elements.previous_button_inside_incubation_hiring_phase.click (function() {

    elements.phase_incubation_hiring.css ( "display", "none" );
    elements.phase_address_contact.css ( "display", "block" );
  });

  // Next button inside Incubation and Hiring Phase
  elements.next_button_inside_incubation_hiring_phase.click (function() {

    elements.phase_incubation_hiring.css ( "display", "none" );
    elements.phase_legal.css ( "display", "block" );
  });

  // Previous button inside Legal Phase
  elements.previous_button_inside_legal_phase.click (function() {

    elements.phase_legal.css ( "display", "none" );
    elements.phase_incubation_hiring.css ( "display", "block" );
  });

  // Next button inside Legal Phase
  elements.next_button_inside_legal_phase.click (function() {

    elements.phase_legal.css ( "display", "none" );
    elements.phase_social_links.css ( "display", "block" );
  });

  // Previous button inside Social Links Phase
  elements.previous_button_inside_social_links_phase.click (function() {

    elements.phase_social_links.css ( "display", "none" );
    elements.phase_legal.css ( "display", "block" );
  });

  // Validate and Finish button inside Social Links Phase
  elements.finish_and_validate.click (function() {

    alert ( "Done" );
  });
};