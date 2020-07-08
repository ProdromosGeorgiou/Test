<!-- Create New Company form.  Displays the appropriate messages when wrong input is given.
If the input is validated you are redirected to the show blade to view the historical quotes
of the selected company symbol and dates.
 -->
@extends('main')

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <h1 class="text-center">Insert Data</h1>
            <hr class="my-4">

            {!! Form::open(array('url' => route('companies.store'), 'id'=>'parsley-form')) !!}

            <div class="form-group">
                <label name = "Email">Email:</label>
                <input id="Email" name="Email" class="form-control" placeholder="Email.." value="{{old('Email')}}" required data-parsley-type="email" data-parsley-trigger="keyup">
            </div>

            @if($errors->has('Email'))
                <p class="help is-danger" style="color:red;">{{$errors->first('Email')}}</p>
            @endif

            <div class="form-group">
                <label name = "Company_Symbol">Company Symbol:</label>
{{--                <input id="Company_Symbol" name="Company_Symbol" class="form-control" placeholder="Company_Symbol.." value="{{old('Company_Symbol')}}" required>--}}
                <select class="form-control select2-multi" name = "Company_Symbol">

                    @foreach($data as $symbol)
                        <option value="{{$symbol['Symbol']}}">{{$symbol['Symbol']}}</option>
                    @endforeach

                </select>

            </div>

            @if($errors->has('Company_Symbol'))
                <p class="help is-danger" style="color:red;">{{$errors->first('Company_Symbol')}}</p>
            @endif

            <div class="form-group">
                <label name = "Start_Date">Start Date:</label>

                <input  id="Start_Date" name="Start_Date" class="form-control date" value="{{old('Start_Date')}}" required>
            </div>

            @if($errors->has('Start_Date'))
                <p class="help is-danger" style="color:red;">{{$errors->first('Start_Date')}}</p>
            @endif

            <div class="form-group">
                <label name = "End_Date">End Date:</label>
                <input  id="End_Date" name="End_Date" class="form-control date" value="{{old('End_Date')}}" required>
            </div>

            @if($errors->has('End_Date'))
                <p class="help is-danger" style="color:red;">{{$errors->first('End_Date')}}</p>
            @endif


            {{Form::submit('Submit', ['class' => 'btn btn-lg btn-success'])}}


        </div>

    </div>


@endsection

@push('js')

    <script type="text/javascript">

        $('#parsley-form').parsley();

        $('.date').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            changeYear: true,
            todayHighlight: true
        });

        $('.select2-multi').select2();


    </script>
@endpush
