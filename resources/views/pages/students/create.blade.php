@extends('layouts.app', ['title' => 'Student Registration'])

@section('content')


    <div class="row">


        <form id="form_student_create" method="post" action="{{ route('student.store') }}">

            {{ csrf_field() }}

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="control-label">First Name *</label>
                        <input type="text" class="form-control" name="first_name" placeholder="eg. Juan" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">Last Name *</label>
                        <input type="text" class="form-control" name="last_name" placeholder="eg. dela Cruz" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">Age</label>
                        <input type="text" class="form-control" name="age" placeholder="eg. dela Cruz" required>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <hr />
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="control-label">Address *</label>
                        <input type="text" class="form-control" name="address" placeholder="eg. Juan" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">Zip Code</label>
                        <input type="text" class="form-control" name="zip" placeholder="eg. 4435" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">City</label>
                        <input type="text" class="form-control" name="city" placeholder="eg. New York" required>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="control-label">State</label>

                        <select class="form-control" name="states_id" required>

                            <option value="0">Choose your state</option>

                            @foreach($states as $state)
                                    <option value="{{ $state->id  }}" > {{ $state->name }} ( {{ $state->code }} ) </option>
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="control-label">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" placeholder="eg. +1 123456789">
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="eg. +1 123456789">
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">Email Address</label>
                        <input type="text" class="form-control" name="email" placeholder="eg. example@example.com" required>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <hr />
            </div>


            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="control-label">Year Level</label>

                        <select class="form-control" name="level_id">

                            <option value="0">Choose your year level</option>

                            @foreach($levels as $level)
                                <option value="{{ $level->id  }}" > {{ $level->name }} </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-4 form-group">
                        <label class="control-label">Section</label>
                        <select class="form-control" name="section_id">

                            <option value="0">Choose your section</option>

                            @foreach($sections as $section)
                                <option value="{{ $section->id  }}" > {{ $section->name }} </option>
                            @endforeach

                        </select>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <hr />
            </div>

            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-success ladda-button" data-style="expand-right"><span class="ladda-label">Register</span></button>

                    </div>
                </div>
            </div>

        </form>

    </div>



@endsection



@section('page_scripts')

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\StudentRequest', '#form_student_create') !!}

    <script>




      function form_validation_success($form_id)
      {

          var postData = $($form_id).serializeArray();
          var formURL = $($form_id).attr("action");

          $.ajax(
                  {
                      url : formURL,
                      type: "POST",
                      data : postData,
                      success:function(data, textStatus, jqXHR)
                      {
                          uiMessage(data);
                          $($form_id).closest('form').find("input[type=text], textarea").val("");
                      },
                      error: function(jqXHR, textStatus, errorThrown)
                      {
                          uiMessage('Something went wrong. Please try again');
                      }
                  });

      }

    </script>













@endsection
