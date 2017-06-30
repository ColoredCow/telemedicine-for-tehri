           <div class="panel panel-default" id="new_patient_section">
                <div class="panel-heading">
                <h3><strong>New Patient</strong></h3> <button id="see_history_action" class="btn btn-info pull-right" style="margin-top: -3em;display:none;" data-toggle="modal" data-target="#gridSystemModal">See History</button>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name='new_patient' role="form" method="POST" action="/new_patient;">

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="patient_details">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }}">
                            <label for="father_name" class="col-md-4 control-label">Father Name</label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control" name="father_name" value="{{ old('father_name') }}" autofocus>

                                @if ($errors->has('father_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-4 control-label">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}" autofocus>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">

                                <label class="radio-inline">
                                  <input type="radio" value="male" name="sex">Male
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" value="female" name="sex">Female
                                </label>

                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('disease_type') ? ' has-error' : '' }}">
                            <label for="disease_type" class="col-md-4 control-label">Symptoms</label>

                            <div class="col-md-6">
                                <select name="disease_type" class="form-control" id="disease_type" required autofocus multiple="multiple">
                                    @foreach($diseaseTypes as $diseaseType)
                                        <option value="{{ $diseaseType->name }}">{{ $diseaseType->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('disease_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('disease_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!--edited-->           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="disease_types" class="col-md-4 control-label">Other Symptoms</label>

                            <div class="col-md-6">
                                <input id="other_disease" type="text" class="form-control" name="other_disease" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('specialisation') ? ' has-error' : '' }}">
                            <label for="specialisation" class="col-md-4 control-label">Specialisation</label>

                            <div class="col-md-6">
                                <select name="specialisation" class="form-control" id="specialisation" required autofocus>
                                <option value="">Select Specialisation</option>
                                @foreach($specialisations as $specialisation)
                                    <option value="{{ $specialisation }}">{{ $specialisation }}</option>
                                @endforeach
                                </select>

                                @if ($errors->has('specialisation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('specialisation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label for="area" class="col-md-4 control-label">Area</label>

                            <div class="col-md-6">
                                <select name="area" class="form-control" id="area" required autofocus>
                                <option value="">Select Area</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area }}">{{ $area }}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                            <label for="lat" class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input id="lat" type="text" class="form-control" name="lat" required autofocus>

                                @if ($errors->has('lat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('long') ? ' has-error' : '' }}">
                            <label for="long" class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input id="long" type="text" class="form-control" name="long" required autofocus>

                                @if ($errors->has('long'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('long') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <br>
                                <button type="button" id="call_doctor" class="btn btn-primary">
                                    Call Doctor
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <button type="button" id="call_ambulance" class="btn btn-danger">
                                    Emergency Ambulance
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
