<?php

namespace App\Http\Controllers;

use Exception;
use Telegram\Bot\Api;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\InputMedia\InputMediaPhoto;
use Telegram\Bot\FileUpload\InputFile;

class TelegramController extends Controller
{
    //
    public function handleUpdate(){
        try{
            $update = Telegram::getWebhookUpdate();
            $chatId = $update['message']['from']['id'];
            $message = $update['message']['text'];
            if($message == "/test"){
                $response = Telegram::sendMediaGroup([
                    'chat_id'=>$chatId,

                    'media'=>json_encode([
                        [
                            'type'=>'photo',
                            'media'=>"https://images.unsplash.com/photo-1538991383142-36c4edeaffde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80",
                            // 'parse_mode' => "Markdown",
                            'caption'=>"Album media"
                        ],
                        [
                            'type'=>'photo',
                            'media'=>"https://images.unsplash.com/photo-1538991383142-36c4edeaffde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80",
                        ],
                        [
                            'type'=>'photo',
                            'media'=>"https://images.unsplash.com/photo-1538991383142-36c4edeaffde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80",
                        ]
                    ])
                ]);
                return $response;
            }
        }catch(Exception $e){
            logger($e);
        }
    }
}
