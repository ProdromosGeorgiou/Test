<!-- This blade shows all searches of the form.
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


{{--@csrf--}}
<div class="row">
    <div class="col-md-12">
        @if(count($companies)>0)
    <div id="table_data">
        @include('companies.companies_table_only',['companies'=>$companies])
    </div>
        @else
        <h1  class="text-center">No records are saved in the database.</h1>
        @endif
    </div>
</div>


@endsection

@push('js')

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split("page=")[1];
            console.log($(this).attr('href'));
            fetch_company_symbol(page);
        });

        function fetch_company_symbol(page)
        {
            $.ajax({
                url: "/pagination/fetch_data?page=" +page,
                success:function(data) {
                    $('#table_data').html(data);
                },
                fail:function(){
                    console.log('failed to load data.')
                }
            });
        }

    });
</script>
    @endpush
