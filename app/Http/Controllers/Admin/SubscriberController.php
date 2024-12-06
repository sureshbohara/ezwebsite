<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;
use App\Mail\NewSubscriberMail;

class SubscriberController extends Controller
{
    public function index(){
        $data['datas'] = Subscriber::all();
        return view('admin.subscribers.index', $data);
    }

    public function store(Request $request){
      $request->validate([
        'email' => 'required|email|unique:subscribers,email',
      ]);
      $subscriber = Subscriber::create($request->only('email'));
      $title = 'Welcome to Our Newsletter!';
      $message = 'Thank you for subscribing to our newsletter. We are excited to keep you updated with our latest news and offers!';
      Mail::to($subscriber->email)->queue(new NewSubscriberMail($title, $message));
     return response()->json(['status' => 200, 'msg' => 'Subscription successful!']);
    }


    public function destroy($id){
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return redirect()->route('subscribers.index')->with('success', 'Subscriber deleted successfully!');
    }

    public function subscribersStatus(Request $request){
        try {
            $id = $request->get('status_id');
            $data = Subscriber::find($id);
            $data->toggleStatus();
            return redirect()->back()->with('success', 'Data status changed successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to change data status.');
        }
    }

    public function mailSendUsers(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $title = $request->input('title');
        $message = $request->input('message');
        $allSubscriber = Subscriber::where('status', 1)->get();
        foreach ($allSubscriber as $subscriber) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($title, $message, $subscriber->name));
        }
        return redirect()->back()->with('success', 'Emails sent successfully.');
    }

    public function mailSendSingle(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'email' => 'required|email|exists:subscribers,email',
        ]);
        $title = $request->input('title');
        $message = $request->input('message');
        $email = $request->input('email');
        $subscriber = Subscriber::where('email', $email)->firstOrFail();
        Mail::to($subscriber->email)->queue(new SubscriberMail($title, $message, $subscriber->name));
         return redirect()->back()->with('success', 'Emails sent successfully.');
    }
}
