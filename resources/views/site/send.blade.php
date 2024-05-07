@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('site/css/send.css')}}" />
@endsection
@section('contact')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form class="form" action="{{route('send.store')}}" method="post" >
      @csrf
        <input
        type="text"
        name="send"
        placeholder="{{trans('site/index.sendt')}}"
        required

      />
      <input
        type="text"
        name="email"
        placeholder="{{trans('site/index.email')}}"
        required

      />
      <button class="supmit" type="submit" style="width: 300px">{{trans('site/index.send')}}</button>
    </form>

@endsection
