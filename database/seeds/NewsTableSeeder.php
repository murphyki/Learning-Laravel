<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();

        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/news')) as $filename)
        {
            // filter out "." and ".."
            if ($filename->isDir()) continue;

            // filter out anything other than "index.xml"
            if (strcasecmp($filename->getFilename(), "index.xml") != 0) continue;

            $sxml = simplexml_load_file($filename->getPathname());
            News::create([
                'title' => (string)$sxml->title,
                'content' => (string)$sxml->content,
                'published_at' => date('Y-m-d', strtotime((string)$sxml->pub_date))
            ]);
        }
    }
}
