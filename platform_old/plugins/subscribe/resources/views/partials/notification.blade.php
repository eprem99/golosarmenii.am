<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
    <a href="javascript:;" class="dropdown-toggle dropdown-header-name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-envelope-open"></i>
        <span class="badge badge-default"> {{ count($subscribe) }} </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li class="external">
            <h3>{!! clean(trans('plugins/subscribe::subscribe.new_msg_notice', ['count' => count($subscribe)])) !!}</h3>
            <a href="{{ route('subscribe.index') }}">{{ trans('plugins/subscribe::subscribe.view_all') }}</a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller data-handle-color="#637283">
                @foreach($subscribe as $subscribe)
                    <li>
                        <a href="{{ route('subscribe.edit', $subscribe->id) }}">
                            <span class="photo">
                                <img src="{{ (new \Botble\Base\Supports\Avatar)->create($subscribe->name)->toBase64() }}" class="rounded-circle" alt="{{ $subscribe->name }}">
                            </span>
                            <span class="subject"><span class="from"> {{ $subscribe->name }} </span><span class="time">{{ Carbon\Carbon::parse($subscribe->created_at)->toDateTimeString() }} </span></span>
                            <span class="message">{{ $subscribe->email }} </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>
