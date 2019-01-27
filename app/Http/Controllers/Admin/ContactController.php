<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contact;

class ContactController extends Controller
{
	public function index(){
		$contacts = Contact::all();
		return view('admin.contact.index',compact('contacts',$contacts));
	}

	public function show($id){
		$contact = Contact::find($id);
		return view('admin.contact.show',compact('contact',$contact));
	}
	public function destroy($id){
		Contact::find($id)->delete();

		Toastr::success('Contact message successfully deleted.','Success',["positionClass" => "toast-top-right"]);

		return redirect()->back();
	}
}