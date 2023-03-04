<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="mybutton">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage"  rel="prev" class="mybutton">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage"  rel="next" class="mybutton">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="mybutton">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
