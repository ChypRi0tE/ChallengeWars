<?php
require("Riotpi.php");

function history($idSummoner, $idUser) {
    $api = new Riotpi('euw');
    $array = [];
    $history = $api->getGame($idSummoner);
    for($i = 0; !empty($history['games'][$i]); $i++) {
            $match = $history['games'][$i];
            if ($match['subType'] == NORMAL) {
                $stats = $match['stats'];
                $infos['userId'] = $idUser;
                $infos['matchId'] = $match['gameId'];
                $infos['matchDuration'] = $stats['timePlayed'];
                $infos['matchCreation'] = $match['createDate'];
                $infos['matchType'] = $match['gameMode'];
                $infos['championId'] = $match['championId'];
                $infos['kills'] = $stats['championsKilled'];
                $infos['deaths'] = $stats['numDeaths'];
                $infos['assists'] = $stats['assists'];
                $infos['creeps'] = $stats['minionsKilled'];
                $infos['victory'] = $stats['win'];
                $infos['side'] = $match['teamId'];

                $participants = $history['games'][$i]['fellowPlayers'];
                $a = 1;
                $b = 1;
                for ($j=0;!empty($participants[$j]);$j++) {
                    if ($participants[$j]['teamId'] == $infos['side'])
                        $infos['ally'.$a++] = $participants[$j]['championId'];
                    else
                        $infos['enemy'.$b++] = $participants[$j]['championId'];
                }
                print_r($infos);
                $array[] = new \Summoner\Match($infos);
            }
        }
    return $array;
}
?>