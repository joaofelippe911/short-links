<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    function index() {
        $links = Links::get();

        return view('links.index', [
            "links" => $links
        ]);
    }

    function redirect(String $short_link) {

        $data = Links::where('short_link', $short_link)->first();

        return redirect($data->original_link);
    }

    function create() {

        return view('links.create');
    }

    function store(Request $request) {
        $data = $request->except("_token");

        $random = Str::random(6);
        $data['short_link'] = $random;

        Links::create($data);

        return redirect('links');
    }

    function edit(int $id) {
        $link = Links::find($id);

        return view('links.edit', [
            "link" => $link
        ]);
    }

    function update(int $id, Request $request) {
        $data = $request->except("_token");
        $link = Links::find($id);
        $link->update([
            "original_link" => $request['original_link'],
            "description" => $request['description']
        ]);

        return redirect("/links");
    }

    function destroy(int $id) {
        Links::destroy($id);

        return redirect("/links");
    }
}
