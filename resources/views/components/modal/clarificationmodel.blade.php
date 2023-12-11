<div class="modal fade" id="basicModal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Remarks</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('approver.remarks')}}" method="post">
          @csrf 
          @method('POST')
          <input type="hidden" name="tripid" id="tripid">
          <textarea name="remark" placeholder="Remarks" class="form-control" required></textarea>
          <br>
          <input type="submit" name="submit" class="btn btn-primary" value="Save">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
          </form>
        </div>
        
      </div>
    </div>
</div>