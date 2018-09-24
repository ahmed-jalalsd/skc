<h4 >Archives</h4>

<ul class="archives-list">
  @foreach ($archives as $stats)
    <li>
      <a href="/{{$url1}}/?year={{ $stats['year'] }}"> {{ $stats["year"] }} </a>
    </li>
  @endforeach
</ul>
