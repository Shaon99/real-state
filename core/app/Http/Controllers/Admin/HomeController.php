<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Jobs\emailSendJobs;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\RequestQuery;
use App\Models\Subscriber;


class HomeController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = 'Dashboard';
        $data['navDashboardActiveClass'] = "active";
        $data['totalProperties'] = Properties::where('status', 1)->count();
        $data['collection'] = PropertyType::count();
        $data['totallocation'] = Location::count();

        return view('backend.dashboard')->with($data);
    }


    public function subscribers()
    {
        $pageTitle = "Newsletter Subscriber";
        $subscribersActiveClass = 'active';
        $subscribers = Subscriber::latest()->get();
        return view('backend.subscriber', compact('subscribers', 'pageTitle', 'subscribersActiveClass'));
    }


    public function contactUs()
    {

        $data['contactusActiveClass'] = 'active';
        $data['pageTitle'] = "Contact us Data";
        $data['contacts'] = Contact::get();
        return view('backend.contact')->with($data);
    }

    public function contactReplpy(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->name ? $request->name : ' ',
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        sendGeneralMail($data);

        $notify[] = ['success', 'Reply email send successfully'];

        return back()->withNotify($notify);
    }


    public function requestQuery()
    {

        $data['q'] = 'active';
        $data['pageTitle'] = "Request-Query";
        $data['req'] = RequestQuery::get();
        return view('backend.request')->with($data);
    }

    public function contactDelete($id)
    {
        $data = Contact::find($id);
        $data->delete();
        $notify[] = ['success', 'Contact Deleted successfully'];

        return back()->withNotify($notify);
    }

    public function queryDelete($id)
    {
        $data = RequestQuery::find($id);
        $data->delete();
        $notify[] = ['success', 'Request Query Deleted successfully'];

        return back()->withNotify($notify);
    }



    public function sendEmail()
    {
        $data['subscriberActiveClass'] = 'active';
        $data['pageTitle'] = "Email Send To Subscriber";
        $data['subscribers'] = Subscriber::all();
        return view('backend.email.sendEmailToSubscriber')->with($data);
    }

    public function sendgroupEmail(Request $request)
    {

        $request->validate([
            'select' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'select' => $request->select,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        if ($request->select == 1) {            
            $emailJob = (new emailSendJobs($details))->delay(Carbon::now()->addSecond(1));
        }
        dispatch($emailJob);
        return redirect()->back()->with('success', 'E-Mail Successfully Send');
    }
}
