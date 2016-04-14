@if (Auth::check())
<nav class="navbar navbar-default" role="navigation">
        <div class="container">
                <div class="navbar-header">
                        <a href="{{ route('home') }}" class="navbar-brand">Retail Management System</a>
                </div>
               
                <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                                @if (Auth::user()->isAdmin())
                                <li><a href="{{ route('admin.index') }}">Back Office</a></li>
                                @endif
                                <li><a href="{{ route('sales.transactionHistory') }}">Invoices</a></li>
                                
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">{{ Auth::user()->getUsername() }}</a></li>
                                <li><a href="{{ route('auth.signout')}}">Sign out</a></li>

                        </ul>
                </div>
        </div>
</nav>
@endif