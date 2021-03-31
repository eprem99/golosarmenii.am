<section class="block-breakcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
    <span>
        @foreach ($crumbs = Theme::breadcrumb()->getCrumbs() as $i => $crumb)
            @if ($i != (count($crumbs) - 1))
                <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="{{ $crumb['url'] }}" itemprop="item" title="{{ $crumb['label'] }}">
                        {{ $crumb['label'] }}
                        <meta itemprop="name" content="{{ $crumb['label'] }}" />
                    </a>
                    <meta itemprop="position" content="{{ $i + 1}}" />
                </span> /
            @else
                <span class="breadcrumb_last" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    {!! $crumb['label'] !!}
                    <meta itemprop="name" content="{{ $crumb['label'] }}" />
                    <meta itemprop="position" content="{{ $i + 1}}" />
                </span>
            @endif
        @endforeach
    </span>
</section>
