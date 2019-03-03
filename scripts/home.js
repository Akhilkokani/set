/**
 * Javascript related to homepage only.
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

window.onload = function() {

  // Sign In Modal related elements
  let signin_button = this.document.querySelector ( ".header-actions .signin-action-wrap" );
  let dont_have_account_link_in_signin_modal = this.document.querySelector ( ".signin-modal a.signin-modal-link" );
  let signin_modal_close_button = this.document.querySelector ( ".signin-modal button[title='Cancel']" );

  // Sign Up Modal related elements
  let signup_button = this.document.querySelector ( ".header-actions .signup-action-wrap" );
  let have_an_account_link_signup_modal = document.querySelector ( ".signup-modal a.signup-modal-link" );
  let signup_modal_close_button = this.document.querySelector ( ".signup-modal button[title='Cancel']" );

  // Opening Sign In Modal
  if ( signin_button ) {

    signin_button.onclick = function () {
      _open_signin_modal();
    };
  }

  // Opening Sign Up Modal, when clicked on "Don't have Account..."
  if ( dont_have_account_link_in_signin_modal ) {

    dont_have_account_link_in_signin_modal.onclick = function () {
      
      _open_signup_modal();
      _close_signin_modal();
    };
  }

  // Closing Sign In Modal
  if ( signin_modal_close_button ) {

    signin_modal_close_button.onclick = function() {
      _close_signin_modal();
    };
  }

  // Opening Sign Up Modal
  if ( signup_button ) {

    signup_button.onclick = function () {
      _open_signup_modal();
    };
  }

  // Opening Sign In Modal, when clicked on "Have an account..."
  if ( have_an_account_link_signup_modal ) {

    have_an_account_link_signup_modal.onclick = function () {

      _open_signin_modal();
      _close_signup_modal();
    };
  }

  // Closing Sign Up Modal
  if ( signup_modal_close_button ) {

    signup_modal_close_button.onclick = function () {
      _close_signup_modal();
    };
  }

};

// Open's Sign in Modal
function _open_signin_modal () {
  document.querySelector ( ".signin-modal-wrapper" ).style.display = "block";
}

// Closes Sign in Modal
function _close_signin_modal () {
  document.querySelector ( ".signin-modal-wrapper" ).style.display = "none";
}

// Open's Sign Up Modal
function _open_signup_modal () {
  document.querySelector ( ".signup-modal-wrapper" ).style.display = "block";
}

// Closes Sign Up Modal
function _close_signup_modal () {
  document.querySelector ( ".signup-modal-wrapper" ).style.display = "none";
}



/** 
 * Homepage Elements
 * 
 */
var home = {

  // Startups Container
  startups_container: document.querySelector ( ".startups-grid-wrap" ),

  // Builds A Startup DOM
  build_startup: function ( logo_src, name, vision, link ) {
    
    a_link = document.createElement ( "a" );
    a_link.setAttribute ( "href", link );
    a_link.setAttribute ( "target", "_blank" );
    a_link.innerText = "View Profile";

    div_link_wrap = document.createElement ( "div" );
    div_link_wrap.setAttribute ( "class", "a-startup-link-wrap" );
    div_link_wrap.appendChild ( a_link );

    span_vision = document.createElement ( "span" );
    span_vision.innerText = vision;

    div_vision_wrap = document.createElement ( "div" );
    div_vision_wrap.setAttribute ( "class", "a-startup-desc-wrap" );
    div_vision_wrap.appendChild ( span_vision );

    span_name = document.createElement ( "span" );
    span_name.innerText = name;

    div_name_wrap = document.createElement ( "div" );
    div_name_wrap.setAttribute ( "class", "a-startup-name-wrap" );
    div_name_wrap.appendChild ( span_name );

    startup_img = document.createElement ( "img" );
    startup_img.setAttribute ( "src", logo_src );
    startup_img.setAttribute ( "width", 50 );

    div_logo_wrap = document.createElement ( "div" );
    div_logo_wrap.setAttribute ( "class", "a-startup-logo-wrap" );
    div_logo_wrap.appendChild ( startup_img );

    div_content_wrap = document.createElement ( "div" );
    div_content_wrap.setAttribute ( "class", "a-startup-content-wrap" );
    div_content_wrap.appendChild ( div_logo_wrap );
    div_content_wrap.appendChild ( div_name_wrap );
    div_content_wrap.appendChild ( div_vision_wrap );
    div_content_wrap.appendChild ( div_link_wrap );

    div_startup = document.createElement ( "div" );
    div_startup.setAttribute ( "class", "a-startup" );
    div_startup.appendChild ( div_content_wrap );

    return div_startup;
  },

  // Categories
  category_tabs: document.querySelector ( ".categories" )
};

// Gets Startups based Category
function get_startups ( event ) {

  // Getting Category
  category = event.innerText;

  // Removing all startups before
  home.startups_container.innerHTML = "";

  // Distinct Random Incubation Center Names
  // Distinct Random Investor Center Names
  incubator_names = [ 'Sandbox Startups', 'TiE Foundation', 'Startup Village', 'Indian Angel Network', 'Innovation and Entrepreneurship (SINE)', 'Technology Business Incubator', 'Technopark TBI', 'Amity Innovation Incubator', 'AngelPrime', 'CIIE IIMA', 'IAN Incubator', 'Google for Startups' ];
  investor_names = [ 'Jaswant Sinha', 'Akshay Raichur', 'Megha Agarwal', 'Ritesh Agarwal', 'Sergey Brin', 'Larry Page', 'CM Patil', 'Sudha Murthy', 'Narayan Murthy', 'Aftab Mulla', 'Pooja C', 'Pooja S' ];
  startups_names = [ 'DIPP Oyo Rooms', 'DIPP Jshta', 'DIPP Apple', 'DIPP Google', 'First Cry', 'Pepperfry', 'Nirnal', 'Snapdeal', 'PayTM', 'FreshBox', 'Freecharge', 'Zoho', 'Blume Global' ];

  // Maximum number of startups that can be created
  let max_create_startups = 20;

  switch (category) {
    case "All":
      max_create_startups = 19;
      for ( let i = 1; i <= 20; i++ ) {

        if ( i < 10 ) {

          // Incubator
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", incubator_names [ Math.floor((Math.random() * 10) + 1) ], "Has incubated more than " + Math.floor((Math.random() * 20) + 2) + " Startups and is a Verified Incubator of SET.", "./view?uid=sid_df568ad8d56d7d19a10f" )  
          );

          // Startups
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )  
          );

          // Investor
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", investor_names [ Math.floor((Math.random() * 10) + 1) ], "Has invested in more than " + Math.floor((Math.random() * 20) + 2) + " Startups and a Active Member of SET.", "./view?uid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          // Incubator
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", incubator_names [ Math.floor((Math.random() * 10) + 1) ], "Has incubated more than " + Math.floor((Math.random() * 20) + 2) + " Startups and is a Verified Incubator of SET.", "./view?uid=user_0aa16dd6cfefac31d682cec197ff83a5f839e070" )
          );

          // Startups
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )
          );

          // Investor
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", investor_names [ Math.floor((Math.random() * 10) + 1) ], "Has invested in more than " + Math.floor((Math.random() * 20) + 2) + " Startups and is a Verified Incubator of SET", "./view?uid=user_0aa16dd6cfefac31d682cec197ff83a5f839e070" )
          );
        }
      }
      break;

    case "Incubators":
      for ( let i = 1; i <= 20; i++ ) {

        if ( i < 10 ) {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", incubator_names [ Math.floor((Math.random() * 10) + 1) ], "Has incubated more than " + Math.floor((Math.random() * 20) + 2) + " Startups and is a Verified Incubator of SET.", "./view?uid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", incubator_names [ Math.floor((Math.random() * 10) + 1) ], "Has incubated more than " + Math.floor((Math.random() * 20) + 2) + " Startups and is a Verified Incubator of SET.", "./view?uid=user_0aa16dd6cfefac31d682cec197ff83a5f839e070" )
          );
        }
      }
      max_create_startups = 13;
      break;

    case "Investors":
      status = false;
      // home.startups_container.innerHTML = "";
      for ( let i = 1; i <= 20; i++ ) {

        if ( i < 10 ) {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", investor_names [ Math.floor((Math.random() * 10) + 1) ], "Has invested in more than " + Math.floor((Math.random() * 20) + 2) + " Startups and a Active Member of SET.", "./view?uid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", investor_names [ Math.floor((Math.random() * 10) + 1) ], "Has invested in more than " + Math.floor((Math.random() * 20) + 2), "./view?uid=user_0aa16dd6cfefac31d682cec197ff83a5f839e070" )
          );
        }
      }
      break;

    case "Technology":
      max_create_startups = 11;
      for ( let i = 1; i <= max_create_startups; i++ ) {

        if ( i < 10 ) {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )
          );
        }
      }
      break;

    case "Entertainment":
      max_create_startups = 11;
      for ( let i = 1; i <= max_create_startups; i++ ) {

        if ( i < 10 ) {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )
          );
        }
      }
      break;

    case "Education":
      max_create_startups = 7;
      for ( let i = 1; i <= max_create_startups; i++ ) {

        if ( i < 10 ) {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )
          );
        }
      }
      break;

    case "Food":
      for ( let i = 1; i <= max_create_startups; i++ ) {

        if ( i < 10 ) {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )
          );
        }
      }
      max_create_startups = 12;
      break;

    case "Agriculture":
      for ( let i = 1; i <= max_create_startups; i++ ) {

        if ( i < 10 ) {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_0" + Math.floor((Math.random() * 9) + 1) + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )  
          );
        }
        else {
          home.startups_container.appendChild (
            home.build_startup ( "./files/profile_pictures/logo_" + i + ".png", startups_names [ Math.floor((Math.random() * 9) + 1) ], "Startup Mission. This is where two line startup mission goes.", "./view?sid=sid_df568ad8d56d7d19a10f" )
          );
        }
      }
      max_create_startups = 12;
      break;
  
    default:
      max_create_startups = 20;
      break;
  }
}

// Activates a particular tab and gets startups on that category
function activate ( event ) {

  // All Tabs Common Class
  category_tabs = document.querySelectorAll ( ".category" );

  // Deactivating all tabs
  for ( let i = 0; i < category_tabs.length; i++ ) {
    category_tabs[i].classList = "category";
  }

  // Activating Current Tab
  event.classList += " active";
  get_startups ( event );
}