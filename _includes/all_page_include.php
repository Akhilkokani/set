<?php
/**
 * INCLUDE FILE FOR ALL PAGES
 * This file acts as content includer inside dashboard page files.
 * DO NOT USE IT ANYWHERE ELSE.
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */

function determin_appropriate_location ( $string ) {

  if ( file_exists( "./" . $string) )
    return "./" . $string;
  else if ( file_exists( "../" . $string) )
    return "../" . $string;
  else if ( file_exists( "../../" . $string) )
    return "../../" . $string;
}

// User ID of who is currently logged in
$logged_in_user_id = $user->get_logged_in_user_id();

$count_of_team_joining_requests = 0;
$count_of_investor_requests = 0;
$count_of_ic_requests = 0;
?>


<?php 
/** 
 * System Notification
 * 
 */
?>
<div class="system-notification-wrap">
  <div class="system-notification">
    <div class="notification-message-wrap">
      <div class="notification-message">
        <span></span>
      </div>
    </div>
  </div>
</div>


<?php 
/** 
 * User Notfication System
 * 
 */

if ( file_exists("../ajax/system.php") ) { ?>
  <script>
    nf_ajax_url = "../ajax/system";
  </script>
<?php } else if ( file_exists("../../ajax/system.php") ) { ?>
  <script>
    nf_ajax_url = "../../ajax/system";
  </script>
<?php } else if ( file_exists("./ajax/system.php") ) { ?>
  <script>
    nf_ajax_url = "./ajax/system";
  </script>
<?php } ?>
<div class="notification-system-wrap"></div>
<div class="notification-system">
  <div class="notification-system-title-wrap">
    <div class="notification-system-title">
      <h2>Notification Center</h2>
    </div>
  </div>

  <div class="notifications-collections-wrap">
    <div class="notifications-collections">

      <?php 
      // Getting team joining requests
      $query_to_get_team_joining_reqeusts = mysqli_query (
        $connection,
        " SELECT 
          team_member_request_by_startup_id,
          team_member_request_id 
        FROM 
          startup_team_member_requests 
        WHERE 
          team_member_request_for_user_id = '$logged_in_user_id' "
      );

      // Query ran properly
      if ( $query_to_get_team_joining_reqeusts ) {

        // Counting number of team joining requests
        $count_of_team_joining_requests = mysqli_num_rows ( $query_to_get_team_joining_reqeusts ) + 0;

        // Team member joining requests exist
        if ( $count_of_team_joining_requests > 0 ) {

          // Fetching team member joining request one by one
          while ( $team_joining_request = mysqli_fetch_assoc($query_to_get_team_joining_reqeusts) ) { 
            
            // Startup's Profile Picture ID which has requested user to join the team
            $team_joining_request_startup_profile_picture_id = $startup->get_profile_pic_id ( $connection, $team_joining_request['team_member_request_by_startup_id'] );

            // Default profile picture
            if ( $team_joining_request_startup_profile_picture_id == "" || is_null($team_joining_request_startup_profile_picture_id) ) {
              $team_joining_request_startup_profile_picture_id = determin_appropriate_location ( "images/" . $team_joining_request_startup_profile_picture_id );
            } 
            // Custom profile picture
            else {
              $team_joining_request_startup_profile_picture_id = determin_appropriate_location ( "files/profile_pictures/" . $team_joining_request_startup_profile_picture_id );
            }
            ?> 
            <div class="notification disp-flex">
              <div class="notification-icon-wrap">
                <div class="notification-icon">
                  <!-- 
                    NOTE: When loading notification icon, be aware, because notification will be viewed outside of dashboard page as well
                          so, be aware of notification icon's file location i.e. relative path -->
                  <img style="border-radius: 100px;" src="<?php echo $team_joining_request_startup_profile_picture_id; ?>" width="48" height="48">
                </div>
              </div>
              <div style="margin-left: 2.5em;">
                <div class="notification-title-wrap">
                  <div class="notification-title">
                    <p><?php echo $startup->get_name ( $connection, $team_joining_request['team_member_request_by_startup_id'] ); ?></p>
                  </div>
                </div>
                <div class="notification-description-wrap">
                  <div class="notification-description">
                    <p><?php echo $startup->get_name ( $connection, $team_joining_request['team_member_request_by_startup_id'] ); ?> wants you to join their team. Do you accept it?</p>
                  </div>
                </div>
                <div class="notification-actions-wrap">
                  <div class="notification-actions disp-flex">
                    <div class="notification-action notification-action-accept-wrap">
                      <a onclick="user_join_team ( '<?php echo $team_joining_request['team_member_request_by_startup_id']; ?>', '<?php echo $team_joining_request['team_member_request_id']; ?>' );">ACCEPT</a>
                    </div>
                    <div class="notification-action notification-action-reject-wrap">
                      <a class="secondary" onclick="user_reject_join_team ( '<?php echo $team_joining_request['team_member_request_by_startup_id']; ?>', '<?php echo $team_joining_request['team_member_request_id']; ?>' );">REJECT</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          } // Fetching team member joining request one by one END
        } // Team member joining requests exist END
      } // Query ran properly END ?>



      <?php 
      // Getting investor requests
      $query_to_get_investor_reqeusts = mysqli_query (
        $connection,
        " SELECT 
          startup_investor_request_by_startup_id,
          startup_investor_request_id 
        FROM 
          startup_investor_requests
        WHERE 
          startup_investor_request_for_user_id = '$logged_in_user_id' "
      );

      // Query ran properly
      if ( $query_to_get_investor_reqeusts ) {

        // Counting number of investor requests
        $count_of_investor_requests = mysqli_num_rows ( $query_to_get_investor_reqeusts ) + 0;

        // Investor requests exist
        if ( $count_of_investor_requests > 0 ) {

          // Fetching investor joining request one by one
          while ( $investor_request = mysqli_fetch_assoc($query_to_get_investor_reqeusts) ) { 
            
            // Startup's Profile Picture ID which has requested user to join the team
            $investor_request_startup_profile_picture_id = $startup->get_profile_pic_id ( $connection, $investor_request['startup_investor_request_by_startup_id'] );

            // Default profile picture
            if ( $investor_request_startup_profile_picture_id == "" || is_null($investor_request_startup_profile_picture_id) ) {
              $investor_request_startup_profile_picture_id = determin_appropriate_location ( "images/" . $investor_request_startup_profile_picture_id );
            } 
            // Custom profile picture
            else {
              $investor_request_startup_profile_picture_id = determin_appropriate_location ( "files/profile_pictures/" . $investor_request_startup_profile_picture_id );
            }
            ?> 
            <div class="notification disp-flex">
              <div class="notification-icon-wrap">
                <div class="notification-icon">
                  <!-- 
                    NOTE: When loading notification icon, be aware, because notification will be viewed outside of dashboard page as well
                          so, be aware of notification icon's file location i.e. relative path -->
                  <img style="border-radius: 100px;" src="<?php echo $investor_request_startup_profile_picture_id; ?>" width="48" height="48">
                </div>
              </div>
              <div style="margin-left: 2.5em;">
                <div class="notification-title-wrap">
                  <div class="notification-title">
                    <p><?php echo $startup->get_name ( $connection, $investor_request['startup_investor_request_by_startup_id'] ); ?></p>
                  </div>
                </div>
                <div class="notification-description-wrap">
                  <div class="notification-description">
                    <p><?php echo $startup->get_name ( $connection, $investor_request['startup_investor_request_by_startup_id'] ); ?> wants you to join their team as investor. Choose your action.</p>
                  </div>
                </div>
                <div class="notification-actions-wrap">
                  <div class="notification-actions disp-flex">
                    <div class="notification-action notification-action-accept-wrap">
                      <a onclick="investor_accept_request ( '<?php echo $investor_request['startup_investor_request_by_startup_id']; ?>', '<?php echo $investor_request['startup_investor_request_id']; ?>' );">ACCEPT</a>
                    </div>
                    <div class="notification-action notification-action-reject-wrap">
                      <a class="secondary" onclick="investor_reject_request ( '<?php echo $investor_request['startup_investor_request_by_startup_id']; ?>', '<?php echo $investor_request['startup_investor_request_id']; ?>' );">REJECT</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          } // Fetching team member joining request one by one END
        } // Team member joining requests exist END
      } // Query ran properly END ?>



      <?php 
      // Getting incubation center ID
      $user_incubation_center_id = $user->get_user_incubation_center_id($connection, $logged_in_user_id);
      
      // User has incubation center
      if ( $user_incubation_center_id !== "" && $user_incubation_center_id !== NULL ) {

        // Getting incubation center request details
        $query_to_get_ic_reqeusts = mysqli_query (
          $connection,
          " SELECT 
            startup_incubation_center_request_by_startup_id,
            startup_incubation_center_request_id 
          FROM 
            startup_incubation_center_requests
          WHERE 
            startup_incubation_center_request_to_ic_id = '$user_incubation_center_id' "
        );

        // Query ran properly
        if ( $query_to_get_ic_reqeusts ) {

          // Counting number of investor requests
          $count_of_ic_requests = mysqli_num_rows ( $query_to_get_ic_reqeusts ) + 0;

          // Investor requests exist
          if ( $count_of_ic_requests > 0 ) {

            // Fetching investor joining request one by one
            while ( $ic_request = mysqli_fetch_assoc($query_to_get_ic_reqeusts) ) { 
              
              // Startup's Profile Picture ID which has requested user to join the team
              $ic_request_startup_profile_picture_id = $startup->get_profile_pic_id ( $connection, $ic_request['startup_incubation_center_request_by_startup_id'] );

              // Default profile picture
              if ( $ic_request_startup_profile_picture_id == "" || is_null($ic_request_startup_profile_picture_id) ) {
                $ic_request_startup_profile_picture_id = determin_appropriate_location ( "images/" . $ic_request_startup_profile_picture_id );
              } 
              // Custom profile picture
              else {
                $ic_request_startup_profile_picture_id = determin_appropriate_location ( "files/profile_pictures/" . $ic_request_startup_profile_picture_id );
              }
              ?> 
              <div class="notification disp-flex">
                <div class="notification-icon-wrap">
                  <div class="notification-icon">
                    <!-- 
                      NOTE: When loading notification icon, be aware, because notification will be viewed outside of dashboard page as well
                            so, be aware of notification icon's file location i.e. relative path -->
                    <img style="border-radius: 100px;" src="<?php echo $ic_request_startup_profile_picture_id; ?>" width="48" height="48">
                  </div>
                </div>
                <div style="margin-left: 2.5em;">
                  <div class="notification-title-wrap">
                    <div class="notification-title">
                      <p><?php echo $startup->get_name ( $connection, $ic_request['startup_incubation_center_request_by_startup_id'] ); ?></p>
                    </div>
                  </div>
                  <div class="notification-description-wrap">
                    <div class="notification-description">
                      <p><?php echo $startup->get_name ( $connection, $ic_request['startup_incubation_center_request_by_startup_id'] ); ?> wants you to add you as their Incubator. Choose your action.</p>
                    </div>
                  </div>
                  <div class="notification-actions-wrap">
                    <div class="notification-actions disp-flex">
                      <div class="notification-action notification-action-accept-wrap">
                        <a onclick="ic_accept_request ( '<?php echo $ic_request['startup_incubation_center_request_by_startup_id']; ?>', '<?php echo $ic_request['startup_incubation_center_request_id']; ?>' );">ACCEPT</a>
                      </div>
                      <div class="notification-action notification-action-reject-wrap">
                        <a class="secondary" onclick="ic_reject_request ( '<?php echo $ic_request['startup_incubation_center_request_by_startup_id']; ?>', '<?php echo $ic_request['startup_incubation_center_request_id']; ?>' );">REJECT</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            } // Fetching team member joining request one by one END
          } // Team member joining requests exist END
        } // Query ran properly END 
      } // User has incubation center END
      ?>

      <?php 
      // No notifications
      if ( $count_of_ic_requests == 0 && $count_of_investor_requests == 0 && $count_of_team_joining_requests == 0 ) { ?>
        <div class="no-notifications-wrap">
          <div class="no-notifications">
            <div class="no-notifications-icon">
              <svg style="margin: auto; display: block;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="150px" height="150px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path d="M383.1,257.4c0.6-5.4,0.9-10,0.9-13.8c0-19.6-3.3-19.7-16-19.7h-75.5c7.3-12,11.5-24.4,11.5-37c0-37.9-57.3-56.4-57.3-88
                  c0-11.7,5.1-21.3,9.3-34.9c-26.5,7-47.4,33.5-47.4,61.6c0,48.3,56.3,48.7,56.3,84.8c0,4.5-1.4,8.5-2.1,13.5h-55.9
                  c0.8-3,1.3-6.2,1.3-9.3c0-22.8-39.1-33.9-39.1-52.8c0-7,1-12.8,3.2-21c-12.9,5.1-28.3,20-28.3,36.8c0,26.7,31.9,29.3,36.8,46.3H80
                  c-12.7,0-16,0.1-16,19.7c0,19.6,7.7,61.3,28.3,111c20.6,49.7,44.4,71.6,61.2,86.2l0.1-0.2c5.1,4.6,11.8,7.3,19.2,7.3h102.4
                  c7.4,0,14.1-2.7,19.2-7.3l0.1,0.2c9-7.8,20-17.8,31.4-32.9c4.7,2,9.8,3.7,15.4,5c8.4,2,16.8,3,24.8,3c24,0,45.6-9.2,60.8-25.8
                  c13.4-14.6,21.1-34.4,21.1-54.2C448,297,420,264.5,383.1,257.4z M366.1,384.2c-8.6,0-15.6-1.2-22.1-4.2c4-8,7.9-15.9,11.7-25.1
                  c10.1-24.4,17.1-47,21.6-65.8c22,4.3,38.7,23.8,38.7,47.1C416,358.9,398.8,384.2,366.1,384.2z"/>
              </svg>
            </div>
            <div class="no-notifications-para">
              <p>No New Notifications.</p>
            </div>
          </div>
        </div>
        <?php 
      } // No notifications END ?>
    </div>
  </div>
</div>
<?php 
/** 
 * Dynamically deciding file location of notification system.
 * 
 */

if ( file_exists("../../scripts/notification_system.js") )
  $notification_system_javascript_file_location = "../../scripts/notification_system.js";
else if ( file_exists("./scripts/notification_system.js") )
  $notification_system_javascript_file_location = "./scripts/notification_system.js";
?>
<script src="<?php echo $notification_system_javascript_file_location; ?>"></script>