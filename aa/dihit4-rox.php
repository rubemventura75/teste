<?php
if( !ini_get('safe_mode') ){
            set_time_limit(999999960000000000000000000000000000000000000000000000000200000000000);
        } 


// Inicia o cURL
$ch = curl_init();

// Define a URL original (do formulário de login)
curl_setopt($ch, CURLOPT_URL, 'http://www.dihitt.com/user/login');

// Habilita o protocolo POST
curl_setopt ($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

/*
<div class="modal-content">
    <form accept-charset="UTF-8" action="/friend/new_request" id="add-friend-form" method="post" name="addfriend" onsubmit="return false;"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="GOjf9TLeng+5nl55UTlo96rf+80nd1lJbzxLzBy1E2s=" /></div>
        <label>Mensagem do pedido:<br/>
        <textarea class="textInput" cols="30" id="friend_request_message" name="friend[request_message]" onKeyDown="jtxtCounter($j(&#x27;#friend_request_message&#x27;),$j(&#x27;#invite-msg&#x27;),250)" onKeyUp="jtxtCounter($j(&#x27;#friend_request_message&#x27;),$j(&#x27;#invite-msg&#x27;),250)" rows="5">Olá! Quero te adicionar na minha lista de amigos para podermos trocar notícias.</textarea></label>
            <input readonly type="text" class="text-input" name="bodycounter" size="3" maxlength="3" value="170" style="float:right;" id="invite-msg"/>         
            <br/><br/>
            <button type="button" class="button_bblue submit-ok"><span>Enviar pedido</span></button>
        <input id="friend_friend_requested_to_id" name="friend[friend_requested_to_id]" type="hidden" value="512224" />
        <input type="hidden" name="key" value="ff5409fc89397ff7d14352255973016f" id="key">
        <input type="hidden" name="d" id="d" value="">
</form></div>

*/

// Define os parâmetros que serão enviados (usuário e senha por exemplo)
curl_setopt ($ch, CURLOPT_POSTFIELDS, 'username=galerarox&password=159357&processlogin=1');

// Imita o comportamento patrão dos navegadores: manipular cookies
curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');

// Define o tipo de transferência (Padrão: 1)
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

// Executa a requisição
$store = curl_exec ($ch);

for ($j=0; $j < 2763; $j++) { 


// Define uma nova URL para ser chamada (após o login)
curl_setopt($ch, CURLOPT_URL, 'http://www.dihitt.com/usuario/amigos?page='.$j.'&user_login=equipedihitt');
$friends = curl_exec ($ch);

preg_match_all('#onclick="diHITT.user.friends.add(\([^`]*?)\);return false;#', $friends, $fri);

$chaves = array();

for ($i=0; $i < count($fri[1]); $i++) { 
    
    
    $aid1 = $fri[1][$i] = trim(str_replace('(', '', $fri[1][$i]));

      //  $aid1 = trim(str_replace('(', '', $fri[1][$i]));

        curl_setopt($ch, CURLOPT_URL, 'http://www.dihitt.com/friend/add_friend_modal?fri='.$aid1);
        $aaa = curl_exec($ch);

        preg_match('#name="key" value="([^`]*?)"#', $aaa, $key);

        $chaves[$i] = trim($key[1]);


 } 

for ($i=0; $i < count($fri[1]); $i++) { 


 

 curl_setopt($ch, CURLOPT_URL, 'http://www.dihitt.com/friend/new_request');
 curl_setopt ($ch, CURLOPT_POSTFIELDS, 'friend[request_message]=Ola, tudo bem, aceita meu convite&bodycounter=170&friend[friend_requested_to_id]='.$fri[1][$i].'&key='.$chaves[$i]);

$content = curl_exec ($ch);

echo $i.' - '.$fri[1][$i].' - '.$chaves[$i].' - .'.$content.'<br>';
  //  sleep (3);
}
    # code...
}
//var_dump($chaves);
//var_dump($fri[1]);
//echo $fri[1][2];

//curl_setopt ($ch, CURLOPT_POSTFIELDS, 'friend[request_message]=Ola, tudo bem, aceita&bodycounter=170&friend[friend_requested_to_id]=499999&key=0cf31ab8d4e35e97f6edfe8ea50d1ed5');

/*

// Define uma nova URL para ser chamada (após o login)
curl_setopt($ch, CURLOPT_URL, 'http://www.dihitt.com/publish/links');
curl_setopt ($ch, CURLOPT_POSTFIELDS, 'url=http://www.galerarox.net/noticias/esporte/cruzeiro-relaciona-20-atletas-para-pegar-tigre-e-tecnico-nao-revela-time/&title='.$titulo.'&bodytext='.$text.'&category=42&tags='.$key.'&link_id=0&use_bar=1&comment_first=0');
*/

// Executa a segunda requisição
//----------------- $content = curl_exec ($ch);
//echo $content;
// Encerra o cURL
curl_close ($ch);

