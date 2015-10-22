@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Reviews</div>
                <div class="panel-body">

                    @if( count($reviews)>0 )

                        @foreach($reviews as $review)

                            {{ $review->content }}

                            @if(isAdmin())

                                <br><br>

                                @if($review->status==0)

                                <span class="btn btn-primary btn-xs">NEW</span>

                                <a class="btn btn-success btn-xs" href="/reviews/{{ $review->id }}/approve">Approve</a>

                                @endif

                                <a class="btn btn-danger btn-xs" href="/reviews/{{ $review->id }}/delete" onclick="return confirm('Are you sure wants to delete this Review?')">Delete</a>

                            @endif    

                            <hr>

                        @endforeach

                    @else
                    
                        No new reviews found

                    @endif    

                    {!! $reviews->render() !!}

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <a href="/reviews/create" class="btn btn-success"> Add Review </a>

        </div>
    </div>
</div>

@endsection