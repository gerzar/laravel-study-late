@if(\Auth::user() && Helpers::isSubscribe($category))

    <button class="btn btn-danger" type="submit" onclick="unsubscribe(this)" data-csrf="{{csrf_token()}}"
            value="{{route('unsubscribe', $category)}}">Unsubscribe
    </button>

@else

    <p>You can subscribe on the category if you want :)</p>

    <button class="btn btn-danger" type="submit" onclick="subscribe(this)" data-csrf="{{csrf_token()}}"
            value="{{route('subscribe', $category)}}">Subscribe
    </button>

@endif



@push('frontend-js')
    <script type="text/javascript" src="{{asset('js/subscribe.js')}}"></script>
@endpush
