@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="/store" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row"><div class="header">Dodaj nowe zadanie</div></div>
                    <div class="form-group row">
                        <label for="description" class="col-form-label label">Opis</label>
                        <input  type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" description="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="importance" class="col-form-label label">Priorytet</label>

                        <select class="form-control" name="importance" aria-label="Default select example">
                            <option selected disabled>wybierz</option>
                            <option  value="important">pilny</option>
                            <option  value="normal">normany</option>
                        </select>

                        @error('importance')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                        <div class="row">
                            <div class="label">Data</div>
                        </div>
                        <div class="row">
                            <input type="date" id="date" name="date"
                                   value="{{$date}}"
                                   min="{{$date}}">
                        </div>




                    <div class="row pt-4 float-right">
                        <button class="btn btn-primary">Zapisz</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection
