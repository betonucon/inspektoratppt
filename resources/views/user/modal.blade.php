<input type="hidden" name="id" value="{{ $data->id }}">

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}" placeholder="Silakan Di isi">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{$data->email}}" placeholder="Silakan Di isi">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="{{$data->username}}" placeholder="Silakan Di isi">
        </div>
    </div>
    @if ($data->id ==0)
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label for="role_id" class="form-label">Password</label>
                <input type="Password" name="password" class="form-control" id="password" placeholder="Silakan Di isi">
            </div>
        </div>
    @endif
    <div class="col-md-6">
        <div class="form-group mt-3">
            <label for="role_id" class="form-label">Role</label>
            <select name="role_id" class="form-control" id="role_id">
                <option value="">Pilih Role</option>
                @foreach ($role as $r)
                    <option value="{{ $r->id }}" @if($r->id==$data->role_id) selected @endif>{{ $r->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


