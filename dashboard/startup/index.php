<?php
/**
 * Startup Page Inside Dashboard
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

session_start();
include_once "../_includes/check_login_status.php";
include_once "../../libraries/set/set.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>My Startup - Startup Ecosystem Tracker | CodeManiacs</title>

  <link rel="icon" href="../../images/favicon.jpg">
  <link rel="stylesheet" href="../../styles/prix.css">
  <link rel="stylesheet" href="../../styles/all-page.css">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <link rel="stylesheet" href="../styles/startup.css">
  
  <script src="../../scripts/jquery.js"></script>
  <script src="../../scripts/chart.js"></script>
  <script src="../../scripts/set.js"></script>
  <script src="../scripts/startup_graphs.js"></script>

</head>
<body>

  <div class="startup-wrap">
    <div class="dashboard-divider-wrap disp-flex">

      <?php include_once "../_includes/dashboard_sidebar.php"; ?>

      <script>
        // Activating startup tab
        document.querySelector ( ".startup" ).className += " active";
      </script>

      <div class="dashboard-tab-content-wrap startup-tab-content-wrap">
        
        <div class="dashboard-tab-header-wrap disp-flex">
          <div class="tab-header">
            <div class="tab-title-wrap vert-center">
              <div class="tab-title-icon">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="25px" height="25px" viewBox="0 0 512 512" xml:space="preserve">
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
                </div>
              <div class="tab-title">
                <span>My Startup</span>
              </div>
            </div>
          </div>

          <?php include "../_includes/page_header_actions.php"; ?>
        </div>

        <div class="dashboard-content startup-tab-content">
          <!-- If User has not listed his/her startup -->
          <?php if ( $user->check_if_user_has_startup ($connection, $logged_in_user_id) == false ) { ?>
          <div class="dashboard-floor startup-floor">
            <div class="no-startup-wrap">
              <div class="no-startup">
                <div class="no-startup-image-wrap">
                  <div class="no-startup-image">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      width="125px" height="125px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                      <path d="M383.1,257.4c0.6-5.4,0.9-10,0.9-13.8c0-19.6-3.3-19.7-16-19.7h-75.5c7.3-12,11.5-24.4,11.5-37c0-37.9-57.3-56.4-57.3-88
                        c0-11.7,5.1-21.3,9.3-34.9c-26.5,7-47.4,33.5-47.4,61.6c0,48.3,56.3,48.7,56.3,84.8c0,4.5-1.4,8.5-2.1,13.5h-55.9
                        c0.8-3,1.3-6.2,1.3-9.3c0-22.8-39.1-33.9-39.1-52.8c0-7,1-12.8,3.2-21c-12.9,5.1-28.3,20-28.3,36.8c0,26.7,31.9,29.3,36.8,46.3H80
                        c-12.7,0-16,0.1-16,19.7c0,19.6,7.7,61.3,28.3,111c20.6,49.7,44.4,71.6,61.2,86.2l0.1-0.2c5.1,4.6,11.8,7.3,19.2,7.3h102.4
                        c7.4,0,14.1-2.7,19.2-7.3l0.1,0.2c9-7.8,20-17.8,31.4-32.9c4.7,2,9.8,3.7,15.4,5c8.4,2,16.8,3,24.8,3c24,0,45.6-9.2,60.8-25.8
                        c13.4-14.6,21.1-34.4,21.1-54.2C448,297,420,264.5,383.1,257.4z M366.1,384.2c-8.6,0-15.6-1.2-22.1-4.2c4-8,7.9-15.9,11.7-25.1
                        c10.1-24.4,17.1-47,21.6-65.8c22,4.3,38.7,23.8,38.7,47.1C416,358.9,398.8,384.2,366.1,384.2z"/>
                    </svg>
                  </div>
                </div>
                <div class="no-startup-content">
                  <div class="no-startup-title-wrap">
                    <h2>No Content Here</h2>
                  </div>
                  <div class="no-startup-para-wrap">
                    <span>It seems that you have not listed your startup yet. To list your startup click below.</span>
                  </div>
                  <div class="no-startup-action-wrap">
                    <button id="list_my_startup" class="prix-primary" title="Add your first startup">List My Startup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } else { ?>

          <?php 
          // Acts as global variable for entire page
          $startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id ); ?>

          <!-- Profile Visits -->
          <div class="dashboard-floor startup-floor">
            <div class="startup-profile-visits-wrap">
              <div class="startup-profile-visits">
                <div class="dboard-title-wrap">
                  <div class="dboard-title">
                    <span>Profile Visits</span>
                  </div>
                </div>

                <div class="profile-visits-graph-wrap">
                  <div class="profile-visits">
                    <!-- When there no enough visits -->
                    <div class="not-enough-visits-wrap" style="display: none;">
                      <div class="no-enough-visits">
                        <div class="no-enough-visits-image-wrap">
                          <div class="not-enough-visits-image">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                              width="125px" height="125px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                              <path d="M383.1,257.4c0.6-5.4,0.9-10,0.9-13.8c0-19.6-3.3-19.7-16-19.7h-75.5c7.3-12,11.5-24.4,11.5-37c0-37.9-57.3-56.4-57.3-88
                                c0-11.7,5.1-21.3,9.3-34.9c-26.5,7-47.4,33.5-47.4,61.6c0,48.3,56.3,48.7,56.3,84.8c0,4.5-1.4,8.5-2.1,13.5h-55.9
                                c0.8-3,1.3-6.2,1.3-9.3c0-22.8-39.1-33.9-39.1-52.8c0-7,1-12.8,3.2-21c-12.9,5.1-28.3,20-28.3,36.8c0,26.7,31.9,29.3,36.8,46.3H80
                                c-12.7,0-16,0.1-16,19.7c0,19.6,7.7,61.3,28.3,111c20.6,49.7,44.4,71.6,61.2,86.2l0.1-0.2c5.1,4.6,11.8,7.3,19.2,7.3h102.4
                                c7.4,0,14.1-2.7,19.2-7.3l0.1,0.2c9-7.8,20-17.8,31.4-32.9c4.7,2,9.8,3.7,15.4,5c8.4,2,16.8,3,24.8,3c24,0,45.6-9.2,60.8-25.8
                                c13.4-14.6,21.1-34.4,21.1-54.2C448,297,420,264.5,383.1,257.4z M366.1,384.2c-8.6,0-15.6-1.2-22.1-4.2c4-8,7.9-15.9,11.7-25.1
                                c10.1-24.4,17.1-47,21.6-65.8c22,4.3,38.7,23.8,38.7,47.1C416,358.9,398.8,384.2,366.1,384.2z"/>
                            </svg>
                          </div>
                        </div>
                        <div class="not-enough-visits-content">
                          <div class="not-enough-visits-title-wrap">
                            <h2>No Enough Data to Show</h2>
                          </div>
                          <div class="not-enough-visits-para-wrap">
                            <span>As People Visit Your Profile Month on Month Data will Start Displaying.</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="graph-container" style="width:100%; height:350px; position: relative;">
                      <canvas id="profile-visits-graph" width="100%" height="100%"></canvas>
                    </div>
                  </div>
                </div>
                <script>
                  profile_visits ( document.querySelector(".profile-visits-graph-wrap") );
                </script>
              </div>
            </div>
          </div>
          
          <!-- Top Locations and Job Applications Received -->
          <div class="floor-row-wrap disp-flex">
            <!-- Top Locations -->
            <div class="dashboard-floor startup-floor" style="width:50%; margin-right:5px;">
              <div class="startup-top-locations-wrap">
                <div class="startup-top-locations-visits">
                  <div class="dboard-title-wrap">
                    <div class="dboard-title">
                      <span>Top Locations</span>
                    </div>
                  </div>
                  <div class="top-locations-graph-wrap">
                    <div class="profile-visits">
                      <!-- When there no enough visits -->
                      <div class="not-enough-visits-wrap" style="display: none;">
                        <div class="no-enough-visits">
                          <div class="no-enough-visits-image-wrap">
                            <div class="not-enough-visits-image">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="125px" height="125px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <path d="M383.1,257.4c0.6-5.4,0.9-10,0.9-13.8c0-19.6-3.3-19.7-16-19.7h-75.5c7.3-12,11.5-24.4,11.5-37c0-37.9-57.3-56.4-57.3-88
                                  c0-11.7,5.1-21.3,9.3-34.9c-26.5,7-47.4,33.5-47.4,61.6c0,48.3,56.3,48.7,56.3,84.8c0,4.5-1.4,8.5-2.1,13.5h-55.9
                                  c0.8-3,1.3-6.2,1.3-9.3c0-22.8-39.1-33.9-39.1-52.8c0-7,1-12.8,3.2-21c-12.9,5.1-28.3,20-28.3,36.8c0,26.7,31.9,29.3,36.8,46.3H80
                                  c-12.7,0-16,0.1-16,19.7c0,19.6,7.7,61.3,28.3,111c20.6,49.7,44.4,71.6,61.2,86.2l0.1-0.2c5.1,4.6,11.8,7.3,19.2,7.3h102.4
                                  c7.4,0,14.1-2.7,19.2-7.3l0.1,0.2c9-7.8,20-17.8,31.4-32.9c4.7,2,9.8,3.7,15.4,5c8.4,2,16.8,3,24.8,3c24,0,45.6-9.2,60.8-25.8
                                  c13.4-14.6,21.1-34.4,21.1-54.2C448,297,420,264.5,383.1,257.4z M366.1,384.2c-8.6,0-15.6-1.2-22.1-4.2c4-8,7.9-15.9,11.7-25.1
                                  c10.1-24.4,17.1-47,21.6-65.8c22,4.3,38.7,23.8,38.7,47.1C416,358.9,398.8,384.2,366.1,384.2z"/>
                              </svg>
                            </div>
                          </div>
                          <div class="not-enough-visits-content">
                            <div class="not-enough-visits-title-wrap">
                              <h2>No Content Here</h2>
                            </div>
                            <div class="not-enough-visits-para-wrap">
                              <span>Not Enough Data to Show.</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- When there enough visits -->
                      <div class="graph-container" style="display: none; width:100%; height:350px; position: relative;">
                        <canvas id="top-locations-graph" width="100%" height="100%"></canvas>
                      </div>
                    </div>
                  </div>
                  <script>
                    top_locations ( document.querySelector(".top-locations-graph-wrap") );
                  </script>
                </div>
              </div>
            </div>
            
            <!-- Job Applications Received -->
            <div class="dashboard-floor startup-floor" style="margin-left:5px; width:50%;">
              <div class="job-applications-wrap">
                <div class="job-applications">
                  <div class="dboard-title-wrap disp-flex">
                    <div class="dboard-title" style="flex:1;">
                      <span>Job Applications Received</span>
                    </div>
                    <div class="job-application-action-wrap">
                      <div class="job-application-action vert-center">
                        <?php if ( $startup->get_hiring($connection, $startup_id) == 1 ) { ?>
                          <a style="font-size:11px; font-family:sans-serif; color:#9a9a9a;" title="Stop Hiring" id="hire" data-action='0'>Stop Hiring</a>
                        <?php } else { ?>
                          <a style="font-size:11px; font-family:sans-serif; color:#9a9a9a;" title="Start Hiring" id="hire" data-action='1'>Start Hiring</a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>

                  <?php if ( $startup->get_hiring($connection, $startup_id) == 0 || $startup->count_number_of_job_applications_received ( $connection, $startup_id ) == 0 ) { ?>
                  <!-- No Applications Received or Startup is not hiring -->
                  <div class="no-data-job-applications-wrap" style="height:370px;">
                    <div class="no-data vert-center">
                      <div style="margin:auto;">
                        <div style="margin-top:-15px;">
                          <svg version="1.1" style="fill:#bdbdbd;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="202px" height="202px" viewBox="0 0 512 512" xml:space="preserve">
                            <g>
                              <path d="M202.4,201.7L202.4,201.7L202.4,201.7z"/>
                              <path d="M363.3,363.9c-12.9-4.6-31.4-6.2-43.2-8.8c-6.8-1.5-16.7-5.3-20-9.2c-3.3-4-1.3-40.9-1.3-40.9s6.1-9.6,9.4-18
                                s6.9-31.4,6.9-31.4s6.8,0,9.2-11.9c2.6-13,6.6-18.4,6.1-28.1c-0.5-9-5.2-9.5-5.7-9.5l0,0c0,0,4.9-13.6,5.6-42.4
                                C331.1,129.6,305,96,256,96s-75,33.5-74.3,67.6c0.6,28.7,5.6,42.4,5.6,42.4l0,0c-0.5,0-5.2,0.5-5.7,9.5c-0.5,9.7,3.6,14.9,6.1,27.9
                                c2.4,11.9,9.2,12,9.2,12s3.6,23.1,6.9,31.5c3.3,8.5,9.4,18,9.4,18s2,36.9-1.3,40.9c-3.3,4-13.2,7.7-20,9.2
                                c-11.9,2.6-30.3,4.3-43.2,8.9C135.8,368.5,96,384,96,416h160h160C416,384,376.2,368.5,363.3,363.9z M256,400H118.7
                                c2-3,4.7-5.1,8.2-7.6c7-5.1,16.1-9.8,27.1-13.6c6.8-2.4,16.7-4,25.4-5.3c5.7-0.9,11.1-1.7,15.9-2.8c3.4-0.8,20.8-5,28.8-14.6
                                c4.5-5.4,5.8-12.7,5.6-32.3c-0.1-10-0.6-19.3-0.6-19.7l-0.2-4.2l-2.3-3.5c-1.5-2.3-5.8-9.5-8-15.3c-1.8-4.7-4.6-19.2-6-28.1
                                c0,0,0.4,1-0.5-3.7c-0.9-4.7-8.4-4.3-9.4-8c-0.9-3.6-1.8-6.9-4.3-18.2c-2.5-11.3,2.8-11.2,3.9-16.2c0.6-3.1,0-5.7,0-5.8l0,0
                                c-0.3-1-4.1-13.4-4.7-37.7c-0.3-13.2,4.6-25.6,13.8-34.9c10.6-10.8,26-16.5,44.5-16.5c19,0,34,5.7,44.6,16.5
                                c9.2,9.3,14.1,21.7,13.8,34.9c-0.5,24.2-4.3,36.6-4.7,37.7l0,0c0,0.1-0.6,1.7-0.4,5.2c0.2,5.4,6.8,5.5,4.3,16.8
                                c-2.5,11.3-3.4,14.6-4.3,18.2c-0.9,3.6-8.5,3.3-9.4,8c-0.9,4.7-0.5,3.7-0.5,3.7c-1.4,8.9-4.2,23.4-6,28.1c-2.3,5.8-6.6,13-8,15.3
                                l-2.3,3.5l-0.2,4.2c0,0.4-0.5,9.7-0.6,19.7c-0.2,19.6,1.1,26.9,5.6,32.3c8,9.5,25.4,13.8,28.8,14.6c4.8,1.1,10.2,1.9,15.9,2.8
                                c8.7,1.3,18.6,2.9,25.4,5.3c11,3.9,20.2,8.6,27.1,13.7c3.5,2.5,6.2,4.6,8.2,7.6L256,400L256,400z"/>
                            </g>
                          </svg>
                        </div>
                        <div class="">
                          <span style="display: block; margin-top: -10px; text-align:center; font-size: 15px; font-family: sans-serif; color:#bdbdbd;">No data to display</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } else { ?>

                  <div class="applications-list">
                  <?php 
                  // Getting job applicants
                  $query_to_get_job_applicants = mysqli_query (
                    $connection,
                    " SELECT 
                      job_applier_user_id 
                    FROM 
                      jobs_applied 
                    WHERE 
                      job_applied_startup_id = '$startup_id' "
                  );

                  // Job Applicants found
                  if ( mysqli_num_rows($query_to_get_job_applicants) > 0 ) {

                    // Fetching Job Applicants details one by one
                    while ( $job_applicant = mysqli_fetch_assoc($query_to_get_job_applicants) ) {

                      // Checking whether user has uploaded CV or not
                      if ( 
                        $user->get_cv_id ( $connection, $job_applicant['job_applier_user_id'] ) != "" || 
                        !is_null($user->get_cv_id($connection, $job_applicant['job_applier_user_id']))
                      ) {
                        // Getting applicant profile picture
                        $job_applicant_profile_picture = $user->get_profile_picture_id ( $connection, $job_applicant['job_applier_user_id'] );

                        // Default profile picture
                        if ( $job_applicant_profile_picture == "" || is_null($job_applicant_profile_picture) )
                          $job_applicant_profile_picture = "../../images/default_user_profile_picture.png";
                        // Custom profile picture
                        else
                          $job_applicant_profile_picture = "../../files/profile_pictures/" . $user->get_profile_picture_id ( $connection, $job_applicant['job_applier_user_id'] ); ?>
                        <div class="application">
                          <div class="disp-flex">
                            <div class="applicator-profile-pic-wrap">
                              <div class="applicator-profile-pic">
                                <img style="border-radius: 100px;" src="<?php echo $job_applicant_profile_picture; ?>" width="32" height="32" />
                              </div>
                            </div>
                            <div class="applicator-name" style="height: 32px; flex:1;">
                              <p class="vert-center" style="margin: 0 0 0 8px; font-family: sans-serif; font-size: 12px;"><?php echo $user->get_name ( $connection, $job_applicant['job_applier_user_id'] ); ?></p>
                            </div>
                            <div class="applicator-actions-wrap" style="height:32px;">
                              <div class="applicator-actions disp-flex vert-center">
                                <div class="applicator-view-cv-action-wrap">
                                  <a title="View CV" target="_blank" href="../../files/cv/<?php echo $user->get_cv_id ( $connection, $job_applicant['job_applier_user_id'] ); ?>">View CV</a>
                                </div>
                                <div class="applicator-add-as-team-member-action-wrap">
                                  <a title="Add to team" onclick="add_to_team ( '<?php echo $job_applicant['job_applier_user_id']; ?>' );">Add to team</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php 
                      } // Checking whether user has uploaded CV or not END
                    } // Fetching Job Applicants details one by one END
                  } // Job Applicants found END ?>
                  </div>
                  <?php } ?>
                  <!-- Application list end -->
                </div>
              </div>
            </div>
          </div>   
          
          <!-- Team Details -->
          <div class="dashboard-floor startup-floor">
            <div class="dboard-title-wrap disp-flex">
              <div class="dboard-title" style="flex:1;">
                <span>Team</span>
              </div>
              <div class="add-new-member-action-wrap" style="height:21px;">
                <div class="add-new-member vert-center">
                  <a style="font-size:12px;" onclick="request_user_to_join_team();" title="Add New Team Member">Add New</a>
                </div>
              </div>
            </div>
            <div class="team-details-wrap">
              <div class="team-details">
                <div class="team-members-wrap">
                  <div class="team-member-wrap disp-flex">
                    <?php

                    // Getting team member details
                    $query_to_get_team_member_details = mysqli_query (
                      $connection,
                      " SELECT 
                        startup_team_member_user_id 
                      FROM 
                        startup_team_member_details 
                      WHERE 
                        startup_team_member_startup_id = '$startup_id' "
                    );

                    // Team members exists
                    if ( mysqli_num_rows($query_to_get_team_member_details) > 0 ) {

                      // Fetching team member deatails one by one
                      while ( $team_member = mysqli_fetch_assoc($query_to_get_team_member_details) ) {

                        // Default profile picture
                        if ( 
                          $user->get_profile_picture_id($connection, $team_member['startup_team_member_user_id']) == "" || 
                          is_null($user->get_profile_picture_id($connection, $team_member['startup_team_member_user_id']))
                        ) {
                          $team_member_profile_picture = "../../images/default_user_profile_picture.png";
                        }
                        // Custom profile picture
                        else {
                          $team_member_profile_picture = "../../files/profile_pictures/" . $user->get_profile_picture_id($connection, $team_member['startup_team_member_user_id']);
                        } ?>
                          <div class="team-member">
                            <div class="profile-picture-wrap">
                              <img style="border-radius: 100px;" src="<?php echo $team_member_profile_picture; ?>" width="101" height="101">
                            </div>
                            <div class="name-wrap">
                              <span><?php echo $user->get_name ( $connection, $team_member['startup_team_member_user_id'] ); ?></span>
                            </div>
                          </div>
                          <?php
                      } // Fetching team member deatails one by one END
                    } // Team members exists END ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Investor/Director Details -->
          <div class="dashboard-floor startup-floor">
            <div class="dboard-title-wrap disp-flex">
              <div class="dboard-title" style="flex:1;">
                <span>Investor/Directors</span>
              </div>
              <div class="add-new-investor-action-wrap" style="height:21px;">
                <div class="add-new-investor vert-center">
                  <a style="font-size:12px;" onclick="request_investor_to_join();" title="Add New Investor/Director">Add New</a>
                </div>
              </div>
            </div>
            <div class="investor-details-wrap">
              <div class="investor-details">
                <div class="investors-collection-wrap">
                  <div class="investor-wrap disp-flex">
                    <?php
                    // Getting investor details
                    $query_to_get_investor_details = mysqli_query (
                      $connection,
                      " SELECT 
                        startup_investor_user_id 
                      FROM 
                        startup_investor_details 
                      WHERE 
                        startup_investor_startup_id = '$startup_id' "
                    );

                    // Investors exists
                    if ( mysqli_num_rows($query_to_get_investor_details) > 0 ) {

                      // Fetching Investors details one by one
                      while ( $investor = mysqli_fetch_assoc($query_to_get_investor_details) ) {
                        
                        // Default profile picture
                        if ( 
                          $user->get_profile_picture_id($connection, $investor['startup_investor_user_id']) == "" || 
                          is_null($user->get_profile_picture_id($connection, $investor['startup_investor_user_id']))
                        ) {
                          $investor_profile_picture = "../../images/default_user_profile_picture.png";
                        }
                        // Custom profile picture
                        else {
                          $investor_profile_picture = "../../files/profile_pictures/" . $user->get_profile_picture_id ( $connection, $investor['startup_investor_user_id'] );
                        } ?>
                        <div class="investor">
                          <div class="profile-picture-wrap">
                            <img style="border-radius: 100px;" src="<?php echo $investor_profile_picture; ?>" width="101" height="101">
                          </div>
                          <div class="name-wrap">
                            <span><?php echo $user->get_name ( $connection, $investor['startup_investor_user_id'] ); ?></span>
                          </div>
                        </div>
                        <?php
                      } // Fetching Investors details one by one END
                    } // Investors exists END ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Startup Profile -->
          <div class="dashboard-floor startup-floor" id="edit_profile_floor" style="height:81px;">
            <div class="dboard-title-wrap disp-flex">
              <div class="dboard-title" id="edit_profile_title" style="flex:1;">
                <span>Edit Profile</span>
              </div>
              <div class="edit-startup-profile-action-wrap" style="height:21px;">
                <div class="add-new-investor vert-center">
                  <a style="font-size:12px;" id="expand_collapse_action" title="Expand">Expand</a>
                </div>
              </div>
            </div>

            <?php
            // User's Startup ID
            $startup_id = $user->get_user_startup_id ( $connection, $logged_in_user_id );

            // Default profile picture
            $startup_profile_picture = "../../images/default_startup_icon_dark.png";

            // Get Profile Picture ID
            if ( $startup->get_profile_pic_id($connection, $startup_id) != "" && $startup->get_profile_pic_id($connection, $startup_id) !== NULL ) {
              $startup_profile_picture = "../../files/profile_pictures/" . $startup->get_profile_pic_id($connection, $startup_id);
            }
            ?>

            <div class="edit-startup-wrap" style="display:none;">
              <div class="edit-startup" style="overflow:scroll;">
                <div class="disp-flex">
                  <div class="left-side" style="width: 50%; border-right: 1px solid #eaeaea;">
                    <div class="edit-profile-pic-wrap disp-flex">
                      <div class="edit-profile-pic" style="margin-right:1em;">
                        <img style="border-radius: 100px;" src="<?php echo $startup_profile_picture; ?>" width="44" height="44">
                      </div>
                      <div class="edit-profile-pic-message-wrap" style="margin-right:12em; height:44px;">
                        <p class="vert-center" style="margin:0;">Profile Picture</p>
                      </div>
                      <div class="edit-profile-pic-change-wrap" style="height:44px;">
                        <a class="vert-center change_startup_profile_picture" title="Click to change your Startup Profile Picture">Change</a>
                      </div>
                    </div>

                    <!-- Edit General Information -->
                    <div class="edit-group-wrap edit-general-info-wrap">
                      <div class="edit-group-title-wrap">
                        <div class="edit-group-title">
                          <h3>General Information</h3>
                        </div>
                      </div>

                      <div class="edit-group-body" style="padding-left:10px;">
                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Name</label>
                            <input id="stup-name" type="text" value="<?php echo $startup->get_name ( $connection, $startup_id ); ?>" placeholder="Startup Name" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Vision</label>
                            <input id="stup-vision" type="text" value="<?php echo $startup->get_vision ( $connection, $startup_id ); ?>" placeholder="Vision" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Description</label>
                            <input id="stup-desc" type="text" value="<?php echo $startup->get_description ( $connection, $startup_id ); ?>" placeholder="Description" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Story</label>
                            <textarea id="stup-complete-story" cols="30" rows="10" placeholder="Your Startup Story" style="width:100%; overflow:scroll; resize:vertical;"><?php echo $startup->get_story ( $connection, $startup_id ); ?></textarea>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Category</label>
                            <select id="stup-cat" style="width: 100%;">
                              <option value="" selected disabled>Select Startup Category</option>
                              <option value="technology">Technology</option>
                              <option value="food">Food</option>
                              <option value="education">Education</option>
                              <option value="entertainment">Entertainment</option>
                            </select>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Link</label>
                            <input id="stup-link" type="text" value="<?php echo $startup->get_link ( $connection, $startup_id ); ?>" placeholder="Website/App Link" style="width:100%;">
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Address and Contact -->
                    <div class="edit-group-wrap edit-general-info-wrap">
                      <div class="edit-group-title-wrap">
                        <div class="edit-group-title">
                          <h3>Address &amp; Contact</h3>
                        </div>
                      </div>

                      <div class="edit-group-body" style="padding-left:10px;">
                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>State</label>
                            <select id="stup-state" style="display: block;" title="State in which your Startup resides">
                              <option value="" selected disabled>Startup State</option>
                              <?php 
                              // Getting states list
                              $query_to_get_states = mysqli_query ( $connection, " SELECT state_id, state_text FROM states " );

                              // Query ran properly
                              if ( mysqli_num_rows($query_to_get_states) > 0 ) {

                                // Fetching state one by one
                                while ( $state = mysqli_fetch_assoc($query_to_get_states) ) {
                                  $state_id = $state['state_id'];
                                  $state_text = $state['state_text']; ?>
                                  <option value="<?php echo $state_id; ?>"><?php echo $state_text; ?></option>
                              <?php
                                } // Fetching state one by one END
                              } // Checking if states are more than 0 END
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>City</label>
                            <select id="stup-city" style="display: block;" title="City in which your Startup resides">
                              <option value="" selected disabled>Startup City</option>
                              <?php
                              // Getting cities list 
                              $query_to_get_cities = mysqli_query (  
                                $connection,
                                " SELECT city_id, city_text FROM cities "
                              );

                              // Query ran properly
                              if ( $query_to_get_cities ) {

                                // Fetching city one by one
                                while ( $city = mysqli_fetch_assoc($query_to_get_cities) ) { ?>
                                  <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_text']; ?></option>
                              <?php
                                }
                              } // Query ran properly END
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Pincode</label>
                            <input id="stup-pcode" type="text" value="<?php echo $startup->get_pincode ( $connection, $startup_id ); ?>" placeholder="Pincode" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Address</label>
                            <input id="stup-addr" type="text" value="<?php echo $startup->get_address ( $connection, $startup_id ); ?>" placeholder="Address" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Contact Number</label>
                            <input id="stup-cnct-num" type="text" value="<?php echo $startup->get_contact_number ( $connection, $startup_id ); ?>" placeholder="Contact Number" style="width:100%;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="right-side" style="width: 50%;">

                    <!-- Edit Incubation and Hiring Information -->
                    <div class="edit-group-wrap edit-general-info-wrap">
                      <div class="edit-group-title-wrap">
                        <div class="edit-group-title" style="margin-left:1em;">
                          <h3>Incubation and Hiring</h3>
                        </div>
                      </div>

                      <div class="edit-group-body" style="padding-left: 20px;">
                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Email ID</label>
                            <input id="stup-icbctr" type="text" value="<?php echo $startup->get_ic_email ( $connection, $startup_id ); ?>" placeholder="Incubation Center Email ID" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Are your Hiring?</label>
                            <div class="disp-flex" style="height: 39px;">
                              <?php if ( $startup->get_hiring($connection, $startup_id) == 0 ) { ?>
                                <div class="vert-center">
                                  <input type="radio" name="hiring" style="margin-right: 8px; margin-left: 8px; margin-top: -1px; width: 13px; height: 13px;">
                                  <label style="font-size: 12px;">Yes</label>
                                </div>
                                <div class="vert-center" style="padding-left: 2em;">
                                  <input type="radio" name="hiring" style="margin-right: 8px; margin-top: -1px; width: 13px; height: 13px;" checked> 
                                  <label style="font-size: 12px;">No</label>
                                </div>
                              <?php } else { ?>
                                <div class="vert-center">
                                  <input type="radio" name="hiring" style="margin-right: 8px; margin-left: 8px; margin-top: -1px; width: 13px; height: 13px;" checked>
                                  <label style="font-size: 12px;">Yes</label>
                                </div>
                                <div class="vert-center" style="padding-left: 2em;">
                                  <input type="radio" name="hiring" style="margin-right: 8px; margin-top: -1px; width: 13px; height: 13px;"> 
                                  <label style="font-size: 12px;">No</label>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Legal Information -->
                    <div class="edit-group-wrap edit-general-info-wrap">
                      <div class="edit-group-title-wrap">
                        <div class="edit-group-title" style="margin-left:1em;">
                          <h3>Legal</h3>
                        </div>
                      </div>

                      <div class="edit-group-body" style="padding-left: 20px;">
                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Startup Class</label>
                            <select id="stup-class" style="display: block;" title="Type of your Startup Registration">
                              <option value="" selected disabled>Select Class</option>
                              <option value="private_limited">Private Limited</option>
                              <option value="proprietary">Proprietary</option>
                              <option value="partnership">Partnership</option>
                            </select>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>CIN/PAN</label>
                            <input id="stup-cin" type="text" value="<?php echo $startup->get_cin_or_pan ( $connection, $startup_id ); ?>" placeholder="Startup CIN or PAN" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Date of Registration</label>
                            <div class="disp-flex">
                              <select id="stup-day" style="display: block; width: 39%; margin-right: 5px;">
                                <option value="" selected disabled>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <!-- <option value="6">11</option>
                                <option value="7">12</option>
                                <option value="8">13</option>
                                <option value="9">10</option>
                                <option value="10">11</option>
                                <option value="11">12</option>
                                <option value="12">13</option>
                                <option value="13">10</option>
                                <option value="14">11</option>
                                <option value="15">12</option>
                                <option value="16">13</option>
                                <option value="17">10</option> -->
                              </select>
                              <select id="stup-month" style="display: block; width: 39%; margin-right: 5px;">
                                <option value="" selected disabled>Month</option>
                                <!-- <option value="01">January</option> -->
                                <option value="02">February</option>
                                <!-- <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option> -->
                              </select>
                              <select id="stup-year" style="display: block; width: 22%;">
                                <option value="" selected disabled>Year</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Social Links Information -->
                    <div class="edit-group-wrap edit-general-info-wrap">
                      <div class="edit-group-title-wrap">
                        <div class="edit-group-title" style="margin-left:1em;">
                          <h3>Social Links</h3>
                        </div>
                      </div>

                      <div class="edit-group-body" style="padding-left: 20px;">
                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>LinkedIn</label>
                            <input id="stup-lkdin" type="text" value="<?php echo $startup->get_linkedin ( $connection, $startup_id ); ?>" placeholder="LinkedIn URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Twitter</label>
                            <input id="stup-twtr" type="text" value="<?php echo $startup->get_twitter ( $connection, $startup_id ); ?>" placeholder="Twitter URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Facebook</label>
                            <input id="stup-fb" type="text" value="<?php echo $startup->get_facebook ( $connection, $startup_id ); ?>" placeholder="Facebook URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Instagram</label>
                            <input id="stup-gram" type="text" value="<?php echo $startup->get_instagram ( $connection, $startup_id ); ?>" placeholder="Instagram URL" style="width:100%;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <footer style="padding:2em; text-align:center;">
          <span style="font-size:12px; color:#9a9a9a; font-family:sans-serif;">Made Possible By CodeManiacs</span>
        </footer>
      </div>
    </div>
  </div>

  <?php if ( $user->check_if_user_has_startup($connection, $logged_in_user_id) == false ) { ?>
  <div class="list-startup-wrap">
    <div class="list-startup-modal-wrap modal-wrapper" style="display: none;">
      <div class="list-startup-modal modal">
        <div class="modal-title disp-flex">
          <h2 style="flex:1;">My Startup</h2>
          <div class="modal-close-wrap">
            <div class="modal-close" title="Cancel">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="32px" height="32px" viewBox="0 0 512 512" xml:space="preserve">
                <polygon points="340.2,160 255.8,244.3 171.8,160.4 160,172.2 244,256 160,339.9 171.8,351.6 255.8,267.8 340.2,352 
                  352,340.3 267.6,256 352,171.8 "/>
              </svg>
            </div>
          </div>
        </div>

        <div id="phase_gen_info">
          <div class="modal-sub-title">
            <h3>General Information</h3>
          </div>
          <div class="phase-content-wrap">
            <div class="phase-content">
              <div class="disp-flex">
                <div class="gen-info-left-side">
                  <div class="phase-text-input-wrap" style="width:90%;">
                    <label>Name</label>
                    <input type="text" id="stup-name" placeholder="Startup Name">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Vision</label>
                    <input type="text" id="stup-vision" placeholder="Tell us about Vision of your Startup">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Description</label>
                    <input type="text" id="stup-desc" placeholder="Describe your startup in few lines">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Story</label>
                    <textarea id="stup-complete-story" style="resize:vertical; overflow:scroll;" cols="30" rows="2" placeholder="Tell your story"></textarea>
                  </div>

                  <div class="phase-text-input-wrap" style="width:90%;">
                    <label>Link</label>
                    <input type="text" id="stup-link" placeholder="Add link to your Startup Website/App/Video">
                  </div>

                  <div class="phase-text-input-wrap" style="width:85%;">
                    <label>Category</label>
                    <select id="stup-cat" style="display: block;">
                      <option selected disabled>Startup Category</option>
                      <option value="technology">Technology</option>
                      <option value="food">Food</option>
                      <option value="education">Education</option>
                      <option value="entertainment">Entertainment</option>
                    </select>
                  </div>
                </div>

                <div class="gen-info-right-side">
                  <div class="phase-text-input-wrap">
                    <label style="margin-bottom: 7px; text-align: center; display: block;">Profile Picture</label>
                    <img style="border-radius: 100px; display: block; margin: auto;" src="../../images/default_startup_icon_dark.png" width="202" height="202" style="display: block; margin: auto;">
                    <div class="gen-info-profile-pic-actions-wrap disp-flex">
                      <div class="change-pic">
                        <a id="stup-profile-picture" title="Change your Startup Profile Picture">Change</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="next-prev-phase-action-wrap">
                <div class="disp-flex">
                  <div class="next-phase-action-wrap">
                    <button class="prix-primary" title="Next: Address &amp; Contact">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="phase_addr_cnct_info" style="display:none;">
          <div class="modal-sub-title">
            <h3>Address &amp; Contact</h3>
          </div>
          <div class="phase-content-wrap">
            <div class="phase-content">
              <div class="disp-flex">
                <div class="gen-info-left-side">

                  <div class="phase-text-input-wrap">
                    <label>State</label>
                    <select id="stup-state" style="display: block;" title="State in which your Startup resides">
                      <option value="" selected disabled>Startup State</option>
                      <?php 
                      // Getting states list
                      $query_to_get_states = mysqli_query ( $connection, " SELECT state_id, state_text FROM states " );

                      // Query ran properly
                      if ( mysqli_num_rows($query_to_get_states) > 0 ) {

                        // Fetching state one by one
                        while ( $state = mysqli_fetch_assoc($query_to_get_states) ) {
                          $state_id = $state['state_id'];
                          $state_text = $state['state_text']; ?>
                          <option value="<?php echo $state_id; ?>"><?php echo $state_text; ?></option>
                      <?php
                        } // Fetching state one by one END
                      } // Checking if states are more than 0 END
                      ?>
                    </select>
                  </div>

                  <div class="phase-text-input-wrap" style="width: 45%;">
                    <label>City</label>
                    <select id="stup-city" style="display: block;" title="City in which your Startup resides">
                      <option value="" selected disabled>Startup City</option>
                      <?php
                      // Getting cities list 
                      $query_to_get_cities = mysqli_query (  
                        $connection,
                        " SELECT city_id, city_text FROM cities "
                      );

                      // Query ran properly
                      if ( $query_to_get_cities ) {

                        // Fetching city one by one
                        while ( $city = mysqli_fetch_assoc($query_to_get_cities) ) { ?>
                          <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_text']; ?></option>
                      <?php
                        }
                      } // Query ran properly END
                      ?>
                    </select>
                  </div>

                  <div class="phase-text-input-wrap" style="width: 42%;">
                    <label>Pincode</label>
                    <input type="text" id="stup-pcode" placeholder="Pincode">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Address</label>
                    <input type="text" id="stup-addr" placeholder="Office Address">
                  </div>

                  <div class="phase-text-input-wrap" style="width: 50%;">
                    <label>Contact Number</label>
                    <input type="text" id="stup-cnct-num" placeholder="Number">
                  </div>
                </div>

                <div class="gen-info-right-side">
                  <div class="phase-text-input-wrap vert-center">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      width="202px" height="202px" style="display: block; margin: auto; fill: #c9dcf7;" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path d="M473.152,136.58L368.594,66.307c-4.644-3.076-10.365-3.076-15.031,0l-97.094,65.195l-97.109-65.195
                          c-4.643-3.076-10.444-3.076-15.062,0L39.344,136.58c-4.399,2.949-7.344,8.272-7.344,14.05V431.6c0,5.904,3.07,11.347,7.663,14.271
                          c4.62,2.877,10.382,2.829,14.904-0.223l97.188-65.197l97.181,65.197c4.666,3.1,10.44,3.1,15.084,0l97.158-65.197l97.151,65.197
                          c2.311,1.55,4.912,2.353,7.538,2.353c2.455,0,4.709-0.747,6.969-2.13c4.594-2.924,7.165-8.366,7.165-14.271v-280.97
                          C480,144.852,477.575,139.529,473.152,136.58z M135,353.248l-71,49.404v-241.75l71-49.428V353.248z M167,352.766v-122.7
                          c1.167,0.756,2.31,1.526,3.389,2.301l9.333-12.996c-3.904-2.804-8.292-5.501-12.722-7.705V110.992l73,48.992v108.574
                          c-5.372-1.855-10.586-4.37-15.893-7.682l-8.471,13.574c6.848,4.273,13.621,7.467,20.704,9.765l3.66-11.286v128.806L167,352.766z
                          M272,401.734V288.369c0.349-0.021,0.693-0.03,1.043-0.054c2.91-0.198,5.777-0.517,8.518-0.946l-2.479-15.807
                          c-2.268,0.355-4.65,0.619-7.082,0.786V159.984l73-48.992V229.78l-4.844-4.372c-2.997,3.319-5.833,6.575-8.575,9.725
                          c-1.806,2.073-3.578,4.108-5.339,6.095l11.974,10.613c1.791-2.021,3.595-4.091,5.431-6.2c0.443-0.509,0.905-1.035,1.354-1.549
                          v108.675L272,401.734z M448,401.652l-71-48.438v-136.91c3.785-1.715,7.679-2.992,11.639-3.792l-3.166-15.683
                          c-2.858,0.577-5.687,1.339-8.473,2.281v-87.671l71,48.461V401.652z"/>
                        <path d="M129.285,221.111c2.218-1.195-1.353-1.071,1.012-1.837l-4.928-15.222c-3.282,1.062-6.502,2.439-9.571,4.093
                          c-3.824,2.062-7.745,4.916-11.339,8.253l10.888,11.724C117.963,225.694,126.639,222.538,129.285,221.111z"/>
                        <path d="M296.802,266.127l6.985,14.395c6.596-3.201,12.842-7.445,19.095-12.974l-10.599-11.987
                          C307.135,260.113,302.071,263.569,296.802,266.127z"/>
                        <path d="M99.364,256.006c1.893-5.926,3.528-11.044,7.129-16.304l-13.204-9.037c-4.924,7.194-7.081,13.944-9.167,20.471
                          l-0.242,0.758l15.238,4.879L99.364,256.006z"/>
                        <path d="M198.311,237.753c-1.007-1.204-2.014-2.408-3.032-3.603l-12.178,10.379c0.986,1.156,1.961,2.322,2.936,3.488
                          c3.593,4.296,7.308,8.739,11.61,12.809l10.996-11.624C205.02,245.775,201.761,241.878,198.311,237.753z"/>
                        <polygon points="408.156,229.657 418.5,219.314 428.844,229.657 440.156,218.342 429.814,208 440.156,197.657 428.844,186.342 
                          418.5,196.685 408.156,186.342 396.844,197.657 407.186,208 396.844,218.342 	"/>
                      </g>
                    </svg>
                  </div>
                </div>
              </div>

              <div class="next-prev-phase-action-wrap">
                <div class="disp-flex">
                  <div class="previous-phase-action-wrap">
                    <button class="prix-secondary-btn" title="Previous: General Information">Previous</button>
                  </div>
                  <div class="next-phase-action-wrap">
                    <button class="prix-primary" title="Next: Incubation &amp; Hiring">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="phase_incbn_hirn_info" style="display:none;">
          <div class="modal-sub-title">
            <h3>Incubation &amp; Hiring</h3>
          </div>
          <div class="phase-content-wrap">
            <div class="phase-content">
              <div class="disp-flex">
                <div class="gen-info-left-side">

                  <div class="phase-text-input-wrap vert-center" title="Enter Email ID of your Incubation Center using which they've signed up">
                    <div style="margin: auto; width: 75%; text-align:center;">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="102px" height="102px" style="display: block; margin: auto; fill: #3F51B5;" viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                          <path d="M381,128.6H132.1c-12.1,0-19.5,0-19.5,20.4v28.1h288V149C400.6,128.6,393.2,128.6,381,128.6z"/>
                          <path d="M333,96.5H180c-13.1,0-19.5,0.3-19.5,18.7h192C352.4,96.8,346.1,96.5,333,96.5z"/>
                          <path d="M432.4,169.6l-15.9-9.4v32.3h-321v-32.3l-15.2,9.4c-14.3,8.9-17.8,15.3-15,40.9l17.5,184.8c3.7,20.7,15.9,21.2,24,21.2
                            h299.9c8.1,0,20.2-0.5,23.9-21.2l17.2-184.4C450.1,186.5,445.8,178.1,432.4,169.6z"/>
                        </g>
                      </svg>
                      <h3 style="margin-top: 0; margin-bottom: 5px; color: #515151;">Incubation Center</h3>
                      <input type="text" id="stup-icbctr" placeholder="Incubation Center Email">
                    </div>
                  </div>
                </div>

                <div class="gen-info-right-side" title="Tell us whether you are hiring, we will help you find best candidates for your Startup!">
                  <div class="phase-text-input-wrap vert-center">
                    <div style="margin: auto; width: 75%; text-align:center;">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="102px" height="102px" style="display: block; margin: auto; fill: #FF5722;" viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                          <polygon points="416,153 391,153 391,128 377,128 377,153 352,153 352,167 377,167 377,192 391,192 391,167 416,167 	"/>
                            <g>
                              <path d="M363.3,363.9c-12.9-4.6-31.4-6.2-43.2-8.8c-6.8-1.5-16.7-5.3-20-9.2c-3.3-4-1.3-40.9-1.3-40.9s6.1-9.6,9.4-18
                                c3.3-8.4,6.9-31.4,6.9-31.4s6.8,0,9.2-11.9c2.6-13,6.6-18.4,6.1-28.1c-0.5-9-5.2-9.5-5.7-9.5c0,0,0,0,0,0s4.9-13.6,5.6-42.4
                                C331.1,129.6,305,96,256,96c-49,0-75,33.5-74.3,67.6c0.6,28.7,5.6,42.4,5.6,42.4s0,0,0,0c-0.5,0-5.2,0.5-5.7,9.5
                                c-0.5,9.7,3.6,14.9,6.1,27.9c2.4,11.9,9.2,12,9.2,12s3.6,23.1,6.9,31.5c3.3,8.5,9.4,18,9.4,18s2,36.9-1.3,40.9
                                c-3.3,4-13.2,7.7-20,9.2c-11.9,2.6-30.3,4.3-43.2,8.9C135.8,368.5,96,384,96,416h160h160C416,384,376.2,368.5,363.3,363.9z"/>
                            </g>
                          </g>
                        </svg>
                      <h3 style="margin-top: 0; margin-bottom: 5px; color: #515151;">Are you hiring?</h3>
                      <div class="disp-flex" style="height: 39px;">
                        <div class="vert-center" style="margin-left: auto;">
                          <label style="font-size: 12px;">Yes</label>
                          <input type="radio" value="yes" name="hiring" style="margin-right: 2em; margin-left: 8px; margin-top: -1px; width: 13px; height: 13px;">
                        </div>
                        <div class="vert-center" style="margin-right: auto; border-left: 1px solid #dadada; padding-left: 2em;">
                          <input type="radio" value="no" name="hiring" style="margin-right: 8px; margin-top: -1px; width: 13px; height: 13px;" checked>
                          <label style="font-size: 12px;">No</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="next-prev-phase-action-wrap">
                <div class="disp-flex">
                  <div class="previous-phase-action-wrap">
                    <button class="prix-secondary-btn" title="Previous: Address &amp; Contact">Previous</button>
                  </div>
                  <div class="next-phase-action-wrap">
                    <button class="prix-primary" title="Next: Legal">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="phase_legal_info" style="display:none;">
          <div class="modal-sub-title">
            <h3>Legal</h3>
          </div>
          <div class="phase-content-wrap">
            <div class="phase-content">
              <div class="disp-flex">
                <div class="gen-info-left-side">

                  <div class="phase-text-input-wrap" style="width: 50%;">
                    <label>Startup Class</label>
                    <select id="stup-class" style="display: block;" title="Type of your Startup Registration">
                      <option selected disabled>Select Class</option>
                      <option value="private_limited">Private Limited</option>
                      <option value="proprietary">Proprietary</option>
                      <option value="partnership">Partnership</option>
                    </select>
                  </div>

                  <div class="phase-text-input-wrap startup-uniq-num" style="width: 70%;" title="Corporate Identification Number">
                    <label>CIN</label>
                    <input type="text" id="stup-cin" placeholder="Startup CIN">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Date of Registration</label>
                    <div class="disp-flex">
                      <select id="stup-day" style="display: block; width: 39%; margin-right: 5px;">
                        <option value="" selected disabled>Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <!-- <option value="6">11</option>
                        <option value="7">12</option>
                        <option value="8">13</option>
                        <option value="9">10</option>
                        <option value="10">11</option>
                        <option value="11">12</option>
                        <option value="12">13</option>
                        <option value="13">10</option>
                        <option value="14">11</option>
                        <option value="15">12</option>
                        <option value="16">13</option>
                        <option value="17">10</option> -->
                      </select>
                      <select id="stup-month" style="display: block; width: 39%; margin-right: 5px;">
                        <option value="" selected disabled>Month</option>
                        <!-- <option value="01">January</option> -->
                        <option value="02">February</option>
                        <!-- <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option> -->
                      </select>
                      <select id="stup-year" style="display: block; width: 22%;">
                        <option value="" selected disabled>Year</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="gen-info-right-side">
                  <div class="phase-text-input-wrap vert-center">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      width="202px" height="202px" style="display: block; margin: auto; fill: #c9dcf7;" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <g>
                          <circle cx="251.5" cy="172" r="20"/>
                          <polygon points="272,344 272,216 224,216 224,224 240,224 240,344 224,344 224,352 288,352 288,344 		"/>
                        </g>
                        <g>
                          <path d="M256,48C141.1,48,48,141.1,48,256c0,114.9,93.1,208,208,208c114.9,0,208-93.1,208-208C464,141.1,370.9,48,256,48z
                            M256,446.7c-105.1,0-190.7-85.5-190.7-190.7c0-105.1,85.5-190.7,190.7-190.7c105.1,0,190.7,85.5,190.7,190.7
                            C446.7,361.1,361.1,446.7,256,446.7z"/>
                        </g>
                      </g>
                    </svg>
                  </div>
                </div>
              </div>

              <div class="next-prev-phase-action-wrap" style="margin-top:4em;">
                <div class="disp-flex">
                  <div class="previous-phase-action-wrap">
                    <button class="prix-secondary-btn" title="Previous: Incubation Center &amp; Hiring">Previous</button>
                  </div>
                  <div class="next-phase-action-wrap">
                    <button class="prix-primary" title="Next: Social Links">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="phase_social_links" style="display:none;">
          <div class="modal-sub-title">
            <h3>Social Links</h3>
          </div>
          <div class="phase-content-wrap">
            <div class="phase-content">
              <div class="disp-flex">
                <div class="gen-info-left-side">

                  <div class="phase-text-input-wrap" style="width: 80%;" title="Startup's LinkedIn Profile">
                    <label>LinkedIn</label>
                    <input type="text" id="stup-lkdin" placeholder="LinkedIn URL">
                  </div>

                  <div class="phase-text-input-wrap" style="width: 76%;" title="Startup's Twitter Profile">
                    <label>Twitter</label>
                    <input type="text" id="stup-twtr" placeholder="Twitter URL">
                  </div>

                  <div class="phase-text-input-wrap" style="width: 72%;" title="Startup's Facebook Profile">
                    <label>Facebook</label>
                    <input type="text" id="stup-fb" placeholder="Facebook URL">
                  </div>

                  <div class="phase-text-input-wrap" style="width: 68%;" title="Startup's Intsagram Profile">
                    <label>Instagram</label>
                    <input type="text" id="stup-gram" placeholder="Instagram URL">
                  </div>
                </div>

                <div class="gen-info-right-side">
                  <div class="phase-text-input-wrap vert-center">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      width="260px" height="260px" style="display: block; margin: auto; fill: #c9dcf7;" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <g>
                          <path d="M256,64C150,64,64,150,64,256c0,106.1,86,192,192,192s192-85.9,192-192C448,150,362,64,256,64z M256,415.5
                            c-88.1,0-159.5-71.4-159.5-159.5c0-88.1,71.4-159.5,159.5-159.5c88.1,0,159.5,71.4,159.5,159.5C415.5,344.1,344.1,415.5,256,415.5
                            z"/>
                        </g>
                        <g>
                          <path d="M306.3,246.7c23.4-2.2,50.9-2.9,77.2-2.4c-2.3-25.4-12-48.7-27-67.6c-16.5,14.9-38,28.1-63.3,39
                            C297.8,225.7,302.1,236.1,306.3,246.7z"/>
                          <path d="M335.4,155.6C313.6,138.3,286,128,256,128c-5.1,0-10.2,0.3-15.2,0.9c13.8,17.7,26.7,37.6,38.6,59.5
                            C301.1,179.2,320,168.1,335.4,155.6z"/>
                          <path d="M205.9,138.2c-34.1,14.5-60.7,43.4-72,79.1c41.1-0.7,79.6-7,113.4-17.3C234.7,177,220.7,156.3,205.9,138.2z"/>
                          <path d="M383,272.2c-22.3-0.6-46-0.2-66.9,1.5c4.1,12.3,8.1,24.9,11.5,37.9c3.8,14.6,7,29.1,9.6,43.4
                            C361.8,334.7,378.8,305.4,383,272.2z"/>
                          <path d="M258,256.1c3.9-1.6,8.8-3,14.3-4.3c-3.4-8.3-7.1-16.4-10.8-24.3c-39.1,12.6-84.6,20.3-133.3,21.3
                            c-0.1,2.4-0.2,4.8-0.2,7.3c0,29.1,9.7,55.9,26,77.4C178.9,301,214.9,274.2,258,256.1z"/>
                          <path d="M282.6,278.2c-6.9,1.5-12.9,3.2-17.4,5.3c-37.1,16.8-68.3,41.6-90.4,71.5c22.1,18.2,50.4,29,81.2,29
                            c18.5,0,36-3.9,51.8-10.9c-2.7-15.1-6-30.3-10-45.7C293.4,310.5,288.2,294,282.6,278.2z"/>
                        </g>
                      </g>
                    </svg>
                  </div>
                </div>
              </div>

              <div class="next-prev-phase-action-wrap">
                <div class="disp-flex">
                  <div class="previous-phase-action-wrap">
                    <button class="prix-secondary-btn" title="Previous: Legal">Previous</button>
                  </div>
                  <div class="next-phase-action-wrap">
                    <button class="prix-primary-btn" title="Validate &amp; Finish">Validate &amp; Finish</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <?php } ?>

  <?php include_once "../_includes/user_signed_in_actions.php"; ?>
  <?php include_once "../../_includes/all_page_include.php"; ?>
  <input type="file" id="profile_picture_file_selector" style="position:absolute; top: -100px;">
  <script src="../scripts/startup.js"></script>
</body>
</html>