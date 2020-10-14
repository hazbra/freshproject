@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                    <ul>
                        @forelse($notifications as $notification)
                            <li>
                                @if ($notification->type === 'App\Notifications\PaymentReceived')
                                    We have received a payment of {{ $notification->data['amount'] }}
                                @endif
                            </li>

                        @empty
                            <li>You hav no unread notifications at this time</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
