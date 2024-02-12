<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function getLinks($id)
    {
        $links = Link::where('user_id', $id)->get();
        if($links) {
            return response()->json([
                'links' => $links,
            ]);
        } else {
            return response()->json([
                'message' => 'No links found',
                'status' => 404
            ]);
        }
    }

    public function newLink(Request $request)
    {
        $link = new Link;
        $link->user_id = $request->user_id;
        $link->link = $request->link;
        $link->link_name = $request->link_name;
        $link->link_logo = $request->link_logo;
        $link->save();
        return $link;
    }

    public function getLink($id)
    { 
        $link = Link::find($id); 
        return $link; 
    }

    public function updateLink(Request $request, $id)
    {
        $link = Link::find($id);
        $link->link = $request->link;
        $link->link_name = $request->link_name;
        $link->link_logo = $request->link_logo;
        $link->save();
        return $link;
    }
}
