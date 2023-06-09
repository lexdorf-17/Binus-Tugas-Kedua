<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller {

    public function create() {
        // Show the form to create a new record
        return view('master.create');
    }

    public function store(Request $request) {
        // Validate the request data
        $validatedData = $request->validate(['name' => 'required', 'qty' => 'required|integer', 'price' => 'required|numeric', ]);
        // Insert a new record into the database
        DB::table('products')->insert(['name' => $validatedData['name'], 'qty' => $validatedData['qty'], 'price' => $validatedData['price'], ]);
        // Redirect to the index page or show a success message
        return redirect()->route('master.index')->with('success', 'Record created successfully.');
    }

    public function index() {
        // Fetch all records from the database
        $records = DB::table('products')->get();
        // Pass the records to a view
        return view('master.index', ['records' => $records]);
    }

    public function edit($id) {
        // Fetch the record with the given ID from the database
        $record = DB::table('products')->where('id', $id)->first();
        // Show the form to edit the record
        return view('master.edit', ['record' => $record]);
    }

    public function update(Request $request, $id) {
        // Validate the request data
        $validatedData = $request->validate(['name' => 'required', 'qty' => 'required|integer', 'price' => 'required|numeric', ]);
        // Update the record in the database
        DB::table('products')->where('id', $id)->update(['name' => $validatedData['name'], 'qty' => $validatedData['qty'], 'price' => $validatedData['price'], ]);
        // Redirect to the index page or show a success message
        return redirect()->route('master.index')->with('success', 'Record updated successfully.');   
    }

    public function destroy($id) {
        // Delete the record from the database
        DB::table('products')->where('id', $id)->delete();
        // Redirect to the index page or show a success message
        return redirect()->route('master.index')->with('success', 'Record deleted successfully.');
    }
}
