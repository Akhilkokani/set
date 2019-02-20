<?php
/**
 * Settings Page Inside Dashboard
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
include_once "../../libraries/set/set.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="CodeManiacs">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Settings - Startup Ecosystem Tracker | CodeManiacs</title>

  <link rel="icon" href="../../images/favicon.jpg">
  <link rel="stylesheet" href="../../styles/prix.css">
  <link rel="stylesheet" href="../../styles/all-page.css">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <link rel="stylesheet" href="../styles/settings.css">

  <script src="../../scripts/jquery.js"></script>
  <script src="../../scripts/chart.js"></script>
  <script src="../../scripts/set.js"></script>
  
</head>
<body>

  <div class="startup-wrap">
    <div class="dashboard-divider-wrap disp-flex">

      <?php include_once "../_includes/dashboard_sidebar.php"; ?>

      <script> 
        // Activating Settings tab
        document.querySelector ( ".settings" ).className += " active";
      </script>

      <div class="dashboard-tab-content-wrap startup-tab-content-wrap">
        <div class="dashboard-tab-header-wrap disp-flex">
          <div class="tab-header">
            <div class="tab-title-wrap vert-center">
              <div class="tab-title-icon">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="25px" height="25px" viewBox="0 0 512 512" xml:space="preserve">
                  <path d="M416.349,256.046c-0.001-21.013,13.143-38.948,31.651-46.062c-4.887-20.466-12.957-39.7-23.664-57.139
                  c-6.375,2.836-13.23,4.254-20.082,4.254c-12.621,0-25.238-4.811-34.871-14.442c-14.863-14.863-18.248-36.846-10.18-54.97
                  C341.768,76.973,322.54,68.895,302.074,64C294.971,82.529,277.027,95.69,256,95.69c-21.025,0-38.969-13.161-46.073-31.69
                  c-20.466,4.895-39.693,12.973-57.128,23.688c8.068,18.122,4.683,40.104-10.181,54.97c-9.631,9.631-22.25,14.443-34.871,14.443
                  c-6.854,0-13.706-1.419-20.083-4.255C76.958,170.284,68.886,189.517,64,209.984c18.509,7.112,31.652,25.049,31.652,46.062
                  c0,21.008-13.132,38.936-31.63,46.054c4.898,20.466,12.976,39.692,23.692,57.128c6.361-2.821,13.198-4.232,20.032-4.232
                  c12.622,0,25.239,4.812,34.871,14.443c14.841,14.841,18.239,36.781,10.215,54.889c17.438,10.71,36.664,18.783,57.13,23.673
                  c7.128-18.479,25.046-31.596,46.038-31.596c20.992,0,38.91,13.115,46.037,31.596c20.468-4.89,39.693-12.964,57.132-23.675
                  c-8.023-18.106-4.626-40.046,10.216-54.887c9.629-9.632,22.248-14.444,34.868-14.444c6.836,0,13.67,1.411,20.033,4.233
                  c10.716-17.436,18.794-36.662,23.692-57.128C429.48,294.981,416.349,277.052,416.349,256.046z M256.9,335.9c-44.3,0-80-35.9-80-80
                  c0-44.101,35.7-80,80-80c44.299,0,80,35.899,80,80C336.9,300,301.199,335.9,256.9,335.9z"></path>
                </svg>
              </div>
              <div class="tab-title">
                <span>Settings</span>
              </div>
            </div>
          </div>

          <div class="tab-user-actions-wrap">
            <div class="tab-user-action user-profile-pic-wrap vert-center">
              <img src="../../images/default_user_profile_picture.png" class="user-profile-pic" width="44" height="44">
            </div>
          </div>
        </div>

        <div class="dashboard-content startup-tab-content">
          
          <!-- Edit Personal Profile -->
          <div class="dashboard-floor settings-floor" id="edit_profile_floor" style="height:auto;">
            <div class="dboard-title-wrap">
              <div class="dboard-title" id="edit_profile_title">
                <span>Edit Your Profile</span>
              </div>
            </div>

            <div class="edit-profile-wrap">
              <div class="edit-profile" style="overflow:scroll;">
                <div class="disp-flex">
                  <div class="left-side" style="width: 50%; border-right: 1px solid #eaeaea;">
                    <div class="edit-profile-pic-wrap disp-flex">
                      <div class="edit-profile-pic" style="margin-right:1em;">
                        <img src="../../images/default_user_profile_picture.png" width="44" height="44">
                      </div>
                      <div class="edit-profile-pic-message-wrap" style="margin-right:12em; height:44px;">
                        <p class="vert-center" style="margin:0;">Profile Picture</p>
                      </div>
                      <div class="edit-profile-pic-change-wrap" style="height:44px;">
                        <a class="vert-center" id="change_startup_profile_picture" title="Click to change your Startup Profile Picture">Change</a>
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
                            <input id="edit_name" type="text" value="<?php echo $user->get_name ( $connection, $logged_in_user_id ); ?>" placeholder="Name" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Email</label>
                            <input id="edit_email" type="text" value="<?php echo $user->get_user_email_id ( $connection, $logged_in_user_id ); ?>" placeholder="Email" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Username</label>
                            <input id="edit_username" type="text" value="<?php echo $user->get_user_username ( $connection, $logged_in_user_id ); ?>" placeholder="Username" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <div class="disp-flex">
                              <label style="flex:1;">Password</label>
                              <a id="edit_password" style="font-size:10px; color:#5d5d5d;" title="Click to Change Your Account Password">Change</a>
                            </div>
                            <input type="password" disabled readonly value="password" placeholder="Password" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Bio</label>
                            <textarea id="edit_bio" cols="30" rows="3" placeholder="Tell about yourself" style="width:100%; overflow:scroll; resize:vertical;"><?php echo $user->get_user_bio ( $connection, $logged_in_user_id ); ?></textarea>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Link</label>
                            <input id="edit_stup_link" type="text" value="" placeholder="Website/App Link" style="width:100%;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="right-side" style="width: 50%;">

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
                            <input id="edit_lkdin" type="text" value="" placeholder="LinkedIn URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Twitter</label>
                            <input id="edit_titter" type="text" value="" placeholder="Twitter URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Facebook</label>
                            <input id="edit_fb" type="text" value="" placeholder="Facebook URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Instagram</label>
                            <input id="edit_ig" type="text" value="" placeholder="Instagram URL" style="width:100%;">
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Security and Privacy Information -->
                    <div class="edit-group-wrap edit-general-info-wrap">
                      <div class="edit-group-title-wrap">
                        <div class="edit-group-title" style="margin-left:1em;">
                          <h3>Security &amp; Privacy</h3>
                        </div>
                      </div>

                      <div class="edit-group-body" style="padding-left: 20px;">
                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <button class="prix-secondary-btn danger-btn" title="Remove your Startup">Remove Startup</button>
                            <button class="prix-secondary-btn danger-btn" style="display:block;" title="Remove your Incubation Center">Remove Incubation Center</button>
                            <button class="prix-secondary-btn danger-btn" title="Delete your entire account">Delete Entire Account</button>
                          </div>
                        </div>
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
  
  <script src="../scripts/settings.js"></script>
  <?php include_once "../_includes/user_signed_in_actions.php"; ?>
  <?php include_once "../../_includes/all_page_include.php"; ?>
</body>
</html>