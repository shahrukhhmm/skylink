<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\AirportParking;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class AirportParkingController extends Controller
{
    public function index()
    {
        $AirportParking = AirportParking::count();

        $city = City::all();
        return view('admin.airportParking.index',compact('AirportParking','city'));
    }

        // yajra pagination
    public function getAirportParking(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = AirportParking::with('city')->get();
            }

            else{
                //Date Filter
                $data = AirportParking::with('city')->whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<button class="btn btn-sm  btn-info ml-2 my-3 edit" value="' . $row->id . '" type="button"><i class="fa fa-edit"></i></button>';

                    $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/airport-parkings-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->addColumn('created_by', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('Y-m-d H:i:s');
                    return $formatted_date;
                })
                ->addColumn('logo', function ($row) {
                    $image = '<img src="'.asset($row->logo).'" width="50px" alt="Logo">';
                    return $image;
                })
                ->rawColumns(['action', 'created_by','logo'])
                ->make(true);

        }
    }


    public function addAirportParking(Request $req){

        $logoPath = null;
        if ($req->hasFile('logo')) {
            $destinationPath = public_path('airport_logo');

            $filename = time() . '_' . $req->file('logo')->getClientOriginalName();

            $req->file('logo')->move($destinationPath, $filename);

            $logoPath = 'airport_logo/' . $filename;
        }
        AirportParking::insert([
            'city_id' => $req->city_id,
            'name' => $req->name,
            'code' => $req->code,
            'location' => $req->location,
            'logo' => $logoPath,
            'price' => $req->price,
            'days' => $req->days,
            'points' => $req->points,
            'extra_json' => $req->extra_json,
            // 'summary_overview' => $req->summary_overview,
            // 'on_arrival' => $req->on_arrival,
            // 'on_return' => $req->on_return,
            // 'important' => $req->important,
            // 'reviews' => $req->reviews,
            'status' => 'Not Booked',
            'created_at' => now(),
        ]);

        // Flash a success message
        session()->flash('message', 'Airport Parking added successfully!');

        return redirect()->back();
    }


    // edit
    public function editAirportParking($id){

        $airportParking = AirportParking::find($id);

        return response()->json([
            'airportParking'=>$airportParking,
        ]);
    }



    // update Branch
    public function updateAirportParking(Request $req)
    {

        $airportParking = AirportParking::find($req->airportParking_id);

        if (!$airportParking) {
            return response()->json(['error' => 'Airport Parking not found'], 404);
        }

        $logoPath = $airportParking->logo;
        if ($req->hasFile('logo')) {
            $destinationPath = public_path('airport_logo');
            $filename = time() . '_' . $req->file('logo')->getClientOriginalName();
            $req->file('logo')->move($destinationPath, $filename);
            $logoPath = 'airport_logo/' . $filename;
        }

        $airportParking->update([
            'city_id' => $req->city_id,
            'name' => $req->name,
            'code' => $req->code,
            'location' => $req->location,
            'logo' => $logoPath,
            'price' => $req->price,
            'days' => $req->days,
            'points' => $req->points,
            'extra_json' => $req->extra_json,
            // 'summary_overview' => $req->summary_overview,
            // 'on_arrival' => $req->on_arrival,
            // 'on_return' => $req->on_return,
            // 'important' => $req->important,
            // 'reviews' => $req->reviews,
        ]);

        return response()->json(['message' => 'Airport Parking updated successfully!']);
    }




    // delete airportParking
    public function deleteAirportParking($id){

        $airportParking=AirportParking::find($id);

        if ($airportParking) {
            $airportParking->delete();
        }

        session()->flash('message', 'Airport Parking deleted successfully!');

        return redirect()->back();
    }

}
