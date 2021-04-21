<?php

namespace App\Http\Controllers;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Sms;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $smses=Sms::all();
        return view('sms.index', compact('smses'));
    }

      public function sendSMS($smses,$message)
  {

    $username = 'hotlunch'; // use 'sandbox' for development in the test environment
    $apiKey   = 'f00081c7d5230a82b19fded9e16cd5c3ae73df8196ede611cd3694fc6141d4d6'; // use your sandbox app API key for development in the test environment
    $AT       = new AfricasTalking($username, $apiKey); //
    $sms      = $AT->sms();
    $result   = $sms->send([
        'to'      => $smses->contact,
        'from'    =>'HOTLUNCH',
        'message' => $message
    ]);
    
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request)
    {
        //

        $input=$request->all();
         $smses=Sms::create($input);
         $smses->contact;
         $message=$smses->sms;
        $this->sendSMS($smses,$message);
        return redirect('/sms');

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
