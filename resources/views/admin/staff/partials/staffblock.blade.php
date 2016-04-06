
<table class="table table-hover">
	<thead> 
		<tr> 
			<th>Username</th> 
			<th>First Name</th>
			<th>Last Name</th> 
			<th>Employement</th>
			<th>Permission</th>
		</tr> 
	</thead> 
	<tbody>
		<tr> 
			<th scope="row">{{ $user->username }}</th> 
				<td>{{ $user->fname }}</td> 
				<td>{{ $user->lname }}</td> 
				<td>{{ $user->employment }}</td> 
				<td>{{ $user->permission }}</td> 
		</tr> 
	</tbody>
</table>
            		<!-- @include('admin/staff/partials/staffblock') -->
