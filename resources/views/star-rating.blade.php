@php
  /**
   * @var int $rating
   */
@endphp
<ul class="list-unstyled star-rating ">
  @for($i = 1; $i <= 5; $i++)
    <li class="list-inline-item">
      <i class=" {{ $rating >= $i  ? 'fas' : 'far'}} fa-star fa-sm" style="color: cornflowerblue;"></i>
    </li>
  @endfor
</ul>