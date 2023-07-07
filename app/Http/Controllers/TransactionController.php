<?php
    
namespace App\Http\Controllers;
    
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:transaction-list', ['only' => ['index','show']]);
         $this->middleware('permission:transaction-create', ['only' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->paginate(5);
        return view('transactions.index',compact('transactions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

     /**
     * Display a report.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $transactions = Transaction::select('product_name', DB::raw('SUM(qty) as total_qty'), DB::raw('SUM(sell_price-base_price) as margin'))
        ->groupBy('product_name')
        ->latest()
        ->paginate(50);
        return view('transactions.report',compact('transactions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('transactions.create',compact('products'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'qty' => 'required|numeric',
            'base_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'sub_total' => 'required|numeric',
            'tax' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        Transaction::create($request->all());

        // Update product quantity
        $product = Product::find($request->product_id);
        if ($product) {
            $product->qty -= $request->qty;
            $product->save();
        }
    
        return redirect()->route('transactions.index')
                        ->with('success','Transaction created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $product)
    {
        return view('transactions.show',compact('transaction'));
    }
}