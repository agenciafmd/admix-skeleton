<?php

use;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

:
namespace_vendor\:namespace_skeleton_name\:skeleton_name;

class :skeleton_name_pluralTableSeeder extends Seeder
{
    protected
    $total = 20;

    public
    function run()
    {
        :
        skeleton_name::withTrashed()
            ->get()->each->forceDelete();

        DB::table('media')
            ->where('model_type', ':namespace_vendor\\:namespace_skeleton_name\\:skeleton_name')
            ->delete();

        $faker = Faker\Factory::create();

        $this->command->getOutput()
            ->progressStart($this->total);

        factory(:skeleton_name::class, $this->total)
            ->create()
        ->each(function ($item) use ($faker) {

            $item->doUpload($faker->file(__DIR__ . '/../faker/image', storage_path('admix/tmp')), 'image');

            $this->command->getOutput()
                ->progressAdvance();
        });
        $this->command->getOutput()
            ->progressFinish();
    }
}
