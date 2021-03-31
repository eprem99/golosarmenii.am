@if ($subscribes)
    <div id="reply-wrapper">
        @if (count($subscribes->replies) > 0)
            @foreach($subscribes->replies as $reply)
                <p>{{ trans('plugins/subscribes::subscribes.tables.time') }}: <i>{{ $reply->created_at }}</i></p>
                <p>{{ trans('plugins/subscribes::subscribes.tables.content') }}:</p>
                <pre class="message-content">{!! clean($reply->message) !!}</pre>
            @endforeach
        @else
            <p>{{ trans('plugins/subscribes::subscribes.no_reply') }}</p>
        @endif
    </div>

    <p><button class="btn btn-info answer-trigger-button">{{ trans('plugins/subscribes::subscribes.reply') }}</button></p>

    <div class="answer-wrapper">
        <div class="form-group">
            {!! render_editor('message', null, false, ['without-buttons' => true, 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <input type="hidden" value="{{ $subscribes->id }}" id="input_subscribes_id">
            <button class="btn btn-success answer-send-button"><i class="fas fa-reply"></i> {{ trans('plugins/subscribes::subscribes.send') }}</button>
        </div>
    </div>
@endif
