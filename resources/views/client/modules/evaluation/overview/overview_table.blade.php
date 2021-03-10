                     <div class="col-sm-12" style="padding-top: 20px;">
                        
                        @forelse($datainput_table as $i => $kpi)

                           <br><center><label style="display: inline-block; width: 100%; font-size: 12pt;"><b><i>KPI:{{ $kpi['kpi_description'] }}</i></b></label></center> <br>
                         {{--  <label>{{ $kpi['department_id'] }}</label> <br>
                           <label>{{ $kpi['department_id'] }}</label> <br> --}}
                              @if(count($kpi['nodes']) > 0)
                                 @foreach($kpi['nodes'] as $desig_node)
                                    {{--<label>{{ $desig_node['designation_id'] }}</label><br>--}}
                                    {{--<label>{{ $desig_node['designation'] }}</label><br>--}}
                                       @if(count($desig_node['nodess']) > 0)
                                          @foreach($desig_node['nodess'] as $user)
                                              <div style="line-height: 15px;padding-left: 15px;" class="col-sm-12">
                                                {{--<label>{{ $user['user_id'] }}</label>--}}<br>
                                                <label>Name of Employee:</label><label>{{ $user['employee_name'] }}
                                                </label><br>
                                                <label>Designation:</label><label>{{ $user['name_desig'] }}</label><br>
                                              </div>
                                                   
                                                         <div class="col-sm-6">
                                                            <table style="width: 100%;" class="table-bordered" >
                                                               <tr>
                                                                  <th style="text-align: center;">No.</th>
                                                                  <th style="text-align: center;">Data Input</th>
                                                                  <th style="text-align: center;">Result</th>                                      
                                                               </tr>
                                                               @if(count($user['nodesss']) > 0)
                                                                 @foreach($user['nodesss'] as $metric)                               
                                                               <tr style="background-color: #A9DFBF;">
                                                                  <td colspan="3"><b>{{ $metric['metric_description'] }}</b></td>
                                
                                                               </tr>
                                                                  <?php $i = 1; ?>
                                                                  @if(count($metric['nodessss']) > 0)
                                                                        @foreach($metric['nodessss'] as $data)
                                                                        <tr>
                                                                           <td style="text-align: center;">{{$i++}}.</td>
                                                                           <td style="text-align: center;">
                                                                           {{ $data->data_input }}
                                                                           </td>
                                                                           <td style="text-align: center;">
                                                                              {{ $data->answer }}
                                                                           </td>
                                                                         </tr>
                                                                                                            
                                                                        @endforeach

                                                                  @endif
                                                            </table>
                                                            
                                                         </div>
                                                                                 
                                                      @endforeach
                                                   @endif
                                          @endforeach
                                       @endif
                                 @endforeach
                              @endif
                        @endforeach
                     </div>
