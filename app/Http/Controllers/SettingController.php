<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function homePage(Request $request){
        return view('admin.settings.home');

    }

    public function aboutPage(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = Helper::getAboutPageSetting();
            $reasons = json_decode(Helper::getSetting('reasons'), true) ?? [];

            return view('admin.settings.about', compact('data', 'reasons'));
        } else {
            $about_heading1 = $request->heading1 ?? '';
            $about_paragraph1 = $request->paragraph1 ?? '';
            $about_heading2 = $request->heading2 ?? '';
            $about_paragraph2 = $request->paragraph2 ?? '';

            $reasonheadings = $request->reasonheadings ?? [];
            $reasonparagraphs = $request->reasondescriptions ?? [];

            // Combine reason headings and paragraphs into a single array
            $reasons = [];
            foreach ($reasonheadings as $index => $heading) {
                if (isset($reasonparagraphs[$index])) {
                    $reasons[$heading] = $reasonparagraphs[$index];
                }
            }

            // Store the combined array in settings
            Helper::setSetting('about_heading1', $about_heading1);
            Helper::setSetting('about_paragraph1', $about_paragraph1);
            Helper::setSetting('about_heading2', $about_heading2);
            Helper::setSetting('about_paragraph2', $about_paragraph2);
            Helper::setSetting('reasons', json_encode($reasons));

            // Store images
            if ($request->hasFile('image1')) {
                $imagePath = $request->file('image1')->storeAs('public/about_images', $request->file('image1')->getClientOriginalName());
                Helper::setSetting('about_image1', $imagePath);
            }
            if ($request->hasFile('image2')) {
                $imagePath = $request->file('image2')->storeAs('public/about_images', $request->file('image2')->getClientOriginalName());
                Helper::setSetting('about_image2', $imagePath);
            }

            $data = Helper::getAboutPageSetting();
            return redirect()->back()->with('success', 'Page Updated successfully.');
        }
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

            return redirect()->back()->with('success', 'Page Updated successfully.');

        }
    }
}
