<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;
use Illuminate\Support\Facades\Config;

class MapController extends Controller
{
    public function index()
    {
        $client = new Mongo(Config::get('database.connections.mongodb.dsn'));
        $collection = $client->selectCollection('LuxuryCarHub', 'dealers');

        $dealers = $collection->find([
            'latitude' => ['$exists' => true],
            'longitude' => ['$exists' => true],
        ])->toArray();

        return view('map', ['dealers' => $dealers]);
    }
}
