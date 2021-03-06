@extends('app')

@section('template_title')
	{{ $user->name }}'s Profile
@endsection

@section('template_fastload_css')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ Lang::get('profile.showProfileTitle') }}
					</div>
					<div class="panel-body">

						<dl class="user-info">

							<dt>
								{{ Lang::get('profile.showProfileUsername') }}
							</dt>
							<dd>
								{{ $user->name }}
							</dd>

							<dt>
								{{ Lang::get('profile.showProfileFirstName') }}
							</dt>
							<dd>
								{{ $user->first_name }}
							</dd>

							@if ($user->last_name)
								<dt>
									{{ Lang::get('profile.showProfileLastName') }}
								</dt>
								<dd>
									{{ $user->last_name }}
								</dd>
							@endif

							<dt>
								{{ Lang::get('profile.showProfileEmail') }}
							</dt>
							<dd>
								{{ $user->email }}
							</dd>

							@if ($user->profile)
								@if ($user->profile->location)
									<dt>
										{{ Lang::get('profile.showProfileLocation') }}
									</dt>
									<dd>
										{{ $user->profile->location }}
									</dd>
								@endif

								@if ($user->profile->bio)
									<dt>
										{{ Lang::get('profile.showProfileBio') }}
									</dt>
									<dd>
										{{ $user->profile->bio }}
									</dd>
								@endif

								@if ($user->profile->twitter_username)
									<dt>
										{{ Lang::get('profile.showProfileTwitterUsername') }}
									</dt>
									<dd>
										{!! HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link', 'target' => '_blank')) !!}
									</dd>
								@endif

								@if ($user->profile->github_username)
									<dt>
										{{ Lang::get('profile.showProfileGitHubUsername') }}
									</dt>
									<dd>
										{!! HTML::link('https://github.com/'.$user->profile->github_username, $user->profile->github_username, array('class' => 'github-link', 'target' => '_blank')) !!}
									</dd>
								@endif
							@endif

						</dl>

						@if ($user->profile)
							@if (Auth::user()->id == $user->id)
								{!! HTML::link(url('/profile/'.Auth::user()->name.'/edit'), Lang::get('titles.editProfile')) !!}
							@endif
						@else
							<p>{{ Lang::get('profile.noProfileYet') }}</p>
							{!! HTML::link(url('/profile/'.Auth::user()->name.'/edit'), Lang::get('titles.createProfile')) !!}
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('template_scripts')
@endsection