<div class="movies row mt-5 text-center">
    
    @foreach($movies as $key => $movie)
    
        @php
        
        if($movie){
        
            $key_name = config('app.key_name');
            $get_api_url = "https://www.googleapis.com/youtube/v3/videos?id=$movie->url&key=$key_name&part=snippet";
            $json = file_get_contents($get_api_url);
    
            if($json){
                $getData = json_decode( $json , true);
                if($getData['pageInfo']['totalResults']==0){
                    $video_title="※動画が未登録です";  
                }else{
                    $video_title=$getData['items']['0']['snippet']['title'];
                }
            }else{
                $video_title="※一時的な情報制限中です";
            }
            
        }
        
        @endphp
        
        @if($loop->iteration % 3==1 && $loop->iteration !=1)
        
            </div>
                
            <div class="row text-center mt-3">
                    
        @endif
            
        <div class="col-lg-4 mb-5">
       
            <div class="movie text-left d-inline-block">
                    
                <div>
                    @if($movie)
                        <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/' .$movie->url }}?controls=1&loop=1&playlist={{ $movie->url }}" frameborder="0"> </iframe>
                    @else
                        <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"> </iframe>
                        @php
                            $video_title="※動画が未登録です";
                        @endphp
                    @endif
                </div>
                                    
                <p>
                    @if(isset($movie->comment))
                        {{ $movie->comment }}
                    @else
                        {{ $video_title }}
                    @endif
                </p>
                
                @if(Auth::id() == $movie->user_id)
                    {!! Form::open(['route' => ['movies.destroy', $movie->id, 'method' => 'delete']]) !!}
                        {!! Form::submit('この動画を削除する？', ['class' => 'button btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
                
            </div>
        
        </div>

    @endforeach

</div>

{{ $movies -> links('pagination::bootstrap-4') }}
