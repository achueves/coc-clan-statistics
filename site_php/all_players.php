<?php

if (empty($sort))
    {
        $sort = 'townHallLevel DESC, th_stars DESC, three_stars DESC';
    }

$content = '<h1>Spelare ' . $scope . '</h1>';
$content .= '<table class="table small table-striped table-sm table-hover table-light" border=0>';
$content .= '<thead align=center class="thead-dark"><th>&nbsp;</th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=name%20asc" title="Players name">'.$language['CL_TABLE_PL_NAME_SHORT'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=clan_name" title="Player is member of clan">'.$language['CL_TABLE_NAME_SHORT'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=role" title="Players role in the clan">'.$language['CL_TABLE_ROLE'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=townHallLevel%20desc" title="Players Town Hall level">'.$language['CL_TABLE_TH'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=expLevel%20desc" title="'.$language['CL_TABLE_LVL_DESC'].'">'.$language['CL_TABLE_LVL'].'</a></th>';
$content .= '<th><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=trophies%20desc"><img height=25 src="images/Trophy.png"></a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=warStars%20desc" title="Players collected stars in War">'.$language['CL_TABLE_WAR_STARS'].'</a</th>';
$content .= '<th><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=king%20desc"><img height=25 src="images/Barbarian King.png"></a></th>';
$content .= '<th><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=queen%20desc"><img height=25 src="images/Archer Queen.png"></a></th>';
$content .= '<th><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=warden%20desc"><img height=25 src="images/Grand Warden.png"></a></th>';
$content .= '<th><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=royal%20desc"><img height=25 src="images/Royal Champion.png"></a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=stars%20desc" title="'.$language['CL_TABLE_AVG_STARS_DESC'].'">'.$language['CL_TABLE_AVG_STARS'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=mirr_stars%20desc" title="'.$language['CL_TABLE_AVG_STARS_MIRR_DESC'].'">'.$language['CL_TABLE_AVG_STARS_MIRR'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=th_stars%20desc" title="'.$language['CL_TABLE_AVG_STARS_TH_DESC'].'">'.$language['CL_TABLE_AVG_STARS_TH'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=stars_cwl%20desc" title="'.$language['CL_TABLE_AVG_STARS_CWL_DESC'].'">'.$language['CL_TABLE_AVG_STARS_CWL'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=def_stars%20desc" title="'.$language['CL_TABLE_DEF_DESC'].'">'.$language['CL_TABLE_DEF_SHORT'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=three_stars%20desc" title="'.$language['CL_TABLE_3_STARS_DESC'].'">'.$language['CL_TABLE_3_STARS_SHORT'].'</a></th>';
#$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=attacks%20desc" title="'.$language['CL_TABLE_ATTACKS_DESC'].'">'.$language['CL_TABLE_ATTACKS'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=clan_name,createDate" title="'.$language['PL_FIRST_SEEN_DESC'].'">'.$language['PL_FIRST_SEEN'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=clan_name,last_war%20desc" title="'.$language['PL_LAST_WAR_DESC'].'">'.$language['PL_LAST_WAR'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=donations%20desc" title="'.$language['PL_DONATIONS_DESC'].'">'.$language['PL_DONATIONS'].'</a></th>';
$content .= '<th style="font-size: 14px"><a class="mywhite" href="?mode=players&scope=' . $scope . '&sort=donations%20desc" title="'.$language['CL_TABLE_RATIO_DESC'].'">'.$language['CL_TABLE_RATIO'].'</a></th></thead>';
$content .= "<tbody>";

if($scope == "AV")
    $scope_sql = " WHERE clan_tag IN ('#9V8RQ2PR', '#80L9VRJR', '#YJJ8UGG2', '#220CLU8G0', '#209QPLUV2')"; #, '#PU2CRG2Y', '#LRRPUR88') ";
else
{
    $scope_sql = " ";
    $limit_sql = " LIMIT 1000";
}

$members_sql = "SELECT name, 
clan_name, 
role, 
tag, 
trophies, 
expLevel, 
clan_name, 
townHallLevel, 
league, 
warStars,
(SELECT level FROM troops WHERE player_tag=p.tag AND name=\"Barbarian King\") AS king,
(SELECT level FROM troops WHERE player_tag=p.tag AND name=\"Archer Queen\") AS queen,
(SELECT level FROM troops WHERE player_tag=p.tag AND name=\"Grand Warden\") AS warden,
(SELECT level FROM troops WHERE player_tag=p.tag AND name=\"Royal Champion\") AS royal, 
(SELECT ROUND(AVG(attack_stars),1) FROM attacks WHERE attacker_tag = p.tag AND startTime >= date_sub(now(), interval $days day)) AS stars, 
(SELECT ROUND(AVG(destructionPercentage)) FROM attacks WHERE attacker_tag = p.tag AND startTime >= date_sub(now(), interval $days day)) AS percentage, 
(SELECT ROUND(AVG(attack_stars),1) FROM attacks WHERE attacker_tag = p.tag AND attacker_th = defender_th AND defender_th = p.townHallLevel AND startTime >= date_sub(now(), interval $days day)) as th_stars,
(SELECT ROUND(AVG(destructionPercentage)) FROM attacks WHERE attacker_tag = p.tag AND attacker_th = defender_th AND defender_th = p.townHallLevel AND startTime >= date_sub(now(), interval $days day)) as th_percentage, 
(SELECT ROUND(AVG(attack_stars),1) FROM attacks WHERE attacker_tag = p.tag AND attacker_map_pos = defender_map_pos AND startTime >= date_sub(now(), interval $days day)) as mirr_stars,
(SELECT ROUND(AVG(destructionPercentage)) FROM attacks WHERE attacker_tag = p.tag AND attacker_map_pos = defender_map_pos AND startTime >= date_sub(now(), interval $days day)) as mirr_percentage,
(select round(avg(attack_stars),1) from attacks_cwl where attacker_tag = p.tag AND startTime >= date_sub(now(), interval $days day)) as stars_cwl,
(select round(avg(attack_stars),1) from attacks_cwl where defender_tag = p.tag AND defender_th = p.townHallLevel AND startTime >= date_sub(now(), interval $days day)) as def_stars_cwl,
(select round(avg(destructionPercentage)) from attacks_cwl where attacker_tag = p.tag AND startTime >= date_sub(now(), interval $days day)) as percentage_cwl, 
(SELECT ROUND(AVG(attack_stars),1) FROM v_attacks WHERE defender_tag = p.tag AND startTime >= date_sub(now(), interval $days day)) AS def_stars,
(select round(avg(destructionPercentage)) from v_attacks where defender_tag = p.tag AND startTime >= date_sub(now(), interval $days day)) as def_percentage, 
(SELECT COUNT(*) FROM v_attacks WHERE attacker_tag = p.tag AND attack_stars=3 AND startTime >= date_sub(now(), interval $days day)) AS three_stars, 
(SELECT COUNT(*) FROM v_attacks WHERE attacker_tag = p.tag AND startTime >= date_sub(now(), interval $days day)) AS attacks, 
(SELECT MAX(startTime) FROM v_attacks WHERE attacker_tag = tag) AS last_war, 
donations, 
donationsReceived, 
createDate 
FROM players p" . $scope_sql . "ORDER BY " . $sort . $limit_sql;


include "../mysql_coc.php";

if($result = mysqli_query($conn, $members_sql))
    {
        if (mysqli_num_rows($result) > 0)
            {
	      while($member = mysqli_fetch_assoc($result))
		{
		  $content .= '<tr><td><img src="' . $member['league'] . '" height=25></td>';
		  $content .= '<td><a href="?mode=player&playertag=' . urlencode($member['tag']) . '"><b>' . htmlspecialchars($member['name'], ENT_QUOTES) . '</b></a></td>';
		  $content .= '<td>' . htmlspecialchars($member['clan_name'], ENT_QUOTES) . '</td>';
		  
		  switch ($member['role']) {
		  case "leader":
		    $member['role'] = "Leader";
		    $role_color = 'class="table-danger"';
		    break;
		  case "coLeader":
		    $member['role'] = "CO";
		    $role_color = 'class="table-danger"';
		    break;
		  case "admin":
		    $member['role'] = "Elder";
		    $role_color = 'class="table-success"';
		    break;
		  case "member":
		    if($clantag == '#9V8RQ2PR' ||$clantag == '#80L9VRJR' ||$clantag == '#YJJ8UGG2' ||$clantag == '#LRRPUR88')
		      $member['role'] = "Viking";
		    $role_color = '';
		    break;                            
		  }
		  
		  $content .= "<td align=center " . $role_color . ">" . $member['role'] . "</td>";
		  $content .= "<td align=center>" . $member['townHallLevel'] . "</td>";
		  $content .= "<td align=center>" . $member['expLevel'] . "</td>";
		  $content .= '<td align=center>' . $member['trophies'] . "</td>";
		  $content .= "<td align=center>" . $member['warStars'] . "</td>";
		  $content .= "<td align=center>" . $member['king'] . "</td>";
		  $content .= "<td align=center>" . $member['queen'] . "</td>";
		  $content .= "<td align=center>" . $member['warden'] . "</td>";
		  $content .= "<td align=center>" . $member['royal'] . "</td>";
		  if (!isset($member['stars']))
		    $member['stars'] = 0;
		  if (!isset($member['percentage']))
		    $member['percentage'] = 0;
		  if (!isset($member['th_stars']))
		    $member['th_stars'] = 0;
		  if (!isset($member['th_percentage']))
		    $member['th_percentage'] = 0;
		  if (!isset($member['mirr_stars']))
		    $member['mirr_stars'] = 0;
		  if (!isset($member['mirr_percentage']))
		    $member['mirr_percentage'] = 0;
		  if (!isset($member['stars_cwl']))
		    $member['stars_cwl'] = '-';
		  if (!isset($member['percentage_cwl']))
		    $member['percentage_cwl'] = '-';
		  if (!isset($member['def_stars']))
		    $member['def_stars'] = '-';
		  if (!isset($member['def_percentage']))
		    $member['def_percentage'] = '-';
		  if($member['stars'] <= 2.0)
		    {
		      $r = 255-255;
		      $g = 255-155;
		      $b = 255-155;
		      $s = 2 - $member['stars'];
		      $r1 = round($r*$s+255,0);
		      $g1 = round(230-$g*$s,0);
		      $b1 = round(230-$b*$s,0);
		      $stars_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		    }                            
		  else if($member['stars'] > 2.0)
		    {
		      $r = 255-100;
		      $g = 255-200;
		      $b = 255-110;
		      $s = 3 - $member['stars'];
		      $r1 = round($r*$s+108,0);
		      $g1 = round($g*$s+215,0);
		      $b1 = round($b*$s+111,0);
		      $stars_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		    }
		  else
		    $stars_color = "";
		  
		  $content .= "<td align=center " . $stars_color . " >" . $member['stars'] . " @ " . $member['percentage'] . "%</td>";
                  
		  if($member['mirr_stars'] <= 2.0)
		    {
		      $r = 255-255;
		      $g = 255-155;
		      $b = 255-155;
		      $s = 2 - $member['mirr_stars'];
		      $r1 = round($r*$s+255,0);
		      $g1 = round(230-$g*$s,0);
		      $b1 = round(230-$b*$s,0);
		      $stars_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		    }                            
		  else if($member['mirr_stars'] > 2.0)
		    {
		      $r = 255-100;
		      $g = 255-200;
		      $b = 255-110;
		      $s = 3 - $member['mirr_stars'];
		      $r1 = round($r*$s+108,0);
		      $g1 = round($g*$s+215,0);
		      $b1 = round($b*$s+111,0);
		      $stars_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		    }
		  else
		    $stars_color = "";
		  
		  $content .= "<td align=center " . $stars_color . " >" . $member['mirr_stars'] . " @ " . $member['mirr_percentage'] . "%</td>";
                  
		  if($member['th_stars'] <= 2.0)
		    {
		      $r = 255-255;
		      $g = 255-155;
		      $b = 255-155;
		      $s = 2 - $member['th_stars'];
		      $r1 = round($r*$s+255,0);
		      $g1 = round(230-$g*$s,0);
		      $b1 = round(230-$b*$s,0);
		      $stars_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		    }                            
		  else if($member['th_stars'] > 2.0)
		    {
		      $r = 255-100;
		      $g = 255-200;
		      $b = 255-110;
		      $s = 3 - $member['th_stars'];
		      $r1 = round($r*$s+108,0);
		      $g1 = round($g*$s+215,0);
		      $b1 = round($b*$s+111,0);
		      $stars_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		    }
		  else
		    $stars_color = "";

		  if ($member['stars_cwl'] == '-') {
		    $stars_cwl_color = "";
		  } else if ($member['stars_cwl'] <= 2.0) {
		    $member['stars_cwl'] = $member['stars_cwl'] . ' @ ' . $member['percentage_cwl'];
		    $r = 255 - 255;
		    $g = 255 - 155;
		    $b = 255 - 155;
		    $s = 2 - $member['stars_cwl'];
		    $r1 = round($r * $s + 255, 0);
		    $g1 = round(230 - $g * $s, 0);
		    $b1 = round(230 - $b * $s, 0);
		    $stars_cwl_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		  } else if ($member['stars_cwl'] > 2.0) {
		    $member['stars_cwl'] = $member['stars_cwl'] . ' @ ' . $member['percentage_cwl'] . "%";
		    $r = 255 - 100;
		    $g = 255 - 200;
		    $b = 255 - 110;
		    $s = 3 - $member['stars_cwl'];
		    $r1 = round($r * $s + 108, 0);
		    $g1 = round($g * $s + 215, 0);
		    $b1 = round($b * $s + 111, 0);
		    $stars_cwl_color = 'style="background-color:rgb(' . $r1 . ',' . $g1 . ',' . $b1 . ')"';
		  } else
		    $stars_cwl_color = "";

		  
		  $content .= "<td align=center " . $stars_color . " >" . $member['th_stars'] . " @ " . $member['th_percentage'] . "%</td>";
		  $content .= "<td align=center " . $stars_cwl_color . " >" . $member['stars_cwl'] . "</td>";
		  if ($member['def_stars'] != '-')
		    {
		      $member['def_stars'] = $member['def_stars'] . " @ " . $member['def_percentage'] . "%";
		    }
		  $content .= "<td align=center>" . $member['def_stars'] . "</td>";
		  $content .= "<td align=center>" . $member['three_stars'] . " / " . $member['attacks'] . "</td>";
		  #                        $content .= "<td align=center>" . $member['attacks'] . "</td>";
		  $content .= "<td align=center>" . $member['createDate'] . "</td>";
		  $content .= "<td align=center>" . $member['last_war'] . "</td>";
		  
		  $donation_count = round($member['donations']/$member['donationsReceived'], 2);
		  if ($member['donations'] == 0)
		    $donation_colour = 'style="background-color:rgb(255,0,0)"';
		  else if (($donation_count < 0.4) || ($member['donations'] < 2))
		    $donation_colour = 'class="table-danger"';
		  else if ((($donation_count <= 0.6) && ($donation_count >= 0.4)) || (($member['donations'] < 50) && ($member['donations'] > 1)))
		    $donation_colour = 'class="table-warning"';
		  else if ($donation_count > 0.6)
		    $donation_colour = 'class="table-success"';
		  else
		    $donation_colour = 'class="table-secondary"';
		  $content .= '<td align=right ' . $donation_colour . ' >' . $member['donations'] . " / " . $member['donationsReceived'] . "</td>";
		  $content .= "<td align=center " . $donation_colour . ">" . $donation_count . "</td>";
		  $content .= "</tr>";
		}
            }
        else
	  {
	    echo "Error fetching data for $clantag <br>";
	  }
    }
 else
   {
     echo "<br>FAIL! - " . mysqli_error($conn) . "<br>";
   }
mysqli_close($conn);

$content .= "</tbody></table>";

echo $content;

?>
