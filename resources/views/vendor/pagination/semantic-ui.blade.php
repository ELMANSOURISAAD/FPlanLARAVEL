@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a>
        @else
            <a class="icon item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a>
        @endif

        {{-- Pagination Elements --}}


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a>
        @else
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a>
        @endif
    </div>
@endif
