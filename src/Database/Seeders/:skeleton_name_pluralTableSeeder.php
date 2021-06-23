<?php

namespace :namespace_vendor\:namespace_skeleton_name\Database\Seeders;

use :namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\Storage;

class :skeleton_name_pluralTableSeeder extends Seeder
{
    protected $total = 20;

    public function run()
    {
        :skeleton_name::query()
            ->truncate();

        DB::table('media')
            ->where('model_type', ':namespace_vendor\\:namespace_skeleton_name\\Models\\:skeleton_name')
            ->delete();

        $faker = Factory::create('pt_BR');

        $this->command->getOutput()
            ->progressStart($this->total);

        :skeleton_name::factory($this->total)
            ->create()
            ->each(function ($item) use ($faker) {
                foreach (config('upload-configs.:skeleton_name_lower') as $key => $image) {
                    $fakerDir = __DIR__ . '/../Faker/:skeleton_name_lower/' . $key;

                    if ($image['faker_dir']) {
                        $fakerDir = $image['faker_dir'];
                    }

                    if ($image['multiple']) {
                        $items = $faker->numberBetween(0, 6);
                        for ($i = 0; $i < $items; $i++) {
                            $sourceFile = $faker->file($fakerDir, storage_path('admix/tmp'));
                            $targetFile = Storage::putFile('tmp', new HttpFile($sourceFile));

                            $item->doUploadMultiple($targetFile, $key);
                        }
                    } else {
                        $sourceFile = $faker->file($fakerDir, storage_path('admix/tmp'));
                        $targetFile = Storage::putFile('tmp', new HttpFile($sourceFile));

                        $item->doUpload($targetFile, $key);
                    }
                }

                $this->command->getOutput()
                      ->progressAdvance();
            });

        $this->command->getOutput()
            ->progressFinish();
    }
}
