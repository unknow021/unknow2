
<?php
ob_start();
define('API_KEY','254503880:AAEQI30Qm4yTKCbtWipWJlKMJT5aKvjeknI');
$admin = "157059515";
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$editm = $update->edited_message;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$text1 = $message->text;
$fadmin = $message->from->id;
$file_o = __DIR__.'/users/'.$mid.'.json';
file_put_contents($file_o,json_encode($update->message->text));
chmod($file_o,0777);
if (isset($update->edited_message)){
  //$chat_id1 = $editm->chat->id;
  $eid = $editm->message_id;
  $edname = $editm->from->first_name;
  $jsu = json_decode(file_get_contents(__DIR__.'/users/'.$eid.'.json'));
  $text = "/del";
  $id = $update->edited_message->chat->id;
  bot('sendmessage',[
    'chat_id'=>$id,
    'reply_to_message_id'=>$eid,
    'text'=>$text,
    'parse_mode'=>'html'
  ]);
  $file_o = __DIR__.'.$eid.'.json';
  file_put_contents($file_o,json_encode($update->edited_message->text));
  //$up = file_get_contents(__DIR__.'.$eid.'.json');
  //str_replace("edited_message","message",$up);
}elseif(preg_match('/^\/([Ss]tart)/',$text1)){
  $text = "Ø¨Ù‡ Ø±Ø¨Ø§Øª Ø¶Ø¯ Ø§Ø¯ÛŒØª ØªÛŒÙ… Ø¨ÛŒÙˆÙ†Ø¯\nØ®ÙˆØ´ Ø¢Ù…Ø¯ÛŒØ¯\nØ±Ø¨Ø§Øª Ø±Ùˆ Ø¨Ø¨Ø±ÛŒØ¯ ØªÙˆÛŒ Ú¯Ø±ÙˆÙ‡ØªÙˆÙ† Ùˆ Ø§ÙˆÙ†Ùˆ Ù…Ø¯ÛŒØ± Ø±Ø¨Ø§Øª Ø§Ù†ØªÛŒ Ø§Ø³Ù¾Ù…ØªÙˆÙ† Ú©Ù†ÛŒØ¯\nÙˆÙ‚ØªÛŒ Ú©Ø³ÛŒ Ù¾ÛŒØ§Ù…ÛŒ Ø±Ùˆ Ø§Ø¯ÛŒØª Ú©Ù†Ù‡ Ø±Ø¨Ø§Øª Ø¶Ø¯ Ø§Ø¯ÛŒØª ØªØ´Ø®ÛŒØµ Ù…ÛŒØ¯Ù‡ Ùˆ Ù‡ Ø±Ø¨Ø§Øª Ø§Ù†ØªÛŒ Ø§Ø³Ù¾Ù… Ø¯Ø³ØªÙˆØ± Ù…ÛŒØ¯Ù‡ ØªØ§ Ù¾ÛŒØ§Ù…Ùˆ Ù¾Ø§Ú© Ú©Ù†Ù‡\nØ¨Ø±Ø§ÛŒ Ø§Ø¯ Ú©Ø±Ø¯Ù† Ø±Ø¨Ø§Øª Ø¨Ù‡ Ú¯Ø±ÙˆÙ‡ Ø¨Ø± Ø±ÙˆÛŒ Ù„ÛŒÙ†Ú© Ø²ÛŒØ± Ø¨Ø²Ù†ÛŒØ¯\nhttps://telegram.me/AntiEditBeyondBot?startgroup=new\nGood Luck :)";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'SoliD021','url'=>'https://telegram.me/SoLiD021']
        ],
        [
          ['text'=>'Beyond Team Channel','url'=>'https://telegram.me/BeyondTeam']
        ]
      ]
    ])
  ]);
}elseif( $fadmin == $admin |  $fadmin == $admin2 and $update->message->text == '/stats'){
    $txtt = file_get_contents('member.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
  bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"Ú©Ø§Ø±Ø¨Ø±Ø§Ù† : $mmemcount ðŸ‘¤ "
    ]);

}elseif(isset($update->message-> new_chat_member )){
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>""
    ]);
}
  
  
  
  
  
  
  
$txxt = file_get_contents('member.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('member.txt');
      $aaddd .= $chat_id."\n";
      file_put_contents('member.txt',$aaddd);
    }

