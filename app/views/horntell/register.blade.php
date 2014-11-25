@extends('layouts.public')

@section('title')
Horntell
@stop

@section('content')
<div class="container">
	<div class="row">
		<img src="{{ URL::asset('images/logo.text.color.small.png'); }}" class="img-responsive img-center">
	</div>
	<div class="row">
		<div class="col-md-6 col-xs-10 col-md-offset-3 col-xs-offset-1">
			<section class="panel no-borders">
				{{ Form::open(array('route' => 'store.credentials')) }}
					<section class="panel-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">	
								<div class="form-group">
									{{ Form::label('name', 'Name', ['class' => 'control-label h4 m-b']) }}
									{{ Form::text('name', null, ['class' => 'form-control']) }}
									{{$errors->first('name', '<span class="text-danger">:message</span>')}}
								</div>
								<div class="form-group">
									{{ Form::label('email', 'Email', ['class' => 'control-label h4 m-b']) }}
									{{ Form::text('email', null, ['class' => 'form-control']) }}
									{{$errors->first('email', '<span class="text-danger">:message</span>')}}
								</div>
								<div class="form-group">
									{{ Form::label('phone', 'Phone', ['class' => 'control-label h4 m-b']) }}
									{{ Form::text('phone', null, ['class' => 'form-control']) }}
									{{$errors->first('phone', '<span class="text-danger">:message</span>')}}
								</div>
								<div class="form-group">
									{{ Form::label('type', 'Type', ['class' => 'control-label h4 m-b']) }}
									<span id="mail" class="help-block">
										{{ Form::radio('type', 'investor', true) }}
										Potential Investor
									</span>
									<span id="mail" class="help-block">
										{{ Form::radio('type', 'customer') }}
										Potential Customer
									</span>
									<span id="mail" class="help-block">
										{{ Form::radio('type', 'viewer') }}
										Potential Viewer
									</span>
								</div>
								<div class="form-group">
									{{ Form::label('message', 'Message', ['class' => 'control-label h4 m-b']) }}
									{{ Form::text('message', 'Hola Sarpal Ji!', ['class' => 'form-control']) }}
									{{$errors->first('message', '<span class="text-danger">:message</span>')}}
									<span id="default_text" class="help-block">
										 {{ Form::checkbox('defaule_text', 'Default', true) }}
										 Default Text
									</span>
									<span id="mail" class="help-block">
										{{ Form::checkbox('mail', 'Mail', true) }}
										 Mail Me
									</span>
								</div>
								<div class="form-group">
									{{ Form::submit('Register Me', ['class' => 'btn btn-primary btn-block']) }}
								</div>
							</div>									
						</div>
					</section>
				{{ Form::close() }}				
			</section>						
		</div>
	</div>		
</div>
@stop

<!-- Scripts -->
<script>
window.onload = function () {
    var input = document.querySelector('input[name=\'defaule_text\'][type=checkbox]');

    function check() {
        if (input.checked) {
            var a = "Hello Sarpal Ji";
        } else {
            var a = "";
        }
        document.getElementById('message').value = '' + a;
    }
    input.onchange = check;
}

</script>
