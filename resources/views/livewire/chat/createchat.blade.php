
    <div class="row row-sm">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content border-left border-bottom border-right border-top p-4">
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table text-md-nowrap text-center" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center" >{{trans('player.photo_player')}}</th>
                                        <th  class="text-center">{{trans('player.name')}}</th>
                                        <th class="text-center" >{{trans('index.process')}}</th>
                                        <th class="text-center" >{{trans('index.process')}}</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $player)
                                        <tr>
                                            <th >{{$loop->iteration}}</th>
                                            <td style="width:50px" >
                                                <img  alt="image" src="{{ asset('uploads/players/'. $player->photo) }}" />
                                            </td>
                                            <td>
                                                <a   style="font-size: 15px ;" href="{{route('stats.show',$player->id)}}">
                                                    @if(App::getLocale() == 'ar')
                                                        {{$player->name_ar}}
                                                    @else
                                                        {{$player->name_en}}
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success" wire:click="ff">{{trans('index.chat')}}</button>
                                            </td>
                                            <td>
                                                <div class="NNN">
                                                    <a href="{{route('stats.show',$player->id)}}"  class="btn btn-sm btn-success">{{trans('index.view')}}</a>
                                                    <a href="{{route('stats.print',$player->id)}}" class="btn btn-primary btn-sm" target="_blank" title="طباعه احصائيات لاعب">{{trans('index.print')}}</a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


