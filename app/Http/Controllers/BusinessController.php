<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Validator;

class BusinessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list() {
        $data = DB::table('business as B')
        ->leftjoin('coordinate as C', 'B.coordinate_id', '=', 'C.id')
        ->select(
            'B.*',
            DB::raw('C.latitude as latitude'),
            DB::raw('C.longitude as longitude'),
        )
        ->GET();
        return response()->json(
            $data
        );
    }

    public function detail(Request $request) {
        $data = Business::with('categorie', 'coordinate')->where('id', $request->id)->first();
        return response()->json([
            $data
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'distance' => 'required',
            'name' => 'required',
        ]);
        $data = new Business;
        $data->id = Str::random(22);
        $data->alias = $request->alias;
        $data->distance = $request->distance;
        $data->image_url = $request->image_url;
        $data->is_claimed = $request->is_claimed;
        $data->is_closed = $request->is_closed;
        $data->date_opened = $request->date_opened;
        $data->date_closed = $request->date_closed;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->photo_count = $request->photo_count;
        $data->price = $request->price;
        $data->rating = $request->rating;
        $data->review_count = $request->review_count;
        $data->transactions = $request->transactions;
        $data->yelp_menu_url = $request->yelp_menu_url;
        $data->coordinate_id = $request->coordinate_id;
        $data->save();
        return response()->json([
            $data
        ]);
    }

    public function update(Request $request) {
        // $this->validate($request, [
        //     'distance' => 'required',
        //     'name' => 'required',
        // ]);
        $data = Business::where('id', $request->id)->first();
        $data->alias = $request->alias;
        $data->distance = $request->distance;
        $data->image_url = $request->image_url;
        $data->is_claimed = $request->is_claimed;
        $data->is_closed = $request->is_closed;
        $data->date_opened = $request->date_opened;
        $data->date_closed = $request->date_closed;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->photo_count = $request->photo_count;
        $data->price = $request->price;
        $data->rating = $request->rating;
        $data->review_count = $request->review_count;
        $data->transactions = $request->transactions;
        $data->yelp_menu_url = $request->yelp_menu_url;
        $data->save();
        return response()->json([
            $data
        ]);
    }

    public function delete(Request $request) {
        $data = Business::where('id', $request->id)->first();
        $data->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Success delete Data',
        ]);
    }

}
