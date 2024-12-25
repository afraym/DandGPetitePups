<div class="row pt-70">
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="paginations-area">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($items->onFirstPage())
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-arrow-left-short"></i></span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $items->previousPageUrl() }}"><i class="bi bi-arrow-left-short"></i></a></li>
                    @endif

                    @foreach ($items->links()->elements[0] as $page => $url)
                        @if ($page == $items->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($items->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $items->nextPageUrl() }}"><i class="bi bi-arrow-right-short"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-arrow-right-short"></i></span></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>