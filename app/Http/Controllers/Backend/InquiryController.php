<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Contact::orderBy('created_at', 'desc')->get();
        return view('backend.inquiry.index',compact('inquiries'));
    }


    public function destroy(Request $request, $id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->route('admin.inquiry.index')->with('success', 'Inquiry deleted successfully.');
    }
}
