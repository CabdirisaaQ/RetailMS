<div class="row">
	<div class="col-lg-12">
			<table class="table" style="boarder:0;">
		        <tbody>
		            <tr> 
		                <th scope="row"></th> 
		                    <td>Login user: {{ Auth::user()->getUsername() }}</td> 
		                    <td>Perivilage: {{ Auth::user()->employment }}</td>
		                    @if (count($dummyTotal) != 0)
		                    <td><h4>Total : ${{ $dummyTotal }}</h4></td>
		                    @else
		                    <td><h4>Total : $</h4></td>
		                    @endif

		            </tr>
	</div>
</div>