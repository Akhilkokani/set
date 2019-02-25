/**
 * Javascript for Startup Dashboard Page which is used to handle All Graph Sections of the page.
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
 * Algorithm for Top Locations Graph
 *
 *
 * @package SET
 *
 * @param {DOMNode} [locations_wrap]
 * @return void
 */
let top_locations = function (
  locations_wrap = ""
) {

  // Locations Wrap Element Exists in DOM
  if ( locations_wrap ) {

    // Sending request to check if there are any visits
    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "count-number-of-visits-of-startup"
      },
      success: function ( data ) {
        
        // Converting String response to Int
        data = parseInt ( data );

        // There are visits
        if ( data <= 0 || isNaN(data) ) {
          locations_wrap.querySelector ( ".not-enough-visits-wrap" ).style.display = "block";
          return;
        }
        // Startup profile has been visited before
        else {

          $.ajax({
            cache: false,
            type: "POST",
            url: "../../ajax/system",
            data: {
              action: "get-top-locations"
            },
            success: function ( data ) {

              if ( data == "unknown" ) {
                locations_wrap.querySelector ( ".not-enough-visits-wrap" ).style.display = "block";
                console.log ( 'Something went wrong while getting top locations. Try Again.' );
                return;
              }
              else {
                // To store city names
                // To store city visit counts
                // Converting int JSON
                var city_names = [];
                var city_visit_count = [];
                data = JSON.parse ( data );

                // Seperating data
                for ( var i in data ) {
                  city_names.push ( data[i].city_id );
                  city_visit_count.push ( data[i].city_visit_count );
                }

                // Showing Graph Container
                locations_wrap.querySelector ( ".graph-container" ).style.display = "block";

                // Creating graph
                var top_locations_chart = new Chart (
                  locations_wrap.querySelector ( "#top-locations-graph" ), {
                  type: 'radar',
                  data: {
                    labels: city_names,
                    datasets: [{
                        label: 'Profile Visits',
                        data: city_visit_count,
                        backgroundColor: '#ffe7c6',
                        borderColor: '#fe9000'
                    }]
                  },
                  options: {
                    legend: {
                      display: false
                    },
                    scales: {
                        yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero:true
                            },
                            gridLines: {
                              display:false
                            }
                        }],
                        xAxes: [{
                          display: false,
                          gridLines: {
                            display:false
                          }
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false
                  }
                });
              }
            }
          });
        }
      }
    });
  }
}

/**
 * Algorithm for Profile Visits
 *
 *
 * @package SET
 *
 * @param {DOMNode} [locations_wrap]
 * @return void
 */
let profile_visits = function (
  profile_visits = ""
) {

  // Profile Visits Wrap Element Exists in DOM
  if ( profile_visits ) {

    // Sending request to check if there are any visits
    $.ajax({
      cache: false,
      type: "POST",
      url: "../../ajax/system",
      data: {
        action: "count-number-of-visits-of-startup"
      },
      success: function ( data ) {
        
        // Converting String response to Int
        data = parseInt ( data );

        // There are visits
        if ( data <= 0 || isNaN(data) ) {
          profile_visits.querySelector ( ".not-enough-visits-wrap" ).style.display = "block";
          return;
        }
        // Startup profile has been visited before
        else {

          $.ajax({
            cache: false,
            type: "POST",
            url: "../../ajax/system",
            data: {
              action: "get-profile-visits"
            },
            success: function ( data ) {

              if ( data == "unknown" ) {
                profile_visits.querySelector ( ".not-enough-visits-wrap" ).style.display = "block";
                console.log ( 'Something went wrong while getting profile visits. Try Again.' );
                return;
              }
              else {
                // To store month names
                // To store monthly visit counts
                // Converting int JSON
                var month_names = [];
                var monthly_visit_count = [];
                data = JSON.parse ( data );

                // Seperating data
                for ( var i in data ) {
                  month_names.push ( data[i].month_id );
                  monthly_visit_count.push ( data[i].monthly_visit_count );
                }

                // Creating graph
                var profile_views_chart = new Chart (
                  profile_visits.querySelector ( "#profile-visits-graph" ), {
                  type: 'line',
                  data: {
                    labels: month_names,
                    datasets: [{
                        label: 'Profile Visits',
                        data: monthly_visit_count,
                        backgroundColor: '#ffe7c6',
                        borderColor: '#fe9000'
                    }]
                  },
                  options: {
                    legend: {
                      display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            },
                            gridLines: {
                              display:false
                            }
                        }],
                        xAxes: [{
                          gridLines: {
                            display:false
                          }
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false
                  }
                });
              }
            }
          });
        }
      }
    });
  }
}