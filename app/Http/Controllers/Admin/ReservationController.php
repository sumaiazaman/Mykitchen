<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\ReservationConfirmed;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
	public function index(){
		$reservations = Reservation::all();
		return view('admin.reservation.index',compact('reservations',$reservations));
	}

	public function status($id){
		$reservation = Reservation::find($id);
		$reservation->status = true;
		$reservation->save();

		Notification::route('mail', $reservation->emails)
            ->notify(new ReservationConfirmed());
		
		Toastr::success('Reservation successfully.confirmed','Success',["positionClass" => "toast-top-right"]);	

		return redirect()->back();
	}

	public function destroy($id){
		Reservation::find($id)->delete();
		Toastr::success('Reservation deleted successfully.','Success',["positionClass" => "toast-top-right"]);	
		return redirect()->back();

	}
}
