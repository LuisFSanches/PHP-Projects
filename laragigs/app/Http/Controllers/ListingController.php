<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller {
  public function index() {
    dd(request('tag'));
    return view('listings.index', [
      'listings' => Listing::all()
    ]);
  }

  public function show($id) {
    $listing = Listing::find($id);
    if ($listing) {
        return view('listings.show', [
            'listing' => Listing::find($id)
        ]);
    } else {
        abort('404');
    }
  }
}
