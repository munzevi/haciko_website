<?php
use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Language;

class SettingSeeder extends Seeder
{
    public function run()
    {
        foreach(config('cms.settings') as $segment => $settings){
            foreach($settings as $key => $value){
                Setting::create([
                    'segment' => $segment,
                    'key' => $key,
                    'value' => $value,
                    'language_id' => Language::where('name','Turkish')->first()->id,
                    'created_at'=> \Carbon\Carbon::now()
                ]);
            }
        }
        echo 'created: Settings.'."\n";
    }
}

