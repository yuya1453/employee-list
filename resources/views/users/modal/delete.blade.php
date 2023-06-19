<div class="modal"id="delete-user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal">
    <div class="modal-dialog">
      <div class="modal-content">

          <form action="{{route('user.destroy', $user->id)}}" method="post">
          @csrf
          @method('DELETE')

            <div class="modal-header">
              <h3 class="modal-title text-danger"><i class="fa-solid fa-user text-danger"></i>Delete</h3>
            </div>
    
    
            <div class="modal-body">
              <h4 class="mb-2">Employee ID: {{$user->id}}</h4>
              <p class="text-muted">Employee Name: {{$user->name}}</p>
              <p class="text-muted">Employee Department: {{$user->department}}</p>
              <p class="text-muted">Employee Salary: {{$user->salary}}</p>      
              <p class="text-muted">Employee Email: {{$user->email}}</p>
              <p class="text-muted">joined Date: {{$user->created_at}}</p>              
            </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
      </div>
      
    </div>
  </div>