           <div class="panel panel-default" id="new_patient">
                <div class="panel-heading"> <h3><strong>New Patient</strong></h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/new_patient;">

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

                        <div class="form-group{{ $errors->has('disease_type') ? ' has-error' : '' }}">
                            <label for="disease_type" class="col-md-4 control-label">Disease Type</label>

                            <div class="col-md-6">
                                <input id="disease_type" type="text" class="form-control" name="disease_type" value="{{ old('disease_type') }}" required autofocus>

                                @if ($errors->has('disease_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('disease_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label for="area" class="col-md-4 control-label">Area</label>

                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control" name="area" value="{{ old('area') }}" required autofocus>

                                @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
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


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <br>
                                <button type="submit" class="btn btn-primary">
                                    Call Doctor
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-default">
                                    Call Ambulance
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
