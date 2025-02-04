<form method="post" name="submit" action="{{ route('deleteuser', $row->id) }}">
    @csrf
    @method('DELETE')
    <!-- Modal -->
    <div class="modal fade" id="deleteuser-{{ $row->id }}" tabindex="-1"
        aria-labelledby="deleteUserLabel-{{ $row->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete this
                        @if ($row->role == 0)
                            Superadmin
                        @elseif ($row->role == 1)
                            Admin
                        @elseif ($row->role == 3)
                            Collector
                        @endif
                        ?
                    </h5>
                    <br>
                    <span class="modal-title" id="exampleModalLabel">Name:
                        {{ $row->name }}</span>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title" id="exampleModalLabel">Please enter your password ! </h6>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" aria-describedby="password"
                            name="password" placeholder="********" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-danger font-weight-bold">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
