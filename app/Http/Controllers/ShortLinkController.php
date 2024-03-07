<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
        return view('pages/shortenlink',compact('shortLinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        $input['link'] = $request->link;
        $input[ 'code' ] = Str::random(10);

        ShortLink::create($input);

        return redirect()->route('shortlink.get')->withSuccess('Shorten link Created Successfully');
    }

    public function shortenlink($code)
    {
        $find = ShortLink::where('code',$code)->first();

        return redirect($find->link);
    }

    public function edit($id)
    {
        $edit = ShortLink::findOrFail($id);
        return view('pages/edit', compact('edit'));
    }

    public function update(Request $request, ShortLink $shortLink)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        $shortLink->link = $request->link;
        $shortLink->save();

        return redirect()->route('shortlink.get')->withSuccess('Shorten link Updated Successfully');
    }

    public function destroy(shortlink $shortLink)
    {
        shortLink->delete();
        return redirect()->route('link.get')->Success('Shorten link Deleted Successfully');
    }
}
