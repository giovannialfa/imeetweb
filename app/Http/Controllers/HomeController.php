<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Guest;
use App\User;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guests = Guest::all();
        return view('dashboard', ['guests' => $guests]);
    }

    public function countVisitor()
    {
        $visitor = Guest::where([['type', 'Visitor']])->get()->count();
        $hotel = Guest::where([['type', 'Hotel']])->get()->count();
        $delivery = Guest::where([['type', 'Delivery']])->get()->count();
        $data = [$visitor, $hotel, $delivery];
        return $data;
    }

    public function createChat(Request $request)
    {
        $input = $request->all();
        $message = $input['message'];

        $chat = new Chat([
            'sender_id' => auth()->user()->id,
            'sender_name' => auth()->user()->name,
            'message' => $message
        ]);

        $this->broadcastMessage(auth()->user()->name, $message);

        $chat->save();

        return redirect()->back();
    }

    // private function broadcastMessage($senderName, $message)
    // {
    //     $optionBuilder = new OptionsBuilder();
    //     $optionBuilder->setTimeToLive(60 * 20);

    //     $notificationBuilder = new PayloadNotificationBuilder('New message from : ' . $senderName);
    //     $notificationBuilder->setBody($message)
    //         ->setSound('default')
    //         ->setClickAction('https://localhost:3000');
    //     $dataBuilder = new PayloadDataBuilder();
    //     $dataBuilder->addData([
    //         'sender_name' => $senderName,
    //         'message' => $message
    //     ]);
    //     $option = $optionBuilder->build();
    //     $notification = $notificationBuilder->build();
    //     $data = $dataBuilder->build();

    //     $tokens = User::all()-> pluck('fcm_token')->toArray();
    //     // dd($tokens);
    //     $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);


    //     return $downstreamResponse->numberSuccess();
    // }

    public function chat()
    {
        $guests = Guest::all();
        return view('chat', ['guests' => $guests]);
    }

    public function guestroom(Request $request)
    {
        $guests = Guest::where('staffId', $request->staffId)->get();
        $response = array(
            'status' => 'success',
            'guest' => $guests,
        );
        $output = '<div>';
        if (count($guests) > 0) {
            foreach ($guests as $guest) {
                $output .= '<div class="row mt-2 mb-2" onclick="showChatroom();">';
                $output .= '<div class="col-md-3 offset-md-1">';
                $output .= '<img src="' . $guest->imageUrl . '" alt="" style="width: 100%;">';
                $output .= '</div>';
                $output .= '<div class="col-md-8">';
                $output .= $guest->fullname;
                $output .= '</div>';
                $output .= '</div>';
            }
        }
        $output .= '</div>';
        return $output;

        // return response()->json($response);
    }

    public function sendNotification(Request $request)
    {
        define('SERVER_API_KEY', 'AAAAvFgQPLk:APA91bEDASval_rpIunmFYOlp65Hz0BBsK00l5qUFYvs76HxsjyTB0LNpzu0GIry9vwWg0dJk4Raz9COONykTYz8sEm-3fhT-3kRo2lkH3ZEKtCRvOoD1FGw9DzifQGsdhwPWCZJrFBW');
        // $user = User::where('staffId', $request->guestHostId)->get();
        // $pairFCMToken = $user['fcmToken'];
        // print($pairFCMToken);
        // $fcmToken = ['edMO-v-8S4KpbLJs5Si7tL:APA91bGJp6Tq9lt1WZUV14HECCrvc0GX4RCZ_fZTeUsSuP5tIXYKo5wGCI12O7_cA6Bb-ZKfJENhUpItrvqz3JxYgVvtiXLMOVzpUQqAbFZByuT7evjr4rLT8lV1T1NvbCv5Z93dVWRF'];
        // $fcmToken = ['fixYSJBgSeSOsthvcAppaO:APA91bEADd0X_QPmo0mN5SKLf3Gw6LqonDSCFqkHeWsmEO8haOYeLt80LjWeHIRkRvE8g4rCDq7DiTxh0JbkfTqPsq_3MbqMBTaVBW9pZiNlr5wW1XXaDhwwxwyaza2bIsbIQsj1oIzX'];
        $guestHostFCMToken = User::where('staffId', $request->staffId)->value('fcmToken');

        $fcmToken = [$guestHostFCMToken];
        $header = [
            'Authorization: Key=' . SERVER_API_KEY,
            'Content-Type: Application/json'
        ];

        $msg = [
            'title' => 'Testing Notification',
            'body' => 'Testing Notification from Body'
        ];

        $payload = [
            'registration_ids' => $fcmToken,
            'notification' => [
                "body" => $request->message,
                "title" => $request->title
            ],
            'data' => $msg
        ];


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $header
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
