<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\Claim;
use App\Models\Hmo;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claims= Claim::all();

        return view('claims.index', compact('claims'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
         $hmos = Hmo::all();
     
         return view('claims.create', compact('hmos'));
     }
     

     public function store(Request $request)
{
    $request->validate([
        'hmo_name' => 'required',
        'hmo_type' => 'required',
        'billed_period' => 'required',
        'billed_amount' => 'required',
    ]);

    $hmo = Hmo::where('name', $request->hmo_name)->firstOrFail();

    $billing_period = str_replace('-', '', $request->billed_period);
    $filename = $hmo->name . '_' . $billing_period . '_' . date('YmdHis') . '.' . $request->file('attachment')->getClientOriginalExtension();

    $claim = new Claim([
        'hmo_id' => $hmo->id,
        'hmo_name' => $request->hmo_name,
        'hmo_type' => $request->hmo_type,
        'billed_period' => $request->billed_period,
        'billed_amount' => $request->billed_amount,
        'payment_date' => $request->payment_date,
        'paid_amount' => $request->paid_amount,
        'attachment' => $filename,
        'remark' => $request->remark,
    ]);

    $path = $request->file('attachment')->storeAs('attachments', $filename, 'public');

    $claim->attachment_path = $filename;

    $claim->save();

    return redirect()->route('claims.index')
        ->with('success', 'Claim created successfully.');


    $claim->save();

    return redirect()->route('claims.index')
        ->with('success', 'Claim created successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
        // $attachmentUrl = null;
        // if ($claim->attachment_path) {
        //     $attachmentUrl = Storage::url($claim->attachment_path);
        // }


        $attachmentUrl = url('storage/attachments/' . $claim->attachment_path);

        return view('claims.show', compact('claim', 'attachmentUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Claim $claim)
    {
        $hmo = Hmo::all();

        return view('claims.edit', compact('claim', 'hmo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Claim $claim)
    {
        $request->validate([
            
            'hmo_name' => 'required',
            'hmo_type' => 'required',
            'billed_period' => 'required',
            'billed_amount' => 'required',
            // 'payment_date' => 'required',
            // 'paid_amount' => 'required',
        ]);

        $claim->update($request->all());

        return redirect()->route('claims.index')
        ->with('success', 'Claim updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {
        $claim->delete();

        return redirect()->route('claims.index')
        ->with('success', 'Claim deleted successfully.');
    }


    public function upload(Request $request)
{
    $request->validate([
        'attachment' => 'required|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,gif',
    ]);

    // code to store the uploaded file
}

public function getAttachment($id, $attachment )
{
    $claim = Claim::findOrFail($id);
    $path = storage_path('app/public/attachments/' . $claim->attachment);
    
    if (!File::exists($path)) {
        abort(404);
    }
    
    // $file = File::get($path);
    $file = Storage::disk('public')->get('attachments/' . $filename);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    $response->header("Content-Disposition", "attachment; filename={$claim->attachment}");

    return $response;
    return response()->download($content,$fileName, $headers);
}


// public function getAttachment($attachment)
// {
//     $path = storage_path('app/public/attachments/' . $attachment);

//     if (file_exists($path)) {
//         return response()->download($path);
//     } else {
//         abort(404);
//     }
// }




}
