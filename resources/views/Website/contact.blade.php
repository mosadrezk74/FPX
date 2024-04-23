@extends('Website.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('Website/css/style.css')}}" />
@endsection

@section('contact')

    <section class="contact">
        <h1>contact us</h1>
        <p>We are here to help in anyway we can, just drop us a message or a call.</p>
    </section>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="send-us">
                        <p>send us a message and we'll be in touch as soon as possible</p>
                        <form>

                            <input type="text" name="txt" placeholder="First Name" required="" style="width: 500px;">
                            <input type="text" name="txt" placeholder="Last Name" required="" style="width: 500px;">
                            <input type="email" name="email" placeholder="phone Number" required="" style="width: 500px;">
                            <input type="text" name="txt" placeholder="Email Address" required="" style="width: 500px;">
                            <textarea rows="5" placeholder="How can we help?" required="" style="width: 500px;"></textarea>

                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="get">
                        <h1>get in touch</h1>
                        <p>We’d love to hear from you. our team is always ready to chat.</p>
                        <div class="icons">
                            <i class="fa-solid fa-location-dot">port louis</i>
                            <i class="fa-solid fa-phone">+(230)34589</i>
                            <i class="fa-solid fa-envelope">nafghytj@gamil.com</i>


                        </div>
                    </div>
                </div>

            </div><!--row-->
        </div>
    </section>



@endsection

