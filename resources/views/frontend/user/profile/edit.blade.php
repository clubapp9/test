@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <!-- Parent Body Container -->
        <div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            <div class="col-md-2" style="padding-top:5px;">
                <button class="btn btn-primary btn-sm" value="Save Changes"> SAVE CHANGES </button>
            </div>

            <div class="col-md-11"> <hr style="padding:0;height: 2px;background-color:#828282;color:#828282;"> </div>

            <div class="panel panel-default">

				<div class="panel-body">

                       {!! Form::model($user, ['route' => 'frontend.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

                    <div class="form-group col-md-8">
                         <div class="col-md-6"> {!! Form::label('First Name') !!} </div>
                         <div class="col-md-6"> {!! Form::label('Last Name') !!} </div>

                         <div class="col-md-6">
                             {!! Form::input('text', 'first_name', null, ['class' => 'form-control']) !!}
                         </div>

                         <div class="col-md-6">
                             {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
                         </div>
                    </div>


                    <div class="form-group col-md-8">

                        <div class="col-md-6"> {!! Form::label('Title') !!} </div>
                        <div class="col-md-6"> {!! Form::label('Organization') !!} </div>

                        <div class="col-md-6">
                            {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-md-6">
                            {!! Form::input('text', 'organization', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>


                    <div class="form-group col-md-8">

                        <div class="col-md-6"> {!! Form::label('Email') !!} </div>
                        <div class="col-md-6"> {!! Form::label('Phone') !!} </div>

                        <div class="col-md-6">
                            {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-md-6">
                            {!! Form::input('text', 'phone', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-8">

                        <div class="col-md-12"> {!! Form::label('Privacy Settings') !!} </div>

                        <div class="col-md-12">
                            {!! Form::radio('setting', 'share-all') !!} Share my contact information with all site members <br/>

                            {!! Form::radio('setting', 'share-group') !!} Only share with group members <br/>

                            {!! Form::radio('setting', 'private') !!} Keep private <br/>
                        </div>
                    </div>

                    <div class="col-md-11"> <hr style="padding:0;height: 2px;background-color:#828282;color:#828282;"> </div>

                    <div class="form-group col-md-8">
                        <div class="col-md-6">
                            {!! Form::checkbox('speakers_bureau') !!} Include my profile in the Speakers Bureau.
                        </div>
                    </div>

                    <div class="form-group col-md-8" style="padding-top:5px;">
                        <div class="col-md-6">
                            {!! Form::label('Short Bio ( 600 Character Maximum )') !!}
                            {!! Form::textarea('short_bio', null, ['size' => '60x7']) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-8" style="padding-top:5px;">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                {!! Form::label('Areas of Expertise') !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::checkbox('area_of_expertise[]') !!} Area 1
                            </div>
                            <div class="col-md-12">
                                {!! Form::checkbox('area_of_expertise[]') !!} Area 2
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-8">

                        <div class="col-md-12"> {!! Form::label('OPTIONAL &nbsp; other areas of expertise to display on your profile') !!} </div>

                        <div class="col-md-12">
                            {!! Form::input('text', 'other_area_expertise', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>


                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      {!! Form::submit(trans('labels.save_button'), ['class' => 'btn btn-primary']) !!}
                                  </div>
                              </div>

                       {!! Form::close() !!}

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection