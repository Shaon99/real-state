<?php

namespace App\Http\Controllers;

use App\Mail\SendRequestMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\SectionData;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\RequestQuery;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index()
    {

        $pageTitle = 'Home';

        $sections = Page::where('name', 'home')->first();

        if (!$sections) {

            $sections = Page::create([
                'name' => 'home',
                'sections' => ['banner'],
                'slug' => 'home',
                'seo_description' => 'home',
                'page_order' => 1
            ]);
        }

        return view('frontend.home', compact('pageTitle', 'sections'));
    }

    public function page(Request $request)
    {
        $page = Page::where('slug', $request->pages)->first();

        if (!$page) {
            abort(404);
        }

        $pageTitle = "{$page->name}";


        return view('frontend.pages', compact('pageTitle', 'page'));
    }


    public function contactSend(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($data);

        return back()->with('success', 'thank you! Shortly we will get back to you');
    }


    public function askForPrice(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $admin_email = Admin::where('username', 'admin')->firstOrFail();


        RequestQuery::create($data);

        sendMail('REQUEST_MAIL', [
            'title' => $request->title,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ], $admin_email);


        return back()->with('success', 'thank you! Shortly we will get back to you');
    }

    public function blogDetails($id)
    {
        $blog = SectionData::where('key', 'blog.element')->where('id', $id)->first();
        $pageTitle = @$blog->data->title;
        $recentblogs = SectionData::where('key', 'blog.element')->where('id', '!=', $id)->latest()->get();
        return view('frontend.pages.blog_details', compact('pageTitle', 'blog', 'recentblogs'));
    }

    public function photoGalelry()
    {
        $pageTitle = "Photo Gallery";
        @$photos_content = SectionData::where('key', 'photo_gallery.content')->first();
        $photos = SectionData::where('key', 'photo_gallery.element')->latest()->paginate(9);
        return view('frontend.pages.photo_gallery', compact('pageTitle', 'photos', 'photos_content'));
    }

    public function vedioGallery()
    {
        $pageTitle = "Video Gallery";
        @$vedio_content = SectionData::where('key', 'vedio_gallery.content')->first();
        $vedios = SectionData::where('key', 'vedio_gallery.element')->latest()->paginate(9);
        return view('frontend.pages.vedio_gallery', compact('pageTitle', 'vedios', 'vedio_content'));
    }


    //single--property--detais

    public function propertyDetails($slug)
    {
        $data['property'] = Properties::with('location', 'type', 'gallery')
            ->where('slug', $slug)
            ->firstOrFail();
        $data['related'] = Properties::where('property_type_id', $data['property']->property_type_id)
            ->where('slug', '!=', $slug)
            ->limit(6)
            ->latest()
            ->get();

        $data['types'] = PropertyType::latest()->limit(6)->get();
        $data['pageTitle'] = $data['property']->slug;
        return view('frontend.pages.property_details')
            ->with($data);
    }


    public function allProperty()
    {
        $data['pageTitle'] = "All Property";
        $data['properties'] = Properties::with('location', 'type')->latest()->paginate(12);
        return view('frontend.pages.viewall_properties')->with($data);
    }

    public function LocationProperty($location)
    {
        $data['location_find'] = Location::where('name', $location)->firstOrFail();
        $data['properties'] = Properties::with('location', 'type')
            ->where('location_id', $data['location_find']->id)
            ->latest()
            ->paginate(12);
        $data['pageTitle'] = $location;

        return view('frontend.pages.locationproperties')->with($data);
    }

    public function CollectionProperty($type)
    {
        $data['collection_find'] = PropertyType::where('name', $type)->firstOrFail();
        $data['properties'] = Properties::with('location', 'type')
            ->where('property_type_id', $data['collection_find']->id)
            ->latest()
            ->paginate(12);
        $data['pageTitle'] = $type;

        return view('frontend.pages.collectionproperty')->with($data);
    }

    public function search(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'collection' => 'required',
            'location' => 'required'
        ]);
        $properties = Properties::with('location', 'type')
            ->where('name', 'LIKE', '%' . $request->name . '%')
            ->where('property_type_id', $request->collection)
            ->where('location_id', $request->location)
            ->orderBy('name')->get();
        return view('frontend.pages.ajaxsearchitem', compact('properties'));
    }

    public function mainsearch(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'collection' => 'required',
            'location' => 'required'
        ]);
        $query = Properties::with('location', 'type')
            ->where('name', 'LIKE', '%' . $request->name . '%')
            ->where('property_type_id', $request->collection)
            ->where('location_id', $request->location)
            ->orderBy('name');


        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->bed) {
            $query->where('bedroom', $request->bed);
        }

        if ($request->bath) {
            $query->where('bathroom', $request->bath);
        }

   

        $properties = $query->get();

        return view('frontend.pages.ajaxsearchitem', compact('properties'));
    }

    //newsletetr-subscriber
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscriber::create([
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'newsletter subscription is successful',
        ]);
    }
}
