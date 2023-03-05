@if ($paginator->hasPages())
    <nav style="width: 100%;">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span><</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="mybutton" href="{{ $paginator->nextPageUrl() }}" rel="next">></a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>></span></li>
            @endif
        </ul>
    </nav>
@endif
