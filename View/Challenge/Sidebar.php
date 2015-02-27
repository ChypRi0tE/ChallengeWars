<div class="sidebar sidebar--wide">
  <?php if ($thisChallenge->getStatus() == 2) { ?> 
    <div class="sidebar-entry-loading is-disabled"><i class="fa fa-lock"></i> Challenge closed</div>
  <?php } else if (!isLogged()) { ?>
    <a href="<?php echo $_LINK_LOGIN_; ?>">
      <div class="sidebar-entry sidebar-entry-loading"><i class="fa fa-sign-in"></i> Log in to join</div>
    </a>
  <?php } else {
      if (isUserRegistered()) { ?>
      <form action="" method="post" id="formLeave">
        <input type="hidden" name="challengeLeave" />
        <div class="sidebar-entry sidebar-entry-delete" id="sidebar-leave"><i class="fa fa-minus-circle"></i> Remove Entry</div>
      </form>
    <?php } else if ($thisChallenge->getIsAdvanced() && !$_SESSION['currentUser']->getIsAdvanced()) { ?>
      <div class="sidebar-entry sidebar-error" id="sidebar-advanced" data-toggle="popover" data-placement="bottom"><i class="fa fa-warning"></i> Advanced challenge</div>
      <div class="popper-content hide"><span style="color:black">You must be an advanced member to join this challenge.</span></div>
    <?php } else { ?>
      <form action="" method="post" id="formJoin">
        <input type="hidden" name="challengeJoin" />
        <div class="sidebar-entry sidebar-entry-insert" id="sidebar-join"><i class="fa fa-plus-circle"></i> Enter Challenge</div>
      </form>
    <?php } 
  } ?>
    <h3 class="sidebar-heading">Challenge</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item <?php isActive("Comments"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$thisChallenge->getId()."/comments"; ?>">
                <?php addCaret("Comments"); ?>
                <div class="sidebar-navigation-item-name">Comments</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $CommentManager->getNbForChallenge($thisChallenge->getId())[0]; ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Entries"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$thisChallenge->getId()."/entries"; ?>">
                <?php addCaret("Entries"); ?>
                <div class="sidebar-navigation-item-name">Participants</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count live-entry-count"><?php echo $EntryManager->getNbForChallenge($thisChallenge->getId())[0]; ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Rankings"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$thisChallenge->getId()."/rankings"; ?>">
                <?php addCaret("Rankings"); ?>
                <div class="sidebar-navigation-item-name">Rankings</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count">1</div>
            </a>
        </li>
    </ul>
</div>