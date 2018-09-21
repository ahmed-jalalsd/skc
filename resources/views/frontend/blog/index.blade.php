@extends('layouts.app')

@section('content')

<section class="section blog">

  <div class="container">

    <h1 class="title">Blog</h1>

    <div class="news">

      <div class="columns is-multiline">

        <div class="wrapper column is-10">
          @foreach ($posts as $date=>$post)
          <h3>{{$date}}</h3>
          <div class=" news__box columns is-multiline">
            @foreach ($post as $postDetails)
              <div class="paper post column is-4">
                <figure class="post__poster image">
                  <img src="{{ '/images/blog/'.$postDetails->ft_image }}" class="masonry__img" alt="Skc logo">
                </figure>

                <div class="post__content">
                  <div class="tags has-addons">
                    <span class="tag is-rounded">{{date('d-m-Y', strtotime($postDetails->created_at))}}</span>
                  </div>

                  <h2 class="title post__content--title">
                    {{ isset( $postDetails->title) ? str_limit( $postDetails->title, 21) : 'Default' }}
                    <!-- {{ $postDetails->title}} -->
                  </h2>

                  <hr class="post__line">

                  <div class="post__content--body">
                    <p>
                      {{ isset($postDetails->excerpt) ? str_limit($postDetails->excerpt, 80) : 'Default' }}
                    </p>
                  </div>

                    <a href="{{ route('blog.show', $postDetails->id) }}" class="">Read More</a>
                </div>
              </div>
            @endforeach
          </div>
          @endforeach
        </div>

        <div class="column is-2 side-bar">
          @include('_partials.nav.archive-side')
        </div>

      </div> <!-- End of .news__box.columns.is-multiline -->

    </div>  <!-- End of .news__bk -->

  </div> <!-- End of .container.news -->
</section>

@endsection
