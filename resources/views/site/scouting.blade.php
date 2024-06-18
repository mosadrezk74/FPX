@extends('site.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('site/css/scouting.css')}}" />
@endsection
@section('title')
    {{trans('site/index.scouting')}}
@endsection
@section('contact')
    @if(App::getLocale() == 'ar')

    <div class="heroContent">
            <div class="container">
                <div class="scoutingContent">
                    <h1>اسكاوت كرة القدم</h1>
                    <p>توفر نماذجنا أيضًا خيار تقييم أداء المدربين. ما هي الأنظمة التي استخدموها أكثر خلال مسيرتهم المهنية، وما هي نسب الاستحواذ التي امتلكتها فرقهم، وكيف تصرفوا بشكل هجومي، وكيف أدوا دفاعيًا، بالإضافة إلى الأمور المعقدة.</p>
                    <button class="supmit">استكشف</button>
                </div>
            </div>
    </section>
    <!-- hero -->

    <section class="fil-ters">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="fil-content">
                        <h1>فلتيرات للبحث الأسرع</h1>
                        <p>قم بتحسين بحثك وابحث عن الأندية ذات المراكز المحددة،
                            البلدان والدوريات والمباريات التي تم لعبها.</p>

                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="group-images">
                        <img class="img-fluid" src="{{asset('site/images/scouting/Group 1000005991.png')}}">
                    </div>
                </div>
            </div><!--row-->
        </div>
    </section><!--fil-ters-->

    <section class="overview">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 order-1 order-lg-0">
                    <div class="images">
                        <img class="img-fluid" src="{{asset('site/images/scouting/Group 553.png')}}" />
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 order-0 order-lg-1">
                    <div class="overview-content">
                        <h1>نظرة عامة على الأندية</h1>
                        <p>
                            استكشف البيانات الإحصائية والسيرة الذاتية للمئات
                            الآلاف من الأندية الموجودة في قاعدة البيانات
                        </p>

                    </div>
                </div>
            </div>
            <!--row-->
        </div>
    </section>
    <!--overview-->


    <section class="client">
        <div class="container-fluid">
            <div class="discover-content">
                <h1>اكتشف إمكانات البيانات<span> لكشافة </span>كرة الفدم</h1>
            </div>
            <div class="row px-5">
                <div class="col-12 col-lg-6">
                    <div class="client-image">
                        <img class="img-fluid" src="{{asset('site/images/scouting/Untitled video - Made with Clipchamp 1.png')}}" />

                        <div class="clubs">
                            <div class="clubs-content1">
                                <p>
                                    تعتمد بعض الأندية علينا لتحليل الفريق الذي سيواجهونه كل أسبوع. نقوم بتقييم الأسلوب والمقاييس الهجومية والدفاعية لهؤلاء الخصوم، وكيف يمكن لمهاجميهم المختلفين إيذائهم والعديد من التفاصيل الأخرى التي توفرها البيانات.
                                </p>
                                <img src="{{asset('site/images/scouting/image 61.png')}}" />
                            </div>
                            <!--clubs-content1-->

                            <div class="clubs-content2">
                                <p>
                                    ليس لدينا فقط القدرة على قياس أداء اللاعب. نقوم أيضًا بتحليل مقاييس الفريق. نحن نحدد نقاط قوتهم، ونقاط ضعفهم، وطريقتهم في تحريك الكرة إلى الأمام، ومدى فعاليتهم في الكرات الثابتة أو كيفية تحسين متوسط الدوري الذي يتنافسون فيه. اكتشف قوة تحليل أداء فريق كرة القدم
                                </p>
                                <img src="{{asset('site/images/scouting/image 62.png')}}" />
                            </div>
                            <!--clubs-content2-->
                        </div>
                        <!--clubs-->
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="client-content">
                        <p>
                            يمكن لعملائنا الحصول على معلومات آلية بطريقة مستقلة تمامًا لكل نادي، مع القدرة على تحليل الأداء واستخراج الاتجاهات وأسلوب اللعب والشكل ونقاط القوة والضعف.
                            <span>Footy Prospect X </span>تم تصميمه بحيث يمكن لجميع ملفات تعريف الأقسام توفير الوقت واتخاذ قرارات أفضل.
                        </p>
                        <button class="supmit">استكشف المزيد</button>
                    </div>
                </div>
            </div>
            <!--row-->
        </div>
    </section>
    <!--client-->





    @else
            <div class="heroContent">
                <div class="container">
                    <div class="scoutingContent">
                        <h1>football scouting</h1>
                        <p>Our models also offer the option of evaluating the performance
                            of coaches. What systems have they used most during their
                            careers, what percentages of possession their teams have had,
                            how they have behaved offensively, how they have performed
                            defensively, as well as, complex g</p>
                        <button class="supmit">Discover More</button>
                    </div>
                </div>
                </section>
                <!-- hero -->

                <section class="fil-ters">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="fil-content">
                                    <h1>FILTERS FORFASTER SEARCH</h1>
                                    <p>Refine your search and look for clubs of specific positions,
                                        countries, leagues, and matches played.</p>

                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="group-images">
                                    <img class="img-fluid" src="{{asset('site/images/scouting/Group 1000005991.png')}}">
                                </div>
                            </div>
                        </div><!--row-->
                    </div>
                </section><!--fil-ters-->

                <section class="overview">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 order-1 order-lg-0">
                                <div class="images">
                                    <img class="img-fluid" src="{{asset('site/images/scouting/Group 553.png')}}" />
                                    <div class="circle"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 order-0 order-lg-1">
                                <div class="overview-content">
                                    <h1>OVERVIEW OF THE CLUBS</h1>
                                    <p>
                                        Explore both statistical and biographical data of the hundreds
                                        of thousands of clubs present in the database.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!--row-->
                    </div>
                </section>
                <!--overview-->


                <section class="client">
                    <div class="container-fluid">
                        <div class="discover-content">
                            <h1>Discover the potential of data<span> scout </span>football</h1>
                        </div>
                        <div class="row px-5">
                            <div class="col-12 col-lg-6">
                                <div class="client-image">
                                    <img class="img-fluid" src="{{asset('site/images/scouting/Untitled video - Made with Clipchamp 1.png')}}" />

                                    <div class="clubs">
                                        <div class="clubs-content1">
                                            <p>
                                                Some clubs rely on us to analyze the team they are going to
                                                face every week. We evaluate the style, offensive and
                                                defensive metrics of those opponents, how their different
                                                attackers can hurt them and many other details provided by
                                                the data.
                                            </p>
                                            <img src="{{asset('site/images/scouting/image 61.png')}}" />
                                        </div>
                                        <!--clubs-content1-->

                                        <div class="clubs-content2">
                                            <p>
                                                We not only have the capability to measure a player’s
                                                performance. We also analyze team metrics. We identify what
                                                their strengths are, their weaknesses, their way of moving
                                                the ball forward, how effective they are at set pieces or
                                                how they improve the average of the league they compete in.
                                                Discover the power of soccer team performance analysis
                                            </p>
                                            <img src="{{asset('site/images/scouting/image 62.png')}}" />
                                        </div>
                                        <!--clubs-content2-->
                                    </div>
                                    <!--clubs-->
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="client-content">
                                    <p>
                                        Our clients can obtain automated information in a completely
                                        autonomous way for each club, being able to analyse performance,
                                        extract trends and style of play, form, strengths and
                                        weaknesses.
                                        <span>Footy Prospect X </span>is designed so that all department
                                        profiles can save time and make better decisions.
                                    </p>
                                    <button class="supmit">discover more</button>
                                </div>
                            </div>
                        </div>
                        <!--row-->
                    </div>
                </section>
                <!--client-->





    @endif

    @endsection
