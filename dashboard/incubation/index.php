<?php
/**
 * Incubation Center Page Isndie Dashboard
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
  
  <title>Incubation Center - Startup Ecosystem Tracker | CodeManiacs</title>

  <link rel="icon" href="../../images/favicon.jpg">
  <link rel="stylesheet" href="../../styles/prix.css">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <link rel="stylesheet" href="../styles/incubation.css">
  
  <script src="../../scripts/jquery.js"></script>
  <script src="../../scripts/chart.js"></script>

</head>
<body>
  
  <div class="startup-wrap">
    <div class="dashboard-divider-wrap disp-flex">

      <?php include_once "../_includes/dashboard_sidebar.php"; ?>

      <script> 
        // Activating incubation center tab
        document.querySelector ( ".incubation" ).className += " active";
      </script>

      <div class="dashboard-tab-content-wrap startup-tab-content-wrap">
        
        <div class="dashboard-tab-header-wrap disp-flex">
          <div class="tab-header">
            <div class="tab-title-wrap vert-center">
              <div class="tab-title-icon">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="25px" height="25px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path d="M381,128.6H132.1c-12.1,0-19.5,0-19.5,20.4v28.1h288V149C400.6,128.6,393.2,128.6,381,128.6z"></path>
                      <path d="M333,96.5H180c-13.1,0-19.5,0.3-19.5,18.7h192C352.4,96.8,346.1,96.5,333,96.5z"></path>
                      <path d="M432.4,169.6l-15.9-9.4v32.3h-321v-32.3l-15.2,9.4c-14.3,8.9-17.8,15.3-15,40.9l17.5,184.8c3.7,20.7,15.9,21.2,24,21.2
                        h299.9c8.1,0,20.2-0.5,23.9-21.2l17.2-184.4C450.1,186.5,445.8,178.1,432.4,169.6z"></path>
                    </g>
                  </svg>
                </div>
              <div class="tab-title">
                <span>Incubation Center</span>
              </div>
            </div>
          </div>

          <div class="tab-user-actions-wrap">
            <div class="tab-user-action user-profile-pic-wrap vert-center">
              <img src="../../images/default_user_profile_picture.png" class="user-profile-pic" width="44" height="44">
            </div>
          </div>
        </div>

        <div class="dashboard-content incubation-center-tab-content">

          <!-- If incubation center has not been listed -->
          <!-- <div class="dashboard-floor incubation-center-floor" style="display:block;">
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
                    <span>It seems that you have not listed your Incubation Center. To list your center click below.</span>
                  </div>
                  <div class="no-incubation-center-action-wrap">
                    <button class="prix-primary" id="add_incubation_center_btn" title="Add your Incubation Center">Add Incubation Center</button>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

          <!-- Startups incubated under center -->
          <div class="dashboard-floor incubation-center-floor">
            <div class="ic-startups-incubated-wrap">
              <div class="ic-startups-incubated">
                <div class="dboard-title-wrap" style="margin:0;">
                  <div class="dboard-title">
                    <span>Startups Incubated</span>
                  </div>
                </div>

                <!-- If no startups have been incubated -->
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
                          <span>Still no startups have added your as their Incubation Center, encourage your startups to  <br>register and list their startup and you as their incubation center.</span>
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

          <!-- Edit Incubation Center Profile -->
          <div class="dashboard-floor startup-floor" id="edit_profile_floor" style="height:auto;">
            <div class="dboard-title-wrap">
              <div class="dboard-title" id="edit_profile_title" style="flex:1;">
                <span>Edit Profile</span>
              </div>
            </div>

            <div class="edit-startup-wrap" style="display:block;">
              <div class="edit-startup" style="overflow:scroll;">
                <div class="disp-flex">
                  <div class="left-side" style="width: 50%; border-right: 1px solid #eaeaea;">
                    <div class="edit-profile-pic-wrap disp-flex">
                      <div class="edit-profile-pic" style="margin-right:1em;">
                        <img src="../../images/default_incubation_center_icon_dark.png" width="44" height="44">
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
                            <input id="edit_ic_name" type="text" value="" placeholder="Incubation Center Name" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Description</label>
                            <input id="edit_ic_desc" type="text" value="" placeholder="Description" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Story</label>
                            <textarea id="edit_ic_stry" cols="30" rows="10" placeholder="Your Incubation Center Story" style="width:100%; overflow:scroll; resize:vertical;"></textarea>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Link</label>
                            <input id="edit_ic_link" type="text" value="" placeholder="Website/App Link" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Registration Number</label>
                            <input id="edit_ic_reg_no" type="text" value="" placeholder="Registration Number" style="width:100%;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="right-side" style="width: 50%;">

                    <!-- Edit Address and Contact -->
                    <div class="edit-group-wrap edit-general-info-wrap">
                      <div class="edit-group-title-wrap">
                        <div class="edit-group-title" style="margin-left:1em;">
                          <h3>Address &amp; Contact</h3>
                        </div>
                      </div>

                      <div class="edit-group-body" style="padding-left:20px;">
                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>State</label>
                            <select id="edit_ic_state" style="display: block;" title="State in which your Startup resides">
                              <option value="" selected disabled>Startup State</option>
                              <option value="">Karnataka</option>
                              <option value="">Maharashtra</option>
                              <option value="">Gujrat</option>
                              <option value="">Haryana</option>
                            </select>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>City</label>
                            <select id="edit_ic_city" style="display: block;" title="City in which your Startup resides">
                              <option value="" selected disabled>Startup City</option>
                              <option value="">Karnataka</option>
                              <option value="">Maharashtra</option>
                              <option value="">Gujrat</option>
                              <option value="">Haryana</option>
                            </select>
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Pincode</label>
                            <input id="edit_ic_pcode" type="text" value="" placeholder="Pincode" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Address</label>
                            <input id="edit_ic_addr" type="text" value="" placeholder="Address" style="width:100%;">
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
                            <input id="edit_ic_lkdin" type="text" value="" placeholder="LinkedIn URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Twitter</label>
                            <input id="edit_ic_titter" type="text" value="" placeholder="Twitter URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Facebook</label>
                            <input id="edit_ic_fb" type="text" value="" placeholder="Facebook URL" style="width:100%;">
                          </div>
                        </div>

                        <div class="group-action-input-wrap">
                          <div class="group-action-input">
                            <label>Instagram</label>
                            <input id="edit_ic_ig" type="text" value="" placeholder="Instagram URL" style="width:100%;">
                          </div>
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

  <div class="list-incubation-center-wrap">
    <div class="add-incubation-center-modal-wrap modal-wrapper" style="display:none;">
      <div class="add-incubation-center-modal modal">
        <div class="modal-title disp-flex">
          <h2 style="flex:1;">Add Incubation Center</h2>
          <div class="modal-close-wrap">
            <div class="modal-close" id="add_incubation_center_modal_close" title="Cancel">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="32px" height="32px" viewBox="0 0 512 512" xml:space="preserve">
                <polygon points="340.2,160 255.8,244.3 171.8,160.4 160,172.2 244,256 160,339.9 171.8,351.6 255.8,267.8 340.2,352 
                  352,340.3 267.6,256 352,171.8 "/>
              </svg>
            </div>
          </div>
        </div>

        <div id="phase_gen_info" style="display:block;">
          <div class="modal-sub-title">
            <h3>General Information</h3>
          </div>
          <div class="phase-content-wrap">
            <div class="phase-content">
              <div class="disp-flex">
                <div class="gen-info-left-side">
                  <div class="phase-text-input-wrap" style="width:90%;">
                    <label>Name</label>
                    <input type="text" id="ic-name" placeholder="Incubation Center Name">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Description</label>
                    <input type="text" id="ic-desc" placeholder="Describe your Incubcation Center in few words">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Story</label>
                    <textarea id="ic-complete-story" style="resize:vertical; overflow:scroll;" cols="30" rows="2" placeholder="Tell your story"></textarea>
                  </div>

                  <div class="phase-text-input-wrap" style="width:95%;">
                    <label>Link</label>
                    <input type="text" id="ic-link" placeholder="Add link to your Incubation Center Website/App">
                  </div>

                  <div class="phase-text-input-wrap" style="width:90%;">
                    <label>Unqiueness</label>
                    <input type="text" id="ic-reg-no" placeholder="Registration Number">
                  </div>
                </div>

                <div class="gen-info-right-side">
                  <div class="phase-text-input-wrap">
                    <label style="margin-bottom: 7px; text-align: center; display: block;">Profile Picture</label>
                    <img src="../../images/default_incubation_center_icon_dark.png" width="202" height="202" style="display: block; margin: auto;">
                    <div class="gen-info-profile-pic-actions-wrap disp-flex">
                      <div class="change-pic">
                        <a title="Change your Incubation Center Profile Picture">Change</a>
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
                    <select id="ic-state" style="display: block;" title="State in which your Incubation Center resides">
                      <option value="" selected disabled>Startup State</option>
                      <option value="">Karnataka</option>
                      <option value="">Maharashtra</option>
                      <option value="">Gujrat</option>
                      <option value="">Haryana</option>
                    </select>
                  </div>

                  <div class="phase-text-input-wrap" style="width: 45%;">
                    <label>City</label>
                    <select id="ic-city" style="display: block;" title="City in which your Incubation Center resides">
                      <option value="" selected disabled>Startup City</option>
                      <option value="">Belgaum</option>
                      <option value="">Mumbai</option>
                      <option value="">Ahemdabad</option>
                      <option value="">Delhi</option>
                    </select>
                  </div>

                  <div class="phase-text-input-wrap" style="width: 42%;">
                    <label>Pincode</label>
                    <input type="text" id="ic-pcode" placeholder="Pincode">
                  </div>

                  <div class="phase-text-input-wrap">
                    <label>Address</label>
                    <textarea id="ic-addr" cols="30" rows="2" style="resize:vertical; overflow:scroll;"></textarea>
                  </div>

                  <div class="phase-text-input-wrap" style="width: 50%;">
                    <label>Contact Number</label>
                    <input type="text" id="ic-cnct-num" placeholder="Number">
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

                  <div class="phase-text-input-wrap" style="width: 80%;" title="LinkedIn Profile ID">
                    <label>LinkedIn</label>
                    <input type="text" id="ic-lkdin" placeholder="LinkedIn URL">
                  </div>

                  <div class="phase-text-input-wrap" style="width: 76%;" title="Twitter Profile ID">
                    <label>Twitter</label>
                    <input type="text" id="ic-twtr" placeholder="Twitter URL">
                  </div>

                  <div class="phase-text-input-wrap" style="width: 72%;" title="Facebook Profile ID">
                    <label>Facebook</label>
                    <input type="text" id="ic-fb" placeholder="Facebook URL">
                  </div>

                  <div class="phase-text-input-wrap" style="width: 68%;" title="Intsagram Profile ID">
                    <label>Instagram</label>
                    <input type="text" id="ic-gram" placeholder="Instagram URL">
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
                    <button class="prix-secondary-btn" title="Previous: Address &amp; Contact">Previous</button>
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

  <script src="../scripts/add_incubation_center.js"></script>
  <?php include_once "../_includes/user_signed_in_actions.php"; ?>
</body>
</html>