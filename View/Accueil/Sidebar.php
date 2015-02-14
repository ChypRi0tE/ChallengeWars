<div class="sidebar">
    <div class="sidebar-search-container">
        <input class="sidebar-search-input is-helper" name="search-query" type="text" data-helper-str="Search..." placeholder="Search..." />
        <i class="fa fa-search"></i>
    </div>
    <h3 class="sidebar-heading">Browse</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item is-selected">
            <a class="sidebar-navigation-item-link" href="/ChallengeWars"><i class="fa fa-caret-right"></i>
                <div class="sidebar-navigation-item-name">All</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbOngoing(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="/challenges/search?type=group">
                <div class="sidebar-navigation-item-name">Starter</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbStarter(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="/challenges/search?type=wishlist">
                <div class="sidebar-navigation-item-name">Advanced</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbAdvanced(); ?></div>
            </a>
        </li>
        <?php if (isLogged()) { ?>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="/challenges/search?type=new">
                <div class="sidebar-navigation-item-name">Friends</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbFriends($_SESSION['currentUser']->getId()); ?></div>
            </a>
        </li>
        <?php } ?>
    </ul>
    <?php if (isLogged()) { ?>
    <h3 class="sidebar-heading">My Challenges</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="user.php?id=<?php echo $thisUser->getId(); ?>&tab=created">
                <div class="sidebar-navigation-item-name">Created</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallCreated(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="user.php?id=<?php echo $thisUser->getId(); ?>&tab=entered">
                <div class="sidebar-navigation-item-name">Entered</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallEntered() ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="user.php?id=<?php echo $thisUser->getId(); ?>&tab=won">
                <div class="sidebar-navigation-item-name">Won</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallWon(); ?></div>
            </a>
        </li>
    </ul>
    <?php } ?>
</div>