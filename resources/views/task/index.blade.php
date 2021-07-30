@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('added'))
        <div class="alert alert-success" role="alert">
            {{ session('added') }}
        </div>
    @elseif(session('deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('undone') }}
        </div>
    @elseif(session('recommend'))
        <div class="alert alert-success" role="alert">
            {{ session('done') }}
        </div>
    @endif

    @if( !$today->isEmpty() )
    <div class="header">Zadania na dzisiaj</div>
    <div class="row justify-content-center ">
        @foreach($today as $task)
            <div class="col-md-3 text-center card">

                <div>
                    <div class="date">{{$task->date}}</div>
                    <img src='/storage/{{$task->importance}}.png' style="max-width: 50%"/>
                </div>
                <div class="description">{{$task->description}}</div>
                <div class="buttons">
                    <a role="button" href="/done/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/done.png')}}" /></a>
                    <a role="button" href="/undone/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/undone.png')}}"/></a>
                </div>
                @if($edit)
                    <a type="button" class="btn btn-danger" href="/delete/{{$task->id}}" style="margin-top: 30px">USUN</a>
                @endif
            </div>

        @endforeach
    </div>
    @endif
    @if( !$notFinished->isEmpty() )
    <div class="header">Zadania niewykonane</div>
    <div class="row justify-content-center ">
        @foreach($notFinished as $task)
            <div class="col-md-3 text-center card">

                <div>
                    <div class="date">{{$task->date}}</div>
                    <img src='/storage/{{$task->importance}}.png' style="max-width: 50%"/>
                </div>
                <div class="description">{{$task->description}}</div>
                <div class="buttons">
                    <a role="button" href="/done/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/done.png')}}" /></a>
                    <a role="button" href="/undone/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/undone.png')}}"/></a>
                </div>
                @if($edit)
                    <a type="button" class="btn btn-danger" href="/delete/{{$task->id}}" style="margin-top: 30px">USUN</a>
                @endif
            </div>
        @endforeach
    </div>
        @endif
    @if( !$finished->isEmpty() )
    <div class="header">Zadania wykonane</div>
    <div class="row justify-content-center ">
        @foreach($finished as $task)
            <div class="col-md-3 text-center card">

                <div>
                    <div class="date">{{$task->date}}</div>
                    <img src='/storage/finished.png' style="max-width: 50%; background: #fff"/>
                </div>
                <div class="description">{{$task->description}}</div>

                <div class="buttons">
                    <a role="button" href="/done/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/done.png')}}" /></a>
                    <a role="button" href="/undone/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/undone.png')}}"/></a>
                </div>
                @if($edit)
                    <a type="button" class="btn btn-danger" href="/delete/{{$task->id}}" style="margin-top: 30px">USUN</a>
                @endif

            </div>
        @endforeach
    </div>
        @endif

        @if( !$future->isEmpty() )
            <div class="header">Przyszłe zadania</div>
            <div class="row justify-content-center ">
                @foreach($future as $task)
                    <div class="col-md-3 text-center card">
                        <div class="date">{{$task->date}}</div>
                        <div><img src='/storage/{{$task->importance}}.png' style="max-width: 50%"/></div>
                        <div class="description">{{$task->description}}</div>
                        <div class="buttons">
                            <a role="button" href="/done/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/done.png')}}" /></a>
                            <a role="button" href="/undone/{{$task->id}}"><img class="btn_action"  src="{{asset('storage/undone.png')}}"/></a>
                        </div>
                        @if($edit)
                            <a type="button" class="btn btn-danger" href="/delete/{{$task->id}}" style="margin-top: 30px">USUN</a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

</div>



@endsection

