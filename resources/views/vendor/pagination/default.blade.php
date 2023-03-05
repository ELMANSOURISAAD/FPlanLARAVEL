<div>
    @if ($paginator->hasPages())
        <nav style="width:100%;display:flex;justify-content:center" role="navigation" aria-label="Pagination Navigation">
            <div style="width:80%;display:flex;justify-content:space-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span><</span>
                @else
                    <button style="border: none;    cursor: pointer; background-color:#FB9300"wire:click="previousPage"  rel="prev" ><</button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button style="border: none;    cursor: pointer; background-color:#FB9300" wire:click="nextPage"  rel="next" >></button>
                @else
                    <span>></span>
                @endif
            </span>
            </div>

        </nav>
    @endif
</div>
