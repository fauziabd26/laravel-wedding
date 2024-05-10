<div style=" height: 500px; overflow: auto;">
    @foreach ($wish as $item)
    <div class="alert-box alert-box--notice">
        @if ($item->hadir == 'true')
        <span><b>{{ $item->name }} (Hadir)</span></b>
        @else
        <span><b>{{ $item->name }} (Berhalangan)</span></b>
        @endif
        <br>
        <span>{{ $item->comment }}</span>
    </div>
    @endforeach
</div>