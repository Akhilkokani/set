<?php
/**
 * Job Page Inside Dashboard
 *
 *
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Job - Startup Ecosystem Tracker | CodeManiacs</title>

  <link rel="icon" href="../../images/favicon.jpg">
  <link rel="stylesheet" href="../../styles/prix.css">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <link rel="stylesheet" href="../styles/job.css">
  
  <script src="../../scripts/jquery.js"></script>
  <script src="../../scripts/chart.js"></script>

</head>
<body>
  
  <div class="startup-wrap">
    <div class="dashboard-divider-wrap disp-flex">

      <?php include_once "../_includes/dashboard_sidebar.php"; ?>

      <script> 
        // Activating job center tab
        document.querySelector ( ".job" ).className += " active";
      </script>

      <div class="dashboard-tab-content-wrap startup-tab-content-wrap">
        <div class="dashboard-tab-header-wrap disp-flex">
          <div class="tab-header">
            <div class="tab-title-wrap vert-center">
              <div class="tab-title-icon">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="25px" height="25px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <polygon points="416,153 391,153 391,128 377,128 377,153 352,153 352,167 377,167 377,192 391,192 391,167 416,167 	"></polygon>
                    <g>
                      <path d="M363.3,363.9c-12.9-4.6-31.4-6.2-43.2-8.8c-6.8-1.5-16.7-5.3-20-9.2c-3.3-4-1.3-40.9-1.3-40.9s6.1-9.6,9.4-18
                        c3.3-8.4,6.9-31.4,6.9-31.4s6.8,0,9.2-11.9c2.6-13,6.6-18.4,6.1-28.1c-0.5-9-5.2-9.5-5.7-9.5c0,0,0,0,0,0s4.9-13.6,5.6-42.4
                        C331.1,129.6,305,96,256,96c-49,0-75,33.5-74.3,67.6c0.6,28.7,5.6,42.4,5.6,42.4s0,0,0,0c-0.5,0-5.2,0.5-5.7,9.5
                        c-0.5,9.7,3.6,14.9,6.1,27.9c2.4,11.9,9.2,12,9.2,12s3.6,23.1,6.9,31.5c3.3,8.5,9.4,18,9.4,18s2,36.9-1.3,40.9
                        c-3.3,4-13.2,7.7-20,9.2c-11.9,2.6-30.3,4.3-43.2,8.9C135.8,368.5,96,384,96,416h160h160C416,384,376.2,368.5,363.3,363.9z"></path>
                    </g>
                  </g>
                </svg>
              </div>
              <div class="tab-title">
                <span>Job</span>
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

          <!-- Your CV -->
          <div class="dashboard-floor job-floor" style="border: 2px solid #dbeaff;">
            <div class="job-file-icon-wrap disp-flex">
              <div class="job-file-icon" style="margin-right:10px;">
                <svg style="fill:#585858;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="25px" height="25px" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <path d="M161,160.5h192c-1.688-20-9.729-35.45-27.921-40.356c-0.446-0.119-1.12-0.424-1.567-0.541
                      c-12.004-3.424-21.012-7.653-21.012-20.781V78.227C302.5,52.691,281.976,32,256.49,32c-25.466,0-45.99,20.691-45.99,46.227v20.595
                      c0,13.128-8.592,17.169-20.597,20.593c-0.447,0.117-0.8,0.61-1.266,0.729C170.446,125.05,162.927,140.5,161,160.5z M256.99,64.395
                      c7.615,0,13.791,6.195,13.791,13.832c0,7.654-6.176,13.85-13.791,13.85c-7.614,0-13.772-6.195-13.772-13.85
                      C243.218,70.59,249.376,64.395,256.99,64.395z"/>
                    <path d="M405.611,63.5H331.5v13.988c0,10.583,9.193,19.012,19.507,19.012h37.212c6.667,0,12.099,5.435,12.44,12.195l0.085,327.1
                      c-0.322,6.432-5.303,11.546-11.514,12.017l-264.418,0.031c-6.211-0.471-11.149-5.695-11.472-12.126l-0.085-327.014
                      c0.322-6.761,5.858-12.203,12.506-12.203h37.231c10.313,0,18.507-8.429,18.507-19.012V63.5h-73.131
                      C93.25,63.5,80.5,76.058,80.5,91.575v360.38c0,15.502,12.75,28.545,27.869,28.545H256.99h148.621
                      c15.138,0,26.889-13.043,26.889-28.545V91.575C432.5,76.058,420.749,63.5,405.611,63.5z"/>
                    <rect x="144.5" y="192.5" width="112" height="32"/>
                    <rect x="144.5" y="384.5" width="160" height="32"/>
                    <rect x="144.5" y="320.5" width="129" height="32"/>
                    <rect x="144.5" y="256.5" width="208" height="32"/>
                  </g>
                </svg>
              </div>

              <div class="job-your-cv-title" style="flex:1;">
                <h2 style="margin:0;font-family:sans-serif; color:#585858;">Your CV</h2>
              </div>

              <div class="job-your-cv-actions-wrap" style="height:28px;">
                <div class="job-your-cv-actions vert-center">
                  <div class="job-view-cv-action job-your-cv-action">
                    <a href="../../files/cv/" target="_blank">View</a>
                  </div>

                  <div class="job-change-cv-action job-your-cv-action">
                    <a target="_blank">Change</a>
                  </div>

                  <div class="job-remove-cv-action job-your-cv-action">
                    <a target="_blank">Remove</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- If user has not uploaded his/her CV -->
          <div class="dashboard-floor investor-floor" style="display: none;">
            <div class="job-not-applied-wrap">
              <div class="job-not-applied">
                <div class="job-not-applied-image-wrap">
                  <div class="job-not-applied-image">
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
                <div class="job-not-applied-content">
                  <div class="job-not-applied-title-wrap">
                    <h2>No Content Here</h2>
                  </div>
                  <div class="job-not-applied-para-wrap">
                    <span>It seems that you have not uploaded your CV yet, upload your CV by clicking below and get your dream job!</span>
                  </div>
                  <div class="job-not-applied-action-wrap">
                    <button class="prix-primary" id="upload_cv_btn" title="Click to Upload Your CV">Upload Your CV</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Jobs Applied -->
          <div class="dashboard-floor job-floor">
            <div class="jobs-applied-wrap">
              <div class="job-applied">
                <div class="dboard-title-wrap disp-flex" style="margin:0;">
                  <div class="dboard-title" style="flex:1;">
                    <span>Jobs Applied</span>
                  </div>
                  <div class="remove-all-applications-sent-action-wrap">
                    <div class="remove-all-applications-sent-action vert-center">
                      <a style="font-size:11px; font-family:sans-serif; color:#9a9a9a;" title="Remove All Applications Sent">Remove All</a>
                    </div>
                  </div>
                </div>

                <!-- If user has not applied for any jobs yet -->
                <div class="job-not-applied-wrap">
                  <div class="job-not-applied-wrap">
                    <div class="job-not-applied">
                      <div class="job-not-applied-image-wrap">
                        <div class="job-not-applied-image">
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
                      <div class="job-not-applied-content">
                        <div class="job-not-applied-title-wrap">
                          <h2>No Content Here</h2>
                        </div>
                        <div class="job-not-applied-para-wrap" style="line-height:1.8;">
                          <span>As soon as you send your CV to Startups that are hiring, they'll appear here.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- User has applied for job -->
                <!-- <div class="job-applied-wrap" style="margin-top:2em;">
                  <div class="job-applied disp-flex">
                    <a class="job-application" href="../../view" target="_blank">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon_dark.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Jshta</span>
                      </div>
                      <div class="remove-link-wrap">
                        <span title="Remove Application" onclick="alert('asd');">Remove</span>
                      </div>
                    </a>

                    <a class="job-application" href="../../view" target="_blank">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon_dark.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Google</span>
                      </div>
                      <div class="remove-link-wrap">
                        <span title="Remove Application" onclick="alert('asd');">Remove</span>
                      </div>
                    </a>

                    <a class="job-application" href="../../view" target="_blank">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon_dark.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Apple</span>
                      </div>
                      <div class="remove-link-wrap">
                        <span title="Remove Application" onclick="alert('asd');">Remove</span>
                      </div>
                    </a>
                  </div>
                </div> -->
              </div>
            </div>
          </div>

          <!-- Startup Suggestions -->
          <div class="dashboard-floor job-floor">
            <div class="startup-suggestions-wrap">
              <div class="startups-suggestions">
                <div class="dboard-title-wrap" style="margin:0;">
                  <div class="dboard-title" style="flex:1;">
                    <span>Startups Suggestions</span>
                  </div>
                </div>

                <!-- If no startups are open for hiring -->
                <!-- <div class="job-not-applied-wrap">
                  <div class="job-not-applied-wrap">
                    <div class="job-not-applied">
                      <div class="job-not-applied-image-wrap">
                        <div class="job-not-applied-image">
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
                      <div class="job-not-applied-content">
                        <div class="job-not-applied-title-wrap">
                          <h2>No Content Here</h2>
                        </div>
                        <div class="job-not-applied-para-wrap" style="line-height:1.8;">
                          <span>We could not find any suggestions as of right now, check back later.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <!-- User has applied for job -->
                <div class="job-applied-wrap" style="margin-top:2em;">
                  <div class="job-applied disp-flex">
                    <a class="job-application" href="../../view" target="_blank">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Jshta</span>
                      </div>
                    </a>

                    <a class="job-application" href="../../view" target="_blank">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Google</span>
                      </div>
                    </a>

                    <a class="job-application" href="../../view" target="_blank">
                      <div class="profile-picture-wrap">
                        <img src="../../images/default_startup_icon.png" width="101" height="101">
                      </div>
                      <div class="name-wrap">
                        <span>Apple</span>
                      </div>
                    </a>
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