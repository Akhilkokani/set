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
  <link rel="stylesheet" href="../styles/startup.css">
  
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
          
        </div>

        <footer style="padding:2em; text-align:center;">
          <span style="font-size:12px; color:#9a9a9a; font-family:sans-serif;">Made Possible By CodeManiacs</span>
        </footer>
      </div>
    </div>
  </div>

  <?php include_once "../_includes/user_signed_in_actions.php"; ?>
</body>
</html>