<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AirportParking;
use App\Models\DiscountVoucher;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function index()
    {
        $DiscountVoucher = DiscountVoucher::count();

        $DiscountVouchers = DiscountVoucher::all();

        $airportParking = AirportParking::get();

        return view('admin.discount_promotion.index',compact('DiscountVoucher','DiscountVouchers','airportParking'));
    }

        // yajra pagination
    public function getDiscount(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = DiscountVoucher::get();
            }

            else{
                //Date Filter
                $data = DiscountVoucher::whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<button class="btn btn-sm  btn-info ml-2 my-3 edit" value="' . $row->id . '" type="button"><i class="fa fa-edit"></i></button>';

                    $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/discount-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';

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


    public function addDiscount(Request $req){

        DiscountVoucher::insert([
            'promo_code' => $req->promo_code,
            'discount' => $req->discount,
            'valid_until' => $req->valid_until,
            'created_at' => now(),
        ]);

        return redirect()->back();
    }


    // edit
    public function editDiscount($id){

        $discountVoucher = DiscountVoucher::find($id);

        return response()->json([
            'DiscountVoucher'=>$discountVoucher,
        ]);
    }



    // update
    public function updateDiscount(Request $req){

        $discountVoucher = DiscountVoucher::find($req->DiscountVoucher_id);


        $discountVoucher->promo_code = $req->promo_code;

        $discountVoucher->discount = $req->discount;
        $discountVoucher->valid_until = $req->valid_until;

        $discountVoucher->updated_at = now();

        $discountVoucher->save();


        return redirect()->back();

    }



    // delete DiscountVoucher
    public function deleteDiscount($id){

        $discountVoucher= DiscountVoucher::find($id);

        if ($discountVoucher) {
            $discountVoucher->delete();
        }

        session()->flash('message', 'Discount Voucher deleted successfully!');

        return redirect()->back();
    }
}
