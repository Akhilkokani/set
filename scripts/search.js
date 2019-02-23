/**
 * Javascript file Search System
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

var search = {

  // Search Box
  search_box_input: document.querySelector ( "#search_box" ),

  // Search Results
  search_results: $ ( "#search-results" ),

  // Search search_results Container
  search_results_container: document.querySelector ( ".search-search_results" ),

  // To Build a Search Result
  build_search_result: function() {}
};



/**
 * Builds Search Result DOM
 *
 *
 * @package SET
 *
 * @param {String} [name]
 * @param {String} [profile_picture_source]
 * @param {String} [link]
 * @return DOMNode
 */
search.build_search_result = function (
  name = "",
  profile_picture_source = "",
  link = ""
) {

  // <a class="search-result" href="./view?sid=asdasdads123ASD">
  var anchor_result_wrapper = document.createElement ( "a" );
  anchor_result_wrapper.classList += "search-result";
  anchor_result_wrapper.setAttribute ( "href", link );

  // <img src="./images/default_startup_icon.png" width="32" height="32">
  var img_startup_profile_picture = document.createElement ( "img" );
  img_startup_profile_picture.setAttribute ( "width", "32" );
  img_startup_profile_picture.setAttribute ( "height", "32" );
  img_startup_profile_picture.setAttribute ( "src", profile_picture_source );

  // <div class="startup-logo-wrap">
  var div_startup_logo_wrap = document.createElement ( "div" );
  div_startup_logo_wrap.classList += "startup-logo-wrap";
  div_startup_logo_wrap.appendChild ( img_startup_profile_picture );

  // <span class="vert-center">CodeManiacs</span>
  var span_startup_name = document.createElement ( "span" );
  span_startup_name.classList += "vert-center";
  span_startup_name.innerText = name;
  div_startup_logo_wrap.appendChild ( span_startup_name );

  // <div class="startup-name-wrap">
  var div_startup_name_wrap = document.createElement ( "div" );
  div_startup_name_wrap.classList += "startup-name-wrap";
  div_startup_name_wrap.appendChild ( span_startup_name );

  // <div class="startup-name-wrap">
  var div_search_result_container = document.createElement ( "div" );
  div_search_result_container.classList += " disp-flex search-result-container";
  div_search_result_container.appendChild ( div_startup_logo_wrap );
  div_search_result_container.appendChild ( div_startup_name_wrap );

  /*
   <a class="search-result" href="./view?sid=asdasdads123ASD">
    <div class="disp-flex search-result-container">
      <div class="startup-logo-wrap">
        <img src="./images/default_startup_icon.png" width="32" height="32">
      </div>
      <div class="startup-name-wrap">
        <span class="vert-center">CodeManiacs</span>
      </div>
    </div>
  </a>
   */
  anchor_result_wrapper.appendChild ( div_search_result_container );
  return anchor_result_wrapper;
};



/** 
 * When Search Box Input Contents Are Updated
 * 
 */
search.search_box_input.oninput = function() {

  // Nothing was typed in search box
  if ( search.search_box_input.value.length <= 0 ) {
    search.search_results.css ( "display", "none" );
    return;
  }

  $.ajax({
    cache: false,
    type: "POST",
    url: "./ajax/system",
    data: {
      action: "search",
      key: search.search_box_input.value
    },

    success: function ( data ) {

      // Making response into JS Array Array
      let search_results_wrapper = [];
      search_results_wrapper.push ( JSON.parse(data) );

      // Results Exists
      if ( search_results_wrapper[0].results_exists == "yes" ) {

        // Iterating through array
        search_results_wrapper.forEach ( function(search_result) {

          // Storing all array indexes
          var results_object = Object.keys ( search_result );

          // Clearing before contents if any
          search.search_results.html ( "" );

          // Iterating through all search results
          results_object.forEach ( function(keys)  {
            
            // If it is not search result indicator
            if ( keys != "results_exists" ) {

              // Build a search result
              search.search_results.append ( 
                search.build_search_result (
                  search_result[keys].name,
                  search_result[keys].logo,
                  "./view?sid=" + keys
              ));
            }
          });

          // Showing Search Results
          search.search_results.css ( "display", "block" );
        });
      }
      // No results were found
      else {

        // Clearing before contents if any
        search.search_results.html ( "" );
      }
    }
  });
};