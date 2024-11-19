<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ParkingPricing;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\AirportParking;

class ParkingPricingController extends Controller
{
    public function index()
    {
        $ParkingPricing = ParkingPricing::count();

        $ParkingPricinges = ParkingPricing::all();

        $airportParking = AirportParking::get();

        return view('admin.parkingPricing.index',compact('ParkingPricing','ParkingPricinges','airportParking'));
    }

        // yajra pagination
    public function getParkingPricing(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = ParkingPricing::with('airport')->get();
            }

            else{
                //Date Filter
                $data = ParkingPricing::with('airport')->whereBetween('created_at', [$fromDate, $toDate])->get();
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
                ->rawColumns(['action', 'created_by'])
                ->make(true);

        }
    }


    public function addParkingPricing(Request $req){

        ParkingPricing::insert([
            'airport_parking_id' => $req->airport_parking_id,
            'oneDay' => $req->oneday,
            'weekly' => $req->weekly,
            'monthly' => $req->monthly,
            'car_type' => $req->car_type,
            'created_at' => now(),
        ]);

        return redirect()->back();
    }


    // edit
    public function editParkingPricing($id){

        $parkingPricing = ParkingPricing::find($id);

        return response()->json([
            'parkingPricing'=>$parkingPricing,
        ]);
    }



    // update
    public function updateParkingPricing(Request $req){

        $parkingPricing = ParkingPricing::find($req->ParkingPricing_id);

        $parkingPricing->airport_parking_id = $req->airport_parking_id;

        $parkingPricing->oneDay = $req->oneDay;
        $parkingPricing->weekly = $req->weekly;
        $parkingPricing->monthly = $req->monthly;
        $parkingPricing->car_type = $req->car_type;
        $parkingPricing->updated_at = now();

        $parkingPricing->save();


        return redirect()->back();

    }



    // delete ParkingPricing
    public function deleteParkingPricing($id){

        $parkingPricing= ParkingPricing::find($id);

        if ($parkingPricing) {
            $parkingPricing->delete();
        }

        session()->flash('message', 'Parking Pricing deleted successfully!');

        return redirect()->back();
    }
}
