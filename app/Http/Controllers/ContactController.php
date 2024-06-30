<?php

namespace App\Http\Controllers;

use App\Models\tblContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index', [
            'contacts' => tblContact::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function destroy($id)
    {
        $contact = tblContact::find($id);
        $contact->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }


}
