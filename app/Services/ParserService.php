<?php declare(strict_types=1);

namespace App\Services;

use App\Contract\Parser;

class ParserService implements Parser
{
   public function parse(string $link): void
   {
	   $xml = \XmlParser::load($link);

	   $data = $xml->parse([
		   'title' => [
			   'uses' => 'channel.title'
		   ],
		   'link' => [
			   'uses' => 'channel.link'
		   ],
		   'description' => [
			   'uses' => 'channel.description'
		   ],
		   'image' => [
			   'uses' => 'channel.image.url'
		   ],
		   'news' => [
			   'uses' => 'channel.item[title,link,guid,description,pubDate]'
		   ]
	   ]);

	   $e = explode("/", $link);
	   $fileName = end($e);
	   \Storage::disk('parsing')->append('news/' . $fileName, json_encode($data));
   }
}