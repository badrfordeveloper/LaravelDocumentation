<div class="order-info">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>{{ __('Order') }} #</th>
                <th>{{ __('Date purchased') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Total') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as  $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->render('created_at')}}</td>
                <td>{!!$order->render('status')!!}</td>
                <td>{{$order->render('amount')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="list-all-page">
        <div class="page-number">
            <p>
                {{ __('Displaying') }} {{$orders->count()}} {{ __('sur') }} {{ $orders->total() }} {{ __('Order') }}(s).
            </p>
            {{ $orders->withQueryString()->links() }}
        </div>
    </div>
</div>


