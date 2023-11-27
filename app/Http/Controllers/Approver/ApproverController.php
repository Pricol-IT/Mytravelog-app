<?php

namespace App\Http\Controllers\Approver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Trip;
use App\Models\Flight;
use App\Models\Train;
use App\Models\Taxi;
use App\Models\Bus;
use App\Models\Advance;
use App\Models\Accomadation;
use App\Models\Connectivity;
use App\Models\Forex;

class ApproverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('approver.dashboard');
    }

    public function addtrip(Request $request)
    {
        $id=DB::select("SHOW TABLE STATUS LIKE 'trips'");
        $next_id=$id[0]->Auto_increment;
        $padded_id = str_pad($next_id, 4, '0', STR_PAD_LEFT);
        $tripid = date('Y').$padded_id;
        $trips =$request;
        $tripDetails[] = [
            'tripid' => $tripid,
            'tripname' => $request->tripname,
            'trip_fromdate' => $request->tfdate,
            'trip_todate' => $request->ttdate,
        ];
        toastr()->success('TripId Generated Successfully');
        return view('approver.trip.addtrip',compact('tripDetails','trips'));
    }

    public function mytripDetails()
    {
        $user_id = auth()->user()->id;
        $trips = Trip::where('user_id',$user_id)->orderBy('id','desc')->get();
        return view('approver.trip.mytrip',compact('trips'));
    }

    public function storetrip(Request $request)
    {
        
        $user_id = auth()->user()->id;
        $tripDetails = [
            'user_id' => $user_id,
            'tripid' => $request->tripid,
            'tripname' => $request->tripname,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'purpose' => $request->purpose,
        ];
        $trip = Trip::create($tripDetails);
        $tripid = $trip->id;
        if($request->flightfrom)
        {
            for ($i = 0; $i < count($request->flightfrom); $i++) {
              $flight = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'origin' => $request->flightfrom[$i],
                'destination' => $request->flightto[$i],
                'trip_class' => $request->flightclass[$i],
                'preferred_date' => $request->flightdate[$i],
              ];
              Flight::create($flight);
            }
            
        }
        if($request->trainfrom)
        {
            for ($i = 0; $i < count($request->trainfrom); $i++) {
              $train = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'origin' => $request->trainfrom[$i],
                'destination' => $request->trainto[$i],
                'trip_class' => $request->trainclass[$i],
                'preferred_date' => $request->traindate[$i],
              ];
              Train::create($train);
            }
            
        }
        if($request->busfrom)
        {
            for ($i = 0; $i < count($request->busfrom); $i++) {
              $bus = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'origin' => $request->busfrom[$i],
                'destination' => $request->busto[$i],
                'trip_class' => $request->busclass[$i],
                'preferred_date' => $request->busdate[$i],
              ];
              Bus::create($bus);
            }
            
        }
        if($request->taxifrom)
        {
            for ($i = 0; $i < count($request->taxifrom); $i++) {
              $taxi = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'origin' => $request->taxifrom[$i],
                'destination' => $request->taxito[$i],
                'trip_taxi' => $request->taxiclass[$i],
                'preferred_date' => $request->taxidate[$i],
              ];
              Taxi::create($taxi);
            }
            
        }
        if($request->location)
        {
            for ($i = 0; $i < count($request->location); $i++) {
              $hotel = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'location' => $request->location[$i],
                'checkin' => $request->checkin[$i],
                'checkout' => $request->checkout[$i],
              ];
              Accomadation::create($hotel);
            }
            
        }
        if($request->amount)
        {
            for ($i = 0; $i < count($request->amount); $i++) {
              $advance = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'amount' => $request->amount[$i],
                'purpose' => $request->apurpose[$i],
              ];
              Advance::create($advance);
            }
            
        }
        if($request->network)
        {
            for ($i = 0; $i < count($request->network); $i++) {
              $connect = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'connection' => $request->network[$i],
              ];
              Connectivity::create($connect);
            }
            
        }
        if($request->currency)
        {
            for ($i = 0; $i < count($request->currency); $i++) {
              $forex = [
                'trip_id' => $tripid,
                'tripid' => $request->tripid,
                'currency' => $request->currency[$i],
                'amount' => $request->forex_amount[$i],
              ];
              Forex::create($forex);
            }
            
        }
        if($trip)
        {
            toastr()->success('Trip Submitted for Approval');
            return redirect()->route('approver.mytrip');
        }else
        {
            toastr()->success('Something Went Wrong, Please try again!');
            return back();
        }
    }

    public function viewsummary($id)
    {
        // $trip = Trip::find($id)->first();
        $trip = Trip::with(['flight', 'train', 'bus', 'taxi', 'accommodation', 'advance', 'connectivity', 'forex'])->find($id);

        return view('approver.trip.summary', compact('trip'));

         // return $trip;
    }

    public function OthersDetails()
    {
        $user_id = auth()->user()->id;
        $trips = Trip::where('user_id','!=',$user_id)->orderBy('id','desc')->get();
        return view('approver.trip.alltrip',compact('trips'));
    }

    public function pendingDetails()
    {
        $user_id = auth()->user()->id;
        $trips = Trip::where('user_id','!=',$user_id)->where('status','pending')->orderBy('id','desc')->get();
        return view('approver.trip.pending',compact('trips'));
    }

    public function approvalDetails()
    {
        $user_id = auth()->user()->id;
        $trips = Trip::where('user_id','!=',$user_id)->where('status','approved')->orderBy('id','desc')->get();
        return view('approver.trip.approved',compact('trips'));
    }
    public function clarificationDetails()
    {
        $user_id = auth()->user()->id;
        $trips = Trip::where('user_id','!=',$user_id)->where('status','clarification')->orderBy('id','desc')->get();
        return view('approver.trip.clarification',compact('trips'));
    }

    public function tripApproved($id)
    {
        $trip = Trip::find($id)->update(['status'=>'approved']);
        toastr()->success('Trip Request Approved Successfully');
        return back();
    }

    public function tripReject($id)
    {
        $trip = Trip::find($id)->update(['status'=>'reject']);
        toastr()->success('Trip Request Rejected Successfully');
        return back();
    }

    public function remarks(Request $request)
    {
        $trip = Trip::find($request->tripid)->update(['status' => 'clarification','remarks' => $request->remark]);
        if($trip)
        {
        toastr()->success('Remarks Added Successfully');
        return back();

        }
        else
        {
            toastr()->danger('Something Went Wrong');
        return back();            
        }
        
    }
}
