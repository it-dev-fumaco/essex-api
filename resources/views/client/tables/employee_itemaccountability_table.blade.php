          @include('client.item_accountability.modals.addItem')
               <div style="padding-top: 50px;">
                  <table style="width: 100%; font-size: 12pt;padding-top: 50px" border="0">
                     <tr>
                        <td style="padding-left: 30px; width: 32%;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addItem" style="float: left; z-index: 1;"><i class="fa fa-plus"></i> Add</a></td>
                        <td style="padding: 1px 10px; width: 60%;"></td>
                           @if(count($itemlist) <= 0)
                           <td></td>
                           @else
                           <td style="padding: 1px 10px; width: 0%;">
                                                            <a onclick="window.open('/printItem/{{ $employee_profile->user_id }}', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                 <i class="fa fa-print" style="font-size: 30px;"></i>
                                 </a>
                              </td>
                           @endif
                           </td>
                      </tr>
                  </table>
               </div>
                  <table class="table datatables" id="tab-employee-itemaccountability" style="font-size: 11pt;">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Item Code</th>
                              <th>Description</th>
                              <th>Date Issued</th>
                              <th>Issued By</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody class="table-body">
                          @foreach($itemlist as $itemlists)
                           <tr>
                           <td>{{ $itemlists->item_id }}</td>
                           <td>{{ $itemlists->item_code }}</td>
                           <td>
                              Brand: {{ $itemlists->brand }}<br>
                              Model: {{ $itemlists->model }}<br>
                              Qty: {{ $itemlists->qty }}<br>
                              Serial no: {{ $itemlists->serial_no }}<br>
                              Classification: {{ $itemlists->itemclass }}<br>
                              Mc Address: {{ $itemlists->mcaddress }}<br>
                              Item Description: {{ $itemlists->item_desc }}<br>
                           </td>
                           <td>{{ $itemlists->date_issued }}</td>
                           <td>{{ $itemlists->issued_by }}</td>
                           <td>{{ $itemlists->status }}</td>
                           <td>
                              <a href="#" class="hover-icon"  data-toggle="modal" data-target="#edit-itemlist-{{ $itemlists->item_id }}">
                                 <i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i>
                              </a>
                              <a href="" class="hover-icon" data-toggle="modal" data-target="#view-itemlist-{{ $itemlists->item_id }}">
                                 <i class="fa fa-search" style="font-size: 15pt; color: #FFA500;"></i>
                              </a>
                              <a href="#" class="hover-icon"  data-toggle="modal" data-target="#delete-itemlist-{{ $itemlists->item_id }}">
                                 <i class="fa fa-trash" style="font-size: 15pt; color: #C0392B;"></i> 
                              </a>
                           </td>
                           @include('client.item_accountability.modals.editItem')
                           @include('client.item_accountability.modals.deleteItem')
                           @include('client.item_accountability.modals.viewItem')
                           
                           @endforeach
                        </tr>
                        </tbody>
                     </table>


