<div class="ui buttons buttons-votee {{ array_get($options, 'size') }}">
    <button id="button-like"
            data-url="{{ route('votee.up') }}"
            data-id="{{ $content['id'] }}"
            data-type="{{ get_class($content) }}"
            class="ui button button-vote button-vote-up grey {{ array_get($options, 'class') }} {{ ($vote && $vote['is_up']) ? 'green' : '' }}">
        <i class="icon thumbs outline up"></i>
        <span class="total-up"> {{ $content['vote_up'] }}</span>
    </button>
    <button id="button-dislike"
            data-url="{{ route('votee.down') }}"
            data-id="{{ $content['id'] }}"
            data-type="{{ get_class($content) }}"
            class="ui button button-vote button-vote-down grey {{ array_get($options, 'class') }} {{ ($vote && $vote['is_down']) ? 'red' : '' }}">
        <i class="icon thumbs outline down"></i>
        <span class="total-down"> {{ $content['vote_down'] }}</span>
    </button>
</div>
