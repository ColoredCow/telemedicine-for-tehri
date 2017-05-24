           <div class="panel panel-default" id="prescription_section" style="display:none">
                <div class="panel-heading"> <h3><strong>Call In Progress</strong></h3>
                <button id="back_doctors" class="btn btn-danger pull-right" style="margin-top: -3em;">Back</button>
                </div>

                <div class="panel-body">
                    <h4 class="text-info">Medication</h4>
                    <div class="table-meds" style="margin-bottom:3em; height: 15em;overflow-y: scroll;    border-radius: 3px;border: 1px solid #eee;">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Type</th>
                                <th></th>
                            </thead>
                            @foreach($medicines as $medicine)
                            <tr>
                                <th>{{ $medicine->name }}</th>
                                <th>{{ $medicine->type }}</th>
                                <th><span class="glyphicon glyphicon-plus text-info add-medicine" area-hidden="true" data-name="{{ $medicine->name }}" data-type="{{ $medicine->type }}"></span></th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    
                    <form class="form-horizontal" role="form" method="GET" action="/home">

                        <div class="form-group{{ $errors->has('prescription') ? ' has-error' : '' }}">
                            <label for="prescription" class="col-md-4 control-label">Enter Presription <br>(on Doctor's behalf)</label>

                            <div class="col-md-6">
                                <textarea id="prescription" class="form-control" name="prescription" value="{{ old('prescription') }}" rows = '15' autofocus></textarea>

                                @if ($errors->has('prescription'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <br>
                                <button type="button" id="search_pharmacy" class="btn btn-primary">
                                    Send to Pharmacy
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
