<?php 

ob_start();
$API_KEY = '0'; //توکن ربات را بجای 0 بگزارید
$bot_ = "usernamebot";
$i_can_mirstudy = "تخصص ها";
$ASL = "اصل";
$Call = "ارتباط با ما";
$pics_1_mirstudy = "لینک تصویر 1";
$pics_2_mirstudy = "لینک تصویر 2";
$pics_3_mirstudy = "لینک تصویر 3";
$pvresan_start = "پیام استارت";
$pvresan_sudo = "ارسال شد(مدیریت)";
$pvresan_sent = "ارسال شد (کاربر)";
define('API_KEY',$API_KEY);
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
 function sendmessage($chat_id, $text, $model){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$mode
 ]);
 }
 function sendphoto($chat_id, $photo, $captionl){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function sendsticker($chat_id, $photo, $captionl){
 bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function sendaudio($chat_id, $audio, $caption){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 ]);
 }
 function sendvoice($chat_id, $voice, $caption){
 bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>$voice,
 'caption'=>$caption,
 ]);
 }

 function sendaction($chat_id, $action){
 bot('sendchataction',[
 'chat_id'=>$chat_id,
 'action'=>$action
 ]);
 }
	
	function save($filename,$TXTdata)
	{
	$myfile = fopen("data/".$filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
 //====================the file by mounir======================//

$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$textid = $message->text->id;
$text = $message->text;
$textmessage = isset($update->message->text)?$update->message->text:'';
$myphoto = $update->message->file_size;
$edit = $update->edited_message;
$message_edit_id = $update->edited_message->message_id;
$chat_edit_id = $update->edited_message->chat->id;

$admin = 306904366;

$new_gp_name = $update->message->new_chat_title;
$new_gp_photo = $update->message->new_chat_photo;
$del_gp_photo = $update->message->delete_chat_photo;
$new_member = $update->message->new_chat_member;
$left = $update->message->left_chat_member;
$contact = $update->message->contact;
$audio = $update->message->audio;
$location = $update->message->location;
$memb = $update->message->message_id;
$game = $update->message->game; 
$name = $update->message->from->first_name;
$gp_name = $update->message->chat->title;
$user = $update->message->from->username;
$for = $update->message->from->id;
$sticker = $update->message->sticker;
$video = $update->message->video;
$photo = $update->message->photo;
$voice = $update->message->voice;
$doc = $update->message->document;
$fwd = $update->message->forward_from;
$fwd_id = $update->message->forward_from->id;
$fwd_to = $update->message->forward_to;
$fwd_user = $update->message->forward_from->username;
$fwd_name = $update->message->forward_from->first_name;
$pin = $update->message->pinned_message;
$re = $update->message->reply_to_message;
$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$user_id = $update->message->from->id;
$re_name = $update->message->reply_to_message->from->first_name;
$re_msgid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$re_fwdid = $update->message->reply_to_message->forward_from->id;
$message_id = $update->message->message_id;
$type = $update->message->chat->type;

$number = str_word_count($text);
$numper = strlen($text);

$cllchatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$cllmsegid = $update->callback_query->message->message_id;
$cllfor = $update->callback_query->from->id;

$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$you = $info['result']['status'];
$you_ = $info['result']['user']['id'];

$get_ = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$cllchatid&user_id=".$cllfor);
$info_ = json_decode($get_, true);
$you_ = $info_['result']['status'];
//------------------کدنویسی---قسمت---/start ----------------------//	
if($text == '/start'){
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$ASL,
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	 [
		['text'=>"⭕️ ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
	  ],
	  [
	  ['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	  ]
		]
		])
  ]);
 }
if ($text == "/start") {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>$pvresan_start,
]);
}
elseif($re_fwdid != "" && $from_id == $admin){
bot('sendMessage',[
'chat_id'=>$re_fwdid,
 'text'=>$text,
'parse_mode'=>'MarkDown',
]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$pvresan_sudo,
'parse_mode'=>'MarkDown',
 ]);
 }
else {
bot("forwardmessage",[
 'chat_id'=>$admin,
  'from_chat_id'=>$chat_id,
  'message_id'=>$message_id,
 ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$pvresan_sent,
'parse_mode'=>'MarkDown',
 ]);
}
//*---------------------------------------------------------------------*//
 
//------------------کدنویسی---قسمت---/start {group} ----------------------//
if($text == '/start@MyMiRbot'){
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$ASL,
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	 [
		['text'=>"⭕️ ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
	  ],
	  [
	  ['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	  ]
		]
		])
  ]);
 }
//*-------------------------------------------------------------*//

//------------------کدنویسی---قسمت---ارتباط----------------------//	
if($data == 'call'){
  	bot('editmessagetext',[
        'chat_id'=>$cllchatid,
	'message_id'=>$cllmsegid,
    'text'=>$CALL, 
    'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[
		['text'=>"ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
	  ],
	  [
	  ['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط⭕️",'callback_data'=>"call"]
	  ]
		]
		])
  ]);
}
//*----------------------------------------------------------*//

//------------------کدنویسی---قسمت---اصل----------------------//
if($data == 'ASL'){
  	bot('editmessagetext',[
        'chat_id'=>$cllchatid,
	'message_id'=>$cllmsegid,
    'text'=>$ASL,
 'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
 	  [
     ['text'=>"⭕️ ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
     ],
	 [
	 ['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	 ]
    ]    
    ])
    ]);
    }      
//*----------------------------------------------------------*//

//------------------کدنویسی---قسمت---تخصص-ها------------------//		
if($data == 'تخصص'){
  	bot('editmessagetext',[
        'chat_id'=>$cllchatid,
	'message_id'=>$cllmsegid,
    'text'=>$i_can_mirstudy,
 'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	   [
    ['text'=>"ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
    ],
	[
	['text'=>"⭕️تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	]
    ]
    ])
    ]);
    }
//*---------------------------------------------------------*//

//------------------کدنویسی---قسمت---تصاویر------------------//
if($data == 'pics'){
  	bot('editmessagetext',[
        'chat_id'=>$cllchatid,
	'message_id'=>$cllmsegid,
    'text'=>"🎨 یک شماره از تصویر را انتخاب فرمایید",
 'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	   [
    ['text'=>"1",'callback_data'=>"pic1"],['text'=>"2",'callback_data'=>"pic2"],['text'=>"3",'callback_data'=>"pic3"]
    ],
	 [
	 ['text'=>"➖➖➖➖➖➖",'callback_data'=>"pics"]
	 ],	
     [
     ['text'=>"ASL",'callback_data'=>"ASL"],['text'=>"⭕️تصاویر",'callback_data'=>"pics"]
     ],
	 [
	 ['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	 ]
    ]
    ])
    ]);
    }
if($data == 'pic1'){
  	bot('editmessagetext',[
        'chat_id'=>$cllchatid,
	'message_id'=>$cllmsegid,
    'text'=>"[-]($pics_1_mirstudy)",
 'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	   [
    ['text'=>"⭕️ 1",'callback_data'=>"pic1"],['text'=>"2",'callback_data'=>"pic2"],['text'=>"3",'callback_data'=>"pic3"]
    ],
	[
	['text'=>"➖➖➖➖➖➖",'callback_data'=>"pic1"]
	],
    [
    ['text'=>"ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
    ],
	[
	['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	]
    ]
    ])
    ]);
    }
if($data == 'pic2'){
  	bot('editmessagetext',[
        'chat_id'=>$cllchatid,
	'message_id'=>$cllmsegid,
    'text'=>"[-]($pics_2_mirstudy)",
 'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	   [
    ['text'=>"1",'callback_data'=>"pic1"],['text'=>"⭕️ 2",'callback_data'=>"pic2"],['text'=>"3",'callback_data'=>"pic3"]
    ],
	[
	['text'=>"➖➖➖➖➖➖",'callback_data'=>"pic2"]
	],
    [
    ['text'=>"ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
    ],
	[
	['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	]
    ]
    ])
    ]);
    }
if($data == 'pic3'){
  	bot('editmessagetext',[
        'chat_id'=>$cllchatid,
	'message_id'=>$cllmsegid,
    'text'=>"[-]($pics_3_mirstudy)",
 'parse_mode'=>'Markdown',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	   [
    ['text'=>"1",'callback_data'=>"pic1"],['text'=>"2",'callback_data'=>"pic2"],['text'=>"⭕️ 3",'callback_data'=>"pic3"]
    ],
	[
	['text'=>"➖➖➖➖➖➖",'callback_data'=>"pic3"]
	],
    [
    ['text'=>"ASL",'callback_data'=>"ASL"],['text'=>"تصاویر",'callback_data'=>"pics"]
    ],
	[
	['text'=>"تخصص ها",'callback_data'=>"تخصص"],['text'=>"ارتباط",'callback_data'=>"call"]
	]
    ]
    ])
    ]);
    }

// *Debugged* , *Opened* & *Wroted* By @MiRtm :)
?>
