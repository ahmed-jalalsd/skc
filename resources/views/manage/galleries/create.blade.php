@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Add New Ablum</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <form action="{{route('galleries.store')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="columns">

          <div class="column is-three-quarters-desktop is-three-quarters-tablet">

            <b-field  type="is-primary">
              <b-input type="text" name="title" placeholder="Album Title" size="is-large" v-model="title">
              </b-input>
            </b-field>

            <slug-widget url="{{url('/')}}" subdirectory="gallery" :title="title" @copied="slugCopied" @slug-changed="updateSlug"></slug-widget>
            <input type="hidden" v-model="slug" name="slug" />

            <div class="block m-t-40">
							<p class="subtitle"> Add photos to the Gallery:</p>
              <multi-drag-drop></multi-drag-drop>
            </div>

          </div><!-- End of .column is-three-quarters-desktop -->

          <div class="column is-one-quarter-desktop is-narrow-tablet">

            <div class="card card-widget">
              <div class="author-widget widget-area">
                <div class="selected-author">
                  <img src="https://placehold.it/50x50"/>
                  <div class="author">
                    <h4>{{Auth::user()->name}}</h4>
                    <p class="subtitle">
                    </p>
                  </div>
                </div>
              </div>

              <div class="post-status-widget widget-area">

                <div>
									<p> <small>Cover image for the album</small></p>
									<upload></upload>

                  <div class="status-details">

                  </div>

                </div>

              </div>

              <div class="publish-buttons-widget widget-area">
                <div class="primary-action-button">
                  <button class="button is-primary is-fullwidth backend-btn">Publish</button>
                </div>
              </div>

            </div>

          </div> <!-- end of .column.is-one-quarter -->

      </div><!-- End of .columns -->

    </form>

  </div><!-- End of .flex-container -->
@endsection


@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        title: '',
        slug: '',
        api_token: '{{Auth::user()->api_token}}',
      },
      methods: {
        updateSlug: function(val) {
          this.slug = val;
        },
        slugCopied: function(type, msg, val) {
          notifications.toast(msg, {type: `is-${type}`});
        }
      }
    });
  </script>
@endsection
