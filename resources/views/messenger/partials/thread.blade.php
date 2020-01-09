<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

{{-- {{ dump($thread->latestMessage->user->profile->display_name) }} --}}

{{-- <div class="media alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
    <p>
        {{ $thread->latestMessage->body }}
    </p>
    <p>
        <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>
    </p>
    <p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
</div> --}}

{{-- <tr class="alert {{ $class }}">
    <td>{{ $thread->participantsString(Auth::id()) }}</td>
    <td><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->latestMessage->body }}</a></td>
</tr> --}}


{{-- <li class="p-2 {{ $class }}" style="border-bottom: 1px solid #e0e0e0;">
    <a href="{{ route('messages.show', $thread->id) }}" class="d-flex justify-content-between">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1" width="45">

        <div class="text-small flex-grow-1">
            <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
            <strong>{{ $thread->participantsString(Auth::id()) }}</strong>
            <p class="last-message text-muted">{{ $thread->latestMessage->user->profile->display_name }}:: {{ $thread->latestMessage->body }}</p>
        </div>

        <div class="chat-footer">
            <p class="text-smaller text-muted mb-0">{{ @$thread->latestMessage->created_at->diffForHumans() }}</p>
            @if( $thread->userUnreadMessagesCount(Auth::id()) )
            <span class="badge badge-danger float-right">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>
            @endif
        </div>
    </a>
</li> --}}

<tr>
    <td>{{ $thread->updated_at }}</td>
    <td><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a></td>
    <td>
        @php
            $participant = get_messenger_participant($thread->id)
        @endphp
        <div class="chip">
            <img src="{{ @Imgur::size($participant->imgur, 's') }}" alt="{{ $participant->display_name }}"> {{ $participant->display_name }}
        </div>
    </td>
</tr>