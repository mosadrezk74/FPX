@extends('site.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('site/css/joinus.css')}}" />
@endsection

@section('contact')
    <section class="join">
    <p>{{trans('site/index.joinus')}}</p>
   </section>


@if(App::getLocale()=='ar')

   <section class="main" dir="rtl">
    <div class="container border p-5 rounded-2">
      <div class="row ">
        <div class="col-xl-6">
          <div class="apply">
            <h1>{{trans('site/index.apply')}}<span> {{trans('site/index.now')}} </span></h1>
            <p>{{trans('site/index.dd')}} </p>
              @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
            <form class="form text-white"  method="post" action="{{route('join.store')}}"  >
             @csrf
              <input type="text" name="name" class="text-white" placeholder="Enter Your Name" required>
              <input type="text" name="country" class="text-white" placeholder="Enter Your Country" required>
              <input type="number" name="phone" class="text-white" placeholder="Enter Your Phone" required>
              <input type="text" name="email"  class="text-white" placeholder="Enter Your Email" required>
              <textarea rows="1" name="descr"   class="text-white"  placeholder="text" required></textarea>


                <button class="applybtn" type="submit">{{trans('site/index.send')}}</button>

             </form>
          </div>
        </div>

        </div>

      </div><!--row-->
    </div>
  </section>
@else
    <section class="main">
        <div class="container border p-5 rounded-2">
            <div class="row ">
                <div class="col-xl-6">
                    <div class="apply">
                        <h1>{{trans('site/index.apply')}}<span> {{trans('site/index.now')}} </span></h1>
                        <p>{{trans('site/index.dd')}} </p>

                        <form class="form text-white"  method="post" action="{{route('join.store')}}"  >
                            @csrf
                            <input type="text" name="name" class="text-white" placeholder="Enter Your Name" required>
                            <input type="text" name="country" class="text-white" placeholder="Enter Your Country" required>
                            <input type="number" name="phone" class="text-white" placeholder="Enter Your Phone" required>
                            <input type="text" name="email"  class="text-white" placeholder="Enter Your Email" required>
                            <textarea rows="1" name="descr"   class="text-white"  placeholder="text" required></textarea>


                            <button class="applybtn" type="submit">{{trans('site/index.send')}}</button>

                        </form>
                    </div>
                </div>

            </div>

        </div><!--row-->
        </div>
    </section>

@endif

@endsection


