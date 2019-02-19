<?php
/**
 * Investor Page Isndie Dashboard
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

session_start();
include_once "../_includes/check_login_status.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Investor - Startup Ecosystem Tracker | CodeManiacs</title>

  <link rel="icon" href="../../images/favicon.jpg">
  <link rel="stylesheet" href="../../styles/prix.css">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <link rel="stylesheet" href="../styles/investor.css">
  
  <script src="../../scripts/jquery.js"></script>
  <script src="../../scripts/chart.js"></script>
</head>
<body>
  
  <div class="startup-wrap">
    <div class="dashboard-divider-wrap disp-flex">

      <?php include_once "../_includes/dashboard_sidebar.php"; ?>

      <script> 
        // Activating investor center tab
        document.querySelector ( ".investor" ).className += " active";
      </script>

      <div class="dashboard-tab-content-wrap startup-tab-content-wrap">
        
        <div class="dashboard-tab-header-wrap disp-flex">
          <div class="tab-header">
            <div class="tab-title-wrap vert-center">
              <div class="tab-title-icon">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="25px" height="25px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path d="M349.2,334.8C360.5,338.7,338,330.9,349.2,334.8L349.2,334.8z"></path>
                      <path d="M349.2,334.8c-13.5-4.7-28.1-5-41.6-9.7c-4.1-1.4-12.2-3.1-13.9-7.8c-1.6-4.6-1.6-10-1.9-14.8c-0.2-3.8-0.3-7.6-0.3-11.4
                        c0-2.5,6.4-7.8,7.8-10.1c5.4-9,5.9-21.1,6.9-31.3c8.7,2.4,9.8-13.7,11.3-18.6c1.1-3.4,7.8-26.8-2.6-23.6c2.5-4.4,3.5-9.8,4.2-14.7
                        c2-12.8,2.8-26.8-1.1-39.3c-8.1-26-33-40.6-59.3-41.4c-26.7-0.9-53.5,11.9-63.5,37.8c-4.8,12.6-4.4,26.3-2.8,39.5
                        c0.7,6,1.7,12.7,4.7,18.1c-9.7-2.9-4.5,17.7-3.4,21.3c1.6,5.1,3,23.4,12.1,20.9c0.8,8.1,1.7,16.4,3.9,24.3
                        c1.5,5.3,4.6,9.8,8.2,13.9c1.8,2,2.7,2.2,2.6,4.8c-0.1,7.8,0.1,16.2-1.9,23.8c-2,7.6-18.7,10.8-25.4,12.2
                        c-18,3.7-34.6,5.4-49.6,16.6C126.1,358.2,117,378.3,117,400c83.3,0,166.6,0,249.9,0c9.4,0,18.7,0,28.1,0
                        C395,370.5,377.2,344.5,349.2,334.8z"></path>
                      <path d="M143.3,322.5c0.6-0.3,1.2-0.6,1.6-0.8c-0.3,0.1-0.6,0.3-0.8,0.4C143.8,322.2,143.6,322.3,143.3,322.5z"></path>
                      <path d="M143.3,322.5c-3.4,1.7-7.5,3.8,0.8-0.4c3-1.5,2.4-1.2,0.8-0.4c6.8-3.2,14.1-4,21.4-4.7c2.8-0.3,4.1-2.2,2-4.9
                        c-4-5.1-17.8-6.1-23.6-8.4c-3.6-1.4-4.6-2.7-4.9-6.7c-0.1-1.8-1.1-9.8,0.3-11.1c1-1,7.3-0.6,8.7-0.8c5.7-0.7,11.5-1.9,16.9-4
                        c2.3-0.9,4.5-2,6.5-3.4c2.4-1.8-1.8-6.2-2.9-8.6c-3.4-7.5-4.9-15.7-5.4-23.9c-1-16.1,1.5-32.3-1.5-48.3
                        c-4.5-24.5-23.4-36.8-47.5-36.8c-14.9,0-29.6,5.1-37.9,18.1c-9.2,14.3-8.7,32.1-8.2,48.4c0.3,9.3,0.7,18.7-0.6,28
                        c-0.6,4-1.5,7.9-2.9,11.7c-1.1,2.9-6.7,10.1-4.5,11.6c8.3,5.9,22.3,7.9,32.3,7.1c0.3,4.9,1.2,11.2-0.6,15.8
                        c-2.8,7.2-23.7,9.1-30,11.2C45,317.8,32,332,32,352c18.3,0,36.5,0,54.8,0c8.2,0,16.4,0,24.7,0c1.3,0,6.3-9.3,7.7-10.8
                        C126,333.7,134.3,327.2,143.3,322.5z"></path>
                      <path d="M449.3,311.9c-8.1-2.6-23.7-3.4-29.5-10.4c-2.9-3.5-1.3-12.4-1-16.6c4.4,0.4,9.2-0.3,13.7-0.9c4.1-0.6,8.1-1.4,12-2.8
                        c1.8-0.7,3.6-1.4,5.3-2.4c3.9-2.3,2.1-2.7,0.1-6.1c-10.9-18.3-6-41.5-6.5-61.6c-0.4-16.7-4.8-35-20-44.4c-13.7-8.5-34-8.8-48.7-2.8
                        c-42.4,17-17.4,73.2-31.9,105.4c-2.5,5.4-6.1,7.3,0.2,10.5c3.5,1.8,7.3,3,11.1,3.9c5.8,1.4,11.8,2.2,17.8,2.4c1,0,0.3,12.6,0,13.9
                        c-1.1,4.9-11.8,6.3-15.8,7.4c-4.1,1.1-10.9,1.4-12.9,5.7c-3,6.4,9.9,4.8,13.1,5.4c10.3,1.9,19.4,7.6,27.4,14.1
                        c6,4.9,14.1,11.5,16.3,19.5c26.7,0,53.5,0,80.2,0C480,332,466.9,317.7,449.3,311.9z"></path>
                    </g>
                  </svg>
                </div>
              <div class="tab-title">
                <span>Investor</span>
              </div>
            </div>
          </div>

          <div class="tab-user-actions-wrap">
            <div class="tab-user-action user-profile-pic-wrap vert-center">
              <img src="../../images/default_user_profile_picture.png" class="user-profile-pic" width="44" height="44">
            </div>
          </div>
        </div>

        <div class="dashboard-content investor-tab-content">
          
          <!-- If investor has not listed as investor -->
          <div class="dashboard-floor investor-floor" style="display: none;">
            <div class="no-incubation-center-wrap">
              <div class="no-incubation-center">
                <div class="no-incubation-center-image-wrap">
                  <div class="no-incubation-center-image">
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
                <div class="no-incubation-center-content">
                  <div class="no-incubation-center-title-wrap">
                    <h2>No Content Here</h2>
                  </div>
                  <div class="no-incubation-center-para-wrap">
                    <span>It seems that you have not listed as Investor. To showcase yourself as investor click below.</span>
                  </div>
                  <div class="no-incubation-center-action-wrap">
                    <button class="prix-primary" id="make_me_investor_btn" title="Click to make your profile as investor">Make Me Investor</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Startups Invested -->
          <div class="dashboard-floor investor-floor">
            <div class="ic-startups-incubated-wrap">
              <div class="ic-startups-incubated">
                <div class="dboard-title-wrap disp-flex" style="margin:0;">
                  <div class="dboard-title" style="flex:1;">
                    <span>Startups Invested</span>
                  </div>
                  <div class="remove-as-investor-action-wrap">
                    <div class="remove-as-investor-action vert-center">
                      <a style="font-size:11px; font-family:sans-serif; color:#9a9a9a;" title="Click to remove you as Investor">Remove as Investor</a>
                    </div>
                  </div>
                </div>

                <!-- If no startups have listed as investor -->
                <!-- <div class="ic-no-startups-incubated-wrap">
                  <div class="no-incubation-center-wrap">
                    <div class="no-incubation-center">
                      <div class="no-incubation-center-image-wrap">
                        <div class="no-incubation-center-image">
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
                      <div class="no-incubation-center-content">
                        <div class="no-incubation-center-title-wrap">
                          <h2>No Content Here</h2>
                        </div>
                        <div class="no-incubation-center-para-wrap" style="line-height:1.8;">
                          <span>Still no startups have added your as their Investor, encourage your startups to  <br>register and list their startup and you as their investor.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <!-- If startups have added center as their incubation center -->
                <div class="ic-startups-wrap" style="margin-top:2em;">
                  <div class="ic-startups disp-flex">
                    <div class="a-startup">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon_dark.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Jshta</span>
                      </div>
                    </div>
                    <div class="a-startup">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon_dark.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Google</span>
                      </div>
                    </div>
                    <div class="a-startup">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon_dark.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Apple</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <footer style="padding:2em; text-align:center;">
            <span style="font-size:12px; color:#9a9a9a; font-family:sans-serif;">Made Possible By CodeManiacs</span>
          </footer>
        </div>
      </div>
    </div>
  </div>

  <script src="../scripts/investor.js"></script>
  <?php include_once "../_includes/user_signed_in_actions.php"; ?>
</body>
</html>