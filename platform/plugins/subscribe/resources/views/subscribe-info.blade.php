@if ($subscribe)
    <p>{{ trans('plugins/subscribe::subscribe.tables.time') }}: <i>{{ $subscribe->created_at }}</i></p>
    <p>{{ trans('plugins/subscribe::subscribe.tables.full_name') }}: <i>{{ $subscribe->name }}</i></p>
    <p>{{ trans('plugins/subscribe::subscribe.tables.email') }}: <i><a href="mailto:{{ $subscribe->email }}">{{ $subscribe->email }}</a></i></p>
@endif
