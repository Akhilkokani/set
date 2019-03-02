/**
 * Javascript related to Explore Page
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

// Initialising Charts
market_share_chart = "";
jobs_created_chart = "";
most_ics_are_in_chart = "";
platform_growth_chart = "";


var explore = {

  // Total number of startups
  total_number_of_startups: document.querySelector ( ".quantifying-data-wrap .total-startups span" ),

  // Total number of incubation centers
  total_number_of_ics: document.querySelector ( ".quantifying-data-wrap .total-ics span" ),

  // Total number of jobs created
  total_number_of_jobs_created: document.querySelector ( ".quantifying-data-wrap .total-jobs-created span" ),

  // Title of most jobs created section
  most_jobs_created_title: document.querySelector ( ".most-jobs-created-states-data-wrap h4" ),

  // Sets the scope for exploration
  set_scope: function ( what_to_set ) {
    document.querySelector ( ".scope-details > p#scope" ).innerText = "" + what_to_set;
  },

  // Makes a particular state active
  make_state_active: function ( which_state ) {

    // Getting all states within India
    var all_states = document.querySelectorAll ( ".state" );

    // Removing active-state class from all states, if any
    for ( i = 0; i < all_states.length; i++ ) {
      all_states[i].classList = "state";
    }

    // Element exists in DOM
    if ( document.getElementById ( which_state ) ) {
      document.getElementById ( which_state ).classList += " active-state";
    }
  }
};


var graphs = {

  // Gets startup market share data and creates graph for it
  get_startup_market_share_graph: function() {

    $.ajax({
      cache: false,
      type: "POST",
      url: "./ajax/explore",
      data: {
        action: "startup-categories-market-share"
      },
      success: function(data) {
        
        // Temp variables
        // Converting to JSON
        category_names = [];
        category_market_shares = [];
        data = JSON.parse ( data );

        // Storing response into local variables
        for ( var i in data ) {
          category_names.push ( data[i].category_name );
          category_market_shares.push ( data[i].category_share );
        }

        // Building graph
        market_share_chart = new Chart (
          document.querySelector ( "#market-share-graph" ), {
          type: 'doughnut',
          data: {
            labels: category_names,
            datasets: [{
                label: 'Market Share',
                data: category_market_shares,
                backgroundColor: ['#173f5f', '#20639b', '#3caea3', '#f6d55c', '#7d7d7d']
            }]
          },
          options: {
            legend: {
              display: true
            },
            scales: {
              yAxes: [{
                display: false,
                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                  display: false
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
            maintainAspectRatio: true
          }
        });
      }
    });
  },

  // Gets most job creating states
  get_most_job_creating_states: function() {

    $.ajax({
      cache: false,
      type: "POST",
      url: "./ajax/explore",
      data: {
        action: "most-job-creating-states"
      },
      success: function(data) {
        
        // Temp variables
        // Converting to JSON
        state_names = [];
        jobs_created_in_states = [];
        data = JSON.parse ( data );

        // Storing response into local variables
        for ( var i in data ) {
          state_names.push ( data[i].state_name );
          jobs_created_in_states.push ( data[i].jobs_created );
        }

        // Changing Title
        explore.most_jobs_created_title.innerText = "MOST JOBS CREATING STATES";

        // Building Graph
        jobs_created_chart = new Chart (
          document.querySelector ( "#most-jobs-created-states-graph" ), {
            type: 'horizontalBar',
          data: {
            labels: state_names,
            datasets: [{
                label: 'Jobs Created',
                data: jobs_created_in_states,
                backgroundColor: '#1e90ff',
                borderColor: '#1e90ff'
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                display: true,
                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                  display: false
                }
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display:false
                }
              }]
            },
            responsive: true,
            maintainAspectRatio: true
          }
        });
      }
    });
  },

  // Gets most incubation centers are in graph
  get_most_incubation_centers_are_in: function() {

    $.ajax({
      cache: false,
      type: "POST",
      url: "./ajax/explore",
      data: {
        action: "most-incubation-centers-are-in"
      },
      success: function(data) {
        
        // Temp variables
        // Converting to JSON
        ic_state_names = [];
        ic_quantities = [];
        data = JSON.parse ( data );

        // Storing response into local variables
        for ( var i in data ) {
          ic_state_names.push ( data[i].ic_state_name );
          ic_quantities.push ( data[i].ic_quantity );
        }

        // Building Graph
        most_ics_are_in_chart = new Chart (
          document.querySelector ( "#most-ics-are-in-graph" ), {
            type: 'radar',
          data: {
            labels: ic_state_names,
            datasets: [{
                label: 'Incubation Centers',
                data: ic_quantities,
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
                  display: false
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
            maintainAspectRatio: true
          }
        });
      }
    });
  },

  // Gets platform growth graph
  get_platform_growth: function() {

    $.ajax({
      cache: false,
      type: "POST",
      url: "./ajax/explore",
      data: {
        action: "platform-growth"
      },
      success: function(data) {
        
        // Temp variables
        // Converting to JSON
        growth_months = [];
        growth_values = [];
        data = JSON.parse ( data );

        // Storing response into local variables
        for ( var i in data ) {
          growth_months.push ( data[i].month );
          growth_values.push ( data[i].value );
        }

        // Building Graph
        platform_growth_chart = new Chart (
          document.querySelector ( "#platform-growth-graph" ), {
          type: 'line',
          data: {
            labels: growth_months,
            datasets: [{
                label: 'Growth Month on Month',
                data: growth_values,
                backgroundColor: '#d8e4f3',
                borderColor: '#003c8c'
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                display: true,
                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                  display: true
                }
              }],
              xAxes: [{
                display: true,
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
    });
  },

  // Gets exploration data with respect to state
  get_state_exploration_data: function ( data ) {

    // Converting to JSON
    data = JSON.parse ( data );
    
    // Updating Quantifynig Data Section with New Values
    explore.total_number_of_startups.innerText = data[0]['total_startups'];
    explore.total_number_of_ics.innerText = data[0]['total_ics'];
    explore.total_number_of_jobs_created.innerText = data[0]['total_jobs_created'];

    // To handle 1D of Array
    for ( var i in data ) {

      // Ignoring first index (0)
      if ( i == 1 ) {

        // Temp variables
        // Converting to JSON
        category_names = [];
        category_market_shares = [];

        // Storing response into local variables
        for ( var j in data[i] ) {
          category_names.push ( data[i][j].category_name );
          category_market_shares.push ( data[i][j].category_share );
        }

        // Clearing Previous Graph
        market_share_chart.destroy();

        // Building graph
        market_share_chart = new Chart (
          document.querySelector ( "#market-share-graph" ), {
          type: 'doughnut',
          data: {
            labels: category_names,
            datasets: [{
                label: 'Market Share',
                data: category_market_shares,
                backgroundColor: ['#173f5f', '#20639b', '#3caea3', '#f6d55c', '#7d7d7d']
            }]
          },
          options: {
            legend: {
              display: true
            },
            scales: {
              yAxes: [{
                display: false,
                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                  display: false
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
            maintainAspectRatio: true
          }
        });
      }

      // Most Job Creating Cities
      else if ( i == 2 ) {
        
        // Temp variables
        // Converting to JSON
        state_names = [];
        jobs_created_in_cities = [];

        // Storing response into local variables
        for ( var j in data[i] ) {
          state_names.push ( data[i][j].state_name );
          jobs_created_in_cities.push ( data[i][j].jobs_created );
        }

        // Changing Title
        // Clearing previous graph
        explore.most_jobs_created_title.innerText = "MOST JOBS CREATING CITIES";
        jobs_created_chart.destroy();

        // Building Graph
        jobs_created_chart = new Chart (
          document.querySelector ( "#most-jobs-created-states-graph" ), {
          type: 'horizontalBar',
          data: {
            labels: state_names,
            datasets: [{
                label: 'Jobs Created',
                data: jobs_created_in_cities,
                backgroundColor: '#1e90ff',
                borderColor: '#1e90ff'
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                display: true,
                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                  display: false
                }
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display:false
                }
              }]
            },
            responsive: true,
            maintainAspectRatio: true
          }
        });
      }
      
      // Most Incubation Centers are in
      else if ( i == 3 ) {
        
        // Temp variables
        // Converting to JSON
        ic_state_names = [];
        ic_quantities = [];

        // Storing response into local variables
        for ( var j in data[i] ) {
          ic_state_names.push ( data[i][j].ic_state_name );
          ic_quantities.push ( data[i][j].ic_quantity );
        }

        // Clearing Previous Graph
        most_ics_are_in_chart.destroy();

        // Building Graph
        most_ics_are_in_chart = new Chart (
          document.querySelector ( "#most-ics-are-in-graph" ), {
          type: 'radar',
          data: {
            labels: ic_state_names,
            datasets: [{
                label: 'Incubation Centers',
                data: ic_quantities,
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
                  display: false
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
            maintainAspectRatio: true
          }
        });
      }

      // Platform Growth with Respect to State
      else if ( i == 4 ) {

        // Temp variables
        // Converting to JSON
        growth_months = [];
        growth_values = [];

        // Storing response into local variables
        for ( var j in data[i] ) {
          growth_months.push ( data[i][j].month );
          growth_values.push ( data[i][j].value );
        }

        // Clearing previous graph
        platform_growth_chart.destroy();

        // Building Graph
        platform_growth_chart = new Chart (
          document.querySelector ( "#platform-growth-graph" ), {
          type: 'line',
          data: {
            labels: growth_months,
            datasets: [{
                label: 'Growth Month on Month',
                data: growth_values,
                backgroundColor: '#d8e4f3',
                borderColor: '#003c8c'
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                display: true,
                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                  display: true
                }
              }],
              xAxes: [{
                display: true,
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
  }
};



/** 
 * Requesting to initalise and create random data for exploration.
 * Scope: India
 * 
 */
let initialise_exploration = function() {

  $.ajax({
    cache: false,
    type: "POST",
    url: "./ajax/explore",
    data: {
      action: "initiate-data"
    },
    success: function(data) {
  
      // Converting to JSON
      data = JSON.parse ( data );
      
      // Updating Quantifynig Data Section with New Values
      explore.total_number_of_startups.innerText = data['startups'];
      explore.total_number_of_ics.innerText = data['ics'];
      explore.total_number_of_jobs_created.innerText = data['jobs'];
  
      // Delaying building graphs for better experience
      setTimeout(() => {
  
        // Getting startup categories market share
        graphs.get_startup_market_share_graph();
  
        // Getting most jobs creating states
        graphs.get_most_job_creating_states();
  
        // Getting most incubation centers are in
        graphs.get_most_incubation_centers_are_in();
  
        // Getting platform growth
        graphs.get_platform_growth();
      }, 1900);
    }
  });
}

// Setting Scope
// Initialising Data
explore.set_scope ( "Scope: India" );
initialise_exploration();



/**
 * Sets the Scope for Uttar Pradesh and gets its respective data.
 * Scope: India > Uttar Pradesh
 *
 * @package SET
 *
 * @return void
 */
function scope_UP() {

  // Setting Scope
  // Making State Active
  explore.set_scope ( "Scope: India > Uttar Pradesh" );
  explore.make_state_active ( "Uttar_Pradesh" );

  // Getting Exploration Data related to Jammu and Kashmir State
  $.ajax({
    cache: false,
    type: "POST",
    url: "./ajax/explore",
    data: {
      action: "state-exploration",
      scope: "uttar pradesh"
    },

    success: function ( data ) {
      graphs.get_state_exploration_data ( data );
    }
  });
}



/**
 * Sets the Scope for Jammu & Kashmir and gets its respective data.
 * Scope: India > Jammu & Kashmir
 *
 * @package SET
 *
 * @return void
 */
function scope_JK() {

  // Setting Scope
  // Making State Active
  explore.set_scope ( "Scope: India > Jammu and Kashmir" );
  explore.make_state_active ( "Jammu_and_Kashmir" );

  // Getting Exploration Data related to Jammu and Kashmir State
  $.ajax({
    cache: false,
    type: "POST",
    url: "./ajax/explore",
    data: {
      action: "state-exploration",
      scope: "jammu and kashmir"
    },

    success: function ( data ) {
      graphs.get_state_exploration_data ( data );
    }
  });
}



/**
 * Sets the Scope for Karnataka and gets its respective data.
 * Scope: India > Karnataka
 *
 * @package SET
 *
 * @return void
 */
function scope_Karnataka() {
  
  // Setting Scope
  // Making State Active
  explore.set_scope ( "Scope: India > Karnataka" );
  explore.make_state_active ( "Karnataka" );

  // Getting Exploration Data related to Jammu and Kashmir State
  $.ajax({
    cache: false,
    type: "POST",
    url: "./ajax/explore",
    data: {
      action: "state-exploration",
      scope: "karnataka"
    },

    success: function ( data ) {
      graphs.get_state_exploration_data ( data );
    }
  });
}