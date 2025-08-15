@push('styles')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush

@if (count($errors) > 0)
    <div class="danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
