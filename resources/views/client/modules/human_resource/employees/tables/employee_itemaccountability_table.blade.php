
               <table class="table datatables" id="tab-employee-itemaccountability" style="font-size: 11pt;">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Item Code</th>
                              <th>Description</th>
                              <th>Date Issued</th>
                              <th>Issued By</th>
                              <th>Status</th>
                              
                           </tr>
                        </thead>
                        <tbody class="table-body">
                          @foreach($itemlist as $row)
                           <tr>
                           <td>{{ $row->id }}</td>
                           <td>{{ $row->item_code }}</td>
                           <td>{{ $row->desc }}</td>
                           <td>{{ $row->issued_date }}</td>
                           <td>{{ $row->issued_by_name }}</td>
                           <td>{{ $row->status }}</td>
                           
                         
                           @endforeach
                        </tr>
                        </tbody>
                     </table>