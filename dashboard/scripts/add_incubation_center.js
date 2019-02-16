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

let elements = {

  // Open "Add Incubation Center" Modal Button
  open_add_incubation_center_modal_btn: $ ( "#add_incubation_center_btn" ),

  // Add Incubation Center Modal Wrap
  incubation_center_modal_wrap: $ ( ".add-incubation-center-modal-wrap" ),

  // Add "Incubation Center" Modal Close Button
  close_incubation_center_modal_btn: $ ( "#add_incubation_center_modal_close" ),

  // General Information Phase
  phase_general_info: $ ( "#phase_gen_info" ),

  // Next button inside General Info. Phase
  next_btn_inside_general_info_phase: $ ( "#phase_gen_info .next-prev-phase-action-wrap button" ),
  
  // Address and Contact Phase
  phase_address_and_contact: $ ( "#phase_addr_cnct_info" ),

  // Previous button inside Address and Contact Phase
  previous_btn_inside_phase_address_and_contact: $( "#phase_addr_cnct_info .previous-phase-action-wrap button" ),

  // Next button inside Address and Contact Phase
  next_btn_inside_phase_address_and_contact: $ ( "#phase_addr_cnct_info .next-phase-action-wrap button" ),

  // Social Links Phase
  phase_social_links: $ ( "#phase_social_links" ),

  // Previous button inside Social Links Phase
  previous_btn_inside_phase_social_links: $ ( "#phase_social_links .previous-phase-action-wrap > button" ),

  // Validate and Finish button inside Social Links Phase
  validate_and_finish_btn_inside_phase_social_links: $ ( "#phase_social_links .next-phase-action-wrap button" )
};

// Open Add Incubation Center Modal Button exists in DOM
if ( elements.open_add_incubation_center_modal_btn ) {

  // Opening incubation center modal when clicked
  elements.open_add_incubation_center_modal_btn.click (function() {

    elements.incubation_center_modal_wrap.css ("display", "block");
  });
}

// Add "Incubation Center" Modal Close Button
if ( elements.close_incubation_center_modal_btn ) {

  // Closing add incubation center modal when clicked
  elements.close_incubation_center_modal_btn.click (function() {

    elements.incubation_center_modal_wrap.css ("display", "none");
  });
}

// Next button inside general info. phase exists in DOM
if ( elements.next_btn_inside_general_info_phase ) {

  // Hiding general info phase and
  // Showing address and contact phase
  elements.next_btn_inside_general_info_phase.click(function() {

    elements.phase_general_info.css("display", "none");
    elements.phase_address_and_contact.css("display", "block");
  });
}

// Previous button inside Address and Contact Phase exists in DOM
if ( elements.previous_btn_inside_phase_address_and_contact ) {
  
  // Hiding Address and Contact Phase
  // Showing General Info Phase
  elements.previous_btn_inside_phase_address_and_contact.click(function() {

    elements.phase_address_and_contact.css("display", "none");
    elements.phase_general_info.css("display", "block");
  });
}

// Next button inside Address and Contact Phase exists in DOM
if ( elements.next_btn_inside_phase_address_and_contact ) {

  // Hiding Address and Contact Phase
  // Showing Social Links Phase
  elements.next_btn_inside_phase_address_and_contact.click(function() {

    elements.phase_address_and_contact.css("display", "none");
    elements.phase_social_links.css("display", "block");
  });
}

// Previous button inside social links phase exists in DOM
if ( elements.previous_btn_inside_phase_social_links ) {

  // Hiding social links phase
  // Showing address and contact phase
  elements.previous_btn_inside_phase_social_links.click(function() {

    elements.phase_social_links.css("display", "none");
    elements.phase_address_and_contact.css("display", "block");
  });
}

// Validate and finish inside social links phase exists in DOM
if ( elements.validate_and_finish_btn_inside_phase_social_links ) {

  // Validating and adding new incubation center when clicked
  elements.validate_and_finish_btn_inside_phase_social_links.click(function() {

    alert("Done!");
  });
}