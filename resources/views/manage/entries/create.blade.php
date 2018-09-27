@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Applcation</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <form action="{{route('entries.store')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="columns">

          <div class="column is-three-quarters-desktop is-three-quarters-tablet">

            <b-field  type="is-primary">
              <b-input type="text" name="title" value="{{$event->title}}" size="is-large" v-model="title" disabled>
              </b-input>
            </b-field>


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

                    <upload></upload>


                  <div class="status-details">
                    <div class="field">
                      <p><small>Choose if the event with application form</small></p>
                      <div class="control">
                        <div class="select is-primary">
                          <select name="cta" required>
                            <option>Select dropdown</option>
                            <option value="1">With Applcation Form</option>
                            <option value="2">Without Applcation Form</option>
                          </select>
                        </div>
                      </div>
                    </div>
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
