<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class BookingDataController extends Controller
{
    public function index()
    {

        $booking = Booking::count();
        return view('admin.booking.index',compact('booking'));
    }


    // yajra pagination
    public function bookingDataList(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = Booking::with('airport')->get();

            }

            else{
                //Date Filter
                $data = Booking::with('airport')->whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<button class="btn btn-sm  btn-info ml-2 my-3 edit" value="' . $row->id . '" type="button"><i class="fa fa-edit"></i></button>';
                    // $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/user-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('created', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('Y-m-d H:i:s');
                    return $formatted_date;
                })
                ->rawColumns(['action', 'created'])
                ->make(true);

        }
    }


     // edit
     public function editBooking($id){

        $booking = Booking::find($id);

        return response()->json([
            'booking'=>$booking,
        ]);
    }


    // update
    public function updateBooking(Request $req){

        $booking = Booking::find($req->booking_id);

        $booking->status = $req->status;

        $booking->save();


        return redirect()->back();

    }


}
