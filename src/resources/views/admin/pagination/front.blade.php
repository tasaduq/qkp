<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>



@php $parameters = ''; @endphp
@if(Request::get('c'))
    @php $parameters .= '&c='.Request::get('c'); @endphp
@endif
@if(Request::get('co'))
    @php $parameters .= '&co='.Request::get('co'); @endphp
@endif
@if(Request::get('w'))
    @php $parameters .= '&w='.Request::get('w'); @endphp
@endif
@if(Request::get('p'))
    @php $parameters .= '&p='.Request::get('p'); @endphp
@endif

@if ($paginator->lastPage() > 1)
<nav class="w-100" aria-label="...">
    <ul class="pagination justify-content-center mt-4 mb-0">
        @if($paginator->currentPage() > 1)
         <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
             <a class="page-link products-pagination" href="{{ $paginator->url(1) }}{{ $parameters }}" tabindex="-1" page="1">
               <i class="fas fa-angle-double-left"></i>
               <span class="sr-only">Previous</span>
             </a>
           </li>
         <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
             <a class="page-link products-pagination" href="{{ $paginator->url($paginator->currentPage() - 1) }}{{ $parameters }}" tabindex="-1" page="{{$paginator->currentPage() - 1}}">
               <i class="fas fa-angle-left"></i>
               <span class="sr-only">Previous</span>
             </a>
           </li>
           @endif
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link products-pagination" href="{{ $paginator->url($i) }}{{ $parameters }}" page="{{$i}}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        @if($paginator->currentPage() < $paginator->lastPage())
          <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link products-pagination" href="{{ $paginator->url($paginator->currentPage() + 1) }}{{ $parameters }}" page="{{($paginator->currentPage() + 1)}}">
              <i class="fas fa-angle-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </li>
          <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link products-pagination" href="{{ $paginator->url($paginator->lastPage()) }}{{ $parameters }}" page="{{$paginator->lastPage()}}">
              <i class="fas fa-angle-double-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </li>
          @endif
    </ul>
    </nav>
@endif