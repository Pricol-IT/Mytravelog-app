<?php

namespace App\Http\Controllers\Approver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Trip;
use App\Models\User;
use App\Models\Flight;
use App\Models\Train;
use App\Models\Taxi;
use App\Models\Bus;
use App\Models\Advance;
use App\Models\Accomadation;
use App\Models\Connectivity;
use App\Models\Forex;
use App\Models\History;
use App\Models\UserDetail;

use Illuminate\Support\Facades\Notification;
use App\Notifications\User\NewTripNodification;
use App\Notifications\Approver\TripAddedNodification;

class ApproverController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $trips = DB::table('trips')
      ->select('status', DB::raw('count(*) as total'))
      ->where('user_id', auth()->user()->id)
      ->groupBy('status')
      ->get();
    $user_id = auth()->user()->id;
    $upcomingtrips = Trip::where('user_id', $user_id)->where('status', '=', 'approved')->whereDate('from_date', '>=', now())->orderBy('from_date', 'asc')->get();
    $recenttrips = Trip::where('user_id', $user_id)->where('status', '=', 'approved')->whereDate('to_date', '<', now())->orderBy('to_date', 'desc')->get();



    return view('approver.dashboard', compact('trips', 'upcomingtrips', 'recenttrips'));
  }
  

  public function addtrip(Request $request)
  {
    // $this->addtriptrait($request);
    $id = DB::select("SHOW TABLE STATUS LIKE 'trips'");
    $next_id = $id[0]->Auto_increment;
    $padded_id = str_pad($next_id, 4, '0', STR_PAD_LEFT);
    $tripid = date('Y') . $padded_id;
    $trips = $request;
    $tripDetails[] = [
      'tripid' => $tripid,
      'tripname' => $request->tripname,
      'trip_fromdate' => $request->tfdate,
      'trip_todate' => $request->ttdate,
      'trip_type' => $request->trip_type
      
    ];
    toastr()->success('TripId Generated Successfully');
    return view('approver.trip.addtrip', compact('tripDetails', 'trips'));
  }

  public function mytripDetails()
  {
    $user_id = auth()->user()->id;
    $trips = Trip::where('user_id', $user_id)->where('status', '!=', 'draft')->orderBy('id', 'desc')->get();
    return view('approver.trip.mytrip', compact('trips'));
  }

  public function storetrip(Request $request)
  {
    if ($request->submit == 'Save My Trip') {
      $status = 'draft';
    } else {
      $status = 'pending';
    }

    $user_id = auth()->user()->id;
    $tripDetails = [
      'user_id' => $user_id,
      'tripid' => $request->tripid,
      'tripname' => $request->tripname,
      'from_date' => $request->from_date,
      'to_date' => $request->to_date,
      'purpose' => $request->purpose,
      'status' => $status,
      'trip_type' => $request->trip_type,
    ];
    $trip = Trip::create($tripDetails);
    $tripid = $trip->id;
    if ($request->flightfrom) {
      for ($i = 0; $i < count($request->flightfrom); $i++) {
        $flight = [
          'trip_id' => $tripid,
          'tripid' => $request->tripid,
          'origin' => $request->flightfrom[$i],
          'destination' => $request->flightto[$i],
          'trip_class' => $request->flightclass[$i],
          'preferred_date' => $request->flightdate[$i],
          'preferences' => $request->preferences[$i],
        ];
        Flight::create($flight);
      }

    }
    if ($request->trainfrom) {
      for ($i = 0; $i < count($request->trainfrom); $i++) {
        $train = [
          'trip_id' => $tripid,
          'tripid' => $request->tripid,
          'origin' => $request->trainfrom[$i],
          'destination' => $request->trainto[$i],
          'trip_class' => $request->trainclass[$i],
          'preferred_date' => $request->traindate[$i],
          'preferences' => $request->preferences[$i],
        ];
        Train::create($train);
      }

    }
    if ($request->busfrom) {
      for ($i = 0; $i < count($request->busfrom); $i++) {
        $bus = [
          'trip_id' => $tripid,
          'tripid' => $request->tripid,
          'origin' => $request->busfrom[$i],
          'destination' => $request->busto[$i],
          'trip_class' => $request->busclass[$i],
          'preferred_date' => $request->busdate[$i],
          'preferences' => $request->preferences[$i],
        ];
        Bus::create($bus);
      }

    }
    if ($request->taxifrom) {
      for ($i = 0; $i < count($request->taxifrom); $i++) {
        $taxi = [
          'trip_id' => $tripid,
          'tripid' => $request->tripid,
          'airport_to_hotel' => $request->airportToHotel[$i],
          'hotel_to_company' => $request->hotelToCompany[$i],
          'no_of_days' => $request->noOfDays[$i],
          'class' => $request->tx_class[$i],
          'pick_date' => $request->pickupDate[$i],
          'drop_date' => $request->dropDate[$i],
        ];
        Taxi::create($taxi);
      }

    }
    if ($request->location) {
      for ($i = 0; $i < count($request->location); $i++) {
        $hotel = [
          'trip_id' => $tripid,
          'tripid' => $request->tripid,
          'location' => $request->location[$i],
          'hotel_name'=> $request->hotelName[$i],
          'checkin' => $request->checkin[$i],
          'checkout' => $request->checkout[$i],
        ];
        Accomadation::create($hotel);
      }

    }
    if ($request->amount) {
      for ($i = 0; $i < count($request->amount); $i++) {
        $advance = [
          'trip_id' => $tripid,
          'tripid' => $request->tripid,
          'amount' => $request->amount[$i],
          'special_approval' => $request->specialApproval[$i],
          'special_amount' => $request->splAdvance[$i],
        ];
        Advance::create($advance);
      }

    }
    if ($request->network) {
      for ($i = 0; $i < count($request->network); $i++) {
        $connect = [
          'trip_id' => $tripid,
          'tripid' => $request->tripid,
          'international_roaming' => $request->network[$i],
          'mobile_number' => $request->phoneno[$i],
        ];
        Connectivity::create($connect);
      }

    }
    if ($request->currency) {
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
    if ($status == 'pending') {
      toastr()->success('Trip Submitted for Approval');
      return redirect()->route('approver.mytrip');
    } else {
      toastr()->success('Saved your trip');
      return redirect()->route('approver.mysavedtrip');
    }
  }

  public function viewsummary($id)
  {
    // $trip = Trip::find($id)->first();
    $trip = Trip::with(['flight', 'train', 'bus', 'taxi', 'accommodation', 'advance', 'connectivity', 'forex', 'history'])->find($id);

    return view('approver.trip.summary', compact('trip'));

    // return $trip;
  }

  public function OthersDetails()
  {
    $user = auth()->user();
$userlist= UserDetail::select('id','user_id')->where('repostingto', $user->emp_id)->get();
    $trips = Trip::whereIn('user_id', $userlist->pluck('user_id'))->where('user_id', '!=', $user->id)->where('status', '!=', 'draft')->orderBy('id', 'desc')->get();
    return view('approver.trip.alltrip', compact('trips'));
  }

  public function pendingDetails()
  {
    $user = auth()->user();
$userlist= UserDetail::select('id','user_id')->where('repostingto', $user->emp_id)->get();
    $trips = Trip::whereIn('user_id', $userlist->pluck('user_id'))->where('user_id', '!=', $user->id)->where('status', 'pending')->orderBy('id', 'desc')->get();
    return view('approver.trip.pending', compact('trips'));
  }

  public function approvalDetails()
  {
    $user = auth()->user();
$userlist= UserDetail::select('id','user_id')->where('repostingto', $user->emp_id)->get();
    $trips = Trip::whereIn('user_id', $userlist->pluck('user_id'))->where('user_id', '!=', $user->id)->where('status', 'approved')->orderBy('id', 'desc')->get();
    return view('approver.trip.approved', compact('trips'));
  }

  public function rejectDetails()
  {
    $user = auth()->user();
$userlist= UserDetail::select('id','user_id')->where('repostingto', $user->emp_id)->get();
    $trips = Trip::whereIn('user_id', $userlist->pluck('user_id'))->where('user_id', '!=', $user->id)->where('status', 'reject')->orderBy('id', 'desc')->get();
    return view('approver.trip.rejected', compact('trips'));
  }

  public function clarificationDetails()
  {
    $user = auth()->user();
$userlist= UserDetail::select('id','user_id')->where('repostingto', $user->emp_id)->get();
    $trips = Trip::whereIn('user_id', $userlist->pluck('user_id'))->where('user_id', '!=', $user->id)->where('status', 'clarification')->orderBy('id', 'desc')->get();
    return view('approver.trip.clarification', compact('trips'));
  }

  public function tripApproved($id)
  {
    $trip = Trip::find($id)->update(['status' => 'approved']);
    toastr()->success('Trip Request Approved Successfully');
    return back();
  }

  public function tripReject($id)
  {
    $trip = Trip::find($id)->update(['status' => 'reject']);
    toastr()->success('Trip Request Rejected Successfully');
    return back();
  }

  public function remarks(Request $request)
  {
    $trip = Trip::find($request->tripid)->update(['status' => $request->status, 'remarks' => $request->remark]);
    if ($trip) {
      toastr()->success('Remarks Added Successfully');
      return redirect()->route('approver.alltrip');

    } else {
      toastr()->danger('Something Went Wrong');
      return back();
    }

  }

  public function clarification(Request $request)
  {
    $user_id = auth()->user();

    $newRemark = [
      'trip_id' => $request->trip_id,
      'tripid' => $request->tripid,
      'role' => $user_id->role,
      'name' => $user_id->name,
      'remark' => $request->remark,
    ];

    // return $newRemark;

    $history = History::create($newRemark);

    if ($history) {
      $trip = Trip::find($request->trip_id)->update(['status' => 'clarification']);
      toastr()->success('Clarification Remarks Added Successfully');
      return redirect()->route('approver.alltrip');
      // $histories = History::orderBy('created_at','desc')->get();
      // return view('approver.trip.summary', compact('histories')); 

    } else {
      toastr()->danger('Something Went Wrong');
      return back();
    }

  }
  public function draft($id)
  {
    // $trip = Trip::find($id)->first();
    $trip = Trip::with(['flight', 'train', 'bus', 'taxi', 'accommodation', 'advance', 'connectivity', 'forex', 'history'])->find($id);

    return view('approver.trip.draft', compact('trip'));

    //  return ($trip);
  }

  public function storedraft(Request $request, $id)
  {

    if ($request->submit == 'Send for Approval') {
      Trip::find($id)->update(['status' => 'pending']);
      $status = 'pending';
      // return $status;
    } else {
      $status = 'draft';
      // return $status;
    }

    $user_id = auth()->user()->id;

    $tripid = $id;

    if ($request->flightfrom) {
      $flight_id = Flight::where('trip_id', $id)->get();
      if ($flight_id) {
        Flight::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->flightfrom); $i++) {
          $flight = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'origin' => $request->flightfrom[$i],
            'destination' => $request->flightto[$i],
            'trip_class' => $request->flightclass[$i],
            'preferred_date' => $request->flightdate[$i],
            'preferences' => $request->preferences[$i],
          ];
          Flight::create($flight);
          // return $flights;

        }
      } else {

        for ($i = 0; $i < count($request->flightfrom); $i++) {
          $flight = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'origin' => $request->flightfrom[$i],
            'destination' => $request->flightto[$i],
            'trip_class' => $request->flightclass[$i],
            'preferred_date' => $request->flightdate[$i],
            'preferences' => $request->preferences[$i],
          ];
          Flight::create($flight);
          // return $flight;
        }
      }
    }


    if ($request->trainfrom) {
      $train_id = Train::where('trip_id', $id)->get();
      if ($train_id) {
        Train::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->trainfrom); $i++) {
          $train = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'origin' => $request->trainfrom[$i],
            'destination' => $request->trainto[$i],
            'trip_class' => $request->trainclass[$i],
            'preferred_date' => $request->traindate[$i],
            'preferences' => $request->preferences[$i],
          ];
          Train::create($train);
        }

      } else {
        for ($i = 0; $i < count($request->trainfrom); $i++) {
          $train = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'origin' => $request->trainfrom[$i],
            'destination' => $request->trainto[$i],
            'trip_class' => $request->trainclass[$i],
            'preferred_date' => $request->traindate[$i],
            'preferences' => $request->preferences[$i],
          ];
          Train::create($train);
        }
      }
    }


    if ($request->busfrom) {
      $bus_id = Bus::where('trip_id', $id)->get();
      if ($bus_id) {
        Bus::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->busfrom); $i++) {
          $bus = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'origin' => $request->busfrom[$i],
            'destination' => $request->busto[$i],
            'trip_class' => $request->busclass[$i],
            'preferred_date' => $request->busdate[$i],
            'preferences' => $request->preferences[$i],
          ];
          Bus::create($bus);
        }
      } else {
        for ($i = 0; $i < count($request->busfrom); $i++) {
          $bus = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'origin' => $request->busfrom[$i],
            'destination' => $request->busto[$i],
            'trip_class' => $request->busclass[$i],
            'preferred_date' => $request->busdate[$i],
            'preferences' => $request->preferences[$i],
          ];
          Bus::create($bus);
        }
      }
    }


    if ($request->taxifrom) {
      $taxi_id = Taxi::where('trip_id', $id)->get();
      if ($taxi_id) {
        Taxi::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->taxifrom); $i++) {
          $taxi = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'airport_to_hotel' => $request->airportToHotel[$i],
            'hotel_to_company' => $request->hotelToCompany[$i],
            'no_of_days' => $request->noOfDays[$i],
            'class' => $request->tx_class[$i],
            'pick_date' => $request->pickupDate[$i],
            'drop_date' => $request->dropDate[$i],
          ];
          Taxi::create($taxi);
        }

      } else {
        for ($i = 0; $i < count($request->taxifrom); $i++) {
          $taxi = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'airport_to_hotel' => $request->airportToHotel[$i],
            'hotel_to_company' => $request->hotelToCompany[$i],
            'no_of_days' => $request->noOfDays[$i],
            'class' => $request->tx_class[$i],
            'pick_date' => $request->pickupDate[$i],
            'drop_date' => $request->dropDate[$i],
          ];
          Taxi::create($taxi);
        }
      }
    }


    if ($request->location) {
      $hotel_id = Accomadation::where('trip_id', $id)->get();
      if ($hotel_id) {
        Accomadation::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->location); $i++) {
          $hotel = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'location' => $request->location[$i],
            'hotel_name'=> $request->hotelName[$i],
            'checkin' => $request->checkin[$i],
            'checkout' => $request->checkout[$i],
          ];
          Accomadation::create($hotel);
        }

      } else {
        for ($i = 0; $i < count($request->location); $i++) {
          $hotel = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'location' => $request->location[$i],
            'hotel_name'=> $request->hotelName[$i],
            'checkin' => $request->checkin[$i],
            'checkout' => $request->checkout[$i],
          ];
          Accomadation::create($hotel);
        }
      }
    }

    if ($request->amount) {
      $amount_id = Advance::where('trip_id', $id)->get();
      if ($amount_id) {
        Advance::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->amount); $i++) {
          $advance = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'amount' => $request->amount[$i],
            'special_approval' => $request->specialApproval[$i],
            'special_amount' => $request->splAdvance[$i],
          ];
          Advance::create($advance);
        }

      } else {
        for ($i = 0; $i < count($request->amount); $i++) {
          $advance = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'amount' => $request->amount[$i],
            'special_approval' => $request->specialApproval[$i],
            'special_amount' => $request->splAdvance[$i],
          ];
          Advance::create($advance);
        }
      }
    }


    if ($request->network) {
      $network_id = Connectivity::where('trip_id', $id)->get();
      if ($network_id) {
        Connectivity::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->network); $i++) {
          $connect = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'international_roaming' => $request->network[$i],
            'mobile_number' => $request->phoneno[$i],
          ];
          Connectivity::create($connect);
        }

      } else {
        for ($i = 0; $i < count($request->network); $i++) {
          $connect = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'international_roaming' => $request->network[$i],
            'mobile_number' => $request->phoneno[$i],
          ];
          Connectivity::create($connect);
        }
      }
    }


    if ($request->currency) {
      $currency_id = Forex::where('trip_id', $id)->get();
      if ($currency_id) {
        Forex::where('trip_id', $id)->delete();
        for ($i = 0; $i < count($request->currency); $i++) {
          $forex = [
            'trip_id' => $tripid,
            'tripid' => $request->tripid,
            'currency' => $request->currency[$i],
            'amount' => $request->forex_amount[$i],
          ];
          Forex::create($forex);
        }

      } else {
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
    }
    if ($status == 'pending') {
      $user = auth('user')->user();
      Notification::send($user, new NewTripNodification());
      $approvers = User::where('role', 'approver')->get();

      foreach ($approvers as $approver) {
        $approver->notify(new TripAddedNodification($user));
      }
      toastr()->success('Trip Submitted for Approval');
      return redirect()->route('approver.mytrip');
    } else {
      toastr()->success('Saved your trip');
      return redirect()->route('approver.mysavedtrip');
    }
    // return $id;
    
  }

  public function mysavedtrip()
  {
    $user_id = auth()->user()->id;
    $trips = Trip::where('user_id', $user_id)->where('status', '=', 'draft')->orderBy('id', 'desc')->get();
    return view('approver.trip.mysavedtrip', compact('trips'));
  }

}
