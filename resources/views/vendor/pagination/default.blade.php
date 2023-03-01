@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li  style="text-align:center;" class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span style="width:20px" class="mybutton" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li style="text-align:center;">
                    <a style="width:20px" class="mybutton" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <span style="width:20px" class="mybutton" aria-hidden="true">&lsaquo;</span></a>
                </li>
            @endif



            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li style="text-align:center;">
                    <a style="width:20px" class="mybutton" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span style="width:20px" class="mybutton" aria-hidden="true">&rsaquo;</span></a>
                </li>
            @else
                <li  style="text-align:center;" class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span style="width:20px" class="mybutton" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
