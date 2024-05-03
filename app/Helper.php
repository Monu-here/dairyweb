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
    public static function getAboutPageSetting(){
        return (object)[
            'heading' => self::getSetting('contact_heading') ?? '',
            'paragraph' => self::getSetting('contact_paragraph') ?? '',
            'location' => self::getSetting('contact_location') ?? '',


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
