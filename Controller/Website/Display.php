<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 17:11
 */
    function    displayEntry(\Challenge\Entry $entry) {
        global $UserManager;

        $user = $UserManager->get($entry->getIdUser());
    $src = '<div class="table-row-outer-wrap">';
    $src .=     '<div class="table-row-inner-wrap">';
    $src .=         '<div>';
    $src .=             '<a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="/user.php?id='.$user->getId().'">';
    $src .=             '<div class="global-image-inner-wrap" style="background-image:url('.$user->getAvatar().');"></div></a></div>';
    $src .=         '<div class="table-column--width-fill">';
    $src .=             '<a href="/user.php?id='.$user->getId().'" class="table-column-heading">'.$user->getUsername().'</a></div>';
    $src .=         '<div class="table-column--width-small text-center"><span title="'.$entry->getDateEntry().'">0 seconds ago</span></div></div></div>';
        echo $src;
    }
?>