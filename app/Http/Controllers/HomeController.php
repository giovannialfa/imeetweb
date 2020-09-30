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
}
