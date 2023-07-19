<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 4.2
// *
// * Copyright (c) 2023 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
class Discord {
    private string $webhook;
    private string $head;

    public function __construct() {
        $this->webhook = DCWEBHOOK_URL;
        $this->head = "Content-Type: application/json; charset=utf-8";
    }

    public function Send($Msg): bool|array|string
    {
        try {
            $xucp_url = $this->webhook;
            $xucp_ava = DCWEBHOOK_AVATAR;
            $xucp_headers = [ $this->head ];
            $POST = [ 'content' => '',
                'username' => DCWEBHOOK_NAME,
                'avatar_url' => $xucp_ava,
                'embeds' => [
                    [
                        'title' => DCWEBHOOK_NAME,
                        'thumbnail' => [
                            'url' => $xucp_ava
                        ],
                        'type' => 'rich',
                        'color' => hexdec("7289DA"),
                        'description' => '
                    '.$Msg
                    ]
                ] ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $xucp_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $xucp_headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
            return curl_exec($ch);
            curl_close($ch);
            if ($response == '200') {
                return array(true, '');
            } else {
                return array(false, 'response code:' . $response);
            }
        } catch (Exception $e) {
            return array(false, 'discord catch: '.$e->getMessage());
        }
    }
}