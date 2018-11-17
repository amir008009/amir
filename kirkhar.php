<?php 
/*
** Source
** so
*/
ob_start();
define('API_KEY','# 708609458:AAHnQRTofAIEZmKWHwd2QPkhoI5NEravgRg '); //توکن ربات خود را در اينجا وارد کنيد
$admin = " 443094818 "; //شناسه عددی سازنده را در اينجا وارد کنيد
$zirmajmue = 5; //تعيين تعداد زيرمجموعه برای ويژه شدن حساب
$botusername = " Iran_poroobot "; //ایدی ربات را در اينجا وارد کنيد
$pardakhturl = "https://idpay.ir/sellerjj"; //لينک پرداخت حساب پی پينگ را در اينجا وارد کنيد
$channelusername = "# t.me/iranporoo "; //آيدی کانال خود را در اينجا وارد کنيد . سپس ربات را ادمين کانال کنيد 


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
function check_channel_member($channelusername , $chat_id){
	$res = bot("getChatMember" , array("chat_id" => $channelusername , "user_id" => $chat_id));
	if(isset($res->result->user) && $res->result->status == "member"){
		return "yes";
	}elseif($res->result->status == "administrator"){
		return "yes";
	}elseif($res->result->status == "creator"){
		return "yes";
	}else{
	    return "no";
	}
}
 function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
 bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>$text,
 'parse_mode'=>$parsmde,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'reply_markup'=>$keyboard
 ]);
 }
function SendMessage2($chatid,$text,$message_id,$parsmde,$disable_web_page_preview,$keyboard){
 bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>$text,
        'reply_to_message_id'=>$message_id,
 'parse_mode'=>$parsmde,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'reply_markup'=>$keyboard
 ]);
 }
function ForwardMessage($chatid,$from_chat,$message_id){
 bot('ForwardMessage',[
 'chat_id'=>$chatid,
 'from_chat_id'=>$from_chat,
 'message_id'=>$message_id
 ]);
 }
function SendPhoto($chatid,$photo,$keyboard,$caption){
 bot('SendPhoto',[
 'chat_id'=>$chatid,
 'photo'=>$photo,
 'caption'=>$caption,
 'reply_markup'=>$keyboard
 ]);
 }
function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
 bot('SendAudio',[
 'chat_id'=>$chatid,
 'audio'=>$audio,
 'caption'=>$caption,
 'performer'=>$sazande,
 'title'=>$title,
 'reply_markup'=>$keyboard
 ]);
 }
 function save($filename,$TXTdata) 
{ 
    $myfile = fopen($filename, "w") or die("Unable to open file!"); 
    fwrite($myfile, "$TXTdata"); 
    fclose($myfile); 
}
function SendDocument($chatid,$document,$keyboard,$caption){
 bot('SendDocument',[
 'chat_id'=>$chatid,
 'document'=>$document,
 'caption'=>$caption,
 'reply_markup'=>$keyboard
 ]);
 }
function SendSticker($chatid,$sticker,$keyboard){
 bot('SendSticker',[
 'chat_id'=>$chatid,
 'sticker'=>$sticker,
 'reply_markup'=>$keyboard
 ]);
 }
function SendVideo($chatid,$video,$keyboard,$duration){
 bot('SendVideo',[
 'chat_id'=>$chatid,
 'video'=>$video,
 'duration'=>$duration,
 'reply_markup'=>$keyboard
 ]);
 }
function SendVoice($chatid,$voice,$keyboard,$caption){
 bot('SendVoice',[
 'chat_id'=>$chatid,
 'voice'=>$voice,
 'caption'=>$caption,
 'reply_markup'=>$keyboard
 ]);
 }
function SendContact($chatid,$first_name,$phone_number,$keyboard){
 bot('SendContact',[
 'chat_id'=>$chatid,
 'first_name'=>$first_name,
 'phone_number'=>$phone_number,
 'reply_markup'=>$keyboard
 ]);
 }
function SendChatAction($chatid,$action){
 bot('sendChatAction',[
 'chat_id'=>$chatid,
 'action'=>$action
 ]);
 }
function KickChatMember($chatid,$user_id){
 bot('kickChatMember',[
 'chat_id'=>$chatid,
 'user_id'=>$user_id
 ]);
 }
function LeaveChat($chatid){
 bot('LeaveChat',[
 'chat_id'=>$chatid
 ]);
 }
function GetChat($chatid){
 bot('GetChat',[
 'chat_id'=>$chatid
 ]);
 }
function GetChatMembersCount($chatid){
 bot('getChatMembersCount',[
 'chat_id'=>$chatid
 ]);
 }
function GetChatMember($chatid,$userid){
 $truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
 $tch = $truechannel->result->status;
 return $tch;
 }
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
 bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
  'show_alert'=>$show_alert
    ]);
 }
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
  bot('editMessagetext',[
    'chat_id'=>$chat_id,
 'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
 'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
 ]);
 }
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
  bot('editMessageCaption',[
    'chat_id'=>$chat_id,
 'message_id'=>$message_id,
    'caption'=>$caption,
    'reply_markup'=>$keyboard,
 'inline_message_id'=>$inline_message_id
 ]);
 }
 function run($id,$code){
if(!is_dir("global")){
mkdir("global");
}
if(!is_dir("global/$id")){
mkdir("global/$id");
}
file_put_contents("global/$id/run.txt",$code);
}
//=============
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$usrn = $update->callback_query->message->chat->username;
$usrn1 = $update->callback_query->message->from->username;
$messageid = $update->callback_query->message->message_id;
$sticker = $update->message->sticker;
$gif = $update->message->gif;
$data_id = $update->callback_query->id;
$txt = $update->callback_query->message->text;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$textmessage = $update->message->text;
$message_id = $update->message->message_id;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$caption = $update->message->caption;
$datetime = json_decode(file_get_contents("https://api.feelthecode.xyz/date/?timezone=Asia/tehran")); //این قسمت برای ساعت و تاریخ است دست نزنید
$time = $datetime->time;
$date = $datetime->date;
$allmember = file_get_contents('data/allmember.txt');
$username = $update->message->from->username;
$name = $update->message->from->first_name;
$signup = file_get_contents("user/".$from_id."/signup.txt");
$step = file_get_contents("user/".$from_id."/step.txt");
$command = file_get_contents("user/".$from_id."/command.txt");
$change = file_get_contents("user/".$from_id."/change.txt");
$randtrue = file_get_contents("user/".$from_id."/rand.txt");
@mkdir('user/'.$from_id);
$chatadd = file_get_contents("data/chat.txt");
$chatadd2 = file_get_contents("data/chat2.txt");
$supportadd = file_get_contents("data/support.txt");
$vips = file_get_contents("data/vips.txt");
$ban = file_get_contents("data/banlist.txt");
//===============کلیدهای پنل مدیریت
$button_admin = json_encode(['keyboard'=>[
[['text'=>'🔙 بازگشت']],
[['text'=>'پيام همگانی'],['text'=>'فوروارد همگانی']],
[['text'=>'پيام به کاربر'],['text'=>'مشخصات کاربر']],
[['text'=>'حذف vip'],['text'=>'vip کردن']],
[['text'=>'آمار'],['text'=>'اخطار به کاربر']],
[['text'=>'بلاک کردن کاربر'],['text'=>'آنبلاک کردن کاربر']],
],'resize_keyboard'=>true]);
$button_signup = json_encode(['keyboard'=>[
[['text'=>'ثبت نام']],
],'resize_keyboard'=>true]);
$button_official = json_encode(['keyboard'=>[
[['text'=>'💬شروع چت']],
[['text'=>'🏆حساب ويژه'],['text'=>'📊مشخصات']],
[['text'=>'📩پشتیبانی'],['text'=>'👨‍👧�1�7�👧زيرمجموعل1�7 گیری']],
[['text'=>'📌دیگر خدمات ما']],
],'resize_keyboard'=>true]);
$button_zir = json_encode(['keyboard'=>[
[['text'=>'🌐لينک دعوت']],
[['text'=>'چقدر کاربر آوردم'],['text'=>'ارتقا حساب']],
[['text'=>'🔙 بازگشت']],
],'resize_keyboard'=>true]);
$button_back_support = json_encode(['keyboard'=>[
[['text'=>'❗️اتمام گفتگو']],
],'resize_keyboard'=>true]);
$button_back_chat = json_encode(['keyboard'=>[
[['text'=>'مشخصات کاربر']],
[['text'=>'اتمام گفتگو']],
],'resize_keyboard'=>true]);
$button_chat = json_encode(['keyboard'=>[
[['text'=>'چت تصادفی'],['text'=>'چت همگانی']],
[['text'=>'👩🏻چت با دختر'],['text'=>'👱🏼چت با پسر']],
[['text'=>'🔙 بازگشت']],
],'resize_keyboard'=>true]);
$button_chat2 = json_encode(['keyboard'=>[
[['text'=>'اتمام گفتگو⚠️'],['text'=>'ادامه گفتگو']],
[['text'=>'بلاک کردن و اتمام گفت و گو⚠️']],
],'resize_keyboard'=>true]);
$button_chat3 = json_encode(['keyboard'=>[
[['text'=>'نه بيخيالش'],['text'=>'بلاکش کن']],
],'resize_keyboard'=>true]);
$button_back_search = json_encode(['keyboard'=>[ 
[['text'=>'لغو جستجو']],
],'resize_keyboard'=>true]);
$button_jens = json_encode(['keyboard'=>[
[['text'=>'دختر'],['text'=>'پسر']],
],'resize_keyboard'=>true]);
$button_einfo = json_encode(['keyboard'=>[
[['text'=>'ويرايش']],
[['text'=>'🔙 بازگشت']],
],'resize_keyboard'=>true]);
$button_pfriend = json_encode(['inline_keyboard'=>[
[['text'=>'پاسخ','callback_data'=>'pfriend']],
[['text'=>'گزارش','callback_data'=>'reportpf']],
],'resize_keyboard'=>true]);
$button_vip = json_encode(['keyboard'=>[
[['text'=>'عضويت در کانال'],['text'=>'پرداخت']],
[['text'=>'🔙 بازگشت']],
],'resize_keyboard'=>true]);
$button_senn = json_encode(['keyboard'=>[
[['text'=>'12'],['text'=>'13'],['text'=>'14'],['text'=>'15'],['text'=>'16']],
[['text'=>'17'],['text'=>'18'],['text'=>'19'],['text'=>'20'],['text'=>'21']],
[['text'=>'22'],['text'=>'23'],['text'=>'24'],['text'=>'25'],['text'=>'26']],
[['text'=>'27'],['text'=>'28'],['text'=>'29'],['text'=>'30'],['text'=>'31']],
[['text'=>'32'],['text'=>'33'],['text'=>'34'],['text'=>'35'],['text'=>'36']],
[['text'=>'37'],['text'=>'38'],['text'=>'39'],['text'=>'+40'],['text'=>'-50']],
],'resize_keyboard'=>true]);
$button_mlife = json_encode(['keyboard'=>[ //نام شهرها را میتوانید کم یا اضافه کنید
[['text'=>'تهران'],['text'=>'البرز'],['text'=>'اردبيل'],['text'=>'کيش']],
[['text'=>'آذربايجان شرقي'],['text'=>'آذربايجان غربی'],['text'=>'خوزستان']],
[['text'=>'خراسان شمالی'],['text'=>'خراسان جنوبی'],['text'=>'خراسان رضوي']],
[['text'=>'چهارمحال'],['text'=>'کرمان'],['text'=>'کردستان'],['text'=>'کرمانشاه']],
[['text'=>'لرستان'],['text'=>'مازندران'],['text'=>'هرمزگان']],
[['text'=>'سيستان و بلوچستان'],['text'=>'همدان'],['text'=>'اصفهان'],['text'=>'سمنان']],
[['text'=>'زنجان'],['text'=>'ايلام'],['text'=>'قزوين'],['text'=>'يزد']],
[['text'=>'گيلان'],['text'=>'بوشهر'],['text'=>'فارس'],['text'=>'قم']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
[['text'=>'🔙 بازگشت']],
],'resize_keyboard'=>true]);
$button_lagv = json_encode(['keyboard'=>[
[['text'=>'لغو']],
],'resize_keyboard'=>true]);
//==========ban
if (strpos($ban,"$from_id") !== false  ) {
SendMessage($chat_id,"شما از ربات به دليل رعايت نکردن قوانين بلاک شده ايد
لطفا ديگر پيام ندهيد!");
return false;
}
//$inch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@iranporoo ."&user_id=".$from_id)); 
if(check_channel_member("@iranporoo , $chat_id)=="no"){
    SendMessage($chat_id,"با سلام 
 
براي استفاده از امکانات ديگر ربات بايد در کانال ما عضو شويد تا از اخبار ها مطلع شويد. 
 
پس از  اينکه عضو شديد دوباره به ربات مراجعه کرده و دستور زير را ارسال کنيد. 
 
 /start ",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>"ورود به کانال",'url'=>"https://telegram.me/iranporoo "]] 
],'resize_keyboard'=>true]));
return false;
}

/*
if($inch->result->status != "member") { 
SendMessage($chat_id,"با سلام 
 
براي استفاده از امکانات ديگر ربات بايد در کانال ما عضو شويد تا از اخبار ها مطلع شويد. 
 
پس از  اينکه عضو شديد دوباره به ربات مراجعه کرده و دستور زير را ارسال کنيد. 
 
 /start ",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>"ورود به کانال",'url'=>"https://telegram.me/$channelusername"]] 
],'resize_keyboard'=>true]));
return false;
}
*/
if ($warn == '3'){
$banwarn = fopen("data/banlist.txt", "a") or die("Unable to open file!"); 
fwrite($banwarn, "$from_id\n");
fclose($banwarn);
SendMessage($chat_id,"اطلاعيه...

تعداد اخطار هاي شما به تعداد 3 رسيده!

شما به دليل رعايت نکردن قوانين ربات و تکرار آن از ربات بلاک شديد.

لطفا ديگر پيام ندهيد!","html","true",$button_official);
return false;
}
//=========start
elseif(preg_match('/^\/([Ss]tart)(.*)/',$textmessage)){
 preg_match('/^\/([Ss]tart)(.*)/',$textmessage,$match);
 $match[2] = str_replace(" ","",$match[2]);
 $match[2] = str_replace("\n","",$match[2]);
 if($match[2] != null){
 if (strpos($allmember , "$from_id") == false){
 if($match[2] != $from_id){
 if (strpos($gold , "$from_id") == false){
 $txxt = file_get_contents('user/'.$match[2]."/gold.txt");
    $pmembersid= explode("\n",$txxt);
    if (!in_array($from_id,$pmembersid)){
      $aaddd = file_get_contents('user/'.$match[2]."/gold.txt");
      $aaddd .= $from_id."\n";
  file_put_contents('user/'.$match[2]."/gold.txt",$aaddd);
    }
 SendMessage($match[2]," يک نفر با لينک اختصاصی شما وارد ربات شد","html","true");
 }
 }
 }
 }
if (!file_exists("user/$from_id/step.txt")){
save("user/$from_id/command.txt","none");
save("user/$from_id/change.txt","none");
save("user/$from_id/step.txt","none");
save("user/$from_id/signup.txt","none");
save("user/$from_id/rand.txt","none");
save("user/$from_id/mlife.txt","نامعلوم");
save("user/$from_id/nam.txt","نامعلوم");
save("user/$from_id/senn.txt","نامعلوم");
save("user/$from_id/jens.txt","نامعلوم");
SendMessage($chat_id,"سلام
کاربر عزيز 

به ربات دوستیابی 💑 خوش آمديد🎊
با اين ربات ميتوانيد با کاربران دیگری که از ربات استفاده ميکنند گفتگو کنيد...

تاريخ = $date 
ساعت = $time

جهت شروع دکمه ثبت نام را لمس و اطلاعات را کامل کنيد 👇","html","true",$button_signup);
}else{
save("user/$from_id/step.txt","none");
SendMessage($chat_id,"سلام 
کاربر عزيز 

به ربات دوستیابی 💑 خوش آمديد🎊
با اين ربات ميتوانيد با کاربران دیگری که از ربات استفاده ميکنند گفتگو کنيد...

تاريخ = $date 
ساعت = $time

 👇دکمه مورد نظر را انتخاب کنيد","html","true",$button_official);
}
}
elseif ($textmessage == '📩پشتيباني'){
if($supportadd == null){
save("data/support.txt",$from_id);
SendMessage($chat_id,"درخواست گفتگو شما به پشتیبانی ارسال شد

لطفا منتظر بمانيد...","html","true");
SendMessage($admin,"درخواست گفتگو توسط کاربر با مشخصات :

$name
@$username
$from_id
",'html','true',json_encode(['keyboard'=>[
[['text'=>'قبول کردن'],['text'=>'رد کردن']],
],'resize_keyboard'=>true]));
}else{
SendMessage($chat_id,"صف پشتیبانی پر است

لطفا دقايقي ديگر امتحان کنيد...","html","true",$button_official);
}
}
elseif($textmessage == '🔙 بازگشت' or $textmessage == '/cancel'){
save("user/$from_id/step.txt","none");
save("user/$from_id/command.txt","none");
SendMessage($chat_id,"لطفا گزينه مورد نظر را انتخاب کنيد...","html","true",$button_official);
}
elseif($textmessage == 'قبول کردن' && $from_id == $admin){
$supportadd = file_get_contents("data/support.txt");
SendMessage($chat_id,"گفتگو شما با کاربر آغاز شد :","html","true",$button_back_support);
save("user/$from_id/rand.txt",$supportadd);
save("user/$supportadd/rand.txt",$admin);
save("user/$from_id/command.txt","chat start");
save("user/$supportadd/command.txt","chat start");
SendMessage($supportadd,"درخواست پشتیبانی شما پذيرفته شد

ميتوانيد گفتگو کنيد :","html","true",$button_back_support);
}
elseif ($textmessage == 'رد کردن' && $from_id == $admin){
$usersupport = $supportadd;
SendMessage($chat_id,"درخواست پشتیبانی کاربر رد شد.","html","true",$button_admin);
SendMessage($supportadd,"درخواست پشتیبانی شما رد شد\nبعد از مدتی مجددا اقدام کنید","html","true");
$newlist = str_replace($usersupport,"",$supportadd);
save("data/support.txt",$newlist);
}
elseif($textmessage == '❗️اتمام گفتگو'){
$usersupport = $supportadd;
if ($from_id != $admin){
SendMessage($chat_id,"گفتگو شما با پشتیبانی به اتمام رسيد","html","true",$button_official);
save("user/$supportadd/command.txt","none");
save("user/$from_id/command.txt","none");
$newlist = str_replace($usersupport,"",$supportadd);
save("data/support.txt",$newlist);
SendMessage($admin,"گفتگو شما توسط کاربر مقابل به اتمام رسيد","html","true",$button_admin);
}else{
SendMessage($chat_id,"گفتگو شما با کاربر به اتمام رسيد","html","true",$button_admin);
save("user/$supportadd/command.txt","none");
save("user/$from_id/command.txt","none");
SendMessage($supportadd,"گفتگو شما توسط پشتیبانی به اتمام رسيد","html","true",$button_official);
$newlist = str_replace($usersupport,"",$supportadd);
save("data/support.txt",$newlist);
}
}
elseif($textmessage == '👨‍👧‍👧زيرمجموعه گيري'){
SendMessage($chat_id,"به بخش زيرمجموعه گیری خوش آمديد✔️
لطفا دکمه مورد نظر را انتخاب کنيد :","html","true",$button_zir);
}
elseif($textmessage == '🌐لينک دعوت'){
SendMessage($chat_id,"کاربر گرامی با اشتراک گذاری پیام زیر میتوانید تعداد زیر مجموعه های خود را ب حد نصاب رسانده و عضو ویژه شوید 👇","html","true",$button_zir);
SendMessage($chat_id,"سلام ✋️
$name دعوتت کرده که عضو ربات دوستیابی بشي
با اين ربات میتونی به صورت تصادفی به يه نفر وصل بشی و باهاش چت کنی
البته امکاناتش فقط اين نيست
زود با لينک زير عضو شو
https://telegram.me/".$botusername."?start=$from_id ","html","true",$button_zir);
}
elseif($textmessage == 'چقدر کاربر آوردم'){
$gold = file_get_contents("user/".$from_id."/gold.txt");
$member_id = explode("\n",$gold);
$mmemcount = count($member_id) -1;
SendMessage($chat_id,"کاربر عزيز
تعداد افرادی که با لينک شما به ربات پيوسته اند : ($mmemcount) نفر 👩‍💻👨‍💻","html","true",$button_zir);
}
elseif($textmessage == 'ارتقا حساب'){
$gold = file_get_contents("user/".$from_id."/gold.txt");
$oldertega = file_get_contents("user/".$from_id."/oldertega.txt");
$member_id = explode("\n",$gold);
$mmemcount = count($member_id) -1;
if($mmemcount > $zirmajmue){
if($oldertega != 'false'){
$ertega = fopen("data/vips.txt","a") or die("Unable to open file!"); 
fwrite($ertega,"$from_id\n");
fclose($ertega);
SendMessage($chat_id,"تبريک
کاربر عزيز حساب شما با موفقيت ويژه شد","html","true",$button_zir);
save("user/$from_id/karbara.txt","0");
save("user/$from_id/oldertega.txt","false");
}else{
save("user/$from_id/step.txt","none");
SendMessage($chat_id,"شما قبلا از اين امکان استفاده کرديد","html","true",$button_zir);
}
}else{
SendMessage($chat_id,"کاربر عزيز...
براي ارتقا حساب خود بايد $zirmajmue نفر از طريق لينک شما وارد ربات شوند
ولي تعداد افرادي که با لينک شما به ربات پيوسته اند = ($mmemcount) ميباشد 😢","html","true",$button_zir);
}
}
elseif($textmessage == '🏆حساب ويژه'){
SendMessage ($chat_id,"کاربر عزيز توجه کنيد : 

حساب ويژه دائمی = 3000 تومان ✅

امکانات حساب ويژه : 

1.چت با کاربر پسر يا دختر (دلخواه) ✅
2.پاسخگويي سريع در پشتیبانی ✅
3.ديدن مشخصات کاربران هنگام چت✅
و...

جهت ويژه کردن حساب خود شناسه عددی خود :
$from_id
را کپی و در بخش شناسه در هنگام پرداخت وارد کنيد...",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>"💶 پرداخت",'url'=>$pardakhturl]],
],'resize_keyboard'=>true]));
}
elseif($textmessage == '📌دیگر خدمات ما'){
SendMessage ($chat_id,"دیگر ربات ها و خدمات ما:

ربات ضدلینک رایگان
@venus_apibot
ربات تغییر نام و فرمت فایل
@rename_filer0bot

ارتباط با پشتیبانی ما :
•• @pv_wantoner_bot",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>"ورود به کانال",'url'=>"https://telegram.me/$channelusername"]],
],'resize_keyboard'=>true]));
}
elseif($textmessage == '📊مشخصات'){
$signup = file_get_contents("user/".$from_id."/signup.txt");
$nam = file_get_contents("user/".$from_id."/nam.txt");
$senn = file_get_contents("user/".$from_id."/senn.txt");
$jens = file_get_contents("user/".$from_id."/jens.txt");
$mlife = file_get_contents("user/".$from_id."/mlife.txt");
SendMessage($chat_id,"مشخصات شما کاربر عزيز :
⭕️⭕️⭕️⭕️⭕️⭕️⭕️⭕️
نام = $nam 
سن = $senn 
محل زندگي = $mlife
جنسيت = $jens 
⭕️⭕️⭕️⭕️⭕️⭕️⭕️⭕️","html","true",$button_einfo);
}
elseif($textmessage == '💬شروع چت'){
SendMessage($chat_id,"به بخش چت خوش آمديد...
دکمه مورد نظر را انتخاب کنيد :","html","true",$button_chat);
}
elseif ($textmessage == 'لغو جستجو'){
$newlist = str_replace($from_id,"",$chatadd); save("data/chat.txt",$newlist); 
$newlist2 = str_replace($from_id,"",$chatadd2); 
save("data/chat2.txt",$newlist2);
 SendMessage ($chat_id,"جستجو لغو شد ❌","html","true",$button_chat); 
}
elseif ($textmessage == 'مشخصات کاربر'){
$vipsbot = file_get_contents('data/vips.txt');
$vipsbot2 = explode("\n",$vipsbot);
if (in_array($from_id,$vipsbot2)){
$namu = file_get_contents("user/".$randtrue."/nam.txt");
$mlifeu = file_get_contents("user/".$randtrue."/mlife.txt");
$sennu = file_get_contents("user/".$randtrue."/senn.txt");
$jensu = file_get_contents("user/".$randtrue."/jens.txt");
SendMessage ($chat_id,"مشخصات کاربر :
نام : $namu 
سن : $sennu 
محل زندگي : $mlifeu
جنسيت : $jensu","html","true");
}else{
SendMessage($chat_id,"متاسفانه حساب شما ويژه نميباشد
جهت مشاهده مشخصات کاربر مقابل بايد حساب خود را ويژه کنيد","html","true");
}
}
elseif($textmessage == "چت همگانی"){
    $run = file_get_contents("global/$from_id/run.txt");
    if($run !== "global"){
mkdir("global/$from_id");
run($from_id,"global");
var_dump(bot('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت وارد چت روم شدی!\nجهت دیدن تعداد اعضای آنلاین روی /onlines کلیک کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                ['text'=>"خروج از چت همگانی"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		foreach(scandir("global") as $user){
var_dump(bot('sendMessage',[
        	'chat_id'=>$user,
        	'text'=>"<a href='tg://user?id=$from_id'>$name</a> به چت روم پیوست",
		'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                ['text'=>"خروج از چت همگانی"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
}else{
    sendmessage($from_id,"شما هم اکنون در چت همگانی هستید!");
}
}
$run = file_get_contents("global/$from_id/run.txt");
if($run == "global"){
foreach(scandir("global") as $user){
    if($textmessage !== "خروج از چت همگانی" && $textmessage !== "/start" && $textmessage !== "/onlines" && $textmessage !== "چت همگانی"){
        if(preg_match("'^(.*)\n(.*)(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(.*)\n(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(.*)(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(.*)(https://)(.*)'",$textmessage)){
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(.*)(http://)(.*)'",$textmessage)){
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(.*)(t.me/)(.*)'",$textmessage)){
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(.*)(telegram.me/)(.*)'",$textmessage)){
sendmessage($chat_id,"لینک و ایدی ممنوع است!");
break;
}
        if(preg_match("'^(.*)(کص)(.*)'",$textmessage)){
sendmessage($chat_id,"این کلمه فیلتر است!");
break;
}
        if(preg_match("'^(.*)(کیر)(.*)'",$textmessage)){
sendmessage($chat_id,"این کلمه فیلتر است!");
break;
}
        if(preg_match("'^(.*)(کس)(.*)'",$textmessage)){
sendmessage($chat_id,"این کلمه فیلتر است!");
break;
}
if(preg_match("'^(.*)(سیک)(.*)'",$textmessage)){
sendmessage($chat_id,"این کلمه فیلتر است!");
break;
}
            if($sticker){
                sendmessage($chat_id,"استیکر ممنوع است!");
                break;
            }
            if($gif){
                sendmessage($chat_id,"ارسال تصاویر متحرک ممنوع است!");
                break;
            }
            if($forward_chat_username){
                sendmessage($chat_id,"فوروارد از دیگران یا کانال ممنوع است");
                break;
            }
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>"$from_id",
'message_id'=>"$message_id"
]);
unlink("error_log");
}
}
}
if($textmessage == "خروج از چت همگانی"){
    $run = file_get_contents("global/$from_id/run.txt");
    if($run == "global"){
run($from_id,"no");
unlink("global/$from_id/run.txt");
rmdir("global/$from_id");
foreach(scandir("global") as $user){
var_dump(bot('sendMessage',[
        	'chat_id'=>$user,
        	'text'=>"<a href='tg://user?id=$from_id'>$name</a> از چت روم خارج شد",
		'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                ['text'=>"خروج از چت همگانی"]
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
var_dump(bot('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت از چت روم خارج شدید🔆",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>$button_official
    		]));
}else{
    sendmessage($from_id,"شما در چت روم نمیباشید❗️");
    }
    }
	if($textmessage == "/onlines"){
$b = scandir("global");
$c = count($b);
$cc = $c - 2;
var_dump(bot('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"تعداد اعضای آنلاین:\n$cc",
'parse_mode'=>'html'
]));
}
elseif($textmessage == "چت تصادفي"){
$txtt = file_get_contents('data/chat.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
  SendMessage($chat_id,"کمي صبر کنيد تا به کاربر ناشناس وصل شويد...
تعداد کاربران انلاين : $mmemcount
شما در ليست انتظار قرار گرفتيد...","html","true",$button_back_search);
  file_put_contents("data/chat.txt","$chatadd\n$from_id");
  file_put_contents("user/".$from_id."/rand.txt",null);
  $all_member = fopen( "data/chat.txt", "r");
  while( !feof( $all_member)) {
  $user = fgets( $all_member);
  $user = str_replace(" ","",$user);
  $user = str_replace("\n","",$user);
  $blck = file_get_contents("user/".$from_id."/block.txt");
  $blck2 = file_get_contents("user/".$user."/block.txt");
  $ex = explode("\n",$blck);
  $ex2 = explode("\n",$blck2);
  if($user != null && $user != "" && $user != "\n" && $from_id != $user && !in_array($from_id,$ex2) && !in_array($user,$ex)){
  file_put_contents("user/".$from_id."/rand.txt",$user);
  break;
  }else{
  file_put_contents("user/".$from_id."/rand.txt",null);
  }
  }
  $rand = file_get_contents("user/".$from_id."/rand.txt");
  if($rand != null){
  file_put_contents("user/".$from_id."/command.txt","chat start");
  file_put_contents("user/".$rand."/command.txt","chat start");
  file_put_contents("user/".$rand."/rand.txt",$from_id);
  $str = str_replace($from_id,'',$chatadd);
  $str = str_replace($rand,'',$chatadd);
  file_put_contents("data/chat.txt",$str);
  SendMessage($chat_id," کاربر يافت شد و با موفقيت وصل شديد

ميتوانيد گفتگو را آغاز کنيد :","html","true",$button_back_chat);
  SendMessage($rand," کاربر يافت شد و با موفقيت وصل شديد

ميتوانيد گفتگو را آغاز کنيد :
","html","true",$button_back_chat);
}
}
elseif($textmessage == 'اتمام گفتگو'){
SendMessage($chat_id,"آيا از انجام اين کار مطمئن هستيد؟

قبل از بستن گفتگو ميتوانيد اين کاربر را بلاک کنيد تا ديگر به شما وصل نشود

براي بستن گفتگو دکمه : اتمام گفتگو
براي ادامه گفتگو دکمه : ادامه گفتگو
براي بلاک کردن کاربر و بستن گفتگو دکمه : بلاک کردن و اتمام گفتگو

جهت ادامه يکی از دکمه های زير را لمس کنيد :","html","true",$button_chat2);
}
elseif ($textmessage == 'اتمام گفتگو⚠️'){
SendMessage($randtrue,"گفتگو شما توسط کاربر مقابل به پايان رسيد

آيا ميخواهيد کاربر را بلاک کنيد?","html","true",$button_chat3);
save("user/$from_id/command.txt","none");
SendMessage($chat_id,"گفتگو شما با کاربر به پايان رسيد","html","true",$button_chat);
}
elseif($textmessage == 'بلاکش کن'){
$myfile2 = fopen("user/$from_id/block.txt","a") or die("Unable to open file!"); 
fwrite($myfile2,"$randtrue\n");
fclose($myfile2);
save("user/$from_id/command.txt","none");
SendMessage($chat_id,"گفتگو شما با کاربر به پايان رسيد

و کاربر بلاک شد","html","true",$button_chat);
}
elseif($textmessage == 'نه بيخيالش'){
save("user/$from_id/command.txt","none");
SendMessage($chat_id,"گفتگو شما با کاربر به پايان رسيد","html","true",$button_chat);
}
elseif($textmessage == 'ادامه گفتگو'){
SendMessage($chat_id,"ميتوانيد گفتگو خود را ادامه دهيد :","html","true",$button_back_chat);
}
elseif ($textmessage == 'بلاک کردن و اتمام گفت و گو⚠️'){
SendMessage($randtrue,"گفتگو شما توسط کاربر مقابل به پايان رسيد","html","true",$button_chat);
save("user/$randtrue/command.txt","none");
save("user/$from_id/command.txt","none");
$myfile2 = fopen("user/$from_id/block.txt","a") or die("Unable to open file!"); 
fwrite($myfile2,"$randtrue\n");
fclose($myfile2);
SendMessage($chat_id,"گفتگو شما با کاربر به پايان رسيد

و کاربر بلاک شد","html","true",$button_chat);
}
elseif($textmessage == "👱🏼چت با پسر"){
$vipsbot = file_get_contents('data/vips.txt');
$vipsbot2 = explode("\n",$vipsbot);
if (in_array($from_id,$vipsbot2)){
$txtt = file_get_contents('data/chat2.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
  SendMessage($chat_id,"کمی صبر کنيد تا به کاربر ناشناس وصل شويد...
تعداد کاربران انلاين : $mmemcount
شما در ليست انتظار قرار گرفتيد...","html","true",$button_back_search);
  file_put_contents("data/chat2.txt","$chatadd2\n$from_id");
  file_put_contents("user/".$from_id."/rand.txt",null);
  $all_member = fopen( "data/chat2.txt", "r");
  while( !feof( $all_member)) {
  $user = fgets( $all_member);
  $user = str_replace(" ","",$user);
  $user = str_replace("\n","",$user);
  $blck = file_get_contents("user/".$from_id."/block.txt");
  $blck2 = file_get_contents("user/".$user."/block.txt");
$jns = file_get_contents("user/".$user."/jens.txt");
$jns2 = file_get_contents("user/".$from_id."/jens.txt");
  $ex = explode("\n",$blck);
  $ex2 = explode("\n",$blck2);
  if($user != null && $user != "" && $user != "\n" && $from_id != $user && !in_array($from_id,$ex2) && !in_array($user,$ex && $jns == "پسر" && $jns == "پسر" && $jns != "نامعلوم" && $jns != null && $jns != "" && $jns != "\n")){
  file_put_contents("user/".$from_id."/rand.txt",$user);
  break;
  }else{
  file_put_contents("user/".$from_id."/rand.txt",null);
  }
  }
  $rand = file_get_contents("user/".$from_id."/rand.txt");
  if($rand != null){
  file_put_contents("user/".$from_id."/command.txt","chat start");
  file_put_contents("user/".$rand."/command.txt","chat start");
  file_put_contents("user/".$rand."/rand.txt",$from_id);
  $str = str_replace($from_id,'',$chatadd2);
  $str = str_replace($rand,'',$chatadd2);
  file_put_contents("data/chat2.txt",$str);
  SendMessage($chat_id," کاربر يافت شد و با موفقيت وصل شديد

ميتوانيد گفتگو را آغاز کنيد :","html","true",$button_back_chat);
  SendMessage($rand," کاربر يافت شد و با موفقيت وصل شديد

ميتوانيد گفتگو را آغاز کنيد :","html","true",$button_back_chat);
}
}else{
SendMessage ($chat_id,"متاسفانه حساب شما ويژه نميباشد","html","true",$button_chat);
  }
  }
elseif($textmessage == "👩🏻چت با دختر"){
$vipsbot = file_get_contents('data/vips.txt');
    $vipsbot2 = explode("\n",$vipsbot);
if (in_array($from_id,$vipsbot2)){
$txtt = file_get_contents('data/chat2.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
  SendMessage($chat_id,"کمي صبر کنيد تا به کاربر ناشناس وصل شويد...
تعداد کاربران انلاين : $mmemcount
شما در ليست انتظار قرار گرفتيد...","html","true",$button_back_search);
  file_put_contents("data/chat2.txt","$chatadd2\n$from_id");
  file_put_contents("user/".$from_id."/rand.txt",null);
  $all_member = fopen( "data/chat2.txt", "r");
  while( !feof( $all_member)) {
  $user = fgets( $all_member);
  $user = str_replace(" ","",$user);
  $user = str_replace("\n","",$user);
  $blck = file_get_contents("user/".$from_id."/block.txt");
  $blck2 = file_get_contents("user/".$user."/block.txt");
$jns = file_get_contents("user/".$user."/jens.txt");
$jns2 = file_get_contents("user/".$from_id."/jens.txt");
  $ex = explode("\n",$blck);
  $ex2 = explode("\n",$blck2);
  if($user != null && $user != "" && $user != "\n" && $from_id != $user && !in_array($from_id,$ex2) && !in_array($user,$ex && $jns == "دختر" && $jns == "دختر" && $jns != "نامعلوم" && $jns != null && $jns != "" && $jns != "\n")){
  file_put_contents("user/".$from_id."/rand.txt",$user);
  break;
  }else{
  file_put_contents("user/".$from_id."/rand.txt",null);
  }
  }
  $rand = file_get_contents("user/".$from_id."/rand.txt");
  if($rand != null){
  file_put_contents("user/".$from_id."/command.txt","chat start");
  file_put_contents("user/".$rand."/command.txt","chat start");
  file_put_contents("user/".$rand."/rand.txt",$from_id);
  $str = str_replace($from_id,'',$chatadd2);
  $str = str_replace($rand,'',$chatadd2);
  file_put_contents("data/chat2.txt",$str);
  SendMessage($chat_id,"کاربر يافت شد و با موفقيت وصل شديد

ميتوانيد گفتگو را آغاز کنيد :","html","true",$button_back_chat);
  SendMessage($rand,"کاربر يافت شد و با موفقيت وصل شديد

ميتوانيد گفتگو را آغاز کنيد :","html","true",$button_back_chat);
}
}else{
SendMessage ($chat_id,"متاسفانه حساب شما ويژه نميباشد","html","true",$button_chat);
  }
  }
elseif($command == "chat start"){
  if($stickerid != null){
  SendSticker($randtrue,$stickerid);
  }
  elseif($videoid != null){
  SendVideo($randtrue,$videoid,$caption);
  }
  elseif($voiceid != null){
  SendVoice($randtrue,$voiceid,"",$caption);
  }
  elseif($fileid != null){
  SendDocument($randtrue,$fileid,"",$caption);
  }
  elseif($musicid != null){
  SendAudio($randtrue,$musicid,"",$caption);
  }
  elseif($photoid != null){
  SendPhoto($randtrue,$photoid,"",$caption);
  }
  elseif($textmessage != null){
  SendMessage($randtrue,$textmessage,"html","true");
  }
  }
elseif($textmessage == 'ثبت نام'){
save("user/$from_id/signup.txt","nam");
SendMessage($chat_id,"کاربر عزيز لطفا نام خود را وارد کنيد :","html","true",$button_lagv);
}
elseif($textmessage == 'لغو'){
save("user/$from_id/step.txt","none");
SendMessage($chat_id,"عمليات مورد نظر لغو شد
لطفا گزينه مورد نظر خود را انتخاب کنيد...","html","true",$button_signup);
}
elseif($signup == 'nam'){
save("user/$from_id/signup.txt","senn");
save("user/$from_id/nam.txt","$textmessage");
SendMessage($chat_id,"حال سن خود را انتخاب کنيد","html","true",$button_senn);
}
elseif($signup == 'senn'){
if ($textmessage == '12' or $textmessage == '13' or $textmessage == '14' or $textmessage == '15' or $textmessage == '16' or $textmessage == '17' or $textmessage == '18' or $textmessage == '19' or $textmessage == '20' or $textmessage == '21' or $textmessage == '22' or $textmessage == '23' or $textmessage == '24' or $textmessage == '25' or $textmessage == '26' or $textmessage == '27' or $textmessage == '28' or $textmessage == '29' or $textmessage == '30' or $textmessage == '31' or $textmessage == '32' or $textmessage == '33' or $textmessage == '34' or $textmessage == '35' or $textmessage == '36' or $textmessage == '37' or $textmessage == '38' or $textmessage == '39' or $textmessage == '+40' or $textmessage == '-50' ){
save("user/$from_id/signup.txt","mlife");
save("user/$from_id/senn.txt","$textmessage");
SendMessage($chat_id,"حال محل زندگی خود را انتخاب کنيد","html","true",$button_mlife);
}else{
SendMessage($chat_id,"لطفا فقط از دکمه ها استفاده کنيد :","html","true",$button_senn);
}
}
elseif($signup == 'mlife'){
if ($textmessage == 'تهران' or $textmessage == 'البرز' or $textmessage == 'اردبيل' or $textmessage == 'کيش' or $textmessage == 'آذربايجان شرقی' or $textmessage == 'آذربايجان غربی' or $textmessage == 'خوزستان' or $textmessage == 'خراسان شمالی' or $textmessage == 'خراسان جنوبی' or $textmessage == 'خراسان رضوی' or $textmessage == 'چهارمحال' or $textmessage == 'کرمان' or $textmessage == 'کردستان' or $textmessage == 'کرمانشاه' or $textmessage == 'لرستان' or $textmessage == 'مازندران' or $textmessage == 'هرمزگان' or $textmessage == 'سيستان و بلوچستان' or $textmessage == 'همدان' or $textmessage == 'اصفهان' or $textmessage == 'سمنان' or $textmessage == 'زنجان' or $textmessage == 'ايلام' or $textmessage == 'قزوين' or $textmessage == 'يزد' or $textmessage == 'گيلان' or $textmessage == 'بوشهر' or $textmessage == 'فارس' or $textmessage == 'قم'){
save("user/$from_id/signup.txt","jens");
save("user/$from_id/mlife.txt","$textmessage");
SendMessage($chat_id,"حال جنسيت خود را انتخاب کنيد

توجه کنيد بعدا نميتوانيد جنسيت خود را در ربات تغيير دهيد.","html","true",$button_jens);
}else{
SendMessage($chat_id,"لطفا فقط از دکمه ها استفاده کنيد :","html","true",$button_mlife);
}
}
elseif($signup == 'jens'){
if($textmessage == 'پسر' or $textmessage == 'دختر'){
save("user/$from_id/signup.txt","ok");
if($textmessage == 'پسر'){
save("user/$from_id/jens.txt","پسر");
}
if($textmessage == 'دختر'){
save("user/$from_id/jens.txt","دختر");
}
SendMessage($chat_id,"مشخصات شما با موفقيت در سيستم ما ثبت شد...","html","true",$button_official);
}else{
SendMessage($chat_id,"لطفا فقط از دکمه ها استفاده کنيد :","html","true",$button_jens);
}
}
elseif($textmessage == 'ويرايش'){
save("user/$from_id/change.txt","nam");
SendMessage($chat_id," کاربر عزيز لطفا نام خود را وارد کنيد :","html","true",$button_back);
}
elseif($change == 'nam'){
save("user/$from_id/change.txt","senn");
save("user/$from_id/nam.txt","$textmessage");
SendMessage($chat_id," حال سن خود را انتخاب کنيد","html","true",$button_senn);
}
elseif($change == 'senn'){
if ($textmessage == '12' or $textmessage == '13' or $textmessage == '14' or $textmessage == '15' or $textmessage == '16' or $textmessage == '17' or $textmessage == '18' or $textmessage == '19' or $textmessage == '20' or $textmessage == '21' or $textmessage == '22' or $textmessage == '23' or $textmessage == '24' or $textmessage == '25' or $textmessage == '26' or $textmessage == '27' or $textmessage == '28' or $textmessage == '29' or $textmessage == '30' or $textmessage == '31' or $textmessage == '32' or $textmessage == '33' or $textmessage == '34' or $textmessage == '35' or $textmessage == '36' or $textmessage == '37' or $textmessage == '38' or $textmessage == '39' or $textmessage == '+40' or $textmessage == '-50' ){
save("user/$from_id/change.txt","mlife");
save("user/$from_id/senn.txt","$textmessage");
SendMessage($chat_id," حال محل زندگی خود را انتخاب کنيد","html","true",$button_mlife);
}else{
SendMessage($chat_id,"لطفا فقط از دکمه ها استفاده کنيد :","html","true",$button_senn);
}
}
elseif($change == 'mlife'){
if ($textmessage == 'تهران' or $textmessage == 'البرز' or $textmessage == 'اردبيل' or $textmessage == 'کيش' or $textmessage == 'آذربايجان شرقی' or $textmessage == 'آذربايجان غربی' or $textmessage == 'خوزستان' or $textmessage == 'خراسان شمالی' or $textmessage == 'خراسان جنوبی' or $textmessage == 'خراسان رضوی' or $textmessage == 'چهارمحال' or $textmessage == 'کرمان' or $textmessage == 'کردستان' or $textmessage == 'کرمانشاه' or $textmessage == 'لرستان' or $textmessage == 'مازندران' or $textmessage == 'هرمزگان' or $textmessage == 'سيستان و بلوچستان' or $textmessage == 'همدان' or $textmessage == 'اصفهان' or $textmessage == 'سمنان' or $textmessage == 'زنجان' or $textmessage == 'ايلام' or $textmessage == 'قزوين' or $textmessage == 'يزد' or $textmessage == 'گيلان' or $textmessage == 'بوشهر' or $textmessage == 'فارس' or $textmessage == 'قم'){
save("user/$from_id/mlife.txt","$textmessage");
save("user/$from_id/change.txt","true");
SendMessage($chat_id,"مشخصات شما با موفقيت در سيستم ما ثبت شد...","html","true",$button_official);
}else{
SendMessage($chat_id,"لطفا فقط از دکمه ها استفاده کنيد :","html","true",$button_mlife);
}
}
elseif($textmessage == '/panel' and $from_id == $admin){
  SendMessage($chat_id,"به پنل مديريت خوش اومديد","html","true",$button_admin);
  }
  elseif($textmessage == 'آمار' and $from_id == $admin){
 $txtt = file_get_contents('data/allmember.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
 SendMessage($chat_id,"کل کاربران: $mmemcount نفر","html","true");
 }
  elseif($textmessage == 'فوروارد همگانی' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","s2a fwd");
 SendMessage($chat_id,"پيام مورد نظر را فوروارد کنيد","html","true",$button_back);
 }
 elseif($command == 's2a fwd' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","none");
 SendMessage($chat_id,"پيام شما در صف ارسال قرار گرفت.","html","true",$button_admin);
 $all_member = fopen( "data/allmember.txt", 'r');
  while( !feof( $all_member)) {
    $user = fgets( $all_member);
   ForwardMessage($user,$admin,$message_id);
  }
 }
elseif($textmessage == 'پيام همگانی' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","s2a");
 SendMessage($chat_id,"پيامتون رو وارد کنيد","html","true",$button_back);
 }
 elseif($command == 's2a' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","none");
 SendMessage($chat_id,"پيام شما در صف ارسال قرار گرفت.","html","true",$button_admin);
 $all_member = fopen( "data/allmember.txt", 'r');
  while( !feof( $all_member)) {
    $user = fgets( $all_member);
   if($sticker_id != null){
   SendSticker($user,$stickerid);
   }
   elseif($videoid != null){
   SendVideo($user,$videoid,$caption);
   }
   elseif($voiceid != null){
   SendVoice($user,$voiceid,'',$caption);
   }
   elseif($fileid != null){
   SendDocument($user,$fileid,'',$caption);
   }
   elseif($musicid != null){
   SendAudio($user,$musicid,'',$caption);
   }
   elseif($photoid != null){
   SendPhoto($user,$photoid,'',$caption);
   }
   elseif($textmessage != null){
   SendMessage($user,$textmessage,"html","true");
   }
  }
 }
elseif($textmessage == 'اخطار به کاربر' && $from_id == $admin){
save ("user/$from_id/command.txt","warn");
SendMessage($chat_id,"شناسه کاربر را وارد کنيد :","html","true",$button_back);
}
elseif($command == 'warn'){
if (file_exists("user/$textmessage/step.txt")){
$warnk = file_get_contents("user/".$textmessage."/warn.txt");
$newwarn = $warnk + 1;
save ("user/$textmessage/warn.txt",$newwarn);
save ("user/$from_id/command.txt","none");
$warnuser = file_get_contents("user/".$textmessage."/warn.txt");
SendMessage($chat_id,"به کاربر مورد نظر اخطار داده شد.
تعداد اخطار هاي کاربر : $warnuser","html","true",$button_admin);
SendMessage($textmessage,"شما اخطار جديد دريافت کرديد

تعداد اخطار هاي شما : $warnuser");
save ("user/$from_id/sendwarn.txt","none");
}else{
save ("user/$from_id/command.txt","none");
SendMessage($chat_id,"کاربر مورد نظر يافت نشد");
}
}
elseif($textmessage == 'آنبلاک کردن کاربر' && $from_id == $admin){
SendMessage($chat_id,"جهت آنبلاک کردن کاربر از دستور زير استفاده کنيد 
/unban Userid");
}
elseif($textmessage == 'بلاک کردن کاربر' && $from_id == $admin){
SendMessage($chat_id,"جهت بلاک کردن کاربر از دستور زير استفاده کنيد 
/ban Userid");
}
elseif (strpos($textmessage , "/ban") !== false && $from_id == $admin)
{
$bban = str_replace('/ban','',$textmessage);
if ($bban != '')
{
$myfile2 = fopen("data/banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$bban\n");
fclose($myfile2);
SendMessage($chat_id,"کاربر $bban با موفقيت مسدود شد");
}
}
elseif (strpos($textmessage , "/unban") !== false && $from_id == $admin)
{
$unbban = str_replace('/unban','',$textmessage);
if ($unbban != '')
{
$newlist = str_replace($unbban,"","data/banlist.txt");
save("data/banlist.txt",$newlist);
SendMessage($chat_id,"کاربر $unbban با موفقيت از مسدوديت خارج شد");
}
}
elseif($textmessage == 'پيام به کاربر' && $from_id == $admin){
save("user/$from_id/command.txt","sendpm");
SendMessage($chat_id,"شناسه کاربر را وارد کنيد","html","true",$button_back);
} 
elseif ($command == 'sendpm'){
$senduser = $textmessage;
if(file_exists('user/'.$senduser."/step.txt")){
save("user/$from_id/command.txt","sendpm2");
SendMessage($chat_id,"پيام خود را وارد کنيد :");
}
}
elseif ($command == 'sendpm2'){
$sendtext = $textmessage;
SendMessage($senduser,"پيام جديد از طرف پشتيباني :

$sendtext");
SendMessage($chat_id,"ارسال شد.","html","true",$button_back);
}
elseif($textmessage == 'مشخصات کاربر' && $from_id == $admin){
save("user/$from_id/command.txt","info");
SendMessage($chat_id,"شناسه کاربر را وارد کنيد :","html","true",$button_back);
}
elseif ($command == 'info'){
if(file_exists("user/$textmessage/step.txt")){
save("user/$from_id/command.txt","none");
$namu = file_get_contents("user/".$textmessage."/nam.txt");
$mlifeu = file_get_contents("user/".$textmessage."/mlife.txt");
$sennu = file_get_contents("user/".$textmessage."/senn.txt");
$jensu = file_get_contents("user/".$textmessage."/jens.txt");
SendMessage($chat_id,"مشخصات کاربر :

نام : $namu
جنسيت : $jensu 
سن : $sennu 
محل زندگي = $mlifeu","html","true",$button_admin);
}else{
SendMessage($chat_id,"کاربر مورد نظر يافت نشد","html","true",$button_back);
}
}
elseif($textmessage == 'vip کردن' && $from_id == $admin){
save ("user/$from_id/command.txt","addvip");
SendMessage($chat_id,"شناسه کاربر را وارد کنيد :","html","true",$button_back);
}
elseif($command == 'addvip'){
if(file_exists("user/$textmessage/step.txt")){
save("user/$from_id/command.txt","none");
$myfile2 = fopen("data/vips.txt","a") or die("Unable to open file!"); 
fwrite($myfile2,"$textmessage\n");
fclose($myfile2);
SendMessage($chat_id,"کاربر مورد نظر ويژه شد","html","true",$button_admin);
SendMessage($textmessage,"حساب شما توسط پشتیبانی ويژه شد","html","true");
}else{
SendMessage($chat_id,"کاربر مورد نظر يافت نشد");
}
}
elseif ($textmessage == 'حذف vip' && $from_id == $admin){
save ("user/$from_id/command.txt","delvip");
SendMessage($chat_id,"شناسه کاربر را وارد کنيد :","html","true", $button_back);
}
elseif ($command == 'delvip'){
if(file_exists("user/$textmessage/step.txt")){
$newlist = str_replace($textmessage,"",$vips);
save("data/vips.txt",$newlist);
SendMessage($chat_id,"کاربر مورد نظر از ليست اعضاي ويژه حذف شد","html","true",$button_admin);
SendMessage($chat_id,"حساب شما توسط پشتیبانی از ليست اعضای ويژه حذف شد","html","true");
}else{
SendMessage($chat_id,"کاربر مورد نظر يافت نشد");
}
}elseif($textmessage == 'ادمینم' && $from_id == $admin){
	SendMessage($admin,"پنل مدیریت ربات در خدمت ادمین :)","html","true",$button_admin);
}
//=============
if(!file_exists('user/'.$from_id)){
  mkdir('user/'.$from_id);
  }
 if(!file_exists('user/'.$from_id."/warn.txt")){
file_put_contents('user/'.$from_id."/warn.txt","0");
}
  $txxt = file_get_contents('data/allmember.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('data/allmember.txt');
      $aaddd .= $chat_id."\n";
  file_put_contents('data/allmember.txt',$aaddd);
    } 
?>
