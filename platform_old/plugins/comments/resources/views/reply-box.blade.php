@if ($comments)
    <div id="reply-wrapper">
        @if (count($comments->replies) > 0)
        @foreach($comments->replies as $reply)
                <p>{{ trans('plugins/comments::comments.tables.time') }}: <i>{{ $reply->created_at }}</i></p>
                <p>{{ trans('plugins/comments::comments.tables.content') }}:</p>
                <pre class="message-content">{!! clean($reply->message) !!}</pre>
              
                <div class="table-actions">
                    <a href="{{ url('comment/postReplyDelete', $reply->id) }}" class="btn btn-icon btn-sm btn-danger deletereplay" data-toggle="tooltip" data-section="postReplayDelete" data-ids="{{ $reply->id }}" role="button" data-original-title="Delete">
                      <i class="fa fa-trash"></i>
                    </a>
                </div>
            @endforeach
        @else
            <p>{{ trans('plugins/comments::comments.no_reply') }}</p>
        @endif
    </div>

    <p><button class="btn btn-info answer-trigger-button">{{ trans('plugins/comments::comments.reply') }}</button></p>

    <div class="answer-wrapper">
        <div class="form-group">
            {!! render_editor('message', null, false, ['without-buttons' => true, 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <input type="hidden" value="{{ $comments->id }}" id="input_comments_id">
            <button class="btn btn-success answer-send-button"><i class="fas fa-reply"></i> {{ trans('plugins/comments::comments.send') }}</button>
        </div>
    </div>
@endif
