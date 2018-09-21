<h4 >Archives</h4>

<ul class="archives-list">
  @foreach ($archives as $stats)
    <li>
      <a href="/event/?year={{ $stats['year'] }}"> {{ $stats["year"] }} </a>
    </li>
  @endforeach
</ul>
