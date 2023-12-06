@extends('user.layouts.app')
@section('title')
    {{__('Notifications')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <h5>All Notifications </h5>
                    <hr>
                    @if ($notifications->count() > 0)
                        @foreach ($notifications as $noti)
                            @if ($noti->type == 'App\Notifications\User\NewTripNodification')
                                
                                <a href="{{ $noti->data['url'] }}">
                                <div class="d-flex justify-content-between text-success">
                                    
                                    <div class="content">
                                        <h5><i class="bi bi-check-circle-fill"></i>
                                        {{ $noti->data['title'] }}
                                        </h5>
                                    </div>
                                    <div>{{ $noti->created_at->diffForHumans() }}</div>
                                </div>
                                </a>
                                <hr>
                            @endif
                        @endforeach
                    @else
                        
                    @endif

                </div>
                <div class="rt-pt-12">
                    
                        <nav>
                            {{ $notifications->links() }}
                        </nav>
                    
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->
@endsection