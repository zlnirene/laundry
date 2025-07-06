@if ($paginator->hasPages())
    <div>
        <div class="text-[16px] border-navy *:border-navy border-[2px] rounded-[10px] flex items-center *:first:rounded-l-[8px] *:last:rounded-r-[8px] *:bg-nav text-dark w-fit *h-full *py-[3px] *:px-[12px] *:hover:text-nav *:hover:bg-dark *:transition-all *:duration-300 divide-x-[2px]">
            @if ($paginator->onFirstPage())
                <div class="!text-navy hover:!bg-nav hover:!text-blue" ><i class="fa-solid fa-chevron-left"></i></div>
                @else
                <a onclick="search_data({{ $paginator->currentPage() - 1 }})" href="javascript:void(0)" ><i class="fa-solid fa-chevron-left"></i></a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <div class="">{{ $element }}</div>
                @endif
                
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="text-navy hover:!bg-nav hover:!text-navy">{{ $page }}</div>
                        @else
                            <a onclick="search_data({{ $page }})" href="javascript:void(0)">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a onclick="search_data({{ $paginator->currentPage() + 1 }})" href="javascript:void(0)"><i class="fa-solid fa-chevron-right "></i></a>
            @else
                <div class="!text-navy hover:!bg-blue hover:!text-navy"><i class="fa-solid fa-chevron-right "></i></div>
            @endif
        </div>
    </div>
@endif