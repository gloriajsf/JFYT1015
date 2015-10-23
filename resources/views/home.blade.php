@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">      
                <form method="POST" action="/show">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Site names seperated by new line</label>
                            <div class="col-md-6">
                                <textarea cols="60" rows="10" name="content" class="form-control">{{ old('content') }}</textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" value="See Site Rank">
                        </div>
                    </div>
                </form>
                       
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Results</div>
                <div class="panel-body">
                   @if( count($siteWithRank)>0 )

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Site</th>
                                <th>Rank</th>
                            </th>
                        </thead>
                        <tbody>
                            @foreach($siteWithRank as $site)
                                <tr>
                                    <td>{{ $site->name }}</td>
                                    <td>{{ $site->rank }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif 
                       
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        @if($adminUser)
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                    <form method="POST" action="/create">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Site name</label>
                            <div class="col-md-6">
                                <input type='text' name="sitename" class="form-control">{{ old('siteName') }}</input>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Site rank</label>
                            <div class="col-md-6">
                                <input type='text' name="siterank" class="form-control">{{ old('siteRank') }}</input>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="Add">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection