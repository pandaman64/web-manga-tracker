<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Laminas\Feed\Reader\Reader;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = Publisher::query()->get();
        /** @var Publisher $publisher */
        foreach ($publishers as $publisher) {
            $feed = Reader::import($publisher->feed_url);
            foreach ($feed as $entry) {
                Chapter::query()->updateOrCreate(
                    [ 'publisher_id' => $publisher->id, 'feed_id' => $entry->getId() ],
                    [
                        'title' => $entry->getTitle(),
                        'work_title' => $entry->getContent(),
                        'author' => $entry->getAuthor()['name'],
                        'permalink' => $entry->getPermalink(),
                        'enclosure_url' => $entry->getEnclosure()?->url,
                        'feed_updated_at' => $entry->getDateModified(),
                    ],
                );
            }
        }
    }
}
