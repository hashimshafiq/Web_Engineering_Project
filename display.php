<?php
session_start();
include 'config.php';
include("lib/inc/chartphp_dist.php"); 
$pid = $_GET['id'];
$main_error="";
$main_confirm="";


$query = "SELECT * FROM place WHERE place_id='$pid'";
$result = mysql_query($query,$link);
$row = mysql_fetch_array($result);
//print_r($row);

$name = $row['place_name'];
$loc =  $row['location'];
$img = "MyUploadImages/".$row['picture'];
$k1 =  $row['keyword1'];
$k2 =  $row['keyword2'];
$k3 = $row['keyword3'];

if(isset($_POST['submit'])){

  $comment = $_POST['ttt'];
  // getting comment id from place table
  $query_cid = "SELECT Max(c_id) as cid FROM comment";
  $cid_result = mysql_query($query_cid,$link);
  $cid_row = mysql_fetch_assoc($cid_result);
  $cid = $cid_row['cid'];
  $cid = $cid+1;
  $uid =  $_SESSION['uid'];

  $query = "INSERT INTO comment (c_id, place_id, user_id, comment)
            VALUES ('$cid','$pid','$uid','$comment')";

   $result = mysql_query($query,$link);

   if(mysql_affected_rows()>0) {
            $main_confirm = "Succesfully Registered";

        }else{

          $main_error = "Error Something bad";
        }


       
              




}



    $query = "SELECT * FROM comment WHERE place_id='$pid'";
    $result = mysql_query($query,$link);

    $good_words = array('absolutely',
                        'adorable',
                        'accepted',
                        'acclaimed',
                        'accomplish',
                        'accomplishment',
                        'achievement',
                        'action',
                        'active',
                        'admire',
                        'adventure',
                        'affirmative',
                        'affluent',
                        'agree',
                        'agreeable',
                        'amazing',
                        'angelic',
                        'appealing',
                        'approve',
                        'aptitude',
                        'attractive',
                        'awesome',
                        'beaming',
                        'beautiful',
                        'believe',
                        'beneficial',
                        'bliss',
                        'bountiful',
                        'bounty',
                        'brave',
                        'bravo',
                        'brilliant',
                        'bubbly',
                        'best',
                        'calm',
                        'celebrated',
                        'certain',
                        'champ',
                        'champion',
                        'charming',
                        'cheery',
                        'choice',
                        'classic',
                        'classical',
                        'clean',
                        'commend',
                        'composed',
                        'congratulation',
                        'constant',
                        'cool',
                        'courageous',
                        'creative',
                        'cute',
                        'dazzling',
                        'delight',
                        'delightful',
                        'distinguished',
                        'divine',
                        'earnest',
                        'easy',
                        'ecstatic',
                        'effective',
                        'effervescent',
                        'efficient',
                        'effortless',
                        'electrifying',
                        'elegant',
                        'enchanting',
                        'encouraging',
                        'endorsed',
                        'energetic',
                        'energized',
                        'engaging',
                        'enthusiastic',
                        'essential',
                        'esteemed',
                        'ethical',
                        'excellent',
                        'exciting',
                        'exquisite',
                        'fabulous',
                        'fair',
                        'familiar',
                        'famous',
                        'fantastic',
                        'favorable',
                        'fetching',
                        'fine',
                        'fitting',
                        'flourishing',
                        'fortunate',
                        'free',
                        'fresh',
                        'friendly',
                        'fun',
                        'funny',
                        'generous',
                        'genius',
                        'genuine',
                        'giving',
                        'glamorous',
                        'glowing',
                        'good',
                        'gorgeous',
                        'graceful',
                        'great',
                        'green',
                        'grin',
                        'growing',
                        'handsome',
                        'happy',
                        'harmonious',
                        'healing',
                        'healthy',
                        'hearty',
                        'heavenly',
                        'honest',
                        'honorable',
                        'honored',
                        'hug',
                        'idea',
                        'ideal',
                        'imaginative',
                        'imagine',
                        'impressive',
                        'independent',
                        'innovate',
                        'innovative',
                        'instant',
                        'instantaneous',
                        'instinctive',
                        'intuitive',
                        'intellectual',
                        'intelligent',
                        'inventive',
                        'jovial',
                        'joy',
                        'jubilant',
                        'keen',
                        'kind',
                        'knowing',
                        'knowledgeable',
                        'laugh',
                        'legendary',
                        'light',
                        'learned',
                        'lively',
                        'lovely',
                        'lucid',
                        'lucky',
                        'luminous',
                        'marvelous',
                        'masterful',
                        'meaningful',
                        'merit',
                        'meritorious',
                        'miraculous',
                        'motivating',
                        'moving',
                        'natural',
                        'nice',
                        'novel',
                        'now',
                        'nurturing',
                        'nutritious',
                        'okay',
                        'one',
                        'one-hundred percent',
                        'open',
                        'optimistic',
                        'paradise',
                        'perfect',
                        'phenomenal',
                        'pleasurable',
                        'plentiful',
                        'pleasant',
                        'poised',
                        'polished',
                        'popular',
                        'positive',
                        'powerful',
                        'prepared',
                        'pretty',
                        'principled',
                        'productive',
                        'progress',
                        'prominent',
                        'protected',
                        'proud',
                        'quality',
                        'quick',
                        'quiet',
                        'ready',
                        'reassuring',
                        'refined',
                        'refreshing',
                        'rejoice',
                        'reliable',
                        'remarkable',
                        'resounding',
                        'respected',
                        'restored',
                        'reward',
                        'rewarding',
                        'right',
                        'robust',
                        'safe',
                        'satisfactory',
                        'secure',
                        'seemly',
                        'simple',
                        'skilled',
                        'skillful',
                        'smile',
                        'soulful',
                        'sparkling',
                        'special',
                        'spirited',
                        'spiritual',
                        'stirring',
                        'stupendous',
                        'stunning',
                        'success',
                        'successful',
                        'sunny',
                        'super',
                        'superb',
                        'supporting',
                        'surprising',
                        'terrific',
                        'thorough',
                        'thrilling',
                        'thriving',
                        'tops',
                        'tranquil',
                        'transforming',
                        'transformative',
                        'trusting',
                        'truthful',
                        'unreal',
                        'unwavering',
                        'up',
                        'upbeat',
                        'upright',
                        'upstanding',
                        'valued',
                        'vibrant',
                        'victorious',
                        'victory',
                        'vigorous',
                        'virtuous',
                        'vital',
                        'vivacious',
                        'wealthy',
                        'welcome',
                        'well',
                        'whole',
                        'wholesome',
                        'willing',
                        'wonderful',
                        'wondrous',
                        'worthy',
                        'wow',
                        'yes',
                        'yummy',
                        'zeal',
                        'zealous');

$bad_words = Array('bad','boring','fool','inferior','unsatisfactory','inadequate',
                    'unacceptable','deficient','imperfect','faulty','huh','rubbish','wtf','undesireable','dangerous','offensive','expensive','what','hell');




?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  min-width: 250px;
}

* {
  box-sizing: border-box;
  
}
ul {
  margin: 0;
  padding: 0;
}

ul li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}


ul li:nth-child(odd) {
  background: #f9f9f9;
}

ul li:hover {
  background: #ddd;
}

.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="lib/js/jquery.min.js"></script> 
        <script src="lib/js/chartphp.js"></script> 
        <link rel="stylesheet" href="lib/js/chartphp.css">
         <style> 
        /* white color data labels */ 
        .jqplot-data-label{color:white;} 
    </style> 
</head>
<body>


<div  style="margin-left: 10%; margin-bottom: 3%; margin-top: 2%" >
<?php 
 echo "<img src=\"$img\" width=\"320\" height=\"260\">";
?>
</div>
<h3 style="margin-left: 10%; margin-bottom: 1%; "> <b> Name: </b> <?php echo $name; ?></h3>
<h3 style="margin-left: 10%; margin-bottom: 1%; "><b> Location:</b> <?php echo $loc; ?></h3>

 <div class="row" style="overflow-y:auto; max-height: 300px">
  <div class="col-sm-offset-1 col-sm-8">

<ul id="myUL">
<?php
 

  
  $count_good=0; 
  $count_bad=0;
  while($r=mysql_fetch_array($result)){
    echo "<li>".$r['comment']."</li>";
    $piece = explode(" ", $r['comment']);
    for ($i=0; $i < count($piece) ; $i++) { 
        for($j=0; $j<count($good_words);$j++){
          if(strtolower($piece[$i])==$good_words[$j]){
            $count_good +=1;
            
          }
          if(strtolower($piece[$i])==$bad_words[$j]){
            $count_bad +=1;
            
          }
        
        }

   }

    
        


  }
  ?>
  </ul>
  </div>
  </div>

  <?php

  $p = new chartphp(); 

$p->data = array(array(array('Postive Comment Count', $count_good),array('Negative Comment Count', $count_bad)));
$p->chart_type = "pie";
$p->color = "green,red";   
$p->title = "<b>Comment Analysis</b>";
$out = $p->render('c1'); 

   
  

?> 
 <div style="width:40%; min-width:450px; margin-left: 50%; margin-bottom: 3%; margin-top: -35%;" > 
            <?php echo $out; ?> 
        </div> 

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" >
   <div class="row" style="margin-top: 330px">
  <div class="col-sm-offset-1 col-sm-8" >

  <input align="center" style="margin-top: 1%; margin-right: 0" type="text" id="myInput" placeholder="Comment" class="form-control" name="ttt">
   
  <button style="margin-top: 1%" type="submit" class="btn btn-default" name="submit">Add Comment</button>
  </div>
  </div>
  </form>
  <span ><font color="red"><?php echo $main_error; ?></font></span>
  <span ><font color="green"><?php echo $main_confirm; ?></font></span>
  


  
 
</div>       
      
</body>
</html>