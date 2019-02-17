/**
 * Javascript related to view page.
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
 * Activates a particular tab
 *
 *
 * @package SET
 *
 * @param {DOM} [activate_tab_classname]
 * @param {DOM} [tabs_wrap_classname]
 * @return void
 */
function activate_tab ( activate_tab_classname, tabs_wrap_classname, activate_tab_content_id ) {

  // Fetching all tabs inside element which has all tab elements
  let tabs_inside_tabs_wrap = document.querySelector ( "." + tabs_wrap_classname ).querySelectorAll ( ".tab" );
  let tab_content_elements = document.querySelectorAll ( ".profile-tab-content" );

  // Removing "active" class from all tabs 
  // Hiding all tab's content's
  for ( i = 0; i < tabs_inside_tabs_wrap.length; i++ ) {
    tabs_inside_tabs_wrap[i].classList.remove ( "active" );
    tab_content_elements[i].style.display = "none";
  }

  // Adding "active" class to passed parameter
  // Displaying appropriate tab content
  document.querySelector ( "." + activate_tab_classname ).classList += " active";
  document.querySelector ( "#" +  activate_tab_content_id ).style.display = "block";
}