<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        $city = City::count();

        return view('admin.city.index',compact('city'));
    }

        // yajra pagination
    public function getCity(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = City::get();
            }

            else{
                //Date Filter
                $data = City::whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<button class="btn btn-sm  btn-info ml-2 my-3 edit" value="' . $row->id . '" type="button"><i class="fa fa-edit"></i></button>';

                    $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/city-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';

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


    public function addCity(Request $req){

        City::insert([
            'name' => $req->name,
            'created_at' => now(),
        ]);

        return redirect()->back();
    }


    // edit
    public function editCity($id){

        $city = City::find($id);

        return response()->json([
            'city'=>$city,
        ]);
    }



    // update
    public function updateCity(Request $req){

        $city = City::find($req->city_id);

        $city->name = $req->name;

        $city->updated_at = now();

        $city->save();


        return redirect()->back();

    }



    // delete
    public function deleteCity($id){

        $city=City::find($id);

        if ($city) {
            $city->delete();
        }

        session()->flash('message', 'City deleted successfully!');

        return redirect()->back();
    }

}
