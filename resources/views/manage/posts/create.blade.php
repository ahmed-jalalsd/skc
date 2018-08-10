@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Add New Blog Post</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="columns">
        <div class="column is-three-quarters-desktop is-three-quarters-tablet">

          <b-field  type="is-primary">
            <b-input type="text" name="title" placeholder="Post Title" size="is-large" v-model="title">
            </b-input>
          </b-field>

          <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @copied="slugCopied" @slug-changed="updateSlug"></slug-widget>
          <input type="hidden" v-model="slug" name="slug" />

          <div class="block m-t-40">
            <drag-drop></drag-drop>
          </div>


          <b-field class="m-t-40" type="is-primary">
            <b-input type="textarea"
                placeholder="Write a short description..."  name="excerpt">
            </b-input>
          </b-field>

          <b-field class="m-t-40"  type="is-primary">
            <b-input type="textarea"
                placeholder="Compose your masterpiece..." rows="20" name="content">
            </b-input>
          </b-field>


        </div> <!-- end of .column.is-three-quarters -->

        <div class="column is-one-quarter-desktop is-narrow-tablet">
          <div class="card card-widget">
            <div class="author-widget widget-area">
              <div class="selected-author">
                <img src="https://placehold.it/50x50"/>
                <div class="author">
                  <h4>{{Auth::user()->name}}</h4>
                  <p class="subtitle">
                    <!-- (jacurtis) -->
                  </p>
                </div>
              </div>
            </div>
            <div class="post-status-widget widget-area">

              <div class="status">

                <upload></upload>

                <!-- <div class="status-details">
                  <h4><span class="status-emphasis">Draft</span> Saved</h4>
                  <p>A Few Minutes Ago</p>
                </div> -->
              </div>
            </div>
            <div class="publish-buttons-widget widget-area">
              <!-- <div class="secondary-action-button">
                <button class="button is-info is-outlined is-fullwidth">Save Draft</button>
              </div> -->
              <div class="primary-action-button">
                <button class="button is-primary is-fullwidth">Publish</button>
              </div>
            </div>
          </div>
        </div> <!-- end of .column.is-one-quarter -->
      </div>
    </form>


  </div> <!-- end of .flex-container -->

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
