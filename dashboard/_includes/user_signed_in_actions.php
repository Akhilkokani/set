<?php
/**
 * INCLUDE FILE FOR DASHBOARD USER SIGNED IN ACTIONS
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
<div class="user-signed-in-actions-wrap">
  <div class="user-signed-in-actions">
    <a href="../job/" class="user-signed-in-action">
      Find a Job
    </a>
    <a href="../settings/" class="user-signed-in-action">
      Settings
    </a>
    <a href="../../signout" class="user-signed-in-action">
      Sign Out
    </a>
  </div>
</div>
<div class="user-signed-in-hidden-agent"></div>

<script>

// Initiating and adding event listeners for signed in actions
(function() {

  // User Signed In Action Elements
  var user_signed_in_hidden_agent = document.querySelector ( ".user-signed-in-hidden-agent" ),
      user_profile_picture = document.querySelector ( "img.user-profile-pic" ),
      user_signed_in_actions = document.querySelector ( ".user-signed-in-actions-wrap" );

  // When clicked on profile picture, showing signed in actions
  if ( user_profile_picture ) {
    user_profile_picture.onclick = function() {
      if ( user_signed_in_actions )
        user_signed_in_actions.style.display = "block";
        user_signed_in_hidden_agent.style.display = "block";
    };
  }
  
  // When clicked on hidden layer which is activated when signed in actions are shown
  if ( user_signed_in_hidden_agent ) {
    user_signed_in_hidden_agent.onclick = function () {
      user_signed_in_actions.style.display = "none";
      user_signed_in_hidden_agent.style.display = "none";
    }
  }
})();
</script>