<?php

namespace App\Models\Services;

use SimplePie;
use FeedReader;

class RssFeedService
{
    /**
     * Feed items count
     *
     * @var number
     */
    private $count = 15;

    /**
     * Save feed data to database
     */
    public function parse()
    {
        $feed = FeedReader::read(config('constants.NEWS_FEED_URL'));
        $result = [];
        if ($feed->get_item_quantity() >= $this->count) {
            for ($i = 0; $i < $this->count; $i++) {
                $result[] = $this->parseItem($feed, $i);
            }
        }
        return $result;
    }

    /**
     * Set count of items to return in parse result
     *
     * @param number $count
     */
    public function setCount($count): void
    {
        $this->count = $count;
    }

    /**
     * Parse single feed item by index
     *
     * @param  SimplePie $feed
     * @param  number    $index
     *
     * @return array
     */
    private function parseItem($feed, $index)
    {
        return [
            'uuid' => $feed->get_item($index)->get_id(),
            'title' => $feed->get_item($index)->get_title(),
            'description' => $feed->get_item($index)->get_description(),
            'author' => data_get($feed->get_item($index)->get_author(), 'email'),
            'link' => $feed->get_item($index)->get_permalink(),
            'image' => $feed->get_item($index)->get_enclosure()->get_link(),
            'pub_date' => $feed->get_item($index)->get_date('Y-m-d H:i:s'),
        ];
    }
}