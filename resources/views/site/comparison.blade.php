@extends('site.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('site/css/comparison.css')}}" />
@endsection
@section('contact')
    <section class="players" id="players" style="border-radius: 10px;">
        <div class="playerA  text-white text-center" >
            <img src="{{$player1->photo}}"  style="width: 100px;height: 120px" alt="Player_a" class="players_pic">
            <br>
            <h1>
                {{$player1->name_en}}
            </h1>
        </div>

        <div class="total_matches">
            <img src="{{asset('site/images/comparison/Total Matches.png')}}" alt="total_matches" class="players_pic">
            <br>

            <select name="cars" id="Total_matches" class="matches_input">
                <option value="Total matches">Total matches</option>
                <option value="Total matches">Total matches</option>
                <option value="Total matches">Total matches</option>
                <option value="Total matches">Total matches</option>
            </select>
        </div>

        <div class="playerB text-white text-center">
            <img src="{{$player2->photo}}"  style="width: 100px;height: 120px" alt="Player_a" class="players_pic">
            <br>
            <h1>
                {{$player2->name_en}}
            </h1>
        </div>
    </section>


    <section class="match">
        <div class="name_a"> <img src="{{asset('site/images/comparison/Name A.png')}}" alt="name a" class="name_player"></div>
        <div class="name_b"> <img src="{{asset('site/images/comparison/Name B.png')}}" alt="name b" class="name_player"></div>
    </section>

    <section class="match2">
        <div class="contianner">
            <div class="a">
                <img src="{{asset('site/images/comparison/profile.png')}}" alt=" ">
            </div>

            <div class="b">
                <pre>
                THE SITE:

                Nationality:

                Club:

                Age:
            <pre>

<div style="background-color:#6F6E6E;height: 85px;
margin-top: -21%;">
    <table style="width:100%; ">
        <tr>
          <td>WIN</td>
          <td>DRAW</td>
          <td>LOST</td>
        </tr>
        <tr>
          <th >32</th>
          <td>32</td>
          <td>32</td>
        </tr>
      </table>
</div>
        </div>


    </div>


    <div class="middle">
        <pre><small>20</small>      Started     <small>20</small></pre>
                <pre><small>20</small>     Total Player     <small>20</small></pre>
            </div>

            <div class="last">
                <div class="b">
                    <pre>
                THE SITE:

                Nationality:

                Club:

                Age:
            <pre>

                <div style="background-color:#6F6E6E;     height: 85px;
                margin-top: -30%;">
                    <table style="width:100%; ">
                        <tr>
                          <td>WIN</td>
                          <td>DRAW</td>
                          <td>LOST</td>
                        </tr>
                        <tr>
                          <th >32</th>
                          <td>32</td>
                          <td>31</td>
                        </tr>
                      </table>
                </div>
        </div>

        <div class="c">
            <img src="{{asset('site/images/comparison/profile.png')}}" alt=" ">
        </div>


    </div>



</section>


<!-- circles -->

<section class="contC" style="border-radius: 10px;">
    <section class="circles">
                <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Attempts</div>
          </div>
                <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Shots on
             <br>   Target</div>
          </div>
                <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Goal</div>
          </div>
                <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Shot on Target
              <br>  but saved</div>
          </div>
      </section>
      <section class="circles">
        <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Attempts</div>
          </div>
                <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Shots on
             <br>   Target</div>
          </div>
                <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Goal</div>
          </div>
                <div class="circle-container">
            <div class="circle">3.28</div>
            <div class="text">Shot on Target
              <br>  but saved</div>
          </div>
      </section>


</section>


<!-- circles -->
<!-- heat map -->
<div class="ClassContianer1 " >

    <div class="total-shots" style="border-radius: 10px;">
        <h4 class="mb-4">HeatMap</h4>
        <img src="{{asset('site/images/comparison/analysisPic.png')}}" alt="dataNumberOne" style="    width: 100%;
        height: 85%;">
    </div>

    <div class="score-table" style="border-radius: 10px;">
        <h4 class="noR mb-4 " >Heat Map</h4>
        <img src="{{asset('site/images/comparison/analysisPic.png')}}" alt="dataNumberOne" style="    width: 100%;
        height: 85%;">
    </div>
</div>
<!-- heat map -->


<h2 class="Headers">Assists, Passing, & Chance Creation Stats</h2>


<!-- tables 1 -->
<div class="d-flex justify-content-center align-items-center " style="margin:1% 3%; ">
    <section class="w-100 row d-lg-flex justify-content-lg-evenly justify-content-sm-center px-1 ">
        <div class="table-custom-responsive col-lg-6 col-sm-12  ps-lg-0" >
            <div class="table-container p-4 w-100">
                <table class="table-custom table-standings table-classic " >
                    <thead>
                      <tr>

                        <th style="text-align:left">Assist And passing</th>
                        <th>total</th>
                        <th >per 90 minute </th>
                        <th > percentile</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td ><span> Assist</span></td>
                        <td class="team-inline">
                          4
                        </td>
                        <td>0.28</td>
                        <td >

                          <div class="progress-bar1">
                            <div class="progress1" style="width: 90%"></div>
                            <span class="progress-number1">90%</span>
                          </div>


                        </td>


                      </tr>

                      <tr>
                        <td><span>Expected Assists (xA)</span></td>
                        <td class="team-inline">
                          3.5
                        </td>
                        <td>11.8</td>
                        <td>
                          <div class="progress-bar0">
                            <div class="progress0" style="width: 5%"></div>
                            <span class="progress-number0">0%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Passes</span></td>
                        <td class="team-inline">
                          171
                        </td>
                        <td>8.89</td>
                        <td>
                          <div class="progress-bar0">
                            <div class="progress0" style="width: 15%"></div>
                            <span class="progress-number0">1%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Successful Passes</span></td>
                        <td class="team-inline">
                          128/171
                        </td>
                        <td>0.28</td>
                        <td>
                          <div class="progress-bar1">
                            <div class="progress1" style="width: 90%"></div>
                            <span class="progress-number1">90%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Pass Completion Rate</span></td>
                        <td class="team-inline">
                          74.85%
                        </td>
                        <td>-</td>
                        <td>
                          <div class="progress-bar0">
                            <div class="progress0" style="width: 30%"></div>
                            <span class="progress-number0">19%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Key Passes</span></td>
                        <td class="team-inline">
                          16
                        </td>
                        <td>1.11</td>
                        <td>
                          <div class="progress-bar2">
                            <div class="progress2" style="width: 44%"></div>
                            <span class="progress-number2">30%</span>
                          </div>
                      </td>
                      </tr>

                      <tr>
                          <td><span>Crosses</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                      <tr>
                          <td><span>Successful Crosses</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                      <tr>
                          <td><span>Cross Completion Rate</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                      <tr colspan="2">
                          <td><span>Minutes Per Assist</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                    </tbody>
                  </table>
            </div>
          </div>


          <div class="table-custom-responsive col-lg-6 col-sm-12  pe-lg-0 mt-lg-0 mt-md-2 mt-sm-2 mt-2">
            <div class="table-container p-4 w-100">
                <table class="table-custom table-standings table-classic ">
                    <thead>
                      <tr>

                        <th style="text-align:left">Assist And passing</th>
                        <th>total</th>
                        <th >per 90 minute </th>
                        <th > percentile</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td ><span> Assist</span></td>
                        <td class="team-inline">
                          4
                        </td>
                        <td>0.28</td>
                        <td >

                          <div class="progress-bar1">
                            <div class="progress1" style="width: 90%"></div>
                            <span class="progress-number1">90%</span>
                          </div>


                        </td>


                      </tr>

                      <tr>
                        <td><span>Expected Assists (xA)</span></td>
                        <td class="team-inline">
                          3.5
                        </td>
                        <td>11.8</td>
                        <td>
                          <div class="progress-bar0">
                            <div class="progress0" style="width: 5%"></div>
                            <span class="progress-number0">0%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Passes</span></td>
                        <td class="team-inline">
                          171
                        </td>
                        <td>8.89</td>
                        <td>
                          <div class="progress-bar0">
                            <div class="progress0" style="width: 15%"></div>
                            <span class="progress-number0">1%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Successful Passes</span></td>
                        <td class="team-inline">
                          128/171
                        </td>
                        <td>0.28</td>
                        <td>
                          <div class="progress-bar1">
                            <div class="progress1" style="width: 90%"></div>
                            <span class="progress-number1">90%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Pass Completion Rate</span></td>
                        <td class="team-inline">
                          74.85%
                        </td>
                        <td>-</td>
                        <td>
                          <div class="progress-bar0">
                            <div class="progress0" style="width: 30%"></div>
                            <span class="progress-number0">19%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Key Passes</span></td>
                        <td class="team-inline">
                          16
                        </td>
                        <td>1.11</td>
                        <td>
                          <div class="progress-bar2">
                            <div class="progress2" style="width: 44%"></div>
                            <span class="progress-number2">30%</span>
                          </div>
                      </td>
                      </tr>

                      <tr>
                          <td><span>Crosses</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                      <tr>
                          <td><span>Successful Crosses</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                      <tr>
                          <td><span>Cross Completion Rate</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                      <tr colspan="2">
                          <td><span>Minutes Per Assist</span></td>
                          <td class="team-inline">
                            4
                          </td>
                          <td>0.28</td>
                          <td>
                            <div class="progress-bar1">
                              <div class="progress1" style="width: 90%"></div>
                              <span class="progress-number1">90%</span>
                            </div>
                        </td>

                        </tr>


                    </tbody>
                  </table>
            </div>
          </div>
    </section>
</div>

<!-- end tables 1 -->

<h2 class="Headers">Dribbling & Offside Stats</h2>

<div class="d-flex justify-content-center align-items-center " style="margin:1% 3%; ">
    <section class="w-100 row d-lg-flex justify-content-lg-evenly justify-content-sm-center px-1 ">
        <div class="table-custom-responsive col-lg-6 col-sm-12  ps-lg-0" >
            <div class="table-container p-4 w-100">
                <table class="table-custom table-standings table-classic " >
                    <thead>
                      <tr>

                        <th style="text-align:left">Dribbles & Offsides</th>
                        <th>total</th>
                        <th >per 90 minute </th>
                        <th > percentile</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td ><span> Dribbles</span></td>
                        <td class="team-inline">
                            11
                        </td>
                        <td>0.75</td>
                        <td >

                          <div class="progress-bar4">
                            <div class="progress4" style="width: 35%"></div>
                            <span class="progress-number4">35%</span>
                          </div>


                        </td>


                      </tr>

                      <tr>
                        <td><span>Successful Dribbles</span></td>
                        <td class="team-inline">
                          6
                        </td>
                        <td>0.41</td>
                        <td>
                          <div class="progress-bar4">
                            <div class="progress4" style="width: 35%"></div>
                            <span class="progress-number4">35%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Dribble Success Rate</span></td>
                        <td class="team-inline">
                            54.55%
                        </td>
                        <td>-</td>
                        <td>
                          <div class="progress-bar4">
                            <div class="progress4" style="width: 35%"></div>
                            <span class="progress-number4">35%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Dispossesed</span></td>
                        <td class="team-inline">
                          9
                        </td>
                        <td>0.62</td>
                        <td>
                          <div class="progress-bar2">
                            <div class="progress2" style="width: 53%"></div>
                            <span class="progress-number2">53%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Offsides</span></td>
                        <td class="team-inline">
                          1
                        </td>
                        <td>0.07</td>
                        <td>
                          <div class="progress-bar2">
                            <div class="progress2" style="width: 50%"></div>
                            <span class="progress-number2">50%</span>
                          </div>
                      </td>

                      </tr>

                    </tbody>
                  </table>
            </div>
          </div>


          <div class="table-custom-responsive col-lg-6 col-sm-12  pe-lg-0 mt-lg-0 mt-md-2 mt-sm-2 mt-2">
            <div class="table-container p-4 w-100">
                <table class="table-custom table-standings table-classic " >
                    <thead>
                      <tr>

                        <th style="text-align:left">Dribbles & Offsides</th>
                        <th>total</th>
                        <th >per 90 minute </th>
                        <th > percentile</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td ><span> Dribbles</span></td>
                        <td class="team-inline">
                            11
                        </td>
                        <td>0.75</td>
                        <td >

                          <div class="progress-bar4">
                            <div class="progress4" style="width: 35%"></div>
                            <span class="progress-number4">35%</span>
                          </div>


                        </td>


                      </tr>

                      <tr>
                        <td><span>Successful Dribbles</span></td>
                        <td class="team-inline">
                          6
                        </td>
                        <td>0.41</td>
                        <td>
                          <div class="progress-bar4">
                            <div class="progress4" style="width: 35%"></div>
                            <span class="progress-number4">35%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Dribble Success Rate</span></td>
                        <td class="team-inline">
                            54.55%
                        </td>
                        <td>-</td>
                        <td>
                          <div class="progress-bar4">
                            <div class="progress4" style="width: 35%"></div>
                            <span class="progress-number4">35%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Dispossesed</span></td>
                        <td class="team-inline">
                          9
                        </td>
                        <td>0.62</td>
                        <td>
                          <div class="progress-bar2">
                            <div class="progress2" style="width: 53%"></div>
                            <span class="progress-number2">53%</span>
                          </div>
                      </td>

                      </tr>
                      <tr>
                        <td><span>Offsides</span></td>
                        <td class="team-inline">
                          1
                        </td>
                        <td>0.07</td>
                        <td>
                          <div class="progress-bar2">
                            <div class="progress2" style="width: 50%"></div>
                            <span class="progress-number2">50%</span>
                          </div>
                      </td>

                      </tr>

                    </tbody>
                  </table>
            </div>
          </div>
    </section>
</div>

@endsection
