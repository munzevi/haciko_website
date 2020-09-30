<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class LanguageSeeder extends Seeder
{
    public function run()
    {

        App\Models\Language::create([
            'name' => 'Turkish',
            'code' => 'tr',
            'slug' => 'turkish',
            'author' => User::where('name','admin')->first()->id
        ]);
        echo 'created: Turkish Language.'."\n";
    }
}
