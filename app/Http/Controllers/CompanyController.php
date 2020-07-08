<?php

namespace App\Http\Controllers;

use App\Company;
use Session;
use DateTime;

use App\Http\Requests\StoreCompanyBlogPost;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * Paginate each time 5 entries.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);

        return view('companies.index' , ['companies' => $companies]);
    }

    /**
     * If request exists, paginate the next five entries of the companies table
     * and render them.
     * @return mixed
     */
    public function fetch(Request $request)
    {
        if($request->ajax())
        {
            $companies = Company::simplePaginate(5);
            return view('companies_table_only', ['companies'=>$companies])->render();
        }
    }


    /**
     * Show the form for creating a new resource.
     * Get all the symbols from the json file. and
     * display on the form input.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new \GuzzleHttp\Client();

        $resp = $client->request('GET','https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json');
        $data = $resp->getBody()->getContents();
        $data = json_decode($data,true);

        return view('companies.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     * Save the data in the database if validated.
     * Display success or error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyBlogPost $request)
    {
        $validated = $request->validated();

        if($validated){
            $company = Company::Create([
                'Email'=>$validated['Email'],
                'Company_Symbol' => $validated['Company_Symbol'],
                'Start_Date' => date('Y-m-d',strtotime($validated['Start_Date'])),
                'End_Date' => date('Y-m-d',strtotime($validated['End_Date'])),
            ]);
            $company->save();

            return redirect()->route('companies.show', $company->id)->withToastSuccess('Successfuly Saved Data!');
        } else{
            return redirect('companies/create')->withToastError('Wrong company symbol!');
        }
    }

    /**
     * Display the specified resource.
     * Show the details of the selected company symbol.
     * Get the historical quotes from the API considering
     * the given dates and company symbol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        $response = \Unirest\Request::get("https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-historical-data?frequency=1d&filter=history&period1=" .strtotime($company->Start_Date). "&period2=".strtotime($company->End_Date)."&symbol=" . $company->Company_Symbol,
            array(
                "X-RapidAPI-Host" => "apidojo-yahoo-finance-v1.p.rapidapi.com",
                "X-RapidAPI-Key" => "8cd37d3466msh60d404ce15090f5p1dd221jsna1a1ef18831d"
            )
        );

        $data = json_decode($response->raw_body, true);

        return view('companies.show',['company'=>$company , 'data' => $data]);
    }

}
