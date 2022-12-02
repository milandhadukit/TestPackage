<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WebNotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
  
    public function storeToken(Request $request)
    {
        auth()->user()->update(['device_key'=>$request->token]);
        return response()->json(['Token successfully stored.']);
    }

    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();
          
        $serverKey = 'AAAAO91RcCo:APA91bHpVr-H0eL_ddzt17ssLxKuUoE7JXmEwSLmAtThCEpen0yihv05NBUcddiKTn8m_SUCBt8OeJwULeBYK1vITSuC8OFPsdZ3eBaQyZsDxKpLDTIHPZOBlF8-N38HxQOEFVOd1CcZ';
  



        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => "Welcome" .' '.\Auth::user()->name,
                "body" => $request->body, 
                "icon" => "https://cdn-icons-png.flaticon.com/512/776/776579.png",
                // "icon" => asset("image/626311.jpg"),
                "icon" => url('/image/images.jpeg'),

                
            ]
        ];

        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        // Close connection
        curl_close($ch);
        // FCM response
      
        return back();
        dd($result);        
    }
}
