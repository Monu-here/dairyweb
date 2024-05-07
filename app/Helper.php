<?php
namespace App;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Helper{
    public static function getSetting($key){
        //Cache::rememberForever($key,function()use($key){
            $data= DB::table('settings')->where('key',$key)->first('value');
            if($data){
                return $data->value;
            }



            return '';
       // });
    }

    public static function setSetting($key,$value){
        $data=DB::table('settings')->where('key',$key)->first();
        if($data){
            DB::table('settings')->where('key',$key)->update(['value'=>$value]);
        }else{
           $setting=new Setting();
           $setting->key=$key;
           $setting->value=$value;
           $setting->save();
        }
        Cache::forget($key);
    }
    public static function getHomepageSetting(){
        return (object)[

            //section 1
            'heading1' => self::getSetting('home_heading1') ?? '',
            'paragraph1' => self::getSetting('home_paragraph1') ?? '',
            'buttontext1' => self::getSetting('home_buttontext1') ?? '',
            'image1' => self::getSetting('home_image1') ?? '',

            //section 2
            'heading2' => self::getSetting('home_heading2') ?? '',
            'paragraph2' => self::getSetting('home_paragraph2') ?? '',
            'linktext1' => self::getSetting('home_linktext1') ?? '',
            'welcomeimage' => self::getSetting('home_image2') ?? '',

            //section 3(About)
            'heading3' => self::getSetting('home_heading3') ?? '',
            'paragraph3' => self::getSetting('home_paragraph3') ?? '',
            'trustednos' => self::getSetting('trustednos') ?? '',
            'aboutimage1' => self::getSetting('home_aboutimage1') ?? '',
            'aboutimage2' => self::getSetting('home_aboutimage2') ?? '',
            'visions' => json_decode(self::getSetting('visions'), true) ?? [],
            'missions' => json_decode(self::getSetting('missions'), true) ?? [],
            'features' => json_decode(self::getSetting('features'), true) ?? [],

            //section 4(Services)
            'serviceheading1' => self::getSetting('service_heading1') ?? '',
            'services' => json_decode(self::getSetting('services'), true) ?? [],
            'servicelink' => self::getSetting('servicelink') ?? '',
            'serviceheading2' => self::getSetting('service_heading2') ?? '',
            'serviceimage1' => self::getSetting('service_image1') ?? '',
            'serviceimage2' => self::getSetting('service_image2') ?? '',
            'productnos' => self::getSetting('service_productnos') ?? '',
            'satisfaction' => self::getSetting('service_satisfaction') ?? '',

            //Advantages Section
            'advheading'=>self::getSetting('adv_heading')??'',
            'advparagraph'=>self::getSetting('adv_paragraph')??'',
            'advimage'=>self::getSetting('adv_image')??'',

            //testimonial Section
            'testheading'=>self::getSetting('test_heading'),
            'testdescription'=>self::getSetting('test_description'),



        ];
    }


    public static function getAboutPageSetting(){
        return (object)[
            'heading1' => self::getSetting('about_heading1') ?? '',
            'paragraph1' => self::getSetting('about_paragraph1') ?? '',
            'image1' => self::getSetting('about_image1') ?? '',
            'heading2' => self::getSetting('about_heading2') ?? '',
            'paragraph2' => self::getSetting('about_paragraph2') ?? '',
            'image2' => self::getSetting('about_image2') ?? '',
            'reasons' => json_decode(self::getSetting('reasons'), true) ?? [],
        ];
    }


    public static function getContactPageSetting(){
        return (object)[
            'heading' => self::getSetting('contact_heading') ?? '',
            'paragraph' => self::getSetting('contact_paragraph') ?? '',
            'location' => self::getSetting('contact_location') ?? '',


        ];
    }






}
