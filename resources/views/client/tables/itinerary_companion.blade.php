						@forelse($itr_companion as $row)
						<label>{{ $row->employee_name }}</label><br>
						@empty
						<label>No companion(s)</label>
						@endforelse