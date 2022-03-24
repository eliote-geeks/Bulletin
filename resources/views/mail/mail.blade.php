@include('user.css')

<div class="container">
    <div class="row">
        <div class="card">
            <p>Message:</p>
            <p>{{ $data['message'] }}</p>

            <div align="center">
                <p>Name:{{ $data['name'] }}</p>
                <p>Email:{{ $data['email'] }}</p>
            </div>
        </div>
    </div>
</div>