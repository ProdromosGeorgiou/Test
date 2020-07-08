<!-- All the details of a certain article appear here-->
@extends('main')

@section('content')

    @if(count($errors)>0)
        <div class="alert alert-danger">
            <strong> Errors:</strong>
            <ul>
                @foreach($errors as $error)
                    <li>{{$error->all()}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <h1 style="padding-top:25px; color: #051D4D;" >Details of selected Company Symbol and Dates</h1>
    <div class="row pt-4 pb-4">

        <div class="col-md-12">
            <div class ="heading"><span>Company Symbol:</span> {{$company->Company_Symbol}}</div>
            <hr>
            <div class ="heading"><span>Email:</span> {{$company->Email}}</div>
            <hr>
            <div class ="heading"><span>Start Date:</span> {{$company->Start_Date}}</div>
            <hr>
            <div class ="heading"><span>End Date:</span>{{$company->End_Date}}</div>
            <hr>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-12">
            <h1 style="color: #051D4D;">Historical Quotes between {{$company->Start_Date}} to {{$company->End_Date}}</h1>

            @if(count($data['prices']) > 0 )
            <table class="table table-responsive pt-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Open</th>
                    <th>High</th>
                    <th>Low</th>
                    <th>Close</th>
                    <th>Volume</th>
                    <th>Adjclose</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data['prices'] as $key=>$quotes)

                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{gmdate("Y-m-d", $quotes['date'])}} </td>
                        <td>{{$quotes['open']}}</td>
                        <td>{{$quotes['high']}}</td>
                        <td>{{$quotes['low']}}</td>
                        <td>{{$quotes['close']}}</td>
                        <td>{{$quotes['volume']}}</td>
                        <td>{{$quotes['adjclose']}}</td>
                    </tr>
                @endforeach
                </tbody>


            </table>
                @else
            <h5 class="text-center pt-4">No historical quotes to display by specific dates and company symbol chosen.</h5>
                @endif

        </div>
    </div>






@endsection
