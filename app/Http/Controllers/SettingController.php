<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function aboutPage(Request $request){
        
    }




    public function contactpage(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = Helper::getContactPageSetting();
            return view('admin.settings.contact', compact('data'));
        } else {
            $contact_heading = $request->heading ?? '';
            $contact_paragraph = $request->paragraph ?? '';
            $contact_location = $request->location ?? '';

            Helper::setSetting('contact_heading', $contact_heading);
            Helper::setSetting('contact_paragraph', $contact_paragraph);
            Helper::setSetting('contact_location', $contact_location);


            $data = Helper::getContactPageSetting();

            return view('admin.settings.contact', compact('data'));
            return redirect()->route('admin.settings.contactpage')->with('success', 'Page Updated successfully.');

        }
    }
}
