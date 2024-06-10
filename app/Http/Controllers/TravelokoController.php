<?php

namespace App\Http\Controllers;

use App\Models\traveloko;
use App\Http\Requests\StoretravelokoRequest;
use App\Http\Requests\UpdatetravelokoRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Reserve;
use Carbon\Carbon;

class TravelokoController extends Controller
{
    
 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'seatNumber' => 'required|integer',
        ]);
    
        // Create a new customer
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->number = $request->phone;
        $customer->save();
    
        // Create a new booking
        
        $customer->bookings()->create([
            'travel_id' => $request->travel_id,
            'seat' => $request->seatNumber,
            'email' => $request->email,
            'booking_uniqid' => uniqid(),
            'kode_perjalanan' => $request->kode_perjalanan
        ]);
        $info = Booking::all();

        // Redirect to a success page
        return view('jadwal', ['info'=> $info, 'travel_info'=>$request, 'info_customer'=>$customer] );
    }
    

    /**
     * Display the specified resource.
     */
    public function show($kode_perjalanan)
{
    $travel = Traveloko::where('kode_perjalanan', $kode_perjalanan)->first();
    $passengers = session('passengers'); // Retrieve the number of passengers from the session
    return view('beli', compact('travel', 'passengers'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(traveloko $traveloko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetravelokoRequest $request, traveloko $traveloko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(traveloko $traveloko)
    {
        //
    }

    public function showTravels()
    {
        $travels = Traveloko::all();
        return view('admin', compact('travels'));
    }
    

public function createTravel(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'kendaraan' => 'required|string',
        'asal' => 'required|string',
        'tujuan' => 'required|string',
        'lokasi' => 'required|string',
        'tgl' => 'required|date',
        'waktu' => 'required|date_format:H:i',
        'harga' => 'required|integer',
    ]);

    // Convert time to datetime
    $date = $validatedData['tgl'];
    $time = $validatedData['waktu'];
    $datetime = Carbon::parse($date . ' ' . $time);

    // Create a new travel item using the validated data
    $travel = Traveloko::create([
        'kode_perjalanan' => uniqid(), // Assume kode_perjalanan is a unique ID
        'kendaraan' => $validatedData['kendaraan'],
        'asal' => $validatedData['asal'],
        'tujuan' => $validatedData['tujuan'],
        'tgl' => $date,
        'waktu' => $datetime,
        'harga' => $validatedData['harga'],
        'max_capacity' => 50, // Assume default max_capacity
        'status' => 'active', // Default status
    ]);

    // Return a response indicating success or failure
    return redirect('/admin');
}



public function search(Request $request)
{
    // Validate the request data
    $request->validate([
        'asal' => 'required',
        'tujuan' => 'required',
    ]);

    if ($request->has(['date', 'passengers'])) {
        $request->validate([
            'date' => 'date',
            'passengers' => 'integer|min:1'
        ]);
    }

    // Get the request data
    $asal = $request->input('asal');
    $tujuan = $request->input('tujuan');

    // Query the database
    $query = Traveloko::where('asal', $asal)
        ->where('tujuan', $tujuan);

    if ($request->has('date')) {
        $date = $request->input('date');
        $query = $query->whereDate('tgl', $date);
    }

    if ($request->has('passengers')) {
        $passengers = $request->input('passengers');
        $query = $query->where('max_capacity', '>=', $passengers);
        session(['passengers' => $passengers]);
    }

    $results = $query->get();

    // Return the results
    return view('Info', ['travelokos' => $results], ['detail' => $request]);
}


}
