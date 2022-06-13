<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Logs</h4>
            <p class="card-description"> Table displays Logins, Registrations and Deactivations
            </p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th> Type</th>
                        <th> Message</th>
                        <th> User</th>
                        <th> Email </th>
                        <th> Date</th>
                        <th> Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td> {{$log['type']}}</td>
                            <td> {{$log['message']}}</td>
                            <td>
                                {{$log['user']}}
                            </td>
                            <td>
                                {{$log['email']}}
                            </td>
                            <td>{{$log['date']}}</td>
                            <td>{{$log['time']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{ $logs->withQueryString()->links('pagination::bootstrap-4') }}
