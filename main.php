<?php

require_once('./lib/Loader.php');
require_once('./lib/Utility.php');

$loader = new Loader();
$loader->regDirectory(__DIR__.'/classes');
$loader->regDirectory(__DIR__.'/classes/contents');
$loader->register();

$members = array();
$members[] = new Brave(CharacterName::TIIDA);
$members[] = new WhiteMage(CharacterName::YUNA);
$members[] = new BlackMage(CharacterName::RULU);

$enemies = array();
$enemies[] = new Enemy(EnemyName::GOBLINS, 20);
$enemies[] = new Enemy(EnemyName::BOMB, 25);
$enemies[] = new Enemy(EnemyName::MORBOL, 30);


$turn = 1;
$isFinishFlg = false;

$messageObj = new Message;



while(!$isFinishFlg){

    echo "＋＋＋＋＋＋＋＋＋".$turn."ターン目＋＋＋＋＋＋＋＋＋＋＋\n\n";
    
    //現在のHP
    $messageObj->displayStatusMessage($members);
    $messageObj->displayStatusMessage($enemies);


    $messageObj->displayAttackMessage($members,$enemies);
    $messageObj->displayAttackMessage($enemies,$members);
    
    $isFinishFlg = isFinish($members);
    if($isFinishFlg){
        $message = "GAME OVER......\n\n";
        break;
    }
    
    $isFinishFlg = isFinish($enemies);
    if($isFinishFlg){
        $message = "ファンファーレ！！\n\n";
        break;
    }
    
    $turn++;
    
}

echo "＋＋＋＋＋＋＋＋＋戦闘終了＋＋＋＋＋＋＋＋＋＋＋\n\n";

echo $message;

$messageObj->displayStatusMessage($members);
$messageObj->displayStatusMessage($enemies);



?>