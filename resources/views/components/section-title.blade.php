@props(['eyebrow' => null, 'title', 'subtitle' => null, 'center' => false, 'light' => false])

<div class="section-title {{ $center ? 'text-center' : '' }} {{ $light ? 'is-light' : '' }}">
    @if($eyebrow)
        <span class="eyebrow">{{ $eyebrow }}</span>
    @endif
    <h2>{{ $title }}</h2>
    @if($subtitle)
        <p class="lead-sm">{{ $subtitle }}</p>
    @endif
</div>