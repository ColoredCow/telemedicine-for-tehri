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

                        <div class="form-group{{ $errors->has('disease_type') ? ' has-error' : '' }}">
                            <label for="disease_type" class="col-md-4 control-label">Disease Type</label>

                            <div class="col-md-6">
                                <select name="disease_type" class="form-control" id="disease_type" required autofocus>
                                    <option value="">Select Disease Type</option>
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
