@extends('admin.layout')

@section('title', 'Create Team |')

  
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Create Team</h1>

      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">
          <a href="{{ route('admin.index') }}">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href="{{ route('admin.teams.index') }}">Team</a>
        </div>
        <div class="breadcrumb-item active">Create</div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        @if (Session::has('status'))
        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
        @endif
        @if ($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
        @endif
        <form class="form-horizontal" action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="col-form-label" for="name">Name</label>
                    <div class="controls">
                      <input class="form-control" id="name" size="16" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="col-form-label" for="role">Role</label>
                    <div class="controls">
                      <input class="form-control" id="role" size="16" type="text" name="role" value="{{ old('role') }}" placeholder="Role">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label" for="email">Email</label>
                    <div class="controls">
                      <input class="form-control" id="email" size="16" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label" for="phone">Phone</label>
                    <div class="controls">
                      <input class="form-control" id="phone" size="16" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                    </div>
                  </div>
                </div>
              </div>
              <div id="social-media-container">
                <label>Social Media</label>

                <div class="row mt-3" v-for="(account, i) in accounts" :key="i">
                  <div class="col col-sm-4">
                    <select :name="`accounts[${i}][platform]`" v-model="account.platform" class="form-control">
                      <option :value="null" disabled>Platform</option>
                      <option value="facebook">Facebook</option>
                      <option value="instagram">Instagram</option>
                      <option value="twitter">Twitter</option>
                      <option value="linkedin">Linkedin</option>
                      <option value="medium">Medium</option>
                      <option value="github">Github</option>
                      <option value="gitlab">Gitlab</option>
                      <option value="dribbble">Dribbble</option>
                      <option value="behance">Behance</option>
                      <option value="blog">Blog</option>
                    </select>
                  </div>
                  <div class="col">
                    <input type="text" :name="`accounts[${i}][link]`" class="form-control" v-model="account.link" placeholder="Link">
                  </div>
                </div>

                <div class="mt-3">
                  <button class="btn btn-sm" type="button" @click="removeSocialMedia()">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button class="btn btn-sm" type="button" @click="addSocialMedia()">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="form-group">
                <label class="col-form-label" for="desc">Address</label>
                <div class="controls">
                  <textarea class="form-control" id="desc" name="address" cols="30" rows="4" placeholder="Address">{{ old('address') }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="desc">About</label>
                <div class="controls">
                  <textarea class="form-control" id="desc" name="about" cols="30" rows="4" style="min-height: 60px;" placeholder="About">{{ old('about') }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="img-container">Photo</label>
                <div class="controls">
                  <img class="img-fluid" id="img-container" alt="Team Gallery" width="100" height="100" src="{{ asset('static/admin/img/default.png') }}" />
                  <input 
                    type="file"
                    onchange="document.getElementById('img-container').src = window.URL.createObjectURL(this.files[0])"
                    name="image"
                    accept="image/*"
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="form-actions mt-3">
            <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <button class="btn btn-primary ml-2" type="submit">
              <i class="fa fa-save"></i> Save
            </button>
          </div>
        </form>
      </div>
    </div>

  </section>
  @stop

  @section('additional-scripts')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
  <script>
    let accounts = {!! old('accounts') ? json_encode(old('accounts')) : json_encode([
      [
        'platform' => null,
        'link' => null
      ]
    ]) !!}
    
    let socialMediaApp = new Vue({
      el: '#social-media-container',
      data: () => ({
        accounts
      }),
      methods: {
        addSocialMedia () {
          this.accounts.push({
            platform: null,
            link: null
          })
        },
        removeSocialMedia () {
          if (this.accounts.length) {
            this.accounts.pop()
          }
        }
      }
    })
    
  </script>
  @endsection
