<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    public function index()
    {
        return view('url.index');
    }

    public function shorten(Request $request)
    {
        // Validation for the long URL input goes here
        $request->validate([
            'url' => 'required|url',
        ]);

        $url = new Url();
        $url->long_url = $request->input('url');
        //dd($url->generateShortUrl());
        $url->short_url = $url->generateShortUrl();
        $url->save();

       // dd($url);

        return view('url.shortened', ['url' => $url]);
    }

    public function redirect($shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->first();

        if (!$url) {
            abort(404);
        }

        $url->click_count++;
        $url->save();

        return redirect($url->long_url);
    }

    public function stats($url)
    {
        $url = Url::findOrFail($url);

        return view('url.stats', ['url' => $url]);
    }
}
