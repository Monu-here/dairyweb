<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function homePage(Request $request){
        if ($request->isMethod('GET')) {
            $data = Helper::getHomepageSetting();
            $visions = json_decode(Helper::getSetting('visions'), true) ?? [];
            $missions = json_decode(Helper::getSetting('missions'), true) ?? [];
            $features = json_decode(Helper::getSetting('features'), true) ?? [];
            $services = json_decode(Helper::getSetting('services'), true) ?? [];




            return view('admin.settings.home', compact('data', 'visions', 'missions', 'features', 'services'));
        } else {
            $home_heading1 = $request->heading1 ?? '';
            $home_paragraph1 = $request->paragraph1 ?? '';
            $home_buttontext1 = $request->buttontext1 ?? '';

            $home_heading2 = $request->heading2 ?? '';
            $home_paragraph2 = $request->paragraph2 ?? '';
            $home_linktext1 = $request->linktext1 ?? '';

            $home_heading3 = $request->heading3 ?? '';
            $home_paragraph3 = $request->paragraph3 ?? '';
            $home_trustednos = $request->trustednos ?? '';
            $missions = $request->missions ?? [];
            $visions = $request->visions ?? [];
            $featureheadings = $request->featureheadings ?? [];
            $featuredescriptions = $request->featuredescriptions ?? [];
            // Combine reason headings and description into a single array
            $features = [];
            foreach ($featureheadings as $index => $heading) {
                if (isset($featuredescriptions[$index])) {
                    $features[$heading] = $featuredescriptions[$index];
                }
            }
            $service_heading1=$request->serviceheading1??'';
            $services = $request->services ?? [];
            $servicelink=$request->servicelink?? '';
            $service_heading2=$request->serviceheading2??'';
            $service_productnos=$request->productnos??'';
            $service_satisfaction=$request->satisfaction??'';


            $adv_heading=$request->advheading??'';
            $adv_paragraph=$request->advparagraph??'';

            $test_heading=$request->testheading??'';
            $test_description=$request->testdescription??'';


            $program_heading = $request->programheading ?? '';
            $program_paragraph = $request->proogrampara ?? '';
            $program_button_text = $request->programbtntext ?? '';
            $program_button_link = $request->programbtnlink ?? '';
            $program_title1=$request->programtitle1??'';
            $program_description1=$request->programdescription1??'';

            $program_title2=$request->programtitle2??'';
            $program_description2=$request->programdescription2??'';

            $program_title3=$request->programtitle3??'';
            $program_description3=$request->programdescription3??'';




            Helper::setSetting('program_heading', $program_heading);
            Helper::setSetting('program_paragraph', $program_paragraph);
            Helper::setSetting('program_button_text', $program_button_text);
            Helper::setSetting('program_button_link', $program_button_link);
            Helper::setSetting('program_title1', $program_title1);
            Helper::setSetting('program_description1', $program_description1);
            Helper::setSetting('program_title2', $program_title2);
            Helper::setSetting('program_description2', $program_description2);
            Helper::setSetting('program_title3', $program_title3);
            Helper::setSetting('program_description3', $program_description3);



            Helper::setSetting('home_heading1', $home_heading1);
            Helper::setSetting('home_paragraph1', $home_paragraph1);
            Helper::setSetting('home_buttontext1', $home_buttontext1);

            Helper::setSetting('home_heading2', $home_heading2);
            Helper::setSetting('home_paragraph2', $home_paragraph2);
            Helper::setSetting('home_linktext1', $home_linktext1);

            Helper::setSetting('home_heading3', $home_heading3);
            Helper::setSetting('home_paragraph3', $home_paragraph3);
            Helper::setSetting('trustednos', $home_trustednos);
            Helper::setSetting('visions', json_encode($visions));
            Helper::setSetting('missions', json_encode($missions));
            Helper::setSetting('features', json_encode($features));

            Helper::setSetting('service_heading1',$service_heading1);
            Helper::setSetting('services', json_encode($services));
            Helper::setSetting('service_heading2',$service_heading2);
            Helper::setSetting('servicelink',$servicelink);
            Helper::setSetting('service_productnos',$service_productnos);
            Helper::setSetting('service_satisfaction',$service_satisfaction);

            Helper::setSetting('adv_heading',$adv_heading);
            Helper::setSetting('adv_paragraph',$adv_paragraph);
            Helper::setSetting('test_heading',$test_heading);
            Helper::setSetting('test_description',$test_description);






            if ($request->hasFile('image1')) {
                $imagePath = $request->file('image1')->storeAs('public/home_images', $request->file('image1')->getClientOriginalName());
                Helper::setSetting('home_image1', $imagePath);
            }
            if ($request->hasFile('welcomeimage')) {
                $imagePath = $request->file('welcomeimage')->storeAs('public/home_images', $request->file('welcomeimage')->getClientOriginalName());
                Helper::setSetting('home_image2', $imagePath);
            }
            if ($request->hasFile('aboutimage1')) {
                $imagePath = $request->file('aboutimage1')->storeAs('public/home_images', $request->file('aboutimage1')->getClientOriginalName());
                Helper::setSetting('home_aboutimage1', $imagePath);
            }
            if ($request->hasFile('aboutimage2')) {
                $imagePath = $request->file('aboutimage2')->storeAs('public/home_images', $request->file('aboutimage2')->getClientOriginalName());
                Helper::setSetting('home_aboutimage2', $imagePath);
            }
            if ($request->hasFile('serviceimage1')) {
                $imagePath = $request->file('serviceimage1')->storeAs('public/home_images', $request->file('serviceimage1')->getClientOriginalName());
                Helper::setSetting('service_image1', $imagePath);
            }
            if ($request->hasFile('serviceimage2')) {
                $imagePath = $request->file('serviceimage2')->storeAs('public/home_images', $request->file('serviceimage2')->getClientOriginalName());
                Helper::setSetting('service_image2', $imagePath);
            }
            if ($request->hasFile('advimage')) {
                $imagePath = $request->file('advimage')->storeAs('public/home_images', $request->file('advimage')->getClientOriginalName());
                Helper::setSetting('adv_image', $imagePath);
            }
            if ($request->hasFile('programimage1')) {
                $imagePath = $request->file('programimage1')->storeAs('public/home_images', $request->file('programimage1')->getClientOriginalName());
                Helper::setSetting('program_image1', $imagePath);
            }
            if ($request->hasFile('programimage2')) {
                $imagePath = $request->file('programimage2')->storeAs('public/home_images', $request->file('programimage2')->getClientOriginalName());
                Helper::setSetting('program_image2', $imagePath);
            }
            if ($request->hasFile('programimage3')) {
                $imagePath = $request->file('programimage3')->storeAs('public/home_images', $request->file('programimage3')->getClientOriginalName());
                Helper::setSetting('program_image3', $imagePath);
            }
            if ($request->hasFile('newsletterimage')) {
                $imagePath = $request->file('newsletterimage')->storeAs('public/home_images', $request->file('newsletterimage')->getClientOriginalName());
                Helper::setSetting('newsletter_image', $imagePath);
            }

            $data = Helper::getHomepageSetting();
            return redirect()->back()->with('success', 'Page Updated successfully.');
        }

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
    public function footerPage(Request $request)
    {
        if ($request->isMethod('GET')) {
           $data = Helper::getFooterPageSetting();
            return view('admin.settings.footer',compact('data'));
        } else {
            $footer_address = $request->address ?? '';
            $footer_email = $request->email ?? '';
            $footer_phone = $request->phone ?? '';
            $footer_instalink = $request->instaurl ?? '';
            $footer_fblink = $request->facebookurl ?? '';
            $footer_twtlink = $request->twitterurl ?? '';
            $footer_privacy = $request->privacy ?? '';
            $footer_terms = $request->terms ?? '';
            $footer_disclaimer = $request->disclaimer ?? '';
            $footer_support = $request->support ?? '';


            Helper::setSetting('footer_address', $footer_address);
            Helper::setSetting('email_address', $footer_email);
            Helper::setSetting('phone_no', $footer_phone);
            Helper::setSetting('insta_url', $footer_instalink);
            Helper::setSetting('fb_url', $footer_fblink);
            Helper::setSetting('twt_url', $footer_twtlink);
            Helper::setSetting('privacy', $footer_privacy);
            Helper::setSetting('terms', $footer_terms);
            Helper::setSetting('disclaimer', $footer_disclaimer);
            Helper::setSetting('support', $footer_support);




            $data = Helper::getFooterPageSetting();

            return redirect()->back()->with('success', 'Page Updated successfully.');
        }
    }
}
