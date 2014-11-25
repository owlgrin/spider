@extends('layouts.public')

@section('title')
Horntell
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="table">
        <table class="table table-striped">
            <thead>
                <tr>
    	            <th>#</th>
    	            <th>Name</th>
    	            <th>Email</th>
    	            <th>Phone</th>
    	            <th>Message</th>
    	            <th>Type</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($guests as $guest)
                    <tr>
                      <td>{{ $guest->id }}</td>
                      <td>{{ $guest->name }}</td>
                      <td>{{ $guest->email }}</td>
                      <td>{{ $guest->phone }}</td>
                      <td>{{ $guest->message }}</td>
                      <td>{{ $guest->type }}</td>
                    </tr>
    			@endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@stop

