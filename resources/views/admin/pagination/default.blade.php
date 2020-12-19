<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@php $parameters = ''; @endphp
@if(Request::get('order'))
    @php $parameters .= '&order='.Request::get('order'); @endphp
@endif
@if(Request::get('name'))
    @php $parameters .= '&name='.Request::get('name'); @endphp
@endif
@if(Request::get('date_from'))
    @php $parameters .= '&date_from='.Request::get('date_from'); @endphp
@endif
@if(Request::get('date_to'))
    @php $parameters .= '&date_to='.Request::get('date_to'); @endphp
@endif
@if(Request::get('status'))
    @php $parameters .= '&status='.Request::get('status'); @endphp
@endif

@if ($paginator->lastPage() > 1)
<nav aria-label="...">
    <ul class="pagination justify-content-end mb-0">
        @if($paginator->currentPage() > 1)
         <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
             <a class="page-link" href="{{ $paginator->url(1) }}{{ $parameters }}" tabindex="-1">
               <i class="fas fa-angle-double-left"></i>
               <span class="sr-only">Previous</span>
             </a>
           </li>
         <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
             <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1) }}{{ $parameters }}" tabindex="-1">
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
                    <a class="page-link" href="{{ $paginator->url($i) }}{{ $parameters }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        @if($paginator->currentPage() < $paginator->lastPage())
          <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}{{ $parameters }}">
              <i class="fas fa-angle-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </li>
          <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}{{ $parameters }}">
              <i class="fas fa-angle-double-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </li>
          @endif
    </ul>
    </nav>
@endif