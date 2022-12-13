
@if ($paginator->lastPage() != 1)
<div id="paginazione">
    {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} ---

    <!-- Link alla prima pagina -->
    @if (!$paginator->onFirstPage())
    <a href="{{ $paginator->url(1) }}" style="text-decoration: none;">Inizio</a> |
    @else
    Inizio |
    @endif

    <!-- Link alla pagina precedente -->
    @if ($paginator->currentPage() != 1)
    <a href="{{ $paginator->previousPageUrl() }}" style="text-decoration: none;">&lt; Precedente</a> |
    @else
    &lt; Precedente |
    @endif

    <!-- Link alla pagina successiva -->
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" style="text-decoration: none;">Successivo &gt;</a> |
    @else
    Successivo &gt; |
    @endif

    <!-- Link all'ultima pagina -->
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->url($paginator->lastPage()) }}" style="text-decoration: none;">Fine</a>
    @else
    Fine
    @endif
</div>
@endif
