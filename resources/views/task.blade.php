@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container space">
        <div class="text">
            <form action=" {{ action ('TaskController@add')}} " method="POST" role="form">
                <input type="hidden" name="_token" value=" {{ csrf_token()}} ">
                <input type="hidden" name="done" value="false">
                <div class="form-inline">
                    <input type="text" name="task" class="col-8" >
                    <input type="date" name="deadline" class="col-2">
                    <button class="btn mx-auto">Dodaj <i class='fas fa-plus-circle'></i></button>
                </div>
            </form>
        </div>
    </div>


    <div>
		<table class="space">
			<tr>
				<th style="width:70%">Zadanie i data</th>
				<th>Dodaj do wykonanych</th>
				<th>Skasuj</th>
            </tr>
            @foreach($users as $user)

                    @foreach($user->tasks as $task)

                    @if($task->done == 'false' && $idd == $task->user_id)

				<tr>
					<td> {{ $task->id }}. {{ $task->task }} - {{ $task->deadline }} </td>
					<td><a href=" {{URL::to('edit/' . $task->id)}} "><button class="btn mx-auto"><i class="fa fa-check"></i></a></button>
					</td>
					<td> <a href=" {{URL::to('delete/' . $task->id)}} "> <button class="btn mx-auto"><i class="fa fa-remove"></i> </a></button>
					</td>
                </tr>
                    @endif
                    @endforeach

            @endforeach

		</table>
    </div>
</div>

@endsection
