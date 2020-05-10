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
