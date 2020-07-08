<!--This file shows five records which are stored in database.  -->
@if(isset($companies))
<div class="table-responsive">
    <table class="table table-striped ">
        <tr>
            <th>#</th>
            <th>Company Symbol</th>
            <th>Email</th>
            <th></th>
        </tr>

        @foreach($companies as $key=>$company)
            <tr>
                <td>{{$companies->firstItem()+ $key}}</td>
                <td>{{ $company->Company_Symbol }}</td>
                <td>{{ $company->Email }}</td>
                <td>
                    <a href="{{route('companies.show', $company->id)}}" class="btn btn-primary btn">View Historical Quotes</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $companies->links() !!}
</div>
    @endif

