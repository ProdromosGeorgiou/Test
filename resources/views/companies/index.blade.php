<!-- This blade shows all the registered companies symbols which are saved in database.
 By selecting the "View Historical Quotes" button you are redirected to show blade.
 Only five records are viewed each time (pagination).
 -->
@extends('main')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4  text-center">All searches of companies symbols appear here!</h1>

            </div>
        </div>
    </div><!-- end of jumbotron container -->


    @csrf
<div class="row">
    <div class="col-md-12">
        @if(count($companies)>0)
    <div class="table-responsive " id="table_data">
        @include('companies.companies_table_only',['companies'=>$companies])
    </div>
        @else
        <h1  class="text-center">
            No records are saved in the database.
        </h1>
        @endif
    </div>
</div>


@endsection

<script>
    $(document).ready(function(){
        $(document).on('click', '.page-link', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_company_symbol(page);
        });

        function fetch_company_symbol(page)
        {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url:"{{ route('company.fetch') }}",
                method:"GET",
                data:{_token:_token, page:page},
                success:function(data) {
                    $('#table_data').html(data);
                }
            });
        }

    });
</script>
