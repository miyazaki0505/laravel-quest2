<h2 class="mt-5 mb-5">users</h2>

<div class="movies row mt-5 text-center">
    
    @foreach ($users as $key => $user)
        @php
            $movie=$user->movies->last();
        @endphp
    
        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
            </div>
            
            <div class="row text-center mt-3">
        @endif
            
            <div class="col-lg-4 mb-5">
                <div class="movie text-left d-inline-block">
                    
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}
                    
                    <div>
                        @if($movie)
                            <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'.$movie->url }}?controls=1&loop=1&playlist={{ $movie->url }}" frameborder="0"></iframe>
                        @else
                            <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"></iframe>
                        @endif
                    </div>
                    
                    <p>
                        @if(isset($movie->comment))
                               {{ $movie->comment }}
                        @endif
                    </p>
                    
                        @include('follow.follow_button', ['user' => $user])

                </div>
            </div>
    @endforeach
</div>

{{ $users->links('pagination::bootstrap-4') }}
