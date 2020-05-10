{{-- <section class="content-header">
    @php $route = Route::currentRouteName() @endphp
    @php $index = substr($route, 0, strrpos($route, '.') + 1) . 'index' @endphp
    <nav class="breadcrumb is-centered" aria-label="breadcrumbs">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('home') }}</a></li>
            @if (strpos($route, 'root') === false && Route::has($index))
                @php $isIndex = strpos($route, 'index') !== false @endphp
                @php $parent_text= __($isIndex ? $route : $index) @endphp
                <li class="{{ $isIndex ? 'is-active' : '' }} breadcrumb-item">
                    @if($isIndex)
                        <a href="#" aria-current="page">{{ empty($t) ? $parent_text : $t }}</a>
                    @else
                        <a href="{{ route($index) }}">{{ $parent_text }}</a>
                    @endif
                </li>
                @if(!$isIndex)<li class="is-active"><a href="#" aria-current="page">{{ empty($t) ? __($route) : $t }}</a></li>@endif
            @endif
        </ul>
    </nav>
</section> --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
   <li class="breadcrumb-item active" aria-current="page">
       <i class="fa fa-home"></i>
       <a href="{{route('home')}}">HOME</a>
   </li>

   @for($i = 1; $i <= count(Request::segments()); $i++)
      <li class="breadcrumb-item">
         <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
            {{strtolower(Request::segment($i))}}
         </a>
      </li>
   @endfor
</ol>
</nav>
