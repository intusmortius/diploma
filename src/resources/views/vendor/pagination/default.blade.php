@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <svg width="12" height="18" viewBox="0 0 12 16" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1.29454 8.40336L8.58267 1.5711C8.93404 1.24168 9.50404 1.24168 9.85542 1.5711L10.7055 2.36809C11.0565 2.69715 11.0569 3.23012 10.707 3.55989L4.93091 8.99996L10.7067 14.4404C11.0569 14.7702 11.0562 15.3031 10.7052 15.6322L9.85504 16.4292C9.50367 16.7586 8.93367 16.7586 8.58229 16.4292L1.29454 9.59657C0.943162 9.26715 0.943162 8.73278 1.29454 8.40336V8.40336Z"
                    fill="#565BBF" />
            </svg>


        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <svg width="12" height="18" viewBox="0 0 12 16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.29454 8.40336L8.58267 1.5711C8.93404 1.24168 9.50404 1.24168 9.85542 1.5711L10.7055 2.36809C11.0565 2.69715 11.0569 3.23012 10.707 3.55989L4.93091 8.99996L10.7067 14.4404C11.0569 14.7702 11.0562 15.3031 10.7052 15.6322L9.85504 16.4292C9.50367 16.7586 8.93367 16.7586 8.58229 16.4292L1.29454 9.59657C0.943162 9.26715 0.943162 8.73278 1.29454 8.40336V8.40336Z" />
                </svg>

            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <svg width="12" height="18" viewBox="0 0 12 16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.7056 9.59666L3.41766 16.429C3.06617 16.7586 2.49632 16.7586 2.14487 16.429L1.29486 15.6321C0.943969 15.3032 0.943294 14.77 1.29336 14.4403L7.06914 9.00003L1.29336 3.55977C0.943294 3.23004 0.943969 2.6969 1.29486 2.36794L2.14487 1.57105C2.49636 1.24153 3.06621 1.24153 3.41766 1.57105L10.7055 8.40343C11.057 8.73291 11.057 9.26714 10.7056 9.59666Z" />
                </svg>

            </a>
        </li>
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <svg width="12" height="18" viewBox="0 0 12 16" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10.7056 9.59666L3.41766 16.429C3.06617 16.7586 2.49632 16.7586 2.14487 16.429L1.29486 15.6321C0.943969 15.3032 0.943294 14.77 1.29336 14.4403L7.06914 9.00003L1.29336 3.55977C0.943294 3.23004 0.943969 2.6969 1.29486 2.36794L2.14487 1.57105C2.49636 1.24153 3.06621 1.24153 3.41766 1.57105L10.7055 8.40343C11.057 8.73291 11.057 9.26714 10.7056 9.59666Z"
                    fill="#656BEA" />
            </svg>


        </li>
        @endif
    </ul>
</nav>
@endif