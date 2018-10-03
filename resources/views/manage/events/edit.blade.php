@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Edit The Event</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('events.update', $event->id)}}" method="POST" enctype="multipart/form-data">
      {{method_field('PUT')}}
        {{csrf_field()}}

      <div class="columns">
        <div class="column is-three-quarters-desktop is-three-quarters-tablet">

          <b-field  type="is-primary">
            <b-input type="text" name="title" size="is-large" v-model="title">
            </b-input>
          </b-field>

          <slug-widget url="{{url('/')}}" subdirectory="events" :title="title" @copied="slugCopied" @slug-changed="updateSlug" v-model="slug"></slug-widget>
          <input type="hidden" v-model="slug" name="slug" />

          <div class="block m-t-40">
            <multi-drag-drop></multi-drag-drop>
          </div>


          <b-field class="m-t-40" type="is-primary">
            <b-input type="textarea"
                placeholder="Write a short description..."  name="excerpt" value="{{$event->excerpt}}">
            </b-input>
          </b-field>

          <b-field class="m-t-40"  type="is-primary">
            <b-input type="textarea"
                placeholder="Compose your masterpiece..." rows="20" name="content" value="{{$event->content}}">
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

              <div>

                  <upload></upload>

                <div class="status-details">

                  <div class="field">
                    <label for="start_date" class="label">Start Date</label>
                    <p class="control is-expanded ">
                      <input id="datepickerStart" class="input" type="date" name="start_date" value="{{$event->start_date}}">
                    </p>
                  </div>

                  <div class="field">
                    <label for="end_date" class="label">End Date</label>
                    <p class="control is-expanded">
                      <input id="datepickerEnd" class="input" type="date" name="end_date" value="{{$event->end_date}}">
                    </p>
                  </div>

                  <div class="field">
                    <p><small>Choose if the event with application form</small></p>
                    <div class="control">
                      <div class="select is-primary">
                        <select name="cta" required>
                          <option value="{{$event->flag_application}}">{{ $event->flag_application ? 'With Applcation Form' : 'Without Applcation Form' }}</option>
                          <option value="1">With Applcation Form</option>
                          <option value="0">Without Applcation Form</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>

            <div class="publish-buttons-widget widget-area">

              <div class="primary-action-button">
                <button class="button is-primary is-fullwidth backend-btn">Update</button>
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
        title: '{{$event->title}}',
        slug: '{{$event->slug}}',
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
