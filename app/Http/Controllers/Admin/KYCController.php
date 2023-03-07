<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\KYCDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\DriverExtended;
use App\Models\User;
use Illuminate\Http\Request;

class KYCController extends Controller
{
    public function index(KYCDataTable $KYCDataTable)
    {
        return $KYCDataTable->render('admin.kyc_customers.index');
    }


    public function verify(Request $request, $id)
    {

        $input = $request->all();

        $verify = DriverExtended::find($id);
        $users = User::where('id', $verify->user_id)->first();
        if ($request->document == 'aadhar_card') {
            $input['aadhar_card_status'] = 1;
            $input['aadhar_card_reject_reason'] = null;
            $verify->update($input);

        } else if ($request->document == 'pan_card') {
            $input['pancard_status'] = 1;
            $input['pancard_reject_reason'] = null;
            $verify->update($input);

        } else if ($request->document == 'driving_licence') {
            $input['license_status'] = 1;
            $input['driving_licence_reject_reason'] = null;
            $verify->update($input);

        } else if ($request->document == 'light_bill') {
            $input['light_bill_status'] = 1;
            $input['light_bill_reject_reason'] = null;
            $verify->update($input);
        }
        $verify_doc = DriverExtended::where('id', $request->id)->where('aadhar_card_status', 1)->where('pancard_status', 1)->where('license_status', 1)->where('light_bill_status', 1)->first();
        if (!empty($verify_doc)) {
            $verify_kyc['is_doc_verified'] = 1;
            $users->update($verify_kyc);
        }

        return redirect()->back()->with('success', 'Document Approve SuccessFully!...');

    }


    public function un_verify(Request $request, $id)
    {
//        dd($request->hide);
        $input = $request->all();

        $un_verify = DriverExtended::find($id);
        $users = User::where('id', $un_verify->user_id)->first();
        if ($request->hide == 'aadhar_card') {
            $input['aadhar_card_status'] = 0;
            $input['aadhar_card_reject_reason'] = $request->rejected_resoan;
            $un_verify->update($input);

        } else if ($request->hide == 'pan_card') {
            $input['pancard_status'] = 0;
            $input['pancard_reject_reason'] = $request->rejected_resoan;
            $un_verify->update($input);

        } else if ($request->hide == 'driving_licence') {
            $input['license_status'] = 0;
            $input['driving_licence_reject_reason'] = $request->rejected_resoan;
            $un_verify->update($input);

        } else if ($request->hide == 'light_bill') {
            $input['light_bill_status'] = 0;
            $input['light_bill_reject_reason'] = $request->rejected_resoan;
            $un_verify->update($input);

        }
        $un_verify_doc = DriverExtended::where('id', $request->id)->orWhere('aadhar_card_status', 0)->orWhere('pancard_status', 0)->orWhere('license_status', 0)->orWhere('light_bill_status', 0)->first();
        if (!empty($un_verify_doc)) {
            $verify_kyc['is_doc_verified'] = 0;
            $users->update($verify_kyc);
        }
        return redirect()->back()->with('danger', 'Document Rejected SuccessFully!...');

    }
}
