<?php
/**
 * INCLUDE FILE FOR DASHBOARD PAGE HEADER
 * This file acts as content includer inside dashboard page files.
 * DO NOT USE IT ANYWHERE ELSE.
 *
 *
 *
 *
 * @author Akhil Kokani
 * @package SET
 */
?>
<div class="tab-user-actions-wrap disp-flex">
  <div class="tab-user-action notifications-wrap">
    <div class="notification-icon-wrap vert-center" style="margin-right: 2em;">
      <div class="notification-icon" style="cursor:pointer;" title="0 New Notifications">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="fill: #f9f9f9;" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          width="21px" height="21px" viewBox="0 0 512 512" xml:space="preserve">
          <g>
            <path d="M381.7,225.9c0-97.6-52.5-130.8-101.6-138.2c0-0.5,0.1-1,0.1-1.6c0-12.3-10.9-22.1-24.2-22.1c-13.3,0-23.8,9.8-23.8,22.1
              c0,0.6,0,1.1,0.1,1.6c-49.2,7.5-102,40.8-102,138.4c0,113.8-28.3,126-66.3,158h384C410.2,352,381.7,339.7,381.7,225.9z"/>
            <path d="M256.2,448c26.8,0,48.8-19.9,51.7-43H204.5C207.3,428.1,229.4,448,256.2,448z"/>
          </g>
        </svg>
      </div>
    </div>
  </div>
  <div class="tab-user-action user-profile-pic-wrap vert-center">
    <?php
    // User Profile Picture
    $user_profile_picture = $user->get_profile_picture_id ( $connection, $logged_in_user_id );

    // Default Profile Picture
    if ( $user_profile_picture == "" || is_null($user_profile_picture) )
      $user_profile_picture = "../../images/default_user_profile_picture.png";
    
    // Rebuilding profile picture source, because, user has uploaded custom profile picture
    else
      $user_profile_picture = "../../files/profile_pictures/" . $user_profile_picture;
    ?>
    <img src="<?php echo $user_profile_picture; ?>" class="user-profile-pic" width="44" height="44">
  </div>
</div>