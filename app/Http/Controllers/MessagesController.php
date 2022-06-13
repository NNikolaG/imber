<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use Illuminate\Http\Request;
use Psy\Util\Json;

class MessagesController extends BaseController
{
    private $messageModel;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->data['chats'] = $this->messageModel->getChats($request->session()->get('user')->user_id);
        return view('client.messages', $this->data);
    }

    public function message(Request $request)
    {
        $data = $request->except(['_token']);
        $msg = $data['content'];
        // ENKRIPCIJA
//        $key = openssl_random_pseudo_bytes(16);
        $key = 'lkGTS9pSzhujYSC9';

        if (strlen($msg) != 0) {
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = openssl_random_pseudo_bytes($ivlen);
            $ciphertext_raw = openssl_encrypt($msg, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
            $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
            $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);

            $data['content'] = $ciphertext;
            $this->messageModel->sendMsg($data);
        }

        $allMessages = $this->messageModel->fetchMessages($data);

        foreach ($allMessages as $msg) {
            $c = base64_decode($msg->content);
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = substr($c, 0, $ivlen);
            $hmac = substr($c, $ivlen, $sha2len = 32);
            $ciphertext_raw = substr($c, $ivlen + $sha2len);
            $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
//            $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

            $msg->content = $original_plaintext;
            $msg->datetime = time_elapsed_string($msg->datetime);
        }

        return Json::encode($allMessages);
    }

    public function messageFetch(Request $request)
    {

        $key = 'lkGTS9pSzhujYSC9';

        $data = $request->all();
        $result = $this->messageModel->fetchMessages($data);

        foreach ($result as $e) {
            $c = base64_decode($e->content);
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = substr($c, 0, $ivlen);
            $hmac = substr($c, $ivlen, $sha2len = 32);
            $ciphertext_raw = substr($c, $ivlen + $sha2len);
            $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
//            $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

            $e->content = $original_plaintext;
            $e->datetime = time_elapsed_string($e->datetime);
        }
        return Json::encode($result);
    }
}
