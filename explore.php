<?php
/**
 * Explore
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

// Starting Session
session_start();

// SET Library
include_once "./libraries/set/set.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="CodeManiacs">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Explore Startup Ecosystem - CodeManiacs</title>

  <link rel="icon" href="./images/favicon.jpg">
  <link rel="stylesheet" href="./styles/prix.css">
  <link rel="stylesheet" href="./styles/all-page.css">
  <link rel="stylesheet" href="./styles/explore.css">
  
  <script src="./scripts/jquery.js"></script>
  <script src="./scripts/chart.js"></script>
  <script src="./scripts/set.js"></script>

</head>
<body>

  <div class="explore-splash-wrap">
    <div class="explore-splash" style="background: #ffffff;">
      <div class="splash-map-wrap">
        <?php include_once "./_includes/explore_splash_map.php"; ?>
      </div>
      <div class="logo-and-bar-wrap">
        <div class="logo-and-bar" style="position:absolute; top: 35%; left: 10%;">
          <div class="explore-map-title disp-flex" style="fill: #565656;color: #565656;">
            <svg style="display: block;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
              <g>
                <path d="M357.275,125.525c-2.209-3.986-9.498-11.837-13.977-13.325c-5.979-0.921-2.398,4.413-2.398,6.7
                  c-1.543,1.157-3.941,2.454-5.102,4c-0.699,0.6,1.704,6.103,6.337,4.335s1.964,1.799,5.164,8.865s9.607,7.207,12.49,5.067
                  C363.444,138.455,359.286,129.155,357.275,125.525z"/>
                <path d="M375.8,170.6c-0.001,0.006-0.004,0.011-0.005,0.017C375.795,170.629,375.797,170.629,375.8,170.6z"/>
                <path d="M434.6,197.1C435,197.1,432.8,196.7,434.6,197.1L434.6,197.1z"/>
                <path d="M256,32C132.3,32,32,132.3,32,256c0,123.701,100.3,224,224,224c123.701,0,224-100.299,224-224C480,132.3,379.701,32,256,32
                  z M173.399,429.424c-5.515-3.133-9.374-7.56-10.961-15.929c-3.947-20.808-0.303-32.067,17.962-44.245
                  c8.604-5.736,10.022-12.672,16.9-19.55c1.685-2.14,6.211-10.374,9.2-10.8c3.637-0.779,13.709-2.527,15.7-6.5
                  c3.79-5.146,12.127-27.398,15.8-29.602c5.997-3.925,14.419-15.96,8.3-23.1c-7.021-8.643-16.799-8.766-25.9-13.301
                  c-8.015-4.008-11.574-22.281-17.7-28.601c-11.912-12.136-29.999-19.199-45-26.7c-8.116-3.25-7.344-4.256-13.7,2.1
                  c-8.162,8.162-20.093-2.067-21.3-10.5c-0.09-2.802-3.296-18.216-1.4-19.4c17.956-11.225-8.328-8.64-10.5-13.8
                  c-5.355-14.993,13.008-26.86,25.4-28.1c13.885-1.738,16.784,21.895,22.1,19.9c2.556-1.276,2.566-12.394,2.9-14.8
                  c1.267-8.029,3.588-9.273,11.4-12.175c9.098-3.379,16.063-7.617,25.7-9.225c11.006-3.195,20.317-1.533,28.8-8.6
                  c3.888-2.915,6.704,1.58,10.4,2.4c7.999,1.599,9.7-11.1,9.7-15.9c-0.034-4.665,1.265-8.63-4.7-13.6
                  c-7.806-6.069-19.029-0.869-25.3,5.4c-7.574,7.035-16.357,6.55-13.8-5.6c0.634-4.433,10.209-9.587,14-12
                  c3.7-2.222,5.904,2.522,10.4,1.4c6.579-1.463,9.034,4.735,16.8,4.8c3.233-0.731,14.796-6.881,8.614-19.366
                  C254.143,64.021,255.07,64,256,64c1.855,0,3.707,0.034,5.555,0.086c2.805,8.881-5.965,16.443-1.555,27.614
                  c8.79,21.475,15.992,3.014,24.7-7c2.849-2.849,4.633-2.211,9.3-3.1c2.896-0.483,7.055-9.27,8.393-11.982
                  c20.058,4.956,39.121,13.127,56.567,24.255c-7.447,0.792-9.348-1.396-9.234,7.377c0.042,3.317,0.297,13.319,5.274,14.15
                  c8.277,0.975,6.781,6.832,14.551,7.85c7.443,0.976,2.816,7.553,5.851,14.05c3.393,10.227-19.806,13.302-24.302,14.8
                  c-13.64,4.554,6.34,24.41,15.2,22.3c2.817-0.704,12.215-1.902,12.867-5.067c-0.011-0.323-1.836-11.012-0.867-12.233
                  c1.533-1.934,5.123-2.946,10.776,0.255c13.374,7.573,20.146,25.7,35.897,29.295c2.146,0.489,5.86-0.15,8.494,2.033
                  c2.231,3.015,7.92,8.416,1.131,8.416c-9.017-2.003-13.78,0.859-21.198-4.874c-7.733-5.977-12.543-10.891-22.75-11.076
                  c-8.79-0.159-16.68-3.819-25.738-2.35c-5.05,0.819-10.038,2.811-14.912,4.3c-4.617,1.538-5.51,9.765-10.2,10.7
                  c-19.467,4.581-15.261,23.169-18.773,37.913c-1.351,5.662-6.025,21.003-0.926,26.087c9.12,8.854,19.783,21.035,33.176,22.963
                  c7.206,1.037,22.954-4.576,27.823,2.737c2.062,4.104,7.447-3.03,8.9,0.601c3.663,10.988-4.263,18.186-4.337,28.551
                  c-0.11,15.203,9.178,20.57-3.263,34.148c-13.642,13.607-4.333,30.788-11.9,47c-4.042,8.337-4.808,19.894-10.872,23.777
                  c-13.321,8.532-27.7,15.399-42.714,20.384c-26.627,8.838-55.155,11.672-83.017,8.456c-14.619-1.688-29.041-5.057-42.88-10.065
                  c-3.769-1.363-7.28-2.505-10.472-3.704C178.143,431.619,175.759,430.55,173.399,429.424z M131.699,402.329
                  c-0.468-0.397-0.935-0.796-1.399-1.198c-3.444-2.992-6.802-6.113-10.06-9.371c-3.388-3.388-6.634-6.881-9.734-10.471
                  c-0.035-0.041-0.07-0.082-0.105-0.123c-0.637-0.738-1.257-1.486-1.882-2.234C56.834,316.471,49.259,225.004,92.6,155.1
                  c6.078,6.078-4.101,18.024,7.5,26c5.124,3.606,10.021,2.159,9,8.8c-0.993,6.449,5.355,6.335,6.3,12
                  c2.842,12.429,19.207,18.642,9.9,32.6c-9.118,12.625-16.992,26.729-10.1,42.8c2.254,5.86,7.919,11.858,12.222,16.244
                  c7.813,7.966,7.377,3.188,7.377,13.256c-0.156,4.373,5.261,8.897,4.7,11.7c-1.001,8.011-2.904,15.93-3.9,23.9
                  c-1.792,28.638-0.129,56.662,21.3,78.1c-7.969-4.806-15.636-10.249-22.968-16.29C133.183,403.591,132.44,402.961,131.699,402.329z"
                  />
              </g>
            </svg>
            <div class="title-wrap">
              <h1 style="margin: 0 0 0 .25em; font-family: sans-serif;">Startup Explorer</h1>
            </div>
          </div>
          <div class="bar-wrap" style="width: 350px; height: 6px; margin: 2em 0; border-radius: 5px; border: 1px solid #ededed;">
            <div class="bar" style="width: 0%; height: inherit; margin: 0 0 2em 0; transition: width .50s ease-in; border-top-left-radius: inherit; border-bottom-left-radius: inherit; background: #006cfe;"></div>
            <span style="color: #5d5d5d; font-size: 1.3em; margin-top: 1em; display: block;" class="bar-info">Loading Wheat Bowl...</span>
          </div>
          <div class="credit-info" style="margin-top: 16em;">
            <span style="color: #adadad; font-size: 1.2em;">Designed &amp; Developed By CodeManiacs for SIH 2019</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="explore-wrap" style="opacity: 0; transition: opacity .50s ease-in;">
    <div class="explore">
      <div class="header-wrap">
        <div class="header">
          <div class="explore-map-title-wrap">
            <div class="explore-map-title disp-flex">
              <svg style="display: block;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                <g>
                  <path d="M357.275,125.525c-2.209-3.986-9.498-11.837-13.977-13.325c-5.979-0.921-2.398,4.413-2.398,6.7
                    c-1.543,1.157-3.941,2.454-5.102,4c-0.699,0.6,1.704,6.103,6.337,4.335s1.964,1.799,5.164,8.865s9.607,7.207,12.49,5.067
                    C363.444,138.455,359.286,129.155,357.275,125.525z"/>
                  <path d="M375.8,170.6c-0.001,0.006-0.004,0.011-0.005,0.017C375.795,170.629,375.797,170.629,375.8,170.6z"/>
                  <path d="M434.6,197.1C435,197.1,432.8,196.7,434.6,197.1L434.6,197.1z"/>
                  <path d="M256,32C132.3,32,32,132.3,32,256c0,123.701,100.3,224,224,224c123.701,0,224-100.299,224-224C480,132.3,379.701,32,256,32
                    z M173.399,429.424c-5.515-3.133-9.374-7.56-10.961-15.929c-3.947-20.808-0.303-32.067,17.962-44.245
                    c8.604-5.736,10.022-12.672,16.9-19.55c1.685-2.14,6.211-10.374,9.2-10.8c3.637-0.779,13.709-2.527,15.7-6.5
                    c3.79-5.146,12.127-27.398,15.8-29.602c5.997-3.925,14.419-15.96,8.3-23.1c-7.021-8.643-16.799-8.766-25.9-13.301
                    c-8.015-4.008-11.574-22.281-17.7-28.601c-11.912-12.136-29.999-19.199-45-26.7c-8.116-3.25-7.344-4.256-13.7,2.1
                    c-8.162,8.162-20.093-2.067-21.3-10.5c-0.09-2.802-3.296-18.216-1.4-19.4c17.956-11.225-8.328-8.64-10.5-13.8
                    c-5.355-14.993,13.008-26.86,25.4-28.1c13.885-1.738,16.784,21.895,22.1,19.9c2.556-1.276,2.566-12.394,2.9-14.8
                    c1.267-8.029,3.588-9.273,11.4-12.175c9.098-3.379,16.063-7.617,25.7-9.225c11.006-3.195,20.317-1.533,28.8-8.6
                    c3.888-2.915,6.704,1.58,10.4,2.4c7.999,1.599,9.7-11.1,9.7-15.9c-0.034-4.665,1.265-8.63-4.7-13.6
                    c-7.806-6.069-19.029-0.869-25.3,5.4c-7.574,7.035-16.357,6.55-13.8-5.6c0.634-4.433,10.209-9.587,14-12
                    c3.7-2.222,5.904,2.522,10.4,1.4c6.579-1.463,9.034,4.735,16.8,4.8c3.233-0.731,14.796-6.881,8.614-19.366
                    C254.143,64.021,255.07,64,256,64c1.855,0,3.707,0.034,5.555,0.086c2.805,8.881-5.965,16.443-1.555,27.614
                    c8.79,21.475,15.992,3.014,24.7-7c2.849-2.849,4.633-2.211,9.3-3.1c2.896-0.483,7.055-9.27,8.393-11.982
                    c20.058,4.956,39.121,13.127,56.567,24.255c-7.447,0.792-9.348-1.396-9.234,7.377c0.042,3.317,0.297,13.319,5.274,14.15
                    c8.277,0.975,6.781,6.832,14.551,7.85c7.443,0.976,2.816,7.553,5.851,14.05c3.393,10.227-19.806,13.302-24.302,14.8
                    c-13.64,4.554,6.34,24.41,15.2,22.3c2.817-0.704,12.215-1.902,12.867-5.067c-0.011-0.323-1.836-11.012-0.867-12.233
                    c1.533-1.934,5.123-2.946,10.776,0.255c13.374,7.573,20.146,25.7,35.897,29.295c2.146,0.489,5.86-0.15,8.494,2.033
                    c2.231,3.015,7.92,8.416,1.131,8.416c-9.017-2.003-13.78,0.859-21.198-4.874c-7.733-5.977-12.543-10.891-22.75-11.076
                    c-8.79-0.159-16.68-3.819-25.738-2.35c-5.05,0.819-10.038,2.811-14.912,4.3c-4.617,1.538-5.51,9.765-10.2,10.7
                    c-19.467,4.581-15.261,23.169-18.773,37.913c-1.351,5.662-6.025,21.003-0.926,26.087c9.12,8.854,19.783,21.035,33.176,22.963
                    c7.206,1.037,22.954-4.576,27.823,2.737c2.062,4.104,7.447-3.03,8.9,0.601c3.663,10.988-4.263,18.186-4.337,28.551
                    c-0.11,15.203,9.178,20.57-3.263,34.148c-13.642,13.607-4.333,30.788-11.9,47c-4.042,8.337-4.808,19.894-10.872,23.777
                    c-13.321,8.532-27.7,15.399-42.714,20.384c-26.627,8.838-55.155,11.672-83.017,8.456c-14.619-1.688-29.041-5.057-42.88-10.065
                    c-3.769-1.363-7.28-2.505-10.472-3.704C178.143,431.619,175.759,430.55,173.399,429.424z M131.699,402.329
                    c-0.468-0.397-0.935-0.796-1.399-1.198c-3.444-2.992-6.802-6.113-10.06-9.371c-3.388-3.388-6.634-6.881-9.734-10.471
                    c-0.035-0.041-0.07-0.082-0.105-0.123c-0.637-0.738-1.257-1.486-1.882-2.234C56.834,316.471,49.259,225.004,92.6,155.1
                    c6.078,6.078-4.101,18.024,7.5,26c5.124,3.606,10.021,2.159,9,8.8c-0.993,6.449,5.355,6.335,6.3,12
                    c2.842,12.429,19.207,18.642,9.9,32.6c-9.118,12.625-16.992,26.729-10.1,42.8c2.254,5.86,7.919,11.858,12.222,16.244
                    c7.813,7.966,7.377,3.188,7.377,13.256c-0.156,4.373,5.261,8.897,4.7,11.7c-1.001,8.011-2.904,15.93-3.9,23.9
                    c-1.792,28.638-0.129,56.662,21.3,78.1c-7.969-4.806-15.636-10.249-22.968-16.29C133.183,403.591,132.44,402.961,131.699,402.329z"
                    />
                </g>
              </svg>
              <div>
                <h2>Explore Startup Ecosystem</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="explore-map-wrap">
        <div class="explore-map">
          <?php include_once "./_includes/explore_content_map.php"; ?>
        </div>
        <div class="explore-map-user-selection-details-wrap">
          <div class="explore-map-user-selection-details">
            <div class="disp-flex">
              <div class="scope-details-wrap" style="flex:1;">
                <div class="scope-details">
                  <p id="scope" class="para">Scope: India</p>
                </div>
              </div>
              <div class="made-possible-wrap">
                <div class="made-possible">
                  <p class="para" style="color:#cacaca;">Made Posible by CodeManiacs</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="explore-contents-wrap">
        <div class="explore-contents">
          <div class="contents">
            <div class="quantifying-data-wrap" style="margin-bottom: 3em;">
              <div class="title-wrap">
                <h4 style="text-align:left;" class="title">TOTAL</h4>
              </div>
              <div class="quantifying-data"> 
                <div class="disp-flex" style="margin-bottom: 2em;">
                  <div class="side-by-side total-startups">
                    <div class="number">
                      <span>256</span>
                    </div>
                    <div class="name">
                      <span>Startups</span>
                    </div>
                  </div>
                  <div class="side-by-side total-ics">
                    <div class="number">
                      <span>176</span>
                    </div>
                    <div class="name">
                      <span>Incubation Centers</span>
                    </div>
                  </div>
                </div>
                <div class="total-jobs-created" style="text-align: center;">
                  <div class="number">
                    <span>187</span>
                  </div>
                  <div class="name">
                    <span>Jobs Created</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="market-share-data-wrap" style="margin-bottom: 3em;">
              <div class="title-wrap" style="margin-bottom: 1.5em;">
                <h4 style="text-align:left;" class="title">STARTUP CATEGORIES MARKET SHARE</h4>
              </div>
              <div class="market-share-data">
                <div class="graph-container" style="width:100%; height:100%; position: relative;">
                  <canvas id="market-share-graph" width="100%" height="100%"></canvas>
                </div>
              </div>
            </div>

            <div class="most-jobs-created-states-data-wrap" style="margin-bottom: 3em;">
              <div class="title-wrap">
                <h4 style="text-align:left;" class="title">MOST JOB CREATING STATES</h4>
              </div>
              <div class="most-jobs-created-states-data">
                <div class="graph-container" style="width:100%; height:100%; position: relative;">
                  <canvas id="most-jobs-created-states-graph" width="100%" height="100%"></canvas>
                </div>
              </div>
            </div>

            <div class="most-ics-are-in-data-wrap" style="margin-bottom: 3em;">
              <div class="title-wrap">
                <h4 style="text-align:left;" class="title">MOST INCUBATION CENTERS ARE IN</h4>
              </div>
              <div class="most-ics-are-in-states-data">
                <div class="graph-container" style="width:100%; height:100%; position: relative;">
                  <canvas id="most-ics-are-in-graph" width="100%" height="100%"></canvas>
                </div>
              </div>
            </div>

            <div class="platform-growth-data-wrap" style="margin-bottom: 3em;">
              <div class="title-wrap" style="margin-bottom: 1.5em;">
                <h4 style="text-align:left;" class="title">OVERALL PLATFORM GROWTH</h4>
              </div>
              <div class="platform-growth-data">
                <div class="graph-container" style="width:100%; height: 120px; position: relative;">
                  <canvas id="platform-growth-graph" width="100%" height="100%"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    bar_width = 0;
    _bar = $ ( ".explore-splash-wrap .bar" );
    _bar_info = $ ( ".explore-splash-wrap .bar-wrap span" );

    var splash = setInterval(() => {
      
      if ( bar_width <= 100 ) {

        switch (bar_width) {
          case 25:
            _bar_info.text ( "Loading Capital City..." );
            break;

          case 47:
            _bar_info.text ( "Loading Wheat Bowl..." );
            break;

          case 87:
            _bar_info.text ( "Loading Kunda Nagari..." );
            break;

          case 99:
            _bar_info.text ( "Loading Last Point of India..." );
            break;
        
          default:
            _bar_info.text ( "Loading Data..." );
            break;
        }
        _bar.css ( "width", (++bar_width) + "%" );
      }
      else if ( bar_width >= 100 ) {
        $ ( ".explore-splash" ).css ( "top", "100%" );
        $ ( ".explore-splash" ).css ( "opacity", "0" );
        $ ( ".explore-wrap" ).css ( "opacity", "1" );
        document.querySelector ( ".splash-map" ).outerHTML = "";
        clearInterval ( splash );
      }
    }, 20);
  </script>
  <script src="./scripts/explore.js"></script>
</body>
</html>