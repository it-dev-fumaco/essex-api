            <div class="row" style="margin: 7px;">

              <div class="col-sm-12" style="padding: 3px;padding-top: 10px;">
                <div style="float: left; margin-right: 5px;">
                  <img src="{{ asset('storage/img/user.png') }}" width="60" height="60">
                </div>
                <div style="float: left; margin-top: 8px;">
                  <span style="display: block;">
                    <h4>{{ Auth::user()->employee_name }}</h4>
                  </span>
                  @if($designation)
                  <span style="display: block;">{{ $designation }} - {{ $department }} <!-- ({{-- $branchh --}}) --></span>
                  @endif
                  <span style="display: block;">{{ Auth::user()->employment_status }}</span>
                </div>

                <div style="float: right; margin-top: 8px;">
                  <div align="center">
                  <span style="display: block;">
                    <h5>Access ID</h5></span>
                  <span style="display: block;border-radius: 6px;background: #239B56;padding-top: 5px;width: 50px;height: 33px;color: white;"><b>{{ Auth::user()->user_id }}</b></span>
                </div>
                </div>
              </div>
              <div id="my-profile"></div>
                <div class="col-sm-6" style="padding-top: 10px">
                      
                    <div >
                        <label style="width: 40%;">Local No:</label>{{ Auth::user()->telephone }}
                    </div>
                    <div >
                        <label  style="width: 40%;">Birthdate:</label>
                        {{ \Carbon\Carbon::parse(Auth::user()->birth_date)->format('F d, Y')}}
                    </div>
                    <div >
                        <label  style="width: 40%;">Civil Status:</label>{{ Auth::user()->civil_status }}
                    </div>
                    
                </div>
                <div class="col-sm-6" style="padding-top: 10px">
                      
                    <div >
                        <label style="width: 40%;">TIN:</label>{{ Auth::user()->tin_no }}
                    </div>
                    <div >
                        <label  style="width: 40%;">SSS:</label>{{ Auth::user()->sss_no }}
                    </div>
                    <div >
                        <label  style="width: 40%;">Contact No:</label>{{ Auth::user()->contact_no }}
                    </div>
                   
                </div>
                

            <div class="col-sm-6" style="padding-top: 10px;">
                <h5 align="center" style="line-height: 0px;">Attendance Stats</h5>
                <hr style="border: 2px solid #239B56;border-radius: 5px;line-height: 1px;">
                <div align="center">
                  <label>Last 30 Days Stats ({{ $month }}) </label>
                </div>
                <div align="center">
                <label>{{ $late_in_minutess }}min(s) late</label><br>
                <label>{{ $round_compute }}% - Working Rate</label>
                </div>
            </div>
            <div class="col-sm-6" style="padding-top: 10px;">
              <h5 align="center" style="line-height: 0px;">Absent Notice Stats </h5>
                <hr style="border: 2px solid #239B56;border-radius: 5px;">
                <div align="center">
                  <label>Last 30 Days Stats ({{ $month }})</label>
                </div>
                <div align="center"><label>{{ $round_absent }}% -Absence Rate</label><br>
                <label>{{ $absent }} Absence out of {{ $workingdays }} Days </label>
                </div>
            </div>
