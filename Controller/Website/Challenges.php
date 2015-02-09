<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 17:11
 */

    function    displayChallenge(\Challenge\Challenge $challenge) {
        $src =  '<div class="challenge-row-outer-wrap">';
        $src .=     '<div class="challenge-row-inner-wrap">';
        $src .=         '<div class="challenge-summary">';
        $src .=             '<h2 class="challenge-heading">';
        $src .=             '<a class="challenge-heading-name" href="/challenge/'.$challenge->getId().'">'.$challenge->getTitle().'</a>';
        //$src .=             '<span class="challenge-heading-thin">(20P)</span>';
        $src .=             '<i data-popup="popup--hide-games" data-game-id="1620" class="challenge-icon challenge-hide trigger-popup fa fa-eye-slash"></i>';
        $src .=             '</h2>';
        $src .=             '<div class="challenge-columns">';
        $src .=                 '<div><i class="fa fa-clock-o"></i> <span title="'.$challenge->getDateEnd().'">3 days left</span></div>';
        $src .=                 '<div class="challenge-column--width-fill text-right"><span title="'.$challenge->getDateCreation().'">23 hours ago</span> by <a class="challenge-username" href="/user/'.$challenge->getIdCreator().'">'.$challenge->getIdCreator().'</a></div>';
       // $src .=                 '<div class="challenge-column--contributor-level challenge-column--contributor-level--positive" title="User Level">Level 1+</div>';
        $src .=             '</div>';
        $src .=             '<div class="challenge-links">';
        $src .=                 '<a href="/challenge/'.$challenge->getId().'/entries"><i class="fa fa-tag"></i> <span>1,751 entries</span></a>';
        $src .=                 '<a href="/challenge/'.$challenge->getId().'/comments"><i class="fa fa-comment"></i> <span>72 comments</span></a>';
        $src .=             '</div>';
        $src .=         '</div>';
        $src .=         '<a href="/user/'.$challenge->getIdCreator().'" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">';
        $src .=             '<div class="global-image-inner-wrap" style="background-image:url(assets/img/avatar.jpg);"></div></a>';
        $src .=         '<a class="global-image-outer-wrap global-image-outer-wrap--game-medium" href="/challenge/'.$challenge->getId().'">';
        $src .=         '<div class="global-image-inner-wrap" style="background-image:url(assets/img/chall.jpg);"></div></a>';
        $src .=     '</div>';
        $src .= '</div>';
        echo $src;
    }
?>