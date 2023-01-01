@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" style="font-family: 'Josefin Sans';">
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"
                        style="
                    color: #fff3e3 !important;
                    background-color: transparent; !important">
                        << </a>
                </li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                        style="
                    color: #ffb755 !important;
                    background-color: transparent; !important">
                        << </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link"
                                    style="background-color: #ffba5a !important; border-color: #ffba5a !important">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}"
                                    style="
                                color: #ffb755 !important;
                                background-color: transparent; !important">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                        style="
                                color: #ffb755 !important;
                                background-color: transparent; !important"
                        rel="next">>></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link"
                        style="
                    color: #fff3e3 !important;
                    background-color: transparent; !important"
                        href="#">>></a>
                </li>
            @endif
        </ul>
@endif
